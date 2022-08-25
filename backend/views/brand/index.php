<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Brand;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hãng sản xuất';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm hãng mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'Mã hãng',
                'headerOptions' => [
                    'style' => 'width:15px; text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:15px; text-align:center'
                ]
            ],
            [
                'attribute' => 'name',
                'headerOptions' => [
                    'style' => 'width:15px; text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:15px; text-align:center'
                ]
            ],
            [
                'attribute' => 'describe',
                'headerOptions' => [
                    'style' => 'width:300px; text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:300px; text-align:justify'
                ]
            ],
            [
                'attribute' => 'status',
                'content'=> function($model){
                    if($model->status == 1)
                        return "<span class='badge badge-success'>Hoạt động</span>";
                    else 
                        return "<span class='badge badge-danger'>Không hoạt động</span>";
                },
                'headerOptions' => [
                    'style' => 'width:15px; text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:15px; text-align:center'
                ]
            ],
            [
                'attribute'=> 'created_at',
                'content'=> function($model){
                    return date('d-m-Y', $model->created_at);
                },
                'headerOptions' => [
                    'style' => 'width:15px; text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:15px; text-align:center'
                ]
            ],
            [
                'attribute'=> 'updated_at',
                'content'=> function($model){
                    return date('d-m-Y', $model->updated_at);
                },
                'headerOptions' => [
                    'style' => 'width:15px; text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:15px; text-align:center'
                ]
            ],
            [
                'class' => ActionColumn::className(),
                'header'=> "Hành động",
                'urlCreator' => function ($action, Brand $model, $key, $index, $column) {
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