<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Endereco extends ActiveRecord
{
    public $bairro;
    public $numero;
    public $uf;
    public $cidade;
    public $rua;
    public $complemento;

    public function rules()
    {
        return [
            [['cidade', 'bairro'], 'required'],
        ];
    }

    public static function tableName()
    {
        return '{{Endereco}}';
    }
}