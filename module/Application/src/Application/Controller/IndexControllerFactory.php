<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 16/10/2015
 * Time: 11:24
 */

namespace Application\Controller;


use Application\Service\WorldService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $worldService = $serviceLocator->getServiceLocator()->get(WorldService::class);
        return new IndexController($worldService);
    }
}