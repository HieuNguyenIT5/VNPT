<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int $parent
 * @property string $slug
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    private $_cats;
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'created_at', 'updated_at'], 'required'],
            [['parent', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên danh mục',
            'parent' => 'Danh mục cha',
            'slug' => 'Đường dẫn tĩnh',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }
    public function getParent($parent = 0, $level = ""){
        $data = Category::find()->where(['parent'=>$parent])->all();
        if($data):
            foreach($data as $item):
                if($item->parent == 0)
                    $level = "";
                $this->_cats[$item->id] = $level.$item->name;
                $this->getParent($item->id,$level."-- ");
            endforeach;
        endif;
        return $this->_cats;
    }
    public function getCategory($id_cat){
        $data = Category::find()->where(['id'=>$id_cat])->one();
        return $data->name;
    }
}
