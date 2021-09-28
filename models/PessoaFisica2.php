<?php

namespace app\models;

use Yii;
use app\validators\CpfValidator;

class PessoaFisica2 extends \yii\db\ActiveRecord
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
            [['email'], 'string', 'max' => 45],
            [['documento'], 'string'],
            ['documento', 'unique', 'message' => 'Este CPF já foi cadastrado'],
            ['documento', CpfValidator::class],
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

    // /**
    //  * Gets query for [[Pedidos]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getPedidos()
    // {
    //     return $this->hasMany(Pedido::className(), ['Cliente_id1' => 'id']);
    // }

    // /**
    //  * Gets query for [[TelefoneClientes]].
    //  *
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getTelefoneClientes()
    // {
    //     return $this->hasMany(TelefoneCliente::className(), ['Cliente_id' => 'id']);
    // }
}
