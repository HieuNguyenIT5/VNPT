<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="brand-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'describe:html',
            [
                'attribute' => 'status',
                'format'=> 'html',
                'value'=> function($model){
                    if($model->status == 1)
                        return "<span class='badge badge-success'>Hoạt động</span>";
                    else 
                        return "<span class='badge badge-danger'>Không hoạt động</span>";
                },
            ],
            [
                'attribute'=> 'created_at',
                'format'=> 'html',
                'value'=> function($model){
                    return date('d-m-Y', $model->created_at);
                }
            ],
            [
                'attribute'=> 'updated_at',
                'format'=> 'html',
                'value'=> function($model){
                    return date('d-m-Y', $model->updated_at);
                }
            ],
        ],
    ]) ?>

</div>
