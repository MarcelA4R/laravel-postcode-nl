<?php

namespace Speelpenning\PostcodeNl;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use JsonException;
use function json_encode;

/**
 * Class Address
 *
 * This model contains the address details as provided by Postcode.nl. For a list of available properties and their
 * meaning, see https://api.postcode.nl/documentation/address-api#return.
 *
 * @property string $street
 * @property string $streetNen
 * @property int $houseNumber
 * @property string $houseNumberAddition
 * @property string $postcode
 * @property string $city
 * @property string $cityShort
 * @property string $municipality
 * @property string $municipalityShort
 * @property string $province
 * @property int $rdX
 * @property int $rdY
 * @property float $latitude
 * @property float $longitude
 * @property string $bagNumberDesignationId
 * @property string $bagAddressableObjectId
 * @property string $addressType
 * @property string[] $purposes
 * @property int $surfaceArea
 * @property string[] $houseNumberAdditions
 */
class Address implements Arrayable, Jsonable
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * Address constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Retrieve a property of the address.
     *
     * @param string $key
     * @return mixed
     */
    public function __get(string $key)
    {
        return Arr::get($this->attributes, $key);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->attributes;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     * @return string
     * @throws JsonException
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR | $options);
    }
}
