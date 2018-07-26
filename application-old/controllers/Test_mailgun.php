<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_mailgun extends CI_Controller {
    public function mailgun()
    {
        $this->load->library('email');

        $config = Array(
            'protocol'      => 'mailgun',
            'smtp_host'     => 'smtp.mailgun.org',
            'smtp_port'     => 587,
            'smtp_user'     => 'postmaster@mg.gositus.com',
            'smtp_pass'     => '294f2cf5ee9abaea3ea0b52c0446da02',
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n", 
            'validation'    => TRUE, // bool whether to validate email or not  
            'smtp_timeout'  => '7'
        ); 
        $this->email->initialize($config);
        
        $this->email->set_newline("\r\n");
        
        $this->email->clear();
        
        $this->email->from('ratih@gositus.com', 'GO Online Solusi');
        $this->email->reply_to('ratih@gositus.com', 'GO Online Solusi');
        $this->email->to('ratih@gositus.com');
         $this->email->cc('ratih@gositus.com, ratih@gositus.com');
         $this->email->bcc('ratih@gositus.com, ratih@gositus.com'); 
        $this->email->subject('testing');
        
        $this->email->message('<p style="color: red;">testing</p>');
       // $this->email->attach('upload/alur-validasi-ppds.pdf');
        // $this->email->attach('images/public/start-project.jpg');
        // $this->email->attach('images/public/start-project.jpg');


        $this->email->send();
    }
}
