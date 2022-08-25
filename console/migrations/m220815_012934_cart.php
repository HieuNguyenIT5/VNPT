<?php

use yii\db\Migration;

/**
 * Class m220815_012934_cart
 */
class m220815_012934_cart extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_product' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%cart}}');
    }
}
