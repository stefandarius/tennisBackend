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
class m191006_143100_add_localitate_column_to_sportivi_table extends \yii\db\Migration {

    public function up() {
        $this->addColumn('sportivi', 'localitate', $this->integer());
        $this->createIndex(
                'idx-localitate-sportivi', 'sportivi', 'localitate'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-localitate-sportivi', 'sportivi', 'localitate', 'localitati', 'id', 'CASCADE'
        );
    }

    public function down() {
        $this->dropForeignKey('fk-localitate-sportivi', 'sportivi');
        $this->dropColumn('sportivi', 'localitate');
    }

}
