<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends BaseController
{



  public function index()
  {
    $datos = array(
      'categoria_visitas' => $this->Categoria_visita_model->getCategorias(),
      'copropietarios' => $this->Copropietario_model->getCopropietarios(),
      'control_visitas' => $this->Control_model->getControl_ingreso(),
    );

    $this->loadView('Control', '/forms/formularios/control/list', $datos);
  }
  public function guardarControl()
  {
    $nombre = $this->input->post('nombre');
    $apellidos = $this->input->post('apellidos');
    $ci = $this->input->post('ci');
    $id_categoria_visita = $this->input->post('id_categoria_visita');
    $placa = $this->input->post('placa');
    $color = $this->input->post('color');
    $marca = $this->input->post('marca');
    $id_copropietario = $this->input->post('id_copropietario');
    $fecha_hora_ingreso = date('Y-m-d H:i:s');
    $id_usuarios = $this->session->userdata('id_usuarios');


    $datospersona = array(
      'nombres' => $nombre,
      'apellidos' => $apellidos,
      'carnet_identidad' => $ci,
    );
    $datosvehiculo = array(
      'placa' => $placa,
      'color' => $color,
      'marca' => $marca,
    );
    $datoscontrol = array(
      'id_categoria_visita' => $id_categoria_visita,
      'id_copropietario' => $id_copropietario,
      'id_usuarios' => $id_usuarios,
      'fecha_hora_ingreso' => $fecha_hora_ingreso,
    );
    $datos_copropietario = $this->Copropietario_model->getCopropietario($id_copropietario);
    if ($this->Control_model->guardarControl($datospersona, $datosvehiculo, $datoscontrol)) {
      $id_control_entrada_salida = $this->Control_model->ultimoID();
      $dvisita = $this->Categoria_visita_model->getCategoria($id_categoria_visita);
      $respuesta = array(
        'respuesta' => 'Exitoso',
        'datos' => array(
          'id_control_entrada_salida' => $id_control_entrada_salida,
          'nombre' => $nombre,
          'apellidos' => $apellidos,
          'ci' => $ci,
          'id_categoria_visita' => $dvisita->nombre,
          'fecha_hora_ingreso' => $fecha_hora_ingreso,
          'placa' => $placa,
          'color' => $color,
          'marca' => $marca,
          'copropietario' => $datos_copropietario->nombres . ' ' . $datos_copropietario->apellidos,

        )
      );
    } else {
      $respuesta = array('respuesta' => 'No se pudo guardar correctamente');
    }

    echo json_encode($respuesta);
  }
  public function editarControl()
  {
    $id_control_entrada_salida = $this->input->post('id_control_entrada_salida');
    $nombre = $this->input->post('nombre');
    $apellidos = $this->input->post('apellidos');
    $ci = $this->input->post('ci');
    $id_categoria_visita = $this->input->post('id_categoria_visita');
    $placa = $this->input->post('placa');
    $color = $this->input->post('color');
    $marca = $this->input->post('marca');
    $id_copropietario = $this->input->post('id_copropietario');
    $id_usuarios = $this->session->userdata('id_usuarios');

    $datospersona = array(
      'nombres' => $nombre,
      'apellidos' => $apellidos,
      'carnet_identidad' => $ci,
    );
    $datosvehiculo = array(
      'placa' => $placa,
      'color' => $color,
      'marca' => $marca,
    );
    $datoscontrol = array(
      'id_categoria_visita' => $id_categoria_visita,
      'id_copropietario' => $id_copropietario,
      'id_usuarios' => $id_usuarios,
    );
    $datos_copropietario = $this->Copropietario_model->getCopropietario($id_copropietario);
    if ($this->Control_model->editarControl($id_control_entrada_salida, $datospersona, $datosvehiculo, $datoscontrol)) {
      $dvisita = $this->Categoria_visita_model->getCategoria($id_categoria_visita);
      $respuesta = array(
        'respuesta' => 'Exitoso',
        'datos' => array(
          'id_control_entrada_salida' => $id_control_entrada_salida,
          'nombre' => $nombre,
          'apellidos' => $apellidos,
          'ci' => $ci,
          'id_categoria_visita' => $dvisita->nombre,
          'placa' => $placa,
          'color' => $color,
          'marca' => $marca,
          'copropietario' => $datos_copropietario->nombres . ' ' . $datos_copropietario->apellidos,

        )
      );
    } else {
      $respuesta = array('respuesta' => 'No se pudo editar correctamente');
    }

    echo json_encode($respuesta);
  }

  public function salidaControl()
  {
    $id_control_entrada_salida = $this->input->post('id_control_entrada_salida');
    $fecha_hora_salida = date('Y-m-d H:i:s');
    $datoscontrol = array(
      'fecha_hora_salida' => $fecha_hora_salida,

    );

    if ($this->Control_model->salidaControl($id_control_entrada_salida, $datoscontrol)) {
      $respuesta = array(
        'respuesta' => 'Exitoso',
        'datos' => array(
          'fecha_hora_salida' => $fecha_hora_salida,
        )
      );
    } else {
      $respuesta = array('respuesta' => 'No se pudo guardar correctamente');
    }
    echo json_encode($respuesta);
  }
  public function borrarControl($id_control_entrada_salida)
  {

    $this->Control_model->borrar($id_control_entrada_salida);
      $respuesta = array(
        'respuesta' => 'Exitoso',
      );
    
    echo json_encode($respuesta);
  }
}
