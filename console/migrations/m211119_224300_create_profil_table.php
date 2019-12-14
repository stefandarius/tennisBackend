<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class m211119_224300_create_profil_table extends yii\db\Migration {

    public function safeUp() {
        $this->createTable('{{%profil}}', [
            'id' => $this->primaryKey(),
            'nume' => $this->string(100),
            'prenume' => $this->string(100),
            'gen'=> $this->boolean()->defaultValue(true),
            'data_nastere'=> $this->date(),
            'telefon'=> $this->string(15),
            'localitate'=> $this->integer()->notNull(),
            'adresa'=> $this->string(150),
            'user'=> $this->integer()->notNull(),
            
                ], 'ENGINE InnoDB');

        $this->createIndex(
                'idx-user-profil', 'profil', 'user'
        );
        
        
        $this->createIndex(
                'idx-localitate-profil', 'profil', 'localitate'
        );
        
        $this->addForeignKey(
                'fk-user-profil', 'profil', 'user', 'user', 'id', 'CASCADE'
        );
        
        $this->addForeignKey(
                'fk-localitate-profil', 'profil', 'localitate', 'localitati', 'id', 'CASCADE'
        );
        
    }

    public function safeDown() {
        $this->dropForeignKey('fk-user-profil', 'profil');
        $this->dropForeignKey('fk-localitate-profil', 'profil');
        $this->dropIndex('idx-user-profil', 'profil');
        $this->dropIndex('idx-localitate-profil', 'profil');
        $this->dropTable('profil');
    }

}
