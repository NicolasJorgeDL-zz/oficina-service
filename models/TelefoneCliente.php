<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TelefoneCliente".
 *
 * @property int $id
 * @property string $numero
 * @property int $Cliente_id
 * @property string $DDD_numero_ddd
 * @property string $DDI_numero_ddi
 *
 * @property Cliente $cliente
 * @property DDD $dDDNumeroDdd
 * @property DDI $dDINumeroDdi
 */
class TelefoneCliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TelefoneCliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero', 'Cliente_id', 'DDD_numero_ddd', 'DDI_numero_ddi'], 'required'],
            [['Cliente_id'], 'integer'],
            [['numero', 'DDD_numero_ddd', 'DDI_numero_ddi'], 'string', 'max' => 45],
            [['Cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['Cliente_id' => 'id']],
            [['DDD_numero_ddd'], 'exist', 'skipOnError' => true, 'targetClass' => DDD::class, 'targetAttribute' => ['DDD_numero_ddd' => 'numero_ddd']],
            [['DDI_numero_ddi'], 'exist', 'skipOnError' => true, 'targetClass' => DDI::class, 'targetAttribute' => ['DDI_numero_ddi' => 'numero_ddi']],
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
            'Cliente_id' => Yii::t('app', 'Cliente ID'),
            'DDD_numero_ddd' => Yii::t('app', 'Ddd Numero Ddd'),
            'DDI_numero_ddi' => Yii::t('app', 'Ddi Numero Ddi'),
        ];
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
     * Gets query for [[DDDNumeroDdd]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDDDNumeroDdd()
    {
        return $this->hasOne(DDD::class, ['numero_ddd' => 'DDD_numero_ddd']);
    }

    /**
     * Gets query for [[DDINumeroDdi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDDINumeroDdi()
    {
        return $this->hasOne(DDI::class, ['numero_ddi' => 'DDI_numero_ddi']);
    }
}
