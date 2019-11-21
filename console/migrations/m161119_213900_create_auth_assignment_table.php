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
class m161119_213900_create_auth_assignment_table extends yii\db\Migration {

    //put your code here

    public function safeUp() {
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id'=> $this->string(64)->notNull(),
            'created_at' => $this->integer(),
            'PRIMARY KEY (item_name,user_id)'
                ], 'ENGINE InnoDB');
        $this->insert('{{%auth_assignment}}', ['item_name'=>'admin','user_id'=>1]);
        $this->addForeignKey(
                'fk-item-name-auth_assignment', 'auth_assignment', 'item_name', 'auth_item', 'name', 'CASCADE'
        );
    }

    public function safeDown() {
        $this->dropForeignKey('fk-item-name-auth_assignment', 'auth_assignment');
        $this->dropTable('auth_assignment');
    }

}
