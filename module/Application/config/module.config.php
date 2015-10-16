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
use Application\Controller\IndexControllerFactory;
use Application\Service\WorldService;
use Application\Service\WorldServiceFactory;
use Application\View\Helper\CountryAnchor;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;

return [
  'router' => [
    'routes' => [
      'home' => [
        'type' => Literal::class,
        'options' => [
          'route' => '/',
          'defaults' => [
            'controller' => IndexController::class,
            'action' => 'index',
          ],
        ],
      ],

      'country' => [
        'type' => Segment::class,
        'options' => [
          'route' => '/country/:code',
          'defaults' => [
            'controller' => IndexController::class,
            'action' => 'country',
          ],
        ],
      ],

      'city' => [
        'type' => Segment::class,
        'options' => [
          'route' => '/city/:id',
          'defaults' => [
            'controller' => IndexController::class,
            'action' => 'city',
          ],
        ],
      ],
    ],
  ],

  'service_manager' => [
    'abstract_factories' => [
      \Zend\Cache\Service\StorageCacheAbstractServiceFactory::class,
      \Zend\Log\LoggerAbstractServiceFactory::class,
      TableGatewayAbstractFactory::class,
    ],
    'factories' => [
      'translator' => \Zend\Mvc\Service\TranslatorServiceFactory::class,
      WorldService::class => WorldServiceFactory::class,
    ],
  ],

  'translator' => [
    'locale' => 'en_US',
    'translation_file_patterns' => [
      [
        'type' => 'gettext',
        'base_dir' => __DIR__ . '/../language',
        'pattern' => '%s.mo',
      ],
    ],
  ],

  'controllers' => [
    'factories' => [
      IndexController::class => IndexControllerFactory::class,
    ],
  ],

  'view_helpers' => [
    'invokables' => [
      'CountryAnchor' => CountryAnchor::class,
    ],
  ],

  'view_manager' => [
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => [
      'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
      'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
      'error/404' => __DIR__ . '/../view/error/404.phtml',
      'error/index' => __DIR__ . '/../view/error/index.phtml',
    ],
    'template_path_stack' => [
      __DIR__ . '/../view',
    ],
  ],
    // Placeholder for console routes
  'console' => [
    'router' => [
      'routes' => [
      ],
    ],
  ],
];
