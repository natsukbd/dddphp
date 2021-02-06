<?php

declare(strict_types=1);

namespace DDD\ValueObjects;

// 値オブジェクトを使用しない場合の例
// ISOを検証したい場合、製品が通貨のISOを検証する責任を追うことになる
// これは単一責任の原則に違反する
// また、他のロジックでISOを検証したくなった場合、同一概念にも関わらず再利用が出来ない
// -> DRYの原則に従えない
final class Product
{
    private string $id;
    private string $name;
    private int $amount;
    private string $currency;
}
