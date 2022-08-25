<?php

use backend\models\Cart;
use GuzzleHttp\Psr7\Header;

$id_product = $_GET['id'];
$num = $_GET['num'];
$id_user = Yii::$app->user->identity->id;

if (empty(Cart::find()->where("id_user = $id_user and id_product = $id_product")->one())) {
    $model = new Cart;
    $model->id_user = $id_user;
    $model->id_product = $id_product;
    $model->quantity = $num;
    $model->updated_at = time();
} else {
    $model = Cart::find()->where("id_user = $id_user and id_product = $id_product")->one();
    $model->quantity = $model->quantity + $num;
    $model->updated_at = time();
}
if($model->save()){
    Yii::$app->getResponse()->redirect("../");
}
