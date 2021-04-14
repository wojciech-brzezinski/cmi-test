<?php

declare(strict_types = 1);

namespace App\Infrastructure\Doctrine\ORM\Fixtures;

use App\Domain\Article;
use App\Domain\Comment;
use App\Domain\Shared\ValueObject\Text;
use Assert\AssertionFailedException;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use League\Uri\Uri;

/**
 * 
 */
final class CommentFixture extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            ArticleFixture::class,
        ];
    }

    /**
     * @throws AssertionFailedException
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $articles = $manager->getRepository(Article::class)->findAll();
        
        foreach ($articles as $article) {
            for ($i = 0; $i < $faker->numberBetween(3, 10); $i++) {
                $comment = new Comment(
                    $article->uuid(),
                    new Text($faker->sentence(10))
                );

                $createdAt = $faker->dateTimeBetween("-1 year");

                $property = new \ReflectionProperty(Comment::class, "createdAt");
                $property->setAccessible(true);
                $property->setValue($comment, $createdAt);

                $manager->persist($comment);
            }
        }

        $manager->flush();
    }
}
