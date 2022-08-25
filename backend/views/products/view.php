<?php

use backend\models\Category;
use backend\models\Brand;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

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
            'quantity',
            [
                'attribute'=> 'price',
                'value'=> function($model){
                    return number_format($model->price, 0, '', '.').'đ';
                }
            ],
            [
                'attribute'=> 'promotional_price',
                'value'=> function($model){
                    return number_format($model->price, 0, '', '.').'đ';
                }
            ],
            'describe:html',
            [
                'attribute'=>'image',
                'format'=> 'html',
                'value'=> function($model){
                    return "<span><img src='../../uploads/{$model->image}' class='image' height='100px'></span>";
                }
            ],
            [
                'attribute'=> 'id_category',
                'value'=> function($model){
                    $cat = new Category();
                    return $cat->getCategory($model->id_category);
                }
            ],
            [
                'attribute'=> 'id_brand',
                'value'=> function($model){
                    $brand = new Brand();
                    return $brand->getBrandById($model->id_brand);
                }
            ],
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