<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

use DDD\Entities\Domain\Event\DomainEventPublisher;
use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;
use Carbon\CarbonImmutable;

final class Post
{
    const NEW_TIME_INTERVAL_DAYS = 15;

    private Status $status;

    private CarbonImmutable $createdAt;

    private ?CarbonImmutable $publishedAt;

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
        $this->createdAt(CarbonImmutable::today());
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

    public function isNew(): bool
    {
        return ($this->today())
                ->diff($this->createdAt)
                ->days <= self::NEW_TIME_INTERVAL_DAYS;
    }

    private function today(): CarbonImmutable
    {
        return CarbonImmutable::today();
    }

    private function createdAt(CarbonImmutable $date)
    {
        // 日付検証省略

        $this->createdAt = $date;
    }

    private function publishedAt(?CarbonImmutable $date)
    {
        // 日付検証省略
        $this->publishedAt = $date;
    }

    public function publish()
    {
        $this->setStatus(
            Status::published()
        );

        $this->publishedAt(new CarbonImmutable());

        DomainEventPublisher::instance()->publish(
            new PostPublished(
                $this->id
            )
        );
    }

    public function unPublish(): void
    {
        $this->setStatus(Status::draft());
        $this->publishedAt(null);

        DomainEventPublisher::instance()->publish(
            new PostUnpublished(
                $this->id
            )
        );
    }

    #[Pure] public function isPublished(): bool
    {
        return $this->status->equalTo(Status::published());
    }

    public function publicationDate(): ?CarbonImmutable
    {
        return $this->publishedAt;
    }
}
