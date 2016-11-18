<?php

use yii\db\Migration;

class m161111_142254_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('logs', [
            'id' => $this->primaryKey(),
            'app' => $this->string(),
            'process' => $this->string(),
            'date' => $this->dateTime(),
            'text' => $this->text(),
        ]);
    }

    public function safeDown()
    {
        echo "m161111_142254_init cannot be reverted.\n";
        return false;
    }

}
