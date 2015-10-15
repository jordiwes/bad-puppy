<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{

    /**
     * @var Adapter
     */
    private $adapter;

    /**
     * IndexController constructor.
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function indexAction()
    {
        $tableGateway = new TableGateway('Country', $this->adapter);
        $countries = $tableGateway->select()->toArray();
        return new ViewModel(['countries' => $countries]);
    }

    public function countryAction()
    {
        $tableGateway = new TableGateway('Country', $this->adapter);

        $code = $this->params()->fromRoute('code');

        $country = $tableGateway->select(['Code' => $code])->toArray();
        if (count($country) < 1) {
            throw new \Exception('No Country Found for code ' . $code);
        }

        $cityTableGateway = new TableGateway('City', $this->adapter);
        $cities = $cityTableGateway->select(['CountryCode' => $code])->toArray();

        return new ViewModel(
            [
                'country' => $country[0],
                'cities' => $cities,
            ]
        );

    }

    public function cityAction()
    {

        $id = $this->params()->fromRoute('id');

        $cityTableGateway = new TableGateway('City', $this->adapter);
        $city = $cityTableGateway->select(['ID' => $id])->toArray();

        $tableGateway = new TableGateway('Country', $this->adapter);

        if (count($city) < 0) {
            throw new \Exception('No City found with ID ' . $id);
        }

        $city = $city[0];

        $country = $tableGateway->select(['Code' => $city['CountryCode']])->toArray();
        $country = $country[0];

        return new ViewModel(
            [
                'city' => $city,
                'country' => $country,
            ]
        );
    }
}