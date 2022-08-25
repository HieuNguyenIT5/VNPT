<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'image',
                'content'=> function($model){
                    return "<span><img src='../../uploads/{$model->image}' class='image' height='50px'></span>";
                },
                'headerOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ],
                    'contentOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ]
            ],
            'name',
            [
                'attribute'=> 'quantity',
                'headerOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ],
                    'contentOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ]
            ],
            [
                'attribute'=> 'price',
                'headerOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ],
                    'contentOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ]
            ],
            [
                'attribute'=> 'promotional_price',
                'headerOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ],
                    'contentOptions'=>[
                    'style'=>'width:100px; text-align:center'
                ]
            ],
            //'describe:ntext',
            //'detail_des:ntext',
            
            //'id_category',
            //'id_brand',
            //'status',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'header'=> "Hành động",
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'buttons'=>[
                    'view'=> function($url, $model){
                        return html::a('View', $url, ['class'=>'btn btn-sm btn-primary']);
                    },
                    'update'=> function($url, $model){
                        return html::a('Edit', $url, ['class'=>'btn btn-sm btn-success']);
                    },
                    'delete'=> function($url, $model){
                        return html::a('Delete', $url, 
                        [
                            'class'=>'btn btn-sm btn-danger',
                            'data-confirm'=>'Bạn có chắc muốn xóa danh mục '.$model->name.' không?',
                            'data-method'=>'post'
                        ]);
                    },
                ],
                'headerOptions'=>[
                    'style'=>'width:15px; text-align:center'
                ],
                    'contentOptions'=>[
                    'style'=>'width:15px; text-align:center'
                ]
            ],
        ],
    ]); ?>


</div>
