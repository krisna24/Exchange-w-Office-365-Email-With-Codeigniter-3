

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Email extends CI_Controller {
 
    public function index()
    {
        $this->load->library('email');
 
        $account_name = 'Your name';
        $outlook_account_username = 'Username';
        $outlook_account_password = 'pass';
        $to = 'Email to';
        $subject = 'Hello this email send from my webserver';
        $body = 'Testing';
 
        $config['smtp_crypto'] = 'smtp';
        $config['SMTPSecure'] = 'starttls';
        $config['protocol'] = "smtp";
        $config['smtp_host'] = 'mail.exchange.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = $outlook_account_username;
        $config['smtp_pass'] = $outlook_account_password;
        $config['mailtype'] = 'mime';
        $config['charset']  = 'utf-8';
        $config['smtp_auth'] = TRUE;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n"; 
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($account_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->send();
       
        $debug = $this->email->print_debugger();
        print_r($debug);
    }
     
}