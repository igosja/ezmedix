<?php

class m170922_105811_order extends CDbMigration
{
    public function up()
    {
        $this->createTable('order', array(
            'id' => 'pk',
            'comment' => 'text',
            'date' => 'int(11) default 0',
            'email' => 'varchar(255)',
            'phone' => 'varchar(255)',
            'shipping_ru' => 'varchar(255)',
            'shipping_uk' => 'varchar(255)',
            'status' => 'int(1) default 0',
            'total' => 'decimal(11,2) default 0',
            'user_id' => 'int(11) default 0',
        ));

        $this->createTable('orderproduct', array(
            'id' => 'pk',
            'category_id' => 'int(11) default 0',
            'category_ru' => 'varchar(255)',
            'category_uk' => 'varchar(255)',
            'discount' => 'decimal(11,2) default 0',
            'order_id' => 'int(11) default 0',
            'price' => 'decimal(11,2) default 0',
            'product_id' => 'int(11) default 0',
            'product_ru' => 'varchar(255)',
            'product_uk' => 'varchar(255)',
            'quantity' => 'int(11) default 0',
            'total' => 'decimal(11,2) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('order');
        $this->dropTable('orderproduct');
    }
}