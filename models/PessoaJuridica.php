<?php

namespace app\models;

use Yii;
use app\models\Pessoa;

class PessoaJuridica extends Pessoa
{
    public $cnpj;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['cnpj'], 'required'],
            [['cnpj'], 'string', 'max' => 15],
            [['cnpj'], 'unique'],
        ]);
    }

    public static function tableName()
    {
        return '{{Cliente}}';
    }
}