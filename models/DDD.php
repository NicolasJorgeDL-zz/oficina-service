<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DDD".
 *
 * @property string $numero_ddd
 *
 * @property TelefoneCliente[] $telefoneClientes
 * @property TelefoneEmpregado[] $telefoneEmpregados
 */
class DDD extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DDD';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero_ddd'], 'required'],
            [['numero_ddd'], 'string', 'max' => 45],
            [['numero_ddd'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'numero_ddd' => Yii::t('app', 'Numero Ddd'),
        ];
    }

    /**
     * Gets query for [[TelefoneClientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelefoneClientes()
    {
        return $this->hasMany(TelefoneCliente::class, ['DDD_numero_ddd' => 'numero_ddd']);
    }

    /**
     * Gets query for [[TelefoneEmpregados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelefoneEmpregados()
    {
        return $this->hasMany(TelefoneEmpregado::class, ['DDD_numero_ddd' => 'numero_ddd']);
    }
}
