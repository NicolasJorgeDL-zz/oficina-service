<?php

namespace app\models;

use Yii;
use app\models\Pessoa;

class PessoaFisica extends Pessoa
{
    public $cpf;
    public $nome;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge([
            ['cpf', 'filter', 'filter' => function($value) {
                return preg_replace('/[^0-9]/', '', $value);
            }],
            ['cpf', 'string', 'max' => 255],
            ['cpf', 'required'],
            ['cpf', 'trim']
        ], parent::rules());
    }

    public static function tableName()
    {
        return '{{Cliente}}';
    }
}