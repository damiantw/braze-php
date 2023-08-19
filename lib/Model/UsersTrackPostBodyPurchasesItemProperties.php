<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Model;

class UsersTrackPostBodyPurchasesItemProperties extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var string
     */
    protected $color;
    /**
     * @var string
     */
    protected $monogram;
    /**
     * @var int
     */
    protected $checkoutDuration;
    /**
     * @var string
     */
    protected $size;
    /**
     * @var string
     */
    protected $brand;

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->initialized['color'] = true;
        $this->color = $color;

        return $this;
    }

    public function getMonogram(): string
    {
        return $this->monogram;
    }

    public function setMonogram(string $monogram): self
    {
        $this->initialized['monogram'] = true;
        $this->monogram = $monogram;

        return $this;
    }

    public function getCheckoutDuration(): int
    {
        return $this->checkoutDuration;
    }

    public function setCheckoutDuration(int $checkoutDuration): self
    {
        $this->initialized['checkoutDuration'] = true;
        $this->checkoutDuration = $checkoutDuration;

        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->initialized['brand'] = true;
        $this->brand = $brand;

        return $this;
    }
}
