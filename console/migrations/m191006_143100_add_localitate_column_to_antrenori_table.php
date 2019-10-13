<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m170316_181600_add_active_to_chat_rooms_table
 *
 * @author Vlad
 */
class m191006_143100_add_localitate_column_to_antrenori_table extends \yii\db\Migration {

    public function up() {
        $this->addColumn('antrenori', 'localitate', $this->integer());
        $this->createIndex(
                'idx-localitate-antrenori', 'antrenori', 'localitate'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-localitate-antrenori', 'antrenori', 'localitate', 'localitati', 'id', 'CASCADE'
        );
    }

    public function down() {
        $this->dropForeignKey('fk-localitate-antrenori', 'antrenori');
        $this->dropColumn('antrenori', 'localitate');
    }

}
