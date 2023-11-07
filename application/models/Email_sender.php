<?php

class Email_sender extends CI_Model
{
	function send($subject, $to_email, $message)
	{

		$smtp_host = 'ssl://mail.platform-iot-occ.my.id';
		$smtp_port = '465';
		$smtp_user = 'admin@platform-iot-occ.my.id';
		$smtp_pass = 'Rizky201121!?';

		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = $smtp_host;
		$config['smtp_port'] = $smtp_port;
		$config['smtp_user'] = $smtp_user;
		$config['smtp_pass'] = $smtp_pass;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from($smtp_user);
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);
		//Send mail
		$this->email->send();
		return $this->email->print_debugger();
	}
}
