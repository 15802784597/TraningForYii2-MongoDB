<?php

namespace app\models\DBM;


use Yii;
use yii\mongodb\Query;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DBManagement 
{
    static function baseInsert($table = 'test', $param) 
    {
        $collection = Yii::$app->mongodb->getCollection($table);
        return $collection->insert($param);
    }

    static function baseSearch($table = 'test', $param, $pageSize = 10)
    {
        $query = new Query();
        if ($param === '') 
            $query->from($table);
        else 
            $query->from($table)->where($param);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ]
        ]);

        return $provider;
    }

    static function baseRemove($table = 'test', $param)
    {
        $collection = Yii::$app->mongodb->getCollection($table);
        return $collection->remove($param);
    }

    public static function deleteByName($name) 
    {
        return DBManagement::baseRemove('test', ['name' => $name]);
    }

    public static function getMaxId()
    {
        $provider = DBManagement::showAllCustomers();
        $count = $provider->getTotalCount();
    }

    public static function addCustomer($customer) 
    {
        return DBManagement::baseInsert('test', $customer);
    }

    public static function showAllCustomers() 
    {
        return DBManagement::baseSearch('test', '');
    }

    public static function searchCustomer($name)
    {
        $provider = DBManagement::baseSearch('test', ['name' => $name]);
        $models = $provider->getModels();
        //var_dump($models);
        return $models[0];
    }
}