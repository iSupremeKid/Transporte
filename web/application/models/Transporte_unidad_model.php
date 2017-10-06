<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Transporte_unidad_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get transporte_unidad by id
     */
    function get_transporte_unidad($id)
    {
        return $this->db->get_where('transporte_unidad',array('id'=>$id))->row_array();
    }

    /*
     * Get all transporte_unidad
     */
    function get_all_transporte_unidad()
    {
        $this->db->select('tu.id as id, tt.nombre as nom_tipo_transporte, tu.identificacion as identificacion, tu.estado as estado ');
        $this->db->from('transporte_unidad tu, tipo_transporte tt');
        $this->db->where('tu.tipo_transporte_id = tt.id');
        $this->db->order_by('tu.id', 'desc');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new transporte_unidad
     */
    function add_transporte_unidad($params)
    {
        $this->db->insert('transporte_unidad',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update transporte_unidad
     */
    function update_transporte_unidad($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('transporte_unidad',$params);
    }

    /*
     * function to delete transporte_unidad
     */
    function delete_transporte_unidad($id)
    {
        return $this->db->delete('transporte_unidad',array('id'=>$id));
    }
}
