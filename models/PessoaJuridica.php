<?php

namespace app\models;

use Yii;

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
            [['email'], 'string', 'max' => 45],
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
