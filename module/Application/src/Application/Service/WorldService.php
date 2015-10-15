<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 15/10/2015
 * Time: 11:12
 */

namespace Application\Service;


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
     * @return array
     */
    public function getAllCountries()
    {
        $countries = $this->countryTable->select()->toArray();
        return $countries;
    }

    /**
     * @param string $code
     * @return array
     */
    public function getCountryByCode($code)
    {
        $country = $this->countryTable->select(['Code' => $code])->toArray();
        return $country;
    }

    /**
     * @param string $countryCode
     * @return array
     */
    public function getCitiesByCountryCode($countryCode)
    {
        $cities = $this->cityTable->select(['CountryCode' => $countryCode])
          ->toArray();
        return $cities;
    }

    /**
     * @param $id
     * @return array
     */
    public function getCityById($id)
    {
        $city = $this->cityTable->select(['ID' => $id])->toArray();
        return $city;
    }

}