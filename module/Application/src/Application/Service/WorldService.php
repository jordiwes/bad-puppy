<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 15/10/2015
 * Time: 11:12
 */

namespace Application\Service;


use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class WorldService
{
    /**
     * @var Adapter
     */
    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return array
     */
    public function getAllCountries()
    {
        $tableGateway = new TableGateway('Country', $this->adapter);
        $countries = $tableGateway->select()->toArray();

        return $countries;
    }

    /**
     * @param string $code
     * @return array
     */
    public function getCountryByCode($code)
    {
        $tableGateway = new TableGateway('Country', $this->adapter);
        $country = $tableGateway->select(['Code' => $code])->toArray();

        return $country;
    }

    /**
     * @param string $countryCode
     * @return array
     */
    public function getCitiesByCountryCode($countryCode)
    {
        $cityTableGateway = new TableGateway('City', $this->adapter);
        $cities = $cityTableGateway->select(['CountryCode' => $countryCode])->toArray();

        return $cities;
    }

    /**
     * @param $id
     * @return array
     */
    public function getCityById($id)
    {
        $cityTableGateway = new TableGateway('City', $this->adapter);
        $city = $cityTableGateway->select(['ID' => $id])->toArray();

        return $city;
    }

}