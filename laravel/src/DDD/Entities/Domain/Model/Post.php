<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

use DateTimeImmutable;
use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

final class Post
{
    private Status $status;

    private DateTimeImmutable $createdAt;

    private ?DateTimeImmutable $publishedAt;

    /**
     * Post constructor.
     * @param string $content
     * @param string $title
     */
    public function __construct(private string $content, private string $title)
    {
        $this->validateContent($content);
        $this->validateTitle($this->title);
        $this->unpublish();
        $this->createdAt(new DateTimeImmutable());
    }

    private function validateContent(string $content): void
    {
        if ($content === '') {
            throw new InvalidArgumentException('empty content.');
        }
    }

    private function validateTitle(string $title): void
    {
        if ($title === '') {
            throw new InvalidArgumentException('empty title.');
        }
    }

    private function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    private function createdAt(DateTimeImmutable $date)
    {
        // 日付検証省略

        $this->createdAt = $date;
    }

    private function publishedAt(?DateTimeImmutable $date)
    {
        // 日付検証省略
        $this->publishedAt = $date;
    }

    public function publish()
    {
        $this->setStatus(Status::published());
        $this->publishedAt(new DateTimeImmutable());
    }

    public function unPublish(): void
    {
        $this->setStatus(Status::draft());
        $this->publishedAt(null);
    }

    #[Pure] public function isPublished(): bool
    {
        return $this->status->equalTo(Status::published());
    }

    public function publicationDate(): ?DateTimeImmutable
    {
        return $this->publishedAt;
    }
}
