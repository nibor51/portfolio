<?php

namespace App\DataFixtures;

use App\Entity\Work;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WorkFixtures extends Fixture implements DependentFixtureInterface
{
    public const WORK_DATAS = [
        [
            'title' => 'Project un',
            'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget scelerisque purus. Fusce non arcu pharetra sem euismod elementum eu ut eros. Nulla neque eros, pulvinar et vulputate et, pellentesque eu ipsum. Sed erat lorem, viverra et aliquam nec, malesuada ut urna. Vivamus porta urna vitae massa maximus scelerisque quis sit amet nisl. Maecenas id tempor ante, eu scelerisque erat. Sed cursus massa quis ex maximus, non feugiat diam commodo. Curabitur vitae nisl accumsan, ornare velit vel, interdum erat.

            Integer vitae eleifend libero. Morbi ac sapien eu nunc gravida hendrerit id eget quam. Praesent lacinia ornare eleifend. Ut ultrices ultricies suscipit. Duis eget molestie dolor. In laoreet sollicitudin nulla, at pellentesque tortor congue sed. Vivamus elementum non arcu nec vehicula. Donec elit metus, bibendum vel arcu eget, viverra vehicula magna. Nunc eu nisi leo. Praesent a imperdiet elit. Aenean pellentesque metus nunc, quis dapibus massa sollicitudin aliquet. Cras fermentum vehicula lectus in euismod. Ut aliquet, diam in rutrum convallis, justo dolor imperdiet erat, in mollis justo purus nec diam. ',
            'startDate' => '2017-01-01',
            'endDate' => '2018-06-01',
            'link' => 'https://project-un.fr',
        ],
        [
            'title' => 'Project deux',
            'description' => 'Aenean feugiat ultrices nisi, at tempus ipsum tempus id. Sed in luctus arcu. Mauris volutpat pellentesque lectus sit amet gravida. Integer tincidunt volutpat nisi, ac placerat tortor malesuada a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ut tempor erat, non faucibus orci. In nec leo malesuada, molestie neque at, interdum nisl. Morbi sit amet tempor turpis, blandit facilisis odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam id lorem erat.',
            'startDate' => '2018-10-01',
            'endDate' => '2020-06-01', 
            'link' => 'https://project-deux.fr',
        ],
        [
            'title' => 'Project trois',
            'description' => ' Aenean feugiat ultrices nisi, at tempus ipsum tempus id. Sed in luctus arcu. Mauris volutpat pellentesque lectus sit amet gravida. Integer tincidunt volutpat nisi, ac placerat tortor malesuada a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent ut tempor erat, non faucibus orci. In nec leo malesuada, molestie neque at, interdum nisl. Morbi sit amet tempor turpis, blandit facilisis odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam id lorem erat.

            Nullam viverra vestibulum urna, at tempor arcu porta ac. Ut eu augue eget lorem tincidunt malesuada commodo eu enim. Praesent ac consectetur sapien. Mauris tincidunt eget lectus nec volutpat. Nunc at lacus purus. Sed id risus non urna fermentum efficitur et congue ipsum. Nam vel dignissim enim. Maecenas tempus vestibulum libero nec interdum. Pellentesque lacinia et nunc at viverra. Suspendisse at purus urna. ',
            'startDate' => '2021-02-01',
            'endDate' => '2022-01-01',
            'link' => 'https://project-trois.fr',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::WORK_DATAS as $workData) {
            $work = new Work();
            $work->setTitle($workData['title']);
            $work->setDescription($workData['description']);
            $work->setStartDate(new \DateTime($workData['startDate']));
            $work->setEndDate(new \DateTime($workData['endDate']));
            $work->setLink($workData['link']);
            for ($i=0; $i< count(TechFixtures::TECH_DATAS); $i++) {
                $work->addUsedTech($this->getReference('tech_'. $i));
            }
            for ($i=0; $i< 2; $i++) {
                $work->addImage($this->getReference('image_'. $i));
            }

            $manager->persist($work);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TechFixtures::class,
            ImageWorkFixtures::class,
        ];
    }
}
