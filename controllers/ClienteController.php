<?php

namespace app\controllers;

use Yii;
use app\models\Cidade;
use yii\web\NotFoundHttpException;

class ClienteController extends \yii\rest\ActiveController {

    public $modelClass = 'app\models\Cliente';

    public function actions()
    {
        $actions = parent::actions();
        
        return $actions;
    }   

    public function actionObterCidade($id)
    {
        $city = Cidade::find()->where(['id' => $id])->one();

        if ( empty($city) ) {
            throw new NotFoundHttpException('Não foi encontrado cidade com este ID');
        }
        
        return $city;
    }

    public function actionCreateCidade()
    {
        $city = new Cidade();

        $city->load(Yii::$app->request->post(), '');

        if ( $city->validate() ) {
            if ( !$city->save() ){
                return $city;
            }
        }

        return $city;
    }
}