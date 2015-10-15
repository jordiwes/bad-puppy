<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\IndexController;
use Application\Service\WorldService;
use Zend\Db\Adapter\Adapter;
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

    public function getControllerConfig()
    {
        return [
          'factories' => [
            '\Application\Controller\Index' => function (
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
                $adapter = $serviceManager->get(Adapter::class);
                return new WorldService($adapter);
            }
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
