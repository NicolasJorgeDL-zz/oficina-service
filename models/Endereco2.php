<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Endereco".
 *
 * @property int $id
 * @property string|null $cep
 * @property int $Cidade_id
 * @property int $Cliente_id
 * @property int|null $Bairro_id
 * @property int|null $Logradouro_id
 *
 * @property Bairro $bairro
 * @property Cidade $cidade
 * @property Cliente $cliente
 * @property Logradouro $logradouro
 */
class Endereco2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Endereco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Cidade_id', 'Cliente_id'], 'required'],
            [['Cidade_id', 'Cliente_id', 'Bairro_id', 'Logradouro_id'], 'integer'],
            [['cep'], 'string', 'max' => 15],
            [['Bairro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bairro::className(), 'targetAttribute' => ['Bairro_id' => 'id']],
            [['Cidade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cidade::className(), 'targetAttribute' => ['Cidade_id' => 'id']],
            [['Cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['Cliente_id' => 'id']],
            [['Logradouro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Logradouro::className(), 'targetAttribute' => ['Logradouro_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cep' => Yii::t('app', 'Cep'),
            'Cidade_id' => Yii::t('app', 'Cidade ID'),
            'Cliente_id' => Yii::t('app', 'Cliente ID'),
            'Bairro_id' => Yii::t('app', 'Bairro ID'),
            'Logradouro_id' => Yii::t('app', 'Logradouro ID'),
        ];
    }

    /**
     * Gets query for [[Bairro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBairro()
    {
        return $this->hasOne(Bairro::class, ['id' => 'Bairro_id']);
    }

    /**
     * Gets query for [[Cidade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCidade()
    {
        return $this->hasOne(Cidade::class, ['id' => 'Cidade_id']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id' => 'Cliente_id']);
    }

    /**
     * Gets query for [[Logradouro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogradouro()
    {
        return $this->hasOne(Logradouro::class, ['id' => 'Logradouro_id']);
    }
}
