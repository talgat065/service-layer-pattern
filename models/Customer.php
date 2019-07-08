<?php

namespace app\models;

use yii\base\Model;

class Customer extends Model
{
    public $fio;
    public $job_id;
    public $cost;
    public $date;


    public function getOrders()
    {
        return $this->hasMany(Order::className, ['id' => 'customer_id']);
    }
}