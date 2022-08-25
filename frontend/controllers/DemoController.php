<?php
namespace frontend\controllers;

use yii\base\Controller;
use yii\rest\IndexAction;

class DemoController extends Controller{
    
    public function actionIndex(){
       return $this->render('index');
    }
}   