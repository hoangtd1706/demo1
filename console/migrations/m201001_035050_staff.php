<?php

use yii\db\Migration;

/**
 * Class m201001_035050_staff
 */
class m201001_035050_staff extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{department}}',[
            'id' => $this->primaryKey(),
            'dep_name' => $this->string()->notNull()->unique(),
            'dep_desciption' => $this->string()->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ],$tableOptions);

        $this->createTable('{{staff}}', [
            'id' => $this->primaryKey(),
            'staff_name' => $this->string()->notNull(),
            'staff_email' => $this->string()->notNull()->unique(),
            'staff_tel' => $this->string()->notNull(),
            'staff_depart' => $this->string()->notNull()->unique(),
            'dep_id' => $this->integer(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('fk_staff_department', 'staff', 'dep_id', 'department', 'id');
    }

    public function down()
    {
        echo "m201001_035050_staff cannot be reverted.\n";
        $this->dropForeignKey('{{fk_staff_department}}', 'staff');
        $this->dropTable('{{staff}}');
        $this->dropTable('{{department}}');
    }
}
