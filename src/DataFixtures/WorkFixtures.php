<?php

namespace App\DataFixtures;

use App\Entity\Work;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WorkFixtures extends Fixture implements DependentFixtureInterface
{
    // TODO : 
    // Make real date for each work 
    // Add more details for each work description
    // Change link for Reims Quizz
    // Add more works (hackathon, ...)
    public const WORK_DATAS = [
        [
            'title' => 'Reims Quizz',
            'description' => 'On the occasion of our first project at the Wild Code School, we have the task of creating a web application that we have named Reims Quiz and which, as its name indicates, is a quiz designed to help tourists discover the city of Reims.
            
            The application is composed of a front-end and is made with HTML, CSS and JavaScript.

            This project is realized by a team of six students.',
            'startDate' => '2021-09-20',
            'endDate' => '2021-10-01',
            'link' => 'https://github.com/nibor51/scaling-journey',
        ],
        [
            'title' => 'Baker Street Fighter',
            'description' => 'On the occasion of our second project at the Wild Code School, we have the task of creating a web application that we have named Baker Street Fighter and which, as its name indicates, is a fighting game.

            The application is composed of a front-end and a back-end. The front-end is made with HTML, CSS and JavaScript and the back-end is made with PHP and SQL.

            This project is realized by a team of five students.',
            'startDate' => '2021-10-01',
            'endDate' => '2021-11-01', 
            'link' => 'https://github.com/WildCodeSchool/reims-php-2109-project2-baker-street-fighter',
        ],
        [
            'title' => 'Project trois',
            'description' => 'On the occasion of our third project at the Wild Code School, we have the task of creating a web application for a real client, the application is named Motorbox. Is a web application that follows the maintenance of a motorbike.
            
            The application is composed of a front-end and a back-end. The front-end is made with HTML, SCSS and JavaScript and the back-end is made with PHP Symfony and SQL.
            
            This project is realized by a team of five students.',
            'startDate' => '2021-12-01',
            'endDate' => '2022-02-01',
            'link' => 'https://github.com/WildCodeSchool/reims-202109-php-project3-motorbox',
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
