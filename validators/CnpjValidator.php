<?php

namespace app\validators;

use yii\validators\Validator;

class CnpjValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $cnpj = $model->$attribute;
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	
        // Valida tamanho
        if (strlen($cnpj) != 14 ){
            $this->addError($model, $attribute, 'CNPJ Inválido');
        }
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            $this->addError($model, $attribute, 'CNPJ Inválido');
        }
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            $this->addError($model, $attribute, 'CNPJ Inválido');
        }
    }
}
