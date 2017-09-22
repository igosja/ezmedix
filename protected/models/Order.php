<?php

class Order extends CActiveRecord
{
    public $shipping_id;

    public function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return array(
            array('email, phone, shipping_id', 'required'),
            array('email, phone, shipping_ru, shipping_uk', 'length', 'max' => 255),
            array('email', 'email'),
            array('date, total, user_id', 'numerical'),
            array('comment', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'comment' => 'Комментарий',
            'date' => 'Время',
            'email' => Yii::t('models.ContactForm', 'label-email'),
            'phone' => Yii::t('models.ContactForm', 'label-phone'),
            'shipping_ru' => 'Служба доставки',
            'status' => 'Статус',
            'total' => 'Общая стоимость',
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $o_shipping = Shipping::model()->findByPk($this->shipping_id);
                if (!$o_shipping) {
                    return false;
                }
                $this['date'] = time();
                $this['user_id'] = Yii::app()->user->id;
                $this['shipping_ru'] = $o_shipping['h1_ru'];
                $this['shipping_uk'] = $o_shipping['h1_uk'];
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'product' => array(self::HAS_MANY, 'OrderProduct', array('order_id' => 'id')),
        );
    }

    public function send()
    {
        $text = 'Сумма заказа - ' . $this['total'] . ' грн';
        $text .= '<br/>Телефон - ' . $this['phone'];
        $text .= '<br/>Email - ' . $this['email'];
        if ($this['comment']) {
            $text .= '<br/>Сообщение - ' . $this['comment'];
        }
        $contact = Contact::model()->findByPk(1);
        $mail = new Mail();
        $mail->setTo($contact['email_letter']);
        $mail->setSubject('Новый заказ с сайта ezmedix');
        $mail->setHtml($text);
        $mail->send();
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}