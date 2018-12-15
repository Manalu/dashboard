<?php

namespace App\Controllers;

use Base\Controller;
use App\Models\Customer as CustomerModel;
use App\Models\Page;
use Base\View;

/**
 * Class App\Controllers\Customer
 */
class Customer extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function action(array $request)
    {

        $this->checkAction($request['action'], $this);
        $this->{$request['action']}($request['params']);

    }

    /**
     * Render customer page
     *
     * @throws \Exception
     */
    public function index()
    {
        $className = $this->getClassName($this);

        // TODO: This should be placed in Superclass
        $model = new Page;
        $data = $model->getMetaData($className);

        View::render('customer', ['data' => $data]);
    }

    /**
     * Make JSON Response for the table
     */
    public function data()
    {
        $model = new CustomerModel;
        $data = $model->getAll();
        header('Content-Type: application/json');
        echo json_encode($data);

    }
}
