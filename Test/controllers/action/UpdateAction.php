<?php

namespace app\controllers\action;

use yii;
use yii\base\Action;
use app\models\LoginForm;
use app\models\Customer;
use app\models\DBM\DBManagement;
use DateTime;

class UpdateAction extends Action {
    public $updateId;

    public function run() {      
        $tmpModel = DBManagement::searchCustomer($this->updateId);
        //var_dump($model);
        if ($tmpModel['name'] === '') {
            var_dump($this->updateId);
        } 
        else 
        {
            $model = new Customer; 
            $model->name = $tmpModel['name'];
            $model->password = $tmpModel['password'];
            $model->confirm = $tmpModel['password'];
            $model->phone = $tmpModel['phone'];
            $model->email = $tmpModel['email'];
            return $this->controller->render('add', [
                'model' => $model,
            ]);
        }
    }
}