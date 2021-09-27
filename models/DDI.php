<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DDI".
 *
 * @property string $numero_ddi
 *
 * @property TelefoneCliente[] $telefoneClientes
 * @property TelefoneEmpregado[] $telefoneEmpregados
 */
class DDI extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DDI';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero_ddi'], 'required'],
            [['numero_ddi'], 'string', 'max' => 45],
            [['numero_ddi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'numero_ddi' => Yii::t('app', 'Numero Ddi'),
        ];
    }

    /**
     * Gets query for [[TelefoneClientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelefoneClientes()
    {
        return $this->hasMany(TelefoneCliente::className(), ['DDI_numero_ddi' => 'numero_ddi']);
    }

    /**
     * Gets query for [[TelefoneEmpregados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelefoneEmpregados()
    {
        return $this->hasMany(TelefoneEmpregado::className(), ['DDI_numero_ddi' => 'numero_ddi']);
    }
}
