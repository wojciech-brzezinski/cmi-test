<?php

declare(strict_types = 1);

namespace App\Infrastructure\Doctrine\ORM\Fixtures;

use App\Domain\Article;
use App\Domain\Shared\ValueObject\Text;
use Assert\AssertionFailedException;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use League\Uri\Uri;

/**
 * 
 */
final class ArticleFixture extends Fixture
{
    /**
     * @throws AssertionFailedException
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 2; $i++) {
            $article = new Article(
                Uri::createFromString("/article$i"),
                new Text($faker->sentence(5)),
                new Text($faker->sentence(30))
            );
            $manager->persist($article);
        }

        $manager->flush();
    }
}
