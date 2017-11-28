<?php

class m171128_131537_instruction extends CDbMigration
{
    public function up()
    {
        $this->createTable('productpdf', array(
            'id' => 'pk',
            'name' => 'varchar(255)',
            'pdf_id' => 'int(11) default 0',
            'product_id' => 'int(11) default 0',
        ));

        $sql = "INSERT INTO `productpdf` (`name`, `pdf_id`, `product_id`)
                SELECT 'Инструкция', `pdf_id`, `id`
                FROM `product`
                WHERE `pdf_id`!=0";
        Yii::app()->db->createCommand($sql)->execute();

        $this->dropColumn('product', 'pdf_id');
    }

    public function down()
    {
        $this->dropTable('productpdf');

        $this->addColumn('product', 'pdf_id', 'int(11) default 0');
    }
}