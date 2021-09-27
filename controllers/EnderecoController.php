<?php

namespace app\controllers;

class EnderecoController extends \yii\rest\ActiveController {
    public $modelClass = 'app\models\Endereco';

    public function actions()
    {
        return [];
    }

    public function actionIndex()
    {
        return ['alo' => 'alo'];
    }
}