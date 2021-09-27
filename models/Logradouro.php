<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Logradouro".
 *
 * @property int $id
 * @property string|null $nome_logradouro
 * @property string|null $complemento
 * @property int|null $numero
 */
class Logradouro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Logradouro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero'], 'integer'],
            [['nome_logradouro'], 'string', 'max' => 255],
            [['complemento'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nome_logradouro' => Yii::t('app', 'Nome Logradouro'),
            'complemento' => Yii::t('app', 'Complemento'),
            'numero' => Yii::t('app', 'Numero'),
        ];
    }
}
