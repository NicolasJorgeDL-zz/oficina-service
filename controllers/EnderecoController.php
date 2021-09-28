<?php

namespace app\controllers;

use app\models\Endereco;
use app\models\Endereco2;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\filters\auth\HttpBearerAuth;
use yii\web\NotFoundHttpException;

class EnderecoController extends \yii\rest\ActiveController {

    public $modelClass = 'app\models\Endereco';

    public function actions()
    {
        return [];
    }

    public function behaviors(){

        $behaviors = parent::behaviors();

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Origin' => [''], // restrict access to
                'Access-Control-Request-Method' => ['POST', 'GET'],
                'Access-Control-Allow-Headers' => ['content-type','authorization'], 
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age' => 3600,
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];

        return $behaviors;
    }

    public function actionObterEnderecoPorCep($cep)
    {
        $address = Endereco2::find()->where(['cep' => $cep])->one();

        if ( empty($address) ) {
            throw new NotFoundHttpException('Não foi encontrado endereço com este CEP');
        }
        
        return [
            'cep' => $address->cep,
            'logradouro' => $address->logradouro,
            'cidade' => $address->cidade,
            'bairro' => $address->bairro
        ];
    }

    public function actionObterEnderecoPorId($id)
    {
        $address = Endereco2::find()->where(['id' => $id])->one();

        if ( empty($address) ) {
            throw new NotFoundHttpException('Não foi encontrado endereço com este ID');
        }

        return [
            'cep' => $address->cep,
            'logradouro' => $address->logradouro,
            'cidade' => $address->cidade,
            'bairro' => $address->bairro
        ];
    }
}