<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		if($this->input->is_ajax_request()){

			$from = $this->input->post('email'). ' Name: '.$this->input->post('name') ;
		    $subject = $this->input->post('subject');
		    $message = $this->input->post('message');
		    // message lines should not exceed 70 characters (PHP rule), so wrap it
		    $message = wordwrap($message, 70);
		    // send mail
		    mail("itmedved@gmail.com",$subject,$message,"From: $from\n");

			echo json_encode(array('success'=>1));
			die();
		}

		// $data['result_one'] = $this->Startup->get_first_result();
		// $data['result_two'] = $this->Startup->get_second_result();

		$this->load->view('welcome_message');
	}

	public function contact(){
		echo "string";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */