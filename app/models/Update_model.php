<?php
class update_model extends CI_Model{
// Update Query For Settings
function settings_update($data){
$this->db->where('id', 1);
$this->db->update('settings', $data);
redirect('settings/index/success');
}
function unit_update($unit_id, $data){
$this->db->where('id',$unit_id);
$this->db->update('units', $data);
redirect('units/view/success/'.$unit_id);
}
function unit_edit($unit_id, $data){
$this->db->where('id',$unit_id);
$this->db->update('units', $data);
redirect('units/view/success/'.$unit_id);
}
function add_config($data,$unit_id){
$this->db->insert('configurations', $data);
redirect('units/view/x/'.$unit_id);
}
function config_update($config_id, $data, $tab_id, $unit_id){
$this->db->where('id',$config_id);
$this->db->update('configurations', $data);
redirect('units/view/success/'.$unit_id);
}
function delete_config($unit_id, $config_id)
{
 $this->db->where('id', $config_id);
 $this->db->delete('configurations');
 redirect('units/view/success/'.$unit_id);
}
function street_edit($street_id, $data){
$this->db->where('id',$street_id);
$this->db->update('streets', $data);
redirect('streets/view/success/'.$street_id);
}
function district_edit($district_id, $data){
$this->db->where('id',$district_id);
$this->db->update('districts', $data);
redirect('districts/view/success/'.$district_id);
}
function user_update($user_id,$data){
$this->db->where('id', $user_id);
$this->db->update('users', $data);
redirect('users/update/success');
}
function add_user($data){
$this->db->insert('users', $data);
redirect('users/view/added/'.$this->db->insert_id());
}

function add_district($data){
$this->db->insert('districts', $data);
redirect('districts/view/added/'.$this->db->insert_id());
}
function add_street($data){
$this->db->insert('streets', $data);
redirect('streets/view/added/'.$this->db->insert_id());
}
function add_unit($data){
$this->db->insert('units', $data);
redirect('units/view/added/'.$this->db->insert_id());
}
function delete_district($district_id){
$this->db->where('id', $district_id);
$this->db->delete('districts');
redirect('dashboard');
}
function delete_street ($street_id){
  $this->db->where('id', $street_id);
$this->db->delete('streets');  
redirect('dashboard');
}
function delete_unit ($unit_id){
$unit = $this->db->get_where('units',array('id'=> $unit_id));
$street = $unit->row();
$street_id = $street->street;
$this->db->where('id', $unit_id);
$this->db->delete('units');
redirect('streets/view/deletedunit/'.$street_id);
}
function delete_user ($user_id){
       $this->db->where('id', $user_id);
$this->db->delete('users');   
}
}
?>