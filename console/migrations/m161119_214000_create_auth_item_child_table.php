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
class m161119_214000_create_auth_item_child_table extends yii\db\Migration {

    //put your code here

    public function safeUp() {
        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string(64)->notNull(),
            'child'=> $this->string(64)->notNull(),
            'PRIMARY KEY (parent,child)'
                ], 'ENGINE InnoDB');
          $this->addForeignKey(
                'fk-parent-auth_item_child', 'auth_item_child', 'parent', 'auth_item', 'name', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-child-auth_item_child', 'auth_item_child', 'child', 'auth_item', 'name', 'CASCADE'
        );
    }

    public function safeDown() {
        $this->dropForeignKey('fk-parent-auth_item_child', 'auth_item_child');
        $this->dropForeignKey('fk-child-auth_item_child', 'auth_item_child');
        $this->dropTable('auth_item_child');
    }

}
