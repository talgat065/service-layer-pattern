<?php

namespace app\controllers;

use app\models\Order;
use Yii;
use Exception;

class OrderController extends yii\web\Controller
{
    public function actionCreate()
    {
        $customerId = Yii::$app->getRequest()->get('customer');

        $worker = \Worker::find()->where(['is_active' => 1])
            ->andWhere(['status' => 'free'])
            ->one();

        if ($worker !== null) {
            $order = new Order();
            $order->customer_id = $customerId;
            $order->worker_id = $worker->id;
            $order->save();
        }

        try {
            Yii::$app->mailer->compose()
                ->setFrom('admin@site.com')
                ->setTo('manager@site.com')
                ->setSubject('New order received.')
                ->send();
        } catch (Exception $e) {
            Yii::error(['Email not sent' => $e->getMessage()]);
        }

        $order->sendNewOrderEmail();




    }
}
