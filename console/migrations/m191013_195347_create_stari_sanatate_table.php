<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%niveluri}}`.
 */
class m191013_195347_create_stari_sanatate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stari_sanatate}}', [
            'id' => $this->primaryKey(),
            'nume' => $this->string(100),
        ],'ENGINE InnoDB');
        $this->insert('{{%stari_sanatate}}', ['id'=>1,'nume'=>'Sanatos']);
        $this->insert('{{%stari_sanatate}}', ['id'=>2,'nume'=>'Bolnav']);
        $this->insert('{{%stari_sanatate}}', ['id'=>3,'nume'=>'Accidentat']);
        $this->insert('{{%stari_sanatate}}', ['id'=>4,'nume'=>'Indisponibil']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%stari_sanatate}}');
        $this->dropTable('{{%stari_sanatate}}');
    }
}
