<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail_ctr extends CI_Controller {

 public function index()
 {
  $this->load->view('sendemail');
 }

 public function send()
 {
  $subject = 'Application for Programmer Registration By - ' . $this->input->post("name");

  $message = '
<h3 align="center">Programmer Details</h3>
   <table border="1" width="100%" cellpadding="5">
    <tr>
     <td width="30%">Name</td>
     <td width="70%">'.$this->input->post("name").'</td>
    </tr>
    <tr>
     <td width="30%">Address</td>
     <td width="70%">'.$this->input->post("address").'</td>
    </tr>
    <tr>
     <td width="30%">Email Address</td>
     <td width="70%">'.$this->input->post("email").'</td>
    </tr>
    <tr>
     <td width="30%">Experience Year</td>
     <td width="70%">'.$this->input->post("experience").'</td>
    </tr>
    <tr>
     <td width="30%">Phone Number</td>
     <td width="70%">'.$this->input->post("mobile").'</td>
    </tr>
    <tr>
     <td width="30%">Additional Information</td>
     <td width="70%">'.$this->input->post("additional_information").'</td>
    </tr>
   </table>';
   
   //config email settings
   $config['protocol'] = 'smtp';
   $config['smtp_host'] = 'smtp.gmail.com';
   $config['smtp_port'] = '587';
   $config['smtp_user'] = 'deejungd@deejungdelivery.com';
   $config['smtp_pass'] = '1@dvlsrPY24';  //sender's password
   $config['mailtype'] = 'html';
   $config['charset'] = 'utf-8';
   $config['wordwrap'] = 'TRUE';
   $config['smtp_crypto'] = 'tls';
   $config['newline'] = "\r\n";

   //$file_path = 'uploads/' . $file_name;
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('deejungd@deejungdelivery.com');
      $this->email->to($this->input->post("email"));
      $this->email->subject($subject);
      $this->email->message($message);
    
         if($this->email->send()==true)
         {
          echo '1';
         }
         else
         {
            echo '2';
         }
     }
    
 }



//  function upload_file()
//  {
//   $config['upload_path'] = 'uploads/admin';
//   $config['allowed_types'] = 'doc|docx|pdf';
//   $this->load->library('upload', $config);
//   if($this->upload->do_upload('resume'))
//   {
//    return $this->upload->data();   
//   }
//   else
//   {
//    return $this->upload->display_errors();
//   }
//  }

