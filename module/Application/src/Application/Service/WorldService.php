<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 15/10/2015
 * Time: 11:12
 */

namespace Application\Service;


use Application\Entity\City;
use Application\Entity\Country;
use Zend\Db\TableGateway\TableGateway;

class WorldService
{
    /**
     * @var TableGateway
     */
    private $countryTable;
    /**
     * @var TableGateway
     */
    private $cityTable;

    /**
     * @param \Zend\Db\TableGateway\TableGateway $countryTable
     * @param \Zend\Db\TableGateway\TableGateway $cityTable
     */
    public function __construct(
      TableGateway $countryTable,
      TableGateway $cityTable
    ) {
        $this->countryTable = $countryTable;
        $this->cityTable = $cityTable;
    }

    /**
     * @return Country[]
     */
    public function getAllCountries()
    {
        $countries = $this->countryTable->select();
        return $countries;
    }

    /**
     * @param string $code
     * @return Country
     */
    public function getCountryByCode($code)
    {
        $country = $this->countryTable->select(['Code' => $code]);
        if ($country->count() < 1) {
            return false;
        }
        return $country->current();
    }

    /**
     * @param string $countryCode
     * @return City[]
     */
    public function getCitiesByCountryCode($countryCode)
    {
        $cities = $this->cityTable->select(['CountryCode' => $countryCode]);
        return $cities;
    }

    /**
     * @param $id
     * @return City
     */
    public function getCityById($id)
    {
        $city = $this->cityTable->select(['ID' => $id]);
        if ($city->count() < 1) {
            return false;
        }
        return $city->current();
    }

}