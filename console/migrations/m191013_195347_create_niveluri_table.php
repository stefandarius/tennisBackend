<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%niveluri}}`.
 */
class m191013_195347_create_niveluri_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%niveluri}}', [
            'id' => $this->primaryKey(),
            'nume' => $this->string(100),
        ],'ENGINE InnoDB');
        $this->insert('{{%niveluri}}', ['id'=>1,'nume'=>'Incepator']);
        $this->insert('{{%niveluri}}', ['id'=>2,'nume'=>'Intermediar']);
        $this->insert('{{%niveluri}}', ['id'=>3,'nume'=>'Avansat']);
        $this->insert('{{%niveluri}}', ['id'=>4,'nume'=>'Profesionist']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%niveluri}}');
        $this->dropTable('{{%niveluri}}');
    }
}
