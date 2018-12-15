<?php

namespace App\Controllers;

use Base\Controller;
use App\Models\Revenue as RevenueModel;
use App\Models\Page;
use Base\View;

/**
 * Class App\Controllers\Revenue
 */
class Revenue extends Controller
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
     * Render revenue page
     *
     * @throws \Exception
     */
    public function index()
    {
        $className = $this->getClassName($this);

        // TODO: This should be placed in Superclass
        $model = new Page;
        $data = $model->getMetaData($className);

        View::render('revenue', ['data' => $data]);
    }

    /**
     * Make JSON Response for the table
     *
     * @param $params
     */
    public function data($params)
    {
        $model = new RevenueModel;
        $data = $model->getAll($params);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * Make JSON Response for the chart
     *
     * @param $params
     */
    public function chart($params)
    {
        $model = new RevenueModel;
        $data = $model->getChartData($params);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
