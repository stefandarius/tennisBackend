<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m161119_213800_create_auth_rule_table
 *
 * @author Marian
 */
class m161119_213800_create_auth_item_table extends yii\db\Migration {

    //put your code here

    public function safeUp() {
        $this->createTable('{{%auth_item}}', [
            'name' => $this->string(64)->notNull(),
            'type'=> $this->integer()->notNull(),
            'description' => $this->text(),
            'rule_name'=> $this->string(64),
             'data' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'PRIMARY KEY (name)'
                ], 'ENGINE InnoDB');
         $this->insert('{{%auth_item}}', ['name'=>'admin','type'=>1,'description'=>'Administrator']);
         $this->insert('{{%auth_item}}', ['name'=>'antrenor','type'=>2,'description'=>'Antrenor']);
         $this->insert('{{%auth_item}}', ['name'=>'sportiv','type'=>3,'description'=>'Sportiv']);
        $this->addForeignKey(
                'fk-rule-name-auth_item', 'auth_item', 'rule_name', 'auth_rule', 'name', 'CASCADE'
        );
    }

    public function safeDown() {
        $this->dropForeignKey('fk-rule-name-auth_item', 'auth_item');
        $this->dropTable('auth_item');
    }

}
