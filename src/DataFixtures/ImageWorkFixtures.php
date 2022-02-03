<?php

namespace App\DataFixtures;

use App\Entity\ImageWork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageWorkFixtures extends Fixture
{
    public const IMAGE_WORK_DATAS = [
        [
            'alt' => 'Page d\'accueil du project un',
            'src' => 'https://res.cloudinary.com/dzqbzqgjw/image/upload/v1598424851/portfolio/un/un-1_qjqjqg.png',
        ],
        [
            'alt' => 'Page d\'accueil du project un',
            'src' => 'https://res.cloudinary.com/dzqbzqgjw/image/upload/v1598424851/portfolio/un/un-2_qjqjqg.png',
        ],
        [
            'alt' => 'Page d\'accueil du project deux',
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
