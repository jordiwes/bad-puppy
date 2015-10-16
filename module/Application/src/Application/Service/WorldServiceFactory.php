<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 16/10/2015
 * Time: 11:28
 */

namespace Application\Service;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class WorldServiceFactory implements FactoryInterface
{


    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $countryTable = $serviceLocator->get('CountryTable');
        $cityTable = $serviceLocator->get('CityTable');

        return new WorldService($countryTable, $cityTable);
    }
}