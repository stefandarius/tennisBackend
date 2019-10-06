<?php

use \yii\db\Migration;

class m191006_143100_add_localitate_column_to_antrenori_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%antrenori}}', 'localitate', $this->integer());
        $this->createIndex('idx-localitate-antrenori', 'antrenori', 'localitate');
        $this->addForeignKey('fk-localitate-antrenori', 'antrenori', 'localitate', 'localitati', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-localitate-antrenori', 'antrenori');
        $this->dropColumn('{{%antrenori}}', 'localitate');
    }
}
