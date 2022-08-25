<?php

namespace backend\models;

use Yii;
use backend\models\Products;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $name
 * @property string|null $describe
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Products[] $products
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    private $_brand;

    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['describe'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên hãng',
            'describe' => 'Mô tả',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id_brand' => 'id']);
    }
    public function getBrand(){
        $data = Brand::find()->all();
        if($data):
            foreach($data as $item):
                $this->_brand[$item->id] = $item->name;
            endforeach;
        endif;
        return $this->_brand;
    }
    public function getBrandById($id_brand){
        $data = Brand::find()->where(['id'=>$id_brand])->one();
        return $data->name;
    }
}
