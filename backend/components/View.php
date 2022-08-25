<?php

namespace backend\components;

use Yii;
use backend\models\Cart;
use backend\models\Products;
class View extends \yii\web\View
{

    public $subTitle;

    function getProductByid($id){
        return Products::find()->where("id = $id")->one();
    }
    public function getCart()
    {
        $id_user = Yii::$app->user->identity->id;
        return Cart::find()->where("id_user = {$id_user}")->All();
    }
    function currency_format($number)
    {
        return number_format($number, 0, '', '.') . 'đ';
    }
    function getPrice($item){
        return isset($item['promotional_price'])? $item['promotional_price'] : $item['price'];
    }
    function getPriceById($id){
        $item = Products::find()->where("id = $id")->one();
        return $this-> getPrice($item);
    }
    function getNumberOfProductsInCart(){
        $id_user = Yii::$app->user->identity->id;
        $result = Cart::find()->where("id_user = {$id_user}")->all();
        return count($result);
    }

    function getTotalCart(){
        $id_user = Yii::$app->user->identity->id;
        $cart = $this->getCart($id_user);
        $total = 0;
        foreach($cart as $item){
            $total += $item['quantity'] * $this->getPriceById($item['id_product']);
        }
        return $total;
    }
}
