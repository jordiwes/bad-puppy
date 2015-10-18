<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Service\WorldService;
use Zend\Db\Adapter\Adapter;
use Zend\Filter\StaticFilter;
use Zend\Filter\ToInt;
use Zend\I18n\Filter\Alpha;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{

    /**
     * @var WorldService
     */
    private $worldService;

    /**
     * IndexController constructor.
     * @param Adapter $worldService
     */
    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }

    public function indexAction()
    {
        $countries = $this->worldService->getAllCountries();
        return new ViewModel(['countries' => $countries]);
    }

    public function countryAction()
    {
        $code = StaticFilter::execute($this->params()->fromRoute('code'), Alpha::class);
        $country = $this->worldService->getCountryByCode($code);

        if (!$country) {
            throw new \Exception('No Country Found for code ' . $code);
        }

        $cities = $this->worldService->getCitiesByCountryCode($code);
        return new ViewModel(
          [
            'country' => $country,
            'cities' => $cities,
          ]
        );

    }

    public function cityAction()
    {
        $id = StaticFilter::execute($this->params()->fromRoute('id'), ToInt::class);
        $city = $this->worldService->getCityById($id);

        if (!$city) {
            throw new \Exception('No City found with ID ' . $id);
        }

        $country = $this->worldService->getCountryByCode($city->getCountryCode());

        return new ViewModel(
          [
            'city' => $city,
            'country' => $country,
          ]
        );
    }
}