<?php

namespace app\controllers;

use app\models\Endereco;
use yii\web\NotFoundHttpException;

class EnderecoController extends \yii\rest\ActiveController {

    public $modelClass = 'app\models\Endereco';

    public function actions()
    {
        return [];
    }


    public function actionObterEnderecoPorCep($cep)
    {
        $address = Endereco::find()->where(['cep' => $cep])->all();

        if ( empty($address) ) {
            throw new NotFoundHttpException('Não foi encontrado endereço com este CEP');
        }
        
        return $address;
    }

    public function actionObterEnderecoPorId($id)
    {
        $address = Endereco::find()->where(['id' => $id])->all();

        if ( empty($address) ) {
            throw new NotFoundHttpException('Não foi encontrado endereço com este ID');
        }
        
        return $address;
    }
}