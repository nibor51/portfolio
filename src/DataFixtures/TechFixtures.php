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
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/php/php-original.svg',
        ],
        [
            'name' => 'Symfony',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/symfony/symfony-original.svg',
        ],
        [
            'name' => 'JavaScript',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/javascript/javascript-original.svg',
        ],
        [
            'name' => 'React',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/react/react-original-wordmark.svg',
        ],
        [
            'name' => 'Node.js',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/nodejs/nodejs-original-wordmark.svg',
        ],
        [
            'name' => 'SASS',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/sass/sass-original.svg',
        ],
        [
            'name' => 'Git',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/git/git-original-wordmark.svg',
        ],
        [
            'name' => 'GitHub',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/github/github-original-wordmark.svg',
        ],
        [
            'name' => 'TypeScript',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/typescript/typescript-original.svg',
        ],
        [
            'name' => 'Docker',
            'logo' => 'https://github.com/devicons/devicon/blob/master/icons/docker/docker-original-wordmark.svg',
        ],
        [
            'name' => 'Linux',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/linux/linux-original.svg',
        ],
        [
            'name' => 'Yarn',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/yarn/yarn-original-wordmark.svg',
        ],
        [
            'name' => 'Express.js',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/express/express-original-wordmark.svg',
        ],
        [
            'name' => 'MongoDB',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/mongodb/mongodb-original-wordmark.svg',
        ],
        [
            'name' => 'MySQL',
            'logo' => 'https://raw.githubusercontent.com/devicons/devicon/2ae2a900d2f041da66e950e4d48052658d850630/icons/mysql/mysql-original-wordmark.svg',
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
