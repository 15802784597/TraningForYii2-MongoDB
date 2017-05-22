<?php

namespace app\controllers\action;

use yii;
use yii\base\Action;
use app\models\LoginForm;
use app\models\Customer;
use app\models\DBM\DBManagement;
use DateTime;

class AddAction extends Action {
    public $request;

    public function run() {
        if ($this->request->getIsPost())
        {
            $model = new Customer();
            $model->load(Yii::$app->request->post());
            //$model->id = DBManagement::getMaxId() + 1;
            //$dt = new \DateTime();
            $dt = date('Y-m-d H:i:s', time());
            $model->create_on = $dt;
            DBManagement::AddCustomer($model);
        }

        $model = new Customer();
        return $this->controller->render('add', [
            'model' => $model,
        ]);
    }
}