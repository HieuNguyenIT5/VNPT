<?php

use yii\db\Migration;

/**
 * Class m220825_014247_order
 */
class m220825_014247_order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_product' => $this->integer()->notNull(),
            'phone' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'create_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}
