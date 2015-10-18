<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 15/10/2015
 * Time: 11:43
 */

namespace Application\AbstractFactory;


use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Application;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TableGatewayAbstractFactory implements AbstractFactoryInterface
{

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(
      ServiceLocatorInterface $serviceLocator,
      $name,
      $requestedName
    ) {
        return fnmatch('*Table', $requestedName);
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(
      ServiceLocatorInterface $serviceLocator,
      $name,
      $requestedName
    ) {
        $extractedName = ucfirst(str_replace('Table', '', $requestedName));
        $objectName = '\Application\Entity\\' . $extractedName;
        $hydrator           = new \Zend\Stdlib\Hydrator\ClassMethods();
        $rowObjectPrototype = new $objectName;
        $resultSet          = new \Zend\Db\ResultSet\HydratingResultSet($hydrator, $rowObjectPrototype);

        return new TableGateway($extractedName, $serviceLocator->get(Adapter::class), null, $resultSet);
    }
}