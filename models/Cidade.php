<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cidade".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Endereco[] $enderecos
 */
class Cidade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cidade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * Gets query for [[Enderecos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::class, ['Cidade_id' => 'id']);
    }
}
