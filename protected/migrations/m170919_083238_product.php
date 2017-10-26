<?php

class m170919_083238_product extends CDbMigration
{
    public function up()
    {
        $this->createTable('product', array(
            'id' => 'pk',
            'category_id' => 'int(11) default 0',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'parameter_ru' => 'text',
            'parameter_uk' => 'text',
            'price' => 'decimal(11,2) default 0',
            'pdf_id' => 'int(11) default 0',
            'status' => 'int(1) default 1',
            'text_ru' => 'text',
            'text_uk' => 'text',
            'url' => 'varchar(255)',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->createTable('productimage', array(
            'id' => 'pk',
            'image_id' => 'int(11) default 0',
            'product_id' => 'int(11) default 0',
            'order' => 'int(11) default 0',
        ));

        $this->createTable('filter', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'order' => 'int(11) default 0',
            'status' => 'int(1) default 1',
        ));

        $this->createTable('productfilter', array(
            'id' => 'pk',
            'filter_id' => 'int(11) default 0',
            'product_id' => 'int(11) default 0',
        ));
    }

    public function down()
    {
        $this->dropTable('product');
        $this->dropTable('productimage');
        $this->dropTable('filter');
        $this->dropTable('productfilter');
    }
}