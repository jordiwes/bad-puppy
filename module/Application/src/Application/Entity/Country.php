<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 18/10/2015
 * Time: 09:20
 */

namespace Application\Entity;


class Country
{
    private $code;
    private $name;
    private $continent;
    private $region;
    private $surfaceArea;
    private $indepYear;
    private $population;
    private $lifeExpectancy;
    private $gNP;
    private $gNPOld;
    private $localName;
    private $governmentForm;
    private $headOfState;
    private $capital;
    private $code2;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getSurfaceArea()
    {
        return $this->surfaceArea;
    }

    /**
     * @return mixed
     */
    public function getIndepYear()
    {
        return $this->indepYear;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @return mixed
     */
    public function getLifeExpectancy()
    {
        return $this->lifeExpectancy;
    }

    /**
     * @return mixed
     */
    public function getGNP()
    {
        return $this->gNP;
    }

    /**
     * @return mixed
     */
    public function getGNPOld()
    {
        return $this->gNPOld;
    }

    /**
     * @return mixed
     */
    public function getLocalName()
    {
        return $this->localName;
    }

    /**
     * @return mixed
     */
    public function getGovernmentForm()
    {
        return $this->governmentForm;
    }

    /**
     * @return mixed
     */
    public function getHeadOfState()
    {
        return $this->headOfState;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @return mixed
     */
    public function getCode2()
    {
        return $this->code2;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $continent
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @param mixed $surfaceArea
     */
    public function setSurfaceArea($surfaceArea)
    {
        $this->surfaceArea = $surfaceArea;
    }

    /**
     * @param mixed $indepYear
     */
    public function setIndepYear($indepYear)
    {
        $this->indepYear = $indepYear;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * @param mixed $lifeExpectancy
     */
    public function setLifeExpectancy($lifeExpectancy)
    {
        $this->lifeExpectancy = $lifeExpectancy;
    }

    /**
     * @param mixed $gNP
     */
    public function setGNP($gNP)
    {
        $this->gNP = $gNP;
    }

    /**
     * @param mixed $gNPOld
     */
    public function setGNPOld($gNPOld)
    {
        $this->gNPOld = $gNPOld;
    }

    /**
     * @param mixed $localName
     */
    public function setLocalName($localName)
    {
        $this->localName = $localName;
    }

    /**
     * @param mixed $governmentForm
     */
    public function setGovernmentForm($governmentForm)
    {
        $this->governmentForm = $governmentForm;
    }

    /**
     * @param mixed $headOfState
     */
    public function setHeadOfState($headOfState)
    {
        $this->headOfState = $headOfState;
    }

    /**
     * @param mixed $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * @param mixed $code2
     */
    public function setCode2($code2)
    {
        $this->code2 = $code2;
    }

}