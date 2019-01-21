<?php
class User extends CI_Controller 
{
 public function __construct()
 {
 //call CodeIgniter's default Constructor
 parent::__construct();
 
 //load database libray manually
 $this->load->database();
 
 //load Model
 $this->load->model('User_Model');
 }
 
 public function savedata()
 {
 //load registration view form
 $this->load->view('registration');
 
 //Check submit button 
 if($this->input->post('save'))
 {
 //get form's data and store in local varable
 $name=$this->input->post('name');
 $email=$this->input->post('email');
 $mobile=$this->input->post('mobile');
 
//call saverecords method of User_Model and pass variables as parameter
 $this->User_Model->saverecords($name,$email,$mobile); 
 echo "Records Saved Successfully";
 redirect("Hello/dispdata");  
 }
 }
 public function dispdata()
 {
 	$result['data']=$this->User_Model->displayrecords();
 $this->load->view('registration',$result);
 //print_r($result);
 //print_r($result);

 }
 public function deletedata()
 {
 $id=$this->input->get('id');
 $this->Hello_Model->deleterecords($id);
 redirect("Hello/dispdata");
}
}
?>


