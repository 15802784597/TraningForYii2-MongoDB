<?php

namespace app\controllers\action;

use yii;
use yii\base\Action;
use app\models\LoginForm;
use app\models\Customer;
use app\models\DBM\DBManagement;
use DateTime;

class DelAction extends Action {
    public $delId;

    public function run() {
        if (DBManagement::deleteByName($this->delId))
        {
            $provider = DBManagement::showAllCustomers();
            //$model = new Customer();

            return $this->controller->render('all', [
                //'model' => $model,
                'dataProvider' => $provider,
            ]);
        } 
        else 
        {
            var_dump($this->delId);
        }
    }
}