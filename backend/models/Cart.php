<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_product
 * @property int $quantity
 * @property int $status
 * @property int $updated_at
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_product', 'quantity', 'updated_at'], 'required'],
            [['id_user', 'id_product', 'quantity', 'status', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_product' => 'Id Product',
            'quantity' => 'Quantity',
            'status' => 'Status',
            'updated_at' => 'Updated At',
        ];
    }
}
