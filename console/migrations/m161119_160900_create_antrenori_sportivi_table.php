<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class m161119_160900_create_antrenori_sportivi_table extends yii\db\Migration {

    public function safeUp() {
        $this->createTable('{{%antrenori_sportivi}}', [
            'id' => $this->primaryKey(),
            'antrenor' => $this->integer(),
            'sportiv' => $this->integer(),
                ], 'ENGINE InnoDB');

        $this->createIndex(
                'idx-sportiv-antrenoriSportivi', 'antrenori_sportivi', 'sportiv'
        );
        $this->createIndex(
                'idx-antrenor-antrenoriSportivi', 'antrenori_sportivi', 'antrenor'
        );
        $this->addForeignKey(
                'fk-sportivi-antrenoriSportivi', 'antrenori_sportivi', 'sportiv', 'sportivi', 'id', 'CASCADE'
        );
        $this->createIndex('idxu-antrenor-sportiv-antrenori_sportivi', 'antrenori_sportivi', ['antrenor', 'sportiv'], true);


        $this->addForeignKey(
                'fk-antrenor-antrenoriSportivi', 'antrenori_sportivi', 'antrenor', 'antrenori', 'id', 'CASCADE'
        );
    }

    public function safeDown() {

        $this->dropForeignKey('fk-sportivi-antrenoriSportivi', 'antrenori_sportivi');
        $this->dropForeignKey('fk-antrenor-antrenoriSportivi', 'antrenori_sportivi');
        $this->dropIndex('idxu-antrenor-sportiv-antrenori_sportivi', 'antrenori_sportivi');
        $this->dropIndex('idx-antrenor-antrenoriSportivi', 'antrenori_sportivi');
        $this->dropIndex('idx-sportiv-antrenoriSportivi', 'antrenori_sportivi');
        $this->delete('antrenori_sportivi');
        $this->dropTable('antrenori_sportivi');
    }

}
