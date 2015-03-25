<?php
class update_model extends CI_Model{
// Update Query For Settings
function settings_update($data){
$this->db->where('id', 1);
$this->db->update('settings', $data);
redirect('settings/index/success');
}
function user_update($user_id,$data){
$this->db->where('id', $user_id);
$this->db->update('employee', $data);
redirect('users/update/success');
}
function add_employee($data){
$this->db->insert('employees', $data);
redirect('users/view/added/'.$this->db->insert_id());
}
function delete_employee ($employee_id){
       $this->db->where('id', $employee_id);
$this->db->delete('employees');   
}
}
?>