<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Endereco extends ActiveRecord
{
    // public $bairro;
    // public $numero;
    // public $uf;
    // public $rua;
    // public $complemento;
    // public $cep;

    public function rules()
    {
        return [
            ['cep', 'required'],
            [['cep', 'bairro', 'uf', 'rua', 'complemento'], 'string'],
            [['numero', 'Cidade_id', 'Cliente_id'], 'integer']
        ];
    }

    public static function tableName()
    {
        return '{{Endereco}}';
    }
}