<?php

use yii\db\Migration;

class m180607_053119_create_table_map_layer_version extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%map_layer_version}}', [
            'id' => $this->primaryKey(),
            'version_information' => $this->string(),
            'filename' => $this->string(),
            'sort_order' => $this->integer(),
            'map_layer_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'tablename' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey('map_layer_version_map_layer_id_fk', '{{%map_layer_version}}', 'map_layer_id', '{{%map_layer}}', 'id', 'NO ACTION', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%map_layer_version}}');
    }
}
