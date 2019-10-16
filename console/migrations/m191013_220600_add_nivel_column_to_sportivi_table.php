<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author Marian
 */
class m191013_220600_add_stare_sanatate_column_to_sportivi_table extends \yii\db\Migration {

    public function up() {
        $this->createIndex(
                'idx-sanatate-sportivi', 'sportivi', 'stare_sanatate'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-sanatate-sportivi', 'sportivi', 'stare_sanatate', 'stari_sanatate', 'id', 'CASCADE'
        );
    }

    public function down() {
        $this->dropForeignKey('fk-sanatate-sportivi', 'sportivi');
        $this->dropIndex('sportivi','idx-sanatate-sportivi');
        $this->dropColumn('sportivi', 'stare_sanatate');
    }

}