<?php
use backend\models\Cart;
$id_user = Yii::$app->user->identity->id;
if(isset($_GET['id'])){
    $itemCart = Cart::find()->where("id = {$_GET['id']}")->one();
    if($itemCart){
        $itemCart->delete();
        Yii::$app->getResponse()->redirect("../");
    }  
}else{
    $cart = Cart::find()->where("id_user = {$id_user}")->all();
    foreach($cart as $item){
        $item->delete();
        Yii::$app->getResponse()->redirect("/VNPT/YiiDemo/cart");
    }
}
?>