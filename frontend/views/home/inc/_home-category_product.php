<?php
    use backend\models\Category;
    $data = Category::find()->where(['parent'=>0])->all();
?>
<div class="section box-shadow" id="category-product-wp">
    <div class="section-head">
        <h3 class="section-title">Danh mục sản phẩm</h3>
    </div>
    <div class="secion-detail">
        <ul class="list-item">
            <?php
                foreach($data as $index=>$item){
                   echo "
                   <li>
                        <a href='product/{$item['slug']}' title=''>{$item['name']}</a>
                    </li>
                   "; 
                }
            ?>
        </ul>
    </div>
</div>