<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Alertum_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get alertum by id
     */
    function get_alertum($id)
    {
        return $this->db->get_where('alerta',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all alerta
     */
    function get_all_alerta()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('alerta')->result_array();
    }
        
    /*
     * function to add new alertum
     */
    function add_alertum($params)
    {
        $this->db->insert('alerta',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update alertum
     */
    function update_alertum($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('alerta',$params);
    }
    
    /*
     * function to delete alertum
     */
    function delete_alertum($id)
    {
        return $this->db->delete('alerta',array('id'=>$id));
    }
}
