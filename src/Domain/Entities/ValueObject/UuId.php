<?php


namespace Malendar\Domain\Entities\ValueObject;

final class UuId
{
    private $id;

    public function __construct($raw_id)
    {
        $this->id = $raw_id;
    }

    public static function generate()
    {
        return new self(\Rhumsaa\Uuid\Uuid::uuid4()->toString());
    }

    public function toString()
    {
        return $this->id;
    }

    public function equals(UuId $uiId)
    {
        return $this->id() === $uiId->id();
    }

    public function id()
    {
        return $this->id;
    }
}