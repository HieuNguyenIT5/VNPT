<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$baseUrl = str_replace('/backend/web','',Yii::$app->UrlManager->baseUrl);
$this->title = "Quản lý hình ảnh";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <iframe src="<?=$baseUrl?>/file/dialog.php" style="width:100%; height:500px" frameborder="0"></iframe>
        </div>
    </div>
</div>