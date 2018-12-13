<?php

namespace App\Controllers;

use Base\Controller;
use App\Models\Order as OrderModel;
use App\Models\Page;
use Base\View;

/**
 * Class App\Controllers\Order
 */
class Order extends Controller
{
    /**
     * @param array $request
     * @return mixed|void
     * @throws \Exception
     */
    public function action(array $request)
    {
        $this->checkAction($request['action'], $this);
        $this->{$request['action']}($request['params']);
    }

    /**
     * Render order page
     *
     * @throws \Exception
     */
    public function index()
    {
        $className = $this->getClassName($this);

        // TODO: This should be placed in Superclass
        $model = new Page;
        $data = $model->getMetaData($className);
        
        View::render('order', ['data' => $data]);
    }

    /**
     * Make JSON Response for the table
     *
     * @param $params
     */
    public function data($params)
    {
        $model = new OrderModel;
        $data = $model->getAll($params);
        header('Content-Type: application/json');
        echo json_encode($data);
        
    }
}
