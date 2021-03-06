<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Historial_pago extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Historial_pago_model');
    }

    /*
     * Listing of historial_pago
     */
    function index()
    {
        $data['historial_pago'] = $this->Historial_pago_model->get_all_historial_pago();

        $data['_view'] = 'historial_pago/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new historial_pago
     */
    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('persona_id','Persona Id','required');
		$this->form_validation->set_rules('origen','Origen','required');
		$this->form_validation->set_rules('monto','Monto','required|numeric');
		$this->form_validation->set_rules('fecha','Fecha','required');
		$this->form_validation->set_rules('tarjeta','Tarjeta','required|numeric|max_length[16]');

		if($this->form_validation->run())
        {
            $params = array(
				'persona_id' => $this->input->post('persona_id'),
				'origen' => strtoupper($this->input->post('origen')),
				'monto' => $this->input->post('monto'),
				'fecha' => $this->input->post('fecha'),
				'tarjeta' => strtoupper($this->input->post('tarjeta')),
				'estado' => $this->input->post('estado'),
            );

            $historial_pago_id = $this->Historial_pago_model->add_historial_pago($params);
            redirect('historial_pago/index');
        }
        else
        {
			$this->load->model('Persona_model');
			$data['all_persona'] = $this->Persona_model->get_all_persona();

            $data['_view'] = 'historial_pago/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a historial_pago
     */
    function edit($id)
    {
        // check if the historial_pago exists before trying to edit it
        $data['historial_pago'] = $this->Historial_pago_model->get_historial_pago($id);

        if(isset($data['historial_pago']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('persona_id','Persona Id','required');
			$this->form_validation->set_rules('origen','Origen','required');
			$this->form_validation->set_rules('monto','Monto','required|numeric');
			$this->form_validation->set_rules('fecha','Fecha','required');
			$this->form_validation->set_rules('tarjeta','Tarjeta','required|numeric|max_length[16]');

			if($this->form_validation->run())
            {
                $params = array(
					'persona_id' => $this->input->post('persona_id'),
					'origen' => strtoupper($this->input->post('origen')),
					'monto' => $this->input->post('monto'),
					'fecha' => $this->input->post('fecha'),
					'tarjeta' => strtoupper($this->input->post('tarjeta')),
					'estado' => $this->input->post('estado'),
                );

                $this->Historial_pago_model->update_historial_pago($id,$params);
                redirect('historial_pago/index');
            }
            else
            {
				$this->load->model('Persona_model');
				$data['all_persona'] = $this->Persona_model->get_all_persona();

                $data['_view'] = 'historial_pago/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The historial_pago you are trying to edit does not exist.');
    }

    /*
     * Deleting historial_pago
     */
    function remove($id)
    {
        $historial_pago = $this->Historial_pago_model->get_historial_pago($id);

        // check if the historial_pago exists before trying to delete it
        if(isset($historial_pago['id']))
        {
            $this->Historial_pago_model->delete_historial_pago($id);
            redirect('historial_pago/index');
        }
        else
            show_error('The historial_pago you are trying to delete does not exist.');
    }

}
