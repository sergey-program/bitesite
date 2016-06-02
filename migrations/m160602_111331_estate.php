<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160602_111331_estate extends Migration
{
    public function up()
    {
        $this->createTable('estate', [
            'id' => 'pk',
            'credential' => Schema::TYPE_STRING . ' NULL',
            'description' => Schema::TYPE_TEXT . ' NULL',
            'address' => Schema::TYPE_STRING . ' NULL',
            'district' => Schema::TYPE_STRING . ' NULL',
            'price' => Schema::TYPE_INTEGER . ' NULL',
            'type' => Schema::TYPE_STRING . ' NULL',
            'rooms' => Schema::TYPE_INTEGER . ' NULL',
            'square' => Schema::TYPE_INTEGER . ' NULL',
            'level' => Schema::TYPE_INTEGER . ' NULL',
            'maxLevel' => Schema::TYPE_INTEGER . ' NULL',
            'contact' => Schema::TYPE_STRING . ' NULL',
            'images' => Schema::TYPE_TEXT . ' NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('estate');

        echo "m160602_111331_estate reverted.\n";

        return true;
    }
}
