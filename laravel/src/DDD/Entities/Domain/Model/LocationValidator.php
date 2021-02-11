<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

final class LocationValidator
{
    /**
     * LocationValidator constructor.
     * @param Location $location
     * @param LocationValidationHandler $validationHandler
     */
    public function __construct(
        private Location $location,
        private LocationValidationHandler $validationHandler,
    ) {
    }

    public function validate()
    {
        if (!$this->location->country()->hasCity($this->location->city())) {
            $this->validationHandler->handleCityNotFoundInCountry();
        }

        if (!$this->location->city()->isPostcodeValid($this->location->postcode())) {
            $this->validationHandler->handleInvalidPostcodeForCity();
        }
    }
}
