<?php

namespace app\controllers;

use Yii;
use app\models\Cidade;
use yii\web\NotFoundHttpException;
use app\models\Endereco;
use app\models\UF;
use app\models\Bairro;
use app\models\Logradouro;
use app\models\PessoaFisica;
use app\models\PessoaFisica2;
use app\models\PessoaJuridica;
use Exception;

class ClienteController extends \yii\rest\ActiveController {

    public $modelClass = 'app\models\Cliente';

    public function actions()
    {
        $actions = parent::actions();
        
        return $actions;
    }   

    public function actionCadastrarCliente()
    {
        if ( !empty(Yii::$app->request->post('cpf')) ) {
            $client = new PessoaFisica2();

        } else {
            $client = new PessoaJuridica();
        }
        $address = new Endereco();
        
        try {
            $tr = Yii::$app->db->beginTransaction();

            $client->load(Yii::$app->request->post(), '');
            
            if ( !$client->validate() ) {
                return $client;
            }

            if ( !empty($client->cnpj) ) {
                $client->documento = $client->cnpj;
            } else {
                $client->documento = $client->cpf;
            }

            if ( !$client->save() ) {
                throw new Exception($address->getErrors());
            }

            if ( !empty(Yii::$app->request->post('nome_cidade')) ) {

                $cidade = Cidade::findOne(['nome' => Yii::$app->request->post('nome_cidade')]);
                if ( empty($cidade) ) {
                    $cidade = new Cidade();
                    $cidade->nome = Yii::$app->request->post('nome_cidade');
                    if ( !$cidade->save() ) {
                        throw new Exception($cidade->getErrors());
                    }
                }

                $bairro = Bairro::findOne(['nome' => Yii::$app->request->post('nome_bairro')]);
                if ( empty($bairro) ) {
                    $bairro = new Bairro();
                    $bairro->nome = Yii::$app->request->post('bairro');
                    if ( !$bairro->save() ) {
                        throw new Exception($bairro->getErrors());
                    }
                }

                $logradouro = Logradouro::findOne(['nome_logradouro' => Yii::$app->request->post('nome_bairro')]);
                if ( empty($logradouro) ) {
                    $logradouro = new Logradouro();
                    // $logradouro->nome_logradouro = Yii::$app->request->post('nome_logradouro');
                    $logradouro->load(Yii::$app->request->post(), '');
                    if ( !$logradouro->save() ) {
                        throw new Exception($bairro->getErrors());
                    }
                }
 
                $address->load(Yii::$app->request->post(), '');
                $address->Cidade_id = $cidade->id;
                $address->Cliente_id = $client->id;
                $address->Bairro_id = $bairro->id;
                $address->Logradouro_id = $logradouro->id;

                if ( !$address->validate() ) {
                    return $address;
                }
                
                if ( !$address->save() ) {
                    throw new Exception($address->getErrors());
                }
            }

            $response = Yii::$app->response;
            $response->data = ['message' => 'Cliente cadastrado com sucesso'];
            $tr->commit();

            return $response;

            
        } catch (\Exception $e) {
            $tr->rollBack();
            $response = Yii::$app->response;
            $response->statusCode = 400;

            return $response->data = ['message' => $e->getMessage()];
        }
    }
}