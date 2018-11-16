<?php
namespace app\models;
use Yii;
use yii\base\model;

class FormSearch extends model{
    public $q;
    
    public function rules()
    {
        return [
            ["q", "match", "pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Sólo se aceptan letras y números"]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'q' => "Buscar:",
        ];
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

