<?php

namespace app\modules\test\controllers;

class TestController extends \yii\web\Controller
{
    public function actionHello()
    {
        return ['oi'];
    }
}