<?php
class Inquiry extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('inquiry_model');
    }

    function new_lead() {

        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $company = $this->input->post('company_name');
        $department = $this->input->post('department');
        $position = $this->input->post('position');
        $message = $this->input->post('message');
        $source = $this->input->post('source');

        $data = array(
            'name' => $name,
            'contact' => $contact,
            'email' => $email,
            'company_name' => $company,
            'department' => $department,
            'position' => $position,
            'message' => $message,
            'status' => 1,
            'source' => $source,
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->inquiry_model->push_lead($data);
        
        
    }
}
