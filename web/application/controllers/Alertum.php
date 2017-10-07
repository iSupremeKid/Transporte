<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Alertum extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Alertum_model');
    }

    /*
     * Listing of alerta
     */
    function index()
    {
        $data['alerta'] = $this->Alertum_model->get_all_alerta();

        $data['_view'] = 'alertum/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new alertum
     */
    function add()
    {

        $this->load->library('form_validation');

		$this->form_validation->set_rules('usuario_id','Usuario Id','required',
    array('required' => 'Debe seleccionar un usuario para la alerta.',
        )
  );
		$this->form_validation->set_rules('tipo_alerta_id','Tipo Alerta Id','required',
    array('required' => 'Debe seleccionar un tipo de alerta para la alerta',
        )
  );
		$this->form_validation->set_rules('mensaje','Mensaje','required|max_length[500]',
    array('required' => 'Debe ingresar un mensaje para la alerta.',
          'max_length' => 'Como máximo solo pueden ser 500 caracteres.'
        )
  );
		$this->form_validation->set_rules('fecha','Fecha','required',
    array('required' => 'Debe ingresar una fecha para la alerta.',
        )
  );

		if($this->form_validation->run())
        {
            $params = array(
				'usuario_id' => $this->input->post('usuario_id'),
				'tipo_alerta_id' => $this->input->post('tipo_alerta_id'),
				'mensaje' => strtoupper($this->input->post('mensaje')),
				'fecha' => strtoupper($this->input->post('fecha')),
				'estado' => 1,
            );

            $alertum_id = $this->Alertum_model->add_alertum($params);
            redirect('alertum/index');
        }
        else
        {
			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Tipo_alertum_model');
			$data['all_tipo_alerta'] = $this->Tipo_alertum_model->get_all_tipo_alerta();

            $data['_view'] = 'alertum/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a alertum
     */
    function edit($id)
    {
        // check if the alertum exists before trying to edit it
        $data['alertum'] = $this->Alertum_model->get_alertum($id);

        if(isset($data['alertum']['id']))
        {
            $this->load->library('form_validation');


      $this->form_validation->set_rules('usuario_id','Usuario Id','required',
      array('required' => 'Debe seleccionar un usuario para la alerta.',
          )
      );
      $this->form_validation->set_rules('tipo_alerta_id','Tipo Alerta Id','required',
      array('required' => 'Debe seleccionar un tipo de alerta para la alerta',
          )
      );
      $this->form_validation->set_rules('mensaje','Mensaje','required|max_length[500]',
      array('required' => 'Debe ingresar un mensaje para la alerta.',
            'max_length' => 'Como máximo solo pueden ser 500 caracteres.'
          )
      );
      $this->form_validation->set_rules('fecha','Fecha','required',
      array('required' => 'Debe ingresar una fecha para la alerta.',
          )
      );


			if($this->form_validation->run())
            {
                $params = array(
					'usuario_id' => $this->input->post('usuario_id'),
					'tipo_alerta_id' => $this->input->post('tipo_alerta_id'),
					'mensaje' => strtoupper($this->input->post('mensaje')),
					'fecha' => $this->input->post('fecha'),
					'estado' => $this->input->post('estado'),
                );

                $this->Alertum_model->update_alertum($id,$params);
                redirect('alertum/index');
            }
            else
            {
				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

				$this->load->model('Tipo_alertum_model');
				$data['all_tipo_alerta'] = $this->Tipo_alertum_model->get_all_tipo_alerta();

                $data['_view'] = 'alertum/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The alertum you are trying to edit does not exist.');
    }

    /*
     * Deleting alertum
     */
    function remove($id)
    {
        $alertum = $this->Alertum_model->get_alertum($id);

        // check if the alertum exists before trying to delete it
        if(isset($alertum['id']))
        {
            $this->Alertum_model->delete_alertum($id);
            redirect('alertum/index');
        }
        else
            show_error('The alertum you are trying to delete does not exist.');
    }


    function deshabilitar($id){
      $data['alertum'] = $this->Alertum_model->get_alertum($id);

      if(isset($data['alertum']['id'])){
        $params = array('estado' => 0);
        $this->Alertum_model->update_alertum($id,$params);
        redirect('alertum/index');
      }else{
        show_error('La alerta que intenta deshabilitar no existe.');
      }

    }
    function habilitar($id){
      $data['alertum'] = $this->Alertum_model->get_alertum($id);

      if(isset($data['alertum']['id'])){
        $params = array('estado' => 1);
        $this->Alertum_model->update_alertum($id,$params);
        redirect('alertum/index');
      }else{
        show_error('La alerta que intenta habilitar no existe.');
      }
    }

}