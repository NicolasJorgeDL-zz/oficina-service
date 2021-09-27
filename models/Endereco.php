<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Endereco extends Model
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
}