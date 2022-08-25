<?php

use yii\db\Migration;

/**
 * Class m220718_014824_products
 */
class m220718_020901_products extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'promotional_price' => $this->integer()->notNull(),
            'describe' => $this->text(),
            'detail_des' => $this->string()->notNull(),
            'id_category' => $this->integer()->notNull(),
            'id_brand' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%products}}');
    }
}