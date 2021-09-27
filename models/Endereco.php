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
            [['cep'], 'string'],
            [['Cidade_id', 'Cliente_id', 'Bairro_id', 'Logradouro_id'], 'integer']
        ];
    }

    public static function tableName()
    {
        return '{{Endereco}}';
    }
}