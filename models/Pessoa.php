<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Pessoa extends ActiveRecord
{
    public $nome;

    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
        ];
    }
}