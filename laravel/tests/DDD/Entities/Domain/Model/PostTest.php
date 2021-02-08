<?php

declare(strict_types=1);

namespace Tests\DDD\Entities\Domain\Model;

use DateTimeImmutable;
use DDD\Entities\Domain\Model\Post;
use PHPUnit\Framework\TestCase;

final class PostTest extends TestCase
{
    /**
     * @test
     */
    public function aNewPostIsNotPublishedByDefault(): void
    {
        $post = new Post(
            'A Post Content',
            'A Post Title',
        );

        $this->assertFalse(
            $post->isPublished()
        );
    }

    /**
     * @test
     */
    public function aPostCanBePublishedWithAPublicationDate(): void
    {
        $post = new Post(
            'A Post Content',
            'A Post Title',
        );

        $post->publish();

        $this->assertTrue(
            $post->isPublished()
        );

        $this->assertInstanceOf(DateTimeImmutable::class, $post->publicationDate());
    }
}
