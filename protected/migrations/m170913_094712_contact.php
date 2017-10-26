<?php

class m170913_094712_contact extends CDbMigration
{
    public function up()
    {
        $this->createTable('contact', array(
            'id' => 'pk',
            'address_ru' => 'text',
            'address_uk' => 'text',
            'email' => 'varchar(255)',
            'email_letter' => 'varchar(255)',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'lat' => 'decimal(11,8) default 0',
            'lng' => 'decimal(11,8) default 0',
            'phone_ru' => 'text',
            'phone_uk' => 'text',
            'schedule_ru' => 'text',
            'schedule_uk' => 'text',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('contact', array(
            'address_ru' => '01051, Киев,
ул. Борщаговская, 23, офис 1',
            'address_uk' => '01051, Київ,
вул. Борщагівська, 23, офіс 1',
            'email' => 'info@marten.ua',
            'email_letter' => 'info@marten.ua',
            'h1_ru' => 'Контакты',
            'h1_uk' => 'Контакти',
            'lat' => '50.4469359',
            'lng' => '30.4663238',
            'phone_ru' => '044 482-36-00
044 482-36-00
044 482-36-00 <span style="color:#77797f; font-style:italic;">— Факс</span>',
            'phone_uk' => '044 482-36-00
044 482-36-00
044 482-36-00 <span style="color:#77797f; font-style:italic;">— Факс</span>',
            'schedule_ru' => 'Понедельник-Пятница с 10 до 17 00',
            'schedule_uk' => 'Понеділок-Пятниця з 10 до 17 00',
            'seo_title_ru' => 'Контакты',
            'seo_title_uk' => 'Контакти',
            'seo_description_ru' => 'Контакты',
            'seo_description_uk' => 'Контакти',
            'seo_keywords_ru' => 'Контакты',
            'seo_keywords_uk' => 'Контакти',
        ));
    }

    public function down()
    {
        $this->dropTable('contact');
    }
}