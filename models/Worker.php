<?php

namespace app\models;

class Worker extends yii\db\ActiveRecord
{
    public $id;
    public $fio;
    public $type;

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['worker_id' => 'id']);
    }
}