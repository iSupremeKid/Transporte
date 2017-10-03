<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asistencium_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get asistencium by id
     */
    function get_asistencium($id)
    {
        return $this->db->get_where('asistencia',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all asistencia
     */
    function get_all_asistencia()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('asistencia')->result_array();
    }
        
    /*
     * function to add new asistencium
     */
    function add_asistencium($params)
    {
        $this->db->insert('asistencia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update asistencium
     */
    function update_asistencium($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('asistencia',$params);
    }
    
    /*
     * function to delete asistencium
     */
    function delete_asistencium($id)
    {
        return $this->db->delete('asistencia',array('id'=>$id));
    }
}
