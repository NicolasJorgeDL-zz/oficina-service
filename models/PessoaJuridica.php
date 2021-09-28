<?php

namespace app\models;

use Yii;
use app\models\Pessoa;
use app\validators\CnpjValidator;

class PessoaJuridica extends \yii\db\ActiveRecord
{
    public $cpf;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
            [['documento'], 'string'],
            ['documento', 'unique', 'message' => 'Este CNPJ já está cadastrado'],
            [['email'], 'string', 'max' => 45],
            ['documento', CnpjValidator::class],
        ];
    }


    /**
     * Gets query for [[Enderecos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::class, ['Cliente_id' => 'id']);
    }

    // public function getPedidos()
    // {
    //     return $this->hasMany(Pedido::className(), ['Cliente_id1' => 'id']);
    // }

    // public function getTelefoneClientes()
    // {
    //     return $this->hasMany(TelefoneCliente::className(), ['Cliente_id' => 'id']);
    // }
}
