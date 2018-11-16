<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormAlumnos extends model{

public $id_alumno;
public $nombre;
public $apellidos;
public $nota_final;

public function rules()
 {
  return [
   ['id_alimento', 'integer', 'message' => 'Id incorrecto'],
   ['nom_a', 'required', 'message' => 'Campo requerido'],
   ['nom_a', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['nom_a', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['descripcion', 'required', 'message' => 'Campo requerido'],
   ['descripcion', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['descripcion', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 100 caracteres'],
   ['precio', 'required', 'message' => 'Campo requerido'],
   ['precio', 'number', 'message' => 'Sólo números'],
   ['imagen', 'required', 'message'=> 'Campo requerido'],
   ['cantidad', 'required', 'message'=> 'Campo requerido'],
   ['cantidad', 'number', 'message'=> 'Sólo números']
  ];
 }
 
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

