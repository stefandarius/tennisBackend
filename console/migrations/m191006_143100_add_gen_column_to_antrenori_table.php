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
class m191006_143100_add_gen_column_to_antrenori_table extends \yii\db\Migration {

    public function up() {
        $this->addColumn('antrenori', 'gen', $this->tinyInteger(1));
    }

    public function down() {
        $this->dropColumn('antrenori', 'localitate');
    }

}
