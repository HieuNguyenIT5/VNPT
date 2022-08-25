<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'describe')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            1=> 'Đang hoạt động',
            2=> 'Không hoạt động'
        ],
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Thêm', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
