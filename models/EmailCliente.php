<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class EmailCliente extends ActiveRecord
{
    public $email;

    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'string', 'max' => 255]
        ];
    }

    public static function tableName()
    {
        return '{{emailCliente}}';
    }
}