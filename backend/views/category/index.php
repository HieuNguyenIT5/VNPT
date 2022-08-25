<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Category;

use function PHPSTORM_META\map;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
        <p class='text-right'>
            <?= Html::a('Thêm danh mục mới', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn',
            // 'header'=>'STT',
            // 'headerOptions'=>[
            //     'style'=>'width:15px; text-align:center'
            // ],
            // 'contentOptions'=>[
            //     'style'=>'width:15px; text-align:center'
            // ]
            // ],
            ['class'=> 'yii\grid\CheckBoxColumn'],
            [
                'attribute'=> 'id',
                'label'=>'ID',
                'headerOptions'=>[
                'style'=>'width:15px; text-align:center'
            ],
                'contentOptions'=>[
                'style'=>'width:15px; text-align:center'
            ]
            ],
            'name',
            [
                'attribute'=> 'parent',
                'content'=> function($model){
                    if($model->parent == 0)
                        return "Root";
                    else{
                        $parent = Category::find()->where(['id'=> $model->parent])->one();
                        if($parent){
                            return $parent->name;
                        }else
                        return "Không rõ";
                    }
                },
                'headerOptions'=>[
                'style'=>'width:15px; text-align:center'
            ],
                'contentOptions'=>[
                'style'=>'width:15px; text-align:center'
            ]
            ],
            'slug',
            [
                'attribute'=> 'status',
                'content'=> function($model){
                    if($model->status == 1)
                        return "<span class= 'badge badge-success'>Đã kích hoạt</span>";
                    else return '<span class="badge badge-danger">Chưa kích hoạt</span>';
                },
                'headerOptions'=>[
                'style'=>'width:15px; text-align:center'
            ],
                'contentOptions'=>[
                'style'=>'width:15px; text-align:center'
            ]
            ],
            //'created_at',
            [
                'attribute'=> 'created_at',
                'content'=> function($model){
                    return date('d-m-Y',  $model->created_at);
                },
                'headerOptions'=>[
                    'style'=>'width:130px; text-align:center',
                ],
                'contentOptions'=>[
                    'style'=> 'text-align:center',
                ]
                ],
            //'updated_at',
            [
                'attribute'=> 'updated_at',
                'content'=> function($model){
                    return date('d-m-Y',  $model->created_at);
                },
                'headerOptions'=>[
                    'style'=>'width:130px; text-align:center',
                ],
                'contentOptions'=>[
                    'style'=> 'text-align:center',
                ]
                ],

            [
                'class' => ActionColumn::className(),
                'header'=> "Hành động",
                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
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
    </div>
</div>
