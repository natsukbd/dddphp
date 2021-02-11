<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

final class Location
{
    /**
     * Location constructor.
     * @param Country $country
     * @param City $city
     * @param Postcode $postcode
     */
    public function __construct(
        private Country $country,
        private City $city,
        private Postcode $postcode
    ) {
    }

    /**
     * @return Country
     */
    public function country(): Country
    {
        return $this->country;
    }

    /**
     * @return City
     */
    public function city(): City
    {
        return $this->city;
    }

    /**
     * @return Postcode
     */
    public function postcode(): Postcode
    {
        return $this->postcode;
    }

    public function validate(LocationValidationHandler $validationHandler): void
    {
        (new LocationValidator($this, $validationHandler))->validate();
    }
}
