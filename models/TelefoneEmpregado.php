<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TelefoneEmpregado".
 *
 * @property int $id
 * @property string $numero
 * @property int $Empregado_id
 * @property string $DDD_numero_ddd
 * @property string $DDI_numero_ddi
 *
 * @property DDD $dDDNumeroDdd
 * @property DDI $dDINumeroDdi
 * @property Empregado $empregado
 */
class TelefoneEmpregado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TelefoneEmpregado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero', 'Empregado_id', 'DDD_numero_ddd', 'DDI_numero_ddi'], 'required'],
            [['Empregado_id'], 'integer'],
            [['numero', 'DDD_numero_ddd', 'DDI_numero_ddi'], 'string', 'max' => 45],
            [['DDD_numero_ddd'], 'exist', 'skipOnError' => true, 'targetClass' => DDD::className(), 'targetAttribute' => ['DDD_numero_ddd' => 'numero_ddd']],
            [['DDI_numero_ddi'], 'exist', 'skipOnError' => true, 'targetClass' => DDI::className(), 'targetAttribute' => ['DDI_numero_ddi' => 'numero_ddi']],
            [['Empregado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empregado::className(), 'targetAttribute' => ['Empregado_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'numero' => Yii::t('app', 'Numero'),
            'Empregado_id' => Yii::t('app', 'Empregado ID'),
            'DDD_numero_ddd' => Yii::t('app', 'Ddd Numero Ddd'),
            'DDI_numero_ddi' => Yii::t('app', 'Ddi Numero Ddi'),
        ];
    }

    /**
     * Gets query for [[DDDNumeroDdd]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDDDNumeroDdd()
    {
        return $this->hasOne(DDD::className(), ['numero_ddd' => 'DDD_numero_ddd']);
    }

    /**
     * Gets query for [[DDINumeroDdi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDDINumeroDdi()
    {
        return $this->hasOne(DDI::className(), ['numero_ddi' => 'DDI_numero_ddi']);
    }

    /**
     * Gets query for [[Empregado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpregado()
    {
        return $this->hasOne(Empregado::className(), ['id' => 'Empregado_id']);
    }
}
