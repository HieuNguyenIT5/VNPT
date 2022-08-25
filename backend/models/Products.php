<?php

namespace backend\models;

use backend\models\Brand;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property int $quantity
 * @property int $price
 * @property int $promotional_price
 * @property string|null $describe
 * @property string $detail_des
 * @property string $thumb
 * @property int $id_category
 * @property int $id_brand
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Brand $brand
 * @property Category $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'quantity', 'price', 'promotional_price', 'detail_des', 'image', 'id_category', 'id_brand', 'created_at', 'updated_at'], 'required'],
            [['quantity', 'price', 'promotional_price', 'id_category', 'id_brand', 'status', 'created_at', 'updated_at'], 'integer'],
            [['describe', 'detail_des'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['id_brand'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['id_brand' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['file'], 'file','extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên sản phẩm',
            'quantity' => 'Số lượng còn',
            'price' => 'Giá gốc',
            'promotional_price' => 'Giá khuyến mãi',
            'describe' => 'Mô tả ngắn',
            'detail_des' => 'Mô tả chi tiết',
            'image' => 'Hình ảnh',
            'id_category' => 'Danh mục sản phẩm',
            'id_brand' => 'Thương hiệu',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
            'file' => 'Hình ảnh',
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'id_brand']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }
}
