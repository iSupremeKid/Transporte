<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Rutum extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rutum_model');
    }

    /*
     * Listing of ruta
     */
    function index()
    {
        $data['ruta'] = $this->Rutum_model->get_all_ruta();

        $data['_view'] = 'rutum/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new rutum
     */
    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('tipo_transporte_id','Tipo Transporte Id','required');
		$this->form_validation->set_rules('nombre','Nombre','required|max_length[60]');

		if($this->form_validation->run())
        {
            $params = array(
				'tipo_transporte_id' => $this->input->post('tipo_transporte_id'),
				'nombre' => strtoupper($this->input->post('nombre')),
				'estado' => $this->input->post('estado'),
				'ruta' => strtoupper($this->input->post('ruta')),
            );

            $rutum_id = $this->Rutum_model->add_rutum($params);
            redirect('rutum/index');
        }
        else
        {
			$this->load->model('Tipo_transporte_model');
			$data['all_tipo_transporte'] = $this->Tipo_transporte_model->get_all_tipo_transporte();

            $data['_view'] = 'rutum/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a rutum
     */
    function edit($id)
    {
        // check if the rutum exists before trying to edit it
        $data['rutum'] = $this->Rutum_model->get_rutum($id);

        if(isset($data['rutum']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('tipo_transporte_id','Tipo Transporte Id','required');
			$this->form_validation->set_rules('nombre','Nombre','required|max_length[60]');

			if($this->form_validation->run())
            {
                $params = array(
					'tipo_transporte_id' => $this->input->post('tipo_transporte_id'),
					'nombre' => strtoupper($this->input->post('nombre')),
					'estado' => $this->input->post('estado'),
					'ruta' => strtoupper($this->input->post('ruta')),
                );

                $this->Rutum_model->update_rutum($id,$params);
                redirect('rutum/index');
            }
            else
            {
				$this->load->model('Tipo_transporte_model');
				$data['all_tipo_transporte'] = $this->Tipo_transporte_model->get_all_tipo_transporte();

                $data['_view'] = 'rutum/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The rutum you are trying to edit does not exist.');
    }

    /*
     * Deleting rutum
     */
    function remove($id)
    {
        $rutum = $this->Rutum_model->get_rutum($id);

        // check if the rutum exists before trying to delete it
        if(isset($rutum['id']))
        {
            $this->Rutum_model->delete_rutum($id);
            redirect('rutum/index');
        }
        else
            show_error('The rutum you are trying to delete does not exist.');
    }

}
