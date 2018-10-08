<?php
class Admin extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}
    function index() {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('admin');
        $this->load->view('pre-footer');
        $this->load->view('footer');
    }
    function category() {
        // header data
        $header = array(
            'description' => '',
            'keywords' => '',
            'robots' => '',
            'og_title' => '',
            'og_description' => '',
            'og_image' => '',
            'og_url' => '',
            'og_type' => '',
            'cannonical' => '',
            'title' => 'Cytek Solutions Inc. | Product Category'
        );
        $this->load->view('header',$header);
        // navigation data
        $this->load->view('navigation');
        // body data
        $this->load->view('category');
        $this->load->view('pre-footer');
        $this->load->view('footer');
    }
    function new_category() {
        $referer = $this->input->server('HTTP_REFERER');
        $category_name = $this->input->post('category_name');
        $data = array(
            'cat_desc' => $category_name
        );
        $this->category_model->push_category($data);
        // result alert
        $result_data = array(
          'class' => "success",
          'message' => "<strong>Success!</strong> New category added to database"
        );
        $this->session->set_flashdata('result',$result_data);
        redirect($referer);
    }


}
