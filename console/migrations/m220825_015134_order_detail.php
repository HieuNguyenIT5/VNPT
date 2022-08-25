<?php

use yii\db\Migration;

/**
 * Class m220825_015134_order_detail
 */
class m220825_015134_order_detail extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order_detail}}', [
            'id' => $this->primaryKey(),
            'id_order' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%order_detail}}');
    }
}
