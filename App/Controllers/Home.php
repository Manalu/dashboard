<?php

namespace App\Controllers;

use Base\Controller;
use App\Models\Page;
use Base\View;

/**
 * Class App\Controllers\Customer
 */
class Home extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function action(array $params)
    {
        $this->index();
    }

    /**
     * Render home page
     *
     * @throws \Exception
     */
    private function index()
    {
        $className = $this->getClassName($this);

        // TODO: This should be placed in Superclass
        $model = new Page;
        $data = $model->getMetaData($className);

        View::render('home', ['data' => $data]);
    }
}
