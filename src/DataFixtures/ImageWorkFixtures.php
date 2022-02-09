<?php

namespace App\DataFixtures;

use App\Entity\ImageWork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageWorkFixtures extends Fixture
{
    public const IMAGE_WORK_DATAS = [
        [
            'alt' => 'Logo de Reims Quizz',
            'src' => 'https://camo.githubusercontent.com/858440990b8951eccf8c56b80c158fc70f4f021472654417323cb08c12d302d3/68747470733a2f2f692e6962622e636f2f747137473976632f6c6f676f2d312e6a7067',
        ],
        [
            'alt' => 'Page d\'accueil de Baker Street Fighters',
            'src' => 'https://res.cloudinary.com/dzqbzqgjw/image/upload/v1598424851/portfolio/un/un-2_qjqjqg.png',
        ],
        [
            'alt' => 'Page d\'accueil de Motorbox',
            'src' => 'https://res.cloudinary.com/dzqbzqgjw/image/upload/v1598424851/portfolio/un/un-3_qjqjqg.png',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::IMAGE_WORK_DATAS as $key => $imageWorkData) {
            $imageWork = new ImageWork();
            $imageWork->setAlt($imageWorkData['alt']);
            $imageWork->setSrc($imageWorkData['src']);

            $manager->persist($imageWork);

            $this->addReference('image_' . $key, $imageWork);
        }

        $manager->flush();
    }
}
