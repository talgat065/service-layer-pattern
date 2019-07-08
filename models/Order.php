<?php

namespace app\models;

use yii\base\Model;

class Order extends Model
{
    public $worker_id;
    public $job_id;
    public $cost;
    public $date;


    public function getWorker()
    {
        return $this->hasOne(Worker::className, ['id' => 'worker_id']);
    }
}