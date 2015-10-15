<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\AbstractFactory\TableGatewayAbstractFactory;
use Application\Controller\IndexController;
use Application\Service\WorldService;
use Zend\Mvc\Controller\ControllerManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    // Module.php
    public function getControllerConfig()
    {
        return [
          'factories' => [
            IndexController::class => function (
              ControllerManager $controllerManager
            ) {
                $worldService = $controllerManager->getServiceLocator()
                  ->get(WorldService::class);
                return new IndexController($worldService);
            }
          ],
        ];
    }

    public function getServiceConfig()
    {
        return [
          'factories' => [
            WorldService::class => function (ServiceManager $serviceManager) {
                $countryTable = $serviceManager->get('CountryTable');
                $cityTable = $serviceManager->get('CityTable');

                return new WorldService($countryTable, $cityTable);
            }
          ],
          'abstract_factories' => [
                TableGatewayAbstractFactory::class,
          ],
        ];
    }

    public function getAutoloaderConfig()
    {
        return array(
          'Zend\Loader\StandardAutoloader' => array(
            'namespaces' => array(
              __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
            ),
          ),
        );
    }
}
