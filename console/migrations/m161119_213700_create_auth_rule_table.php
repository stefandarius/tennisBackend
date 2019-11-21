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
class m161119_213700_create_auth_rule_table extends yii\db\Migration {

    //put your code here

    public function safeUp() {
        $this->createTable('{{%auth_rule}}', [
            'name' => $this->string(64)->notNull(),
            'data' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'PRIMARY KEY (name)'
                ], 'ENGINE InnoDB');
    }

    public function safeDown() {
        $this->dropTable('auth_rule');
    }

}
