<?php

use yii\db\Migration;

class m180607_053119_create_table_map_layer extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%map_layer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'information' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('map_layer__name_idx', '{{%map_layer}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%map_layer}}');
    }
}
