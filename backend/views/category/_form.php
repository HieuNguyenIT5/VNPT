<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php 
    $cat = new Category();
    $cats = $cat->getParent();
    array_unshift($cats, "Danh mục gốc");
    ?>
    <?=$form->field($model, 'parent')->dropDownList(
        $cats
    ) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            1=>'Kích hoạt',
            0=> 'Chưa kích hoạt'
        ],
        [
            'prompt'=>'Chọn trạng thái'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
