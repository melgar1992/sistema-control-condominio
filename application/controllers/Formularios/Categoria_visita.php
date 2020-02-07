<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria_visita extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $datos = array(
            'categorias_visitas' => $this->Categoria_visita_model->getCategorias(),

        );

        $this->loadView('Categoria_visita', '/forms/formularios/categoria_visita/list', $datos);
    }
    public function guardarCategoria()
    {
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');

        $this->form_validation->set_rules('nombre', 'Nombre de la categoria', 'required|is_unique[categoria_visita.nombre]');

        if ($this->form_validation->run()) {
            $datos = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'estado' => '1',
            );
            if ($this->Categoria_visita_model->guardarCategoria($datos)) {
                redirect(base_url() . 'Formularios/Categoria_visita');
            } else {
                $this->session->set_flashdata('Error', 'No se pudo guardar la cateogira');
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_categoria_visita)
    {
        $datos = array(
            'categoria_visita' => $this->Categoria_visita_model->getCategoria($id_categoria_visita),

        );

        $this->loadView('Categoria_visita', '/forms/formularios/categoria_visita/editar', $datos);
    }
    public function actualizarCategoria()
    {
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $id_categoria_visita = $this->input->post('id_categoria_visita');
        $categoria_actual = $this->Categoria_visita_model->getCategoria($id_categoria_visita);

        if ($nombre == $categoria_actual->nombre) {
            $this->form_validation->set_rules('nombre', 'Nombre de la categoria de visita', 'required');

        } else {
            $this->form_validation->set_rules('nombre', 'Nombre de la categoria de visita', 'required|is_unique[categoria_visita.nombre]');

        }
       
        $this->form_validation->set_rules('descripcion', 'Descripcion de la categoria', 'required');


        if ($this->form_validation->run()) {
            $datos = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,

            );
            if ($this->Categoria_visita_model->actualizarCategoria($id_categoria_visita, $datos)) {
                redirect(base_url() . 'Formularios/Categoria_visita');
            } else {
                $this->session->set_flashdata('Error', 'No se pudo guardar la cateogira');
            }
        } else {
            $this->editar($id_categoria_visita);
        }
    }

    public function borrar($id_categoria_visita)
    {
        $datos = array(
            'estado' => '0',

        );
        $this->Categoria_visita_model->actualizarCategoria($id_categoria_visita,$datos);
        
        echo 'Formularios/Categoria_visita';
    }
}
