<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%niveluri}}`.
 */
class m211113_192647_create_profil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profil}}', [
            'id' => $this->primaryKey(),
            'nume' => $this->string(100),
            'prenume' => $this->string(100),
            'gen' => $this->tinyInteger(2),
            'numar_telefon' => $this->string(20),
            'localitate' => $this->integer(),
            'data_nastere' => $this->date()
        ],'ENGINE InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%profil}}');
        $this->dropTable('{{%profil}}');
    }
}
