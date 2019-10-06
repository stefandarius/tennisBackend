<?php

use \yii\db\Migration;

class m191006_145000_add_localitate_column_to_sportivi_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%sportivi}}', 'localitate', $this->integer());
        $this->createIndex('idx-localitate-sportivi', 'sportivi', 'localitate');
        $this->addForeignKey('fk-localitate-sportivi', 'sportivi', 'localitate', 'localitati', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-localitate-sportivi', 'sportivi');
        $this->dropColumn('{{%sportivi}}', 'localitate');
    }
}
