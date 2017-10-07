<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Persona_viaje_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get persona_viaje by id
     */
    function get_persona_viaje($id){
        return $this->db->get_where('persona_viaje',array('id'=>$id))->row_array();
    }

    function get_persona_viaje_by_persona_id($persona_id){
      $this->db->select('pv.*, pe.nombres as persona_nombre, pe.apellido_paterno as persona_ap, pe.apellido_materno as persona_am, pa.nombre as paradero_nombre, tu.identificacion as identificacion, pp.nombre as persona_perfil');
      $this->db->from('persona_viaje pv, persona pe, paradero pa, transporte_unidad tu, persona_perfil pp');
      $this->db->where("pe.id = {$persona_id} AND pv.persona_id = pe.id AND pv.paradero_id = pa.id AND pv.transporte_unidad_id = tu.id AND pv.persona_perfil_id = pp.id");
      $this->db->order_by('pv.id', 'desc');
      return $this->db->get()->result_array();
    }

    /*
     * Get all persona_viaje
     */
    function get_all_persona_viaje()
    {
        $this->db->select('pv.*, pe.nombres as persona_nombre, pe.apellido_paterno as persona_ap, pe.apellido_materno as persona_am, pa.nombre as paradero_nombre, tu.identificacion as identificacion, pp.nombre as persona_perfil');
        $this->db->from('persona_viaje pv, persona pe, paradero pa, transporte_unidad tu, persona_perfil pp');
        $this->db->where('pv.persona_id = pe.id AND pv.paradero_id = pa.id AND pv.transporte_unidad_id = tu.id AND pv.persona_perfil_id = pp.id');
        $this->db->order_by('pv.id', 'desc');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new persona_viaje
     */
    function add_persona_viaje($params)
    {
        $this->db->insert('persona_viaje',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update persona_viaje
     */
    function update_persona_viaje($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('persona_viaje',$params);
    }

    /*
     * function to delete persona_viaje
     */
    function delete_persona_viaje($id)
    {
        return $this->db->delete('persona_viaje',array('id'=>$id));
    }
}
