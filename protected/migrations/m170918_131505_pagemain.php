<?php

class m170918_131505_pagemain extends CDbMigration
{
    public function up()
    {
        $this->createTable('pagemain', array(
            'id' => 'pk',
            'h1_ru' => 'varchar(255)',
            'h1_uk' => 'varchar(255)',
            'text_1_ru' => 'text',
            'text_1_uk' => 'text',
            'text_2_ru' => 'text',
            'text_2_uk' => 'text',
            'text_3_ru' => 'text',
            'text_3_uk' => 'text',
            'seo_title_ru' => 'varchar(255)',
            'seo_title_uk' => 'varchar(255)',
            'seo_description_ru' => 'text',
            'seo_description_uk' => 'text',
            'seo_keywords_ru' => 'text',
            'seo_keywords_uk' => 'text',
        ));

        $this->insert('pagemain', array(
            'h1_ru' => 'Ezmedix',
            'h1_uk' => 'Ezmedix',
            'text_1_ru' => 'EZMEDIX отслеживает тренды мировой стоматологии и следуя им СОЗДАЕТ СОБСТВЕННЫЕ эффективные композиции.<br />
Купить стоматологические материалы EZMEDIX можно по доступной цене и в удобной упаковке.',
            'text_1_uk' => 'EZMEDIX отслеживает тренды мировой стоматологии и следуя им СОЗДАЕТ СОБСТВЕННЫЕ эффективные композиции.<br />
Купить стоматологические материалы EZMEDIX можно по доступной цене и в удобной упаковке.',
            'text_2_ru' => '<div class="main-b__title">
EZMEDIX — производитель продуктов<br />
регулярного использования<br />
в дентальной медицинской практике для:
</div>
<ul>
<li><span>ДЕЗИНФЕКЦИИ</span> (инструментария, поверхностей, рук)</li>
<li><span>ХОЛОДНОЙ СТЕРИЛИЗАЦИИ</span></li>
<li><span>ПРОФИЛАКТИКТИЧЕСКОГО</span> и <span>ГИГИЕНИЧЕСКОГО УХОДА</span></li>
<li><span>КЛИНИНГА</span>, включая очистку от микробных биопленок (microbial biofilms), присутствующих в шлангах систем водоснабжения стоматологических установок (DUWL)</li>
</ul>
<p>Современная стоматология — высокотехнологичная и высоко-конкурентная отрасль медицины. Отрасль, в которой не может быть «мелочей»: ни в предоставляемых услугах,<br /> ни в расходуемых материалах.</p>
<p>Мы проводим: микробиологические, вирусологические, токсикологические исследования которыми готовы с вами поделиться.</p>',
            'text_2_uk' => '<div class="main-b__title">
EZMEDIX — производитель продуктов<br />
регулярного использования<br />
в дентальной медицинской практике для:
</div>
<ul>
<li><span>ДЕЗИНФЕКЦИИ</span> (инструментария, поверхностей, рук)</li>
<li><span>ХОЛОДНОЙ СТЕРИЛИЗАЦИИ</span></li>
<li><span>ПРОФИЛАКТИКТИЧЕСКОГО</span> и <span>ГИГИЕНИЧЕСКОГО УХОДА</span></li>
<li><span>КЛИНИНГА</span>, включая очистку от микробных биопленок (microbial biofilms), присутствующих в шлангах систем водоснабжения стоматологических установок (DUWL)</li>
</ul>
<p>Современная стоматология — высокотехнологичная и высоко-конкурентная отрасль медицины. Отрасль, в которой не может быть «мелочей»: ни в предоставляемых услугах,<br /> ни в расходуемых материалах.</p>
<p>Мы проводим: микробиологические, вирусологические, токсикологические исследования которыми готовы с вами поделиться.</p>',
            'text_3_ru' => '<h3 class="gr-text__title">EZMEDIX — производитель продуктов регулярного использования в дентальной медицинской практике для:</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
<p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
<p>Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>',
            'text_3_uk' => '<h3 class="gr-text__title">EZMEDIX — производитель продуктов регулярного использования в дентальной медицинской практике для:</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
<p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
<p>Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>',
            'seo_title_ru' => 'Ezmedix',
            'seo_title_uk' => 'Ezmedix',
            'seo_description_ru' => 'Ezmedix',
            'seo_description_uk' => 'Ezmedix',
            'seo_keywords_ru' => 'Ezmedix',
            'seo_keywords_uk' => 'Ezmedix',
        ));
    }

    public function down()
    {
        $this->dropTable('pagemain');
    }
}