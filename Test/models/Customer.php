<?php

namespace app\models;

use Yii;
use yii\mongodb\Query;
use yii\mongodb\ActiveRecord;

class Customer extends ActiveRecord
{
    public $id;
    public $name;
    public $password;
    public $confirm;
    public $authKey;
    public $accessToken;
    public $phone;
    public $email;
    public $create_on;

    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'password'], 'required'],
            ['email', 'email'],
            ['phone', 'number'],
            ['confirm', 'compare', 'compareAttribute'=>'password', 'message'=>'Please input again.'],
        ];
    }

    public static function collectionName()
    {
        return 'customer';
    }

    public function attributes()
    {
        return ['_id', 'name', 'email', 'phone', 'create_on'];
    }
       
    public function submit() 
    {
        $collection = Yii::$app->mongodb->getCollection('customer');
            $collection->insert(['name' => 'John Smith1', 'status' => 1]);
        /*if ($this->validate())
        {

            $collection = Yii::$app->mongodb->getCollection('customer');
            $collection->insert(['name' => 'John Smith1', 'status' => 1]);
            
            $customer = [
                'name' => $name,
                'password' => $password,
                'phone' => $phone,
                'email' => $email,
                'create_on' => 'n/',
            ];

            DBManagement::addCustomer($customer);
            
        }*/
    }

}