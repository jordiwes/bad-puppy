<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 18/10/2015
 * Time: 09:27
 */

namespace Application\Entity;


class City
{
    private $iD;
    private $name;
    private $countryCode;
    private $district;
    private $population;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->iD;
    }

    /**
     * @param mixed $iD
     */
    public function setID($iD)
    {
        $this->iD = $iD;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param mixed $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }
}