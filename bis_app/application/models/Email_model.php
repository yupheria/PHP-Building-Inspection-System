<?php

class Email_model extends CI_Model {
        function sendEmail($email_address, $password){
                        $config = array(
                                'protocol'  => 'smtp',
                                'smtp_host' => 'ssl://smtp.googlemail.com',
                                'smtp_user' => 'bjoern@capitalplanning.co.nz',
                                'smtp_pass' => 'today1234',
                                'smtp_port' => 465
                                        );                     
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Bjorn');
                        $this->email->to($email_address);

                        $this->email->subject('BIS Password Reset');
                        
                        $message = "Your new password is: \r\n".$password;
                        $this->email->message($message);
                        
                        $this->email->send();
        }
        function sendEmailMessage($email_address, $message){
                        $config = array(
                                'protocol'  => 'smtp',
                                'smtp_host' => 'ssl://smtp.googlemail.com',
                                'smtp_user' => 'bjoern@capitalplanning.co.nz',
                                'smtp_pass' => 'today1234',
                                'smtp_port' => 465
                                        );                     
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Bjorn');
                        $this->email->to($email_address);

                        $this->email->subject('BIS Password Changed');
                                             
                        $this->email->message($message);
                        
                        if (!$this->email->send())
                        //show_error($this->email->print_debugger());
                        return false;        
                        else
                        return true;
        }
        function sendEmailNotification($email_address, $message){
                        $config = array(
                                'protocol'  => 'smtp',
                                'smtp_host' => 'ssl://smtp.googlemail.com',
                                'smtp_user' => 'bjoern@capitalplanning.co.nz',
                                'smtp_pass' => 'today1234',
                                'smtp_port' => 465
                                        );                     
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Bjorn');
                        $this->email->to($email_address);

                        $this->email->subject('BIS Membership');
                                             
                        $this->email->message($message);
                        
                        if (!$this->email->send()) {
                        //show_error($this->email->print_debugger());
                        return false;        
                        } else {
                        return true;
                        }
        }
}
?>
