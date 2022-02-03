<?php

namespace App\DataFixtures;

use App\Entity\Tech;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechFixtures extends Fixture
{
    public const TECH_DATAS = [
        [
            'name' => 'PHP',
            'logo' => 'php.png',
        ],
        [
            'name' => 'Symfony',
            'logo' => 'symfony.png',
        ],
        [
            'name' => 'JavaScript',
            'logo' => 'javascript.png',
        ],
        [
            'name' => 'React',
            'logo' => 'react.png',
        ],
        [
            'name' => 'Vue',
            'logo' => 'vue.png',
        ],
        [
            'name' => 'Angular',
            'logo' => 'angular.png',
        ],
        [
            'name' => 'Node.js',
            'logo' => 'nodejs.png',
        ],
        [
            'name' => 'SASS',
            'logo' => 'sass.png',
        ],
        [
            'name' => 'Git',
            'logo' => 'git.png',
        ],
        [
            'name' => 'GitHub',
            'logo' => 'github.png',
        ],
        [
            'name' => 'GitKraken',
            'logo' => 'gitkraken.png',
        ],
        [
            'name' => 'TypeScript',
            'logo' => 'typescript.png',
        ],
        [
            'name' => 'Docker',
            'logo' => 'docker.png',
        ],
        [
            'name' => 'Linux',
            'logo' => 'linux.png',
        ],
        [
            'name' => 'Windows',
            'logo' => 'windows.png',
        ],
        [
            'name' => 'Yarn',
            'logo' => 'yarn.png',
        ],
        [
            'name' => 'Express.js',
            'logo' => 'expressjs.png',
        ],
        [
            'name' => 'MongoDB',
            'logo' => 'mongodb.png',
        ],
        [
            'name' => 'MySQL',
            'logo' => 'mysql.png',
        ],
        [
            'name' => 'PostgreSQL',
            'logo' => 'postgresql.png',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TECH_DATAS as $key => $data) {
            $tech = new Tech();
            $tech->setName($data['name']);
            $tech->setLogo($data['logo']);

            $manager->persist($tech);

            $this->addReference('tech_' . $key, $tech);
        }

        $manager->flush();
    }
}
