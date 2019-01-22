<?php
class User extends CI_Controller 
{
 public function __construct()
 {
 parent::__construct();
 $this->load->database();
 $this->load->helper('url');
 $this->load->model('User_Model');
 }
 
 public function savedata()
 {
 $this->load->view('registration');
 if($this->input->post('save'))
 {
 $name=$this->input->post('name');
 $email=$this->input->post('email');
 $mobile=$this->input->post('mobile');
 $this->User_Model->saverecords($name,$email,$mobile); 
 echo "Data saved successfully";
 redirect("User/dispdata");

 }
 }
 
 public function dispdata()
 {
 $result['data']=$this->User_Model->displayrecords();
 $this->load->view('display_records',$result);
 }
 
 public function deletedata()
 {
 $id=$this->input->get('id');
 $this->User_Model->deleterecords($id);
 redirect("User/dispdata");
 }
 
 public function updatedata()
 {
 $id=$this->input->get('id');
 $result['data']=$this->User_Model->displayrecordsById($id);
 $this->load->view('update_records',$result); 
 
 if($this->input->post('update'))
 {
 $name=$this->input->post('name');
 $email=$this->input->post('email');
 $mobile=$this->input->post('mobile');
 $this->User_Model->updaterecords($name,$email,$mobile,$id);
 redirect("User/dispdata");
 }
 }
}