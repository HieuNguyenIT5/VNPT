<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        //Them permission
        // $createPost = $auth->createPermission('create-post');

        // $indexPost = $auth->createPermission('index-post');
        // $indexPost->description = 'Xem danh sách bài viết';
        // $auth->add($indexPost);

        // $updatePost = $auth->createPermission('update-post');
        // $updatePost->description = 'update bài viết';
        // $auth->add($updatePost);

        // $viewPost = $auth->createPermission('view-post');
        // $viewPost->description = 'Xem chi tiết bài viết';
        // $auth->add($viewPost);

        // $deletePost = $auth->createPermission('delete-post');
        // $deletePost->description = 'Xóa bài viết';
        // $auth->add($deletePost);

        // $postManager = $auth->createRole('manager-post');
        // $auth->add($postManager);

        // $auth->addChild($postManager, $indexPost);
        // $auth->addChild($postManager, $createPost);
        // $auth->addChild($postManager, $updatePost);
        // $auth->addChild($postManager, $viewPost);
        // $auth->addChild($postManager, $deletePost);



        // $indexProducts = $auth->createPermission('index-products');
        // $indexProducts->description = 'Xem danh sách sản phẩm';
        // $auth->add($indexProducts);

        // $productsManager = $auth->createRole('manager-products');
        $postManager = $auth->createRole('manager-post');
        // $auth->add($productsManager);
        $admin = $auth->createRole('admin');
        // $auth->add($admin);
        // $auth->addChild($productsManager, $indexProducts);
        // $auth->addChild($admin, $productsManager);
        // $auth->addChild($admin, $postManager);
        $auth->assign($postManager,12);
    }
}

?>