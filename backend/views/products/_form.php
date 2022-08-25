<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;
use backend\models\Brand;
/* @var $this yii\web\View */
/* @var $model backend\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'promotional_price')->textInput() ?>

    <?= $form->field($model, 'describe')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detail_des')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?php 
    $cat = new Category();
    ?>
    <?=$form->field($model, 'id_category')->dropDownList(
        $cat->getParent(),
        [
            'prompt'=> 'Danh mục gốc'
        ],
    ) ?>
    <?php 
    $brand = new Brand();
    ?>
    <?=$form->field($model, 'id_brand')->dropDownList(
        $brand->getBrand(),
        [
            'prompt'=> '-- Chọn thương hiệu--'
        ],
    ) ?>
    <?= $form->field($model, 'status')->dropDownList(
        [
            1=>'Hiện thị',
            0=> 'Ẩn'
        ],
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
