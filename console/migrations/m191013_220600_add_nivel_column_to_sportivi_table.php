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
class m191013_220600_add_nivel_column_to_sportivi_table extends \yii\db\Migration {

    public function up() {
        $this->createIndex(
                'idx-nivel-sportivi', 'sportivi', 'nivel'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
                'fk-nivel-sportivi', 'sportivi', 'nivel', 'niveluri', 'id', 'CASCADE'
        );
    }

    public function down() {
        $this->dropForeignKey('fk-nivel-sportivi', 'sportivi');
        $this->dropIndex('sportivi','idx-nivel-sportivi');
        $this->dropColumn('sportivi', 'nivel');
    }

}