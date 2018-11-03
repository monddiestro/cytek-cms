<?php
/**
 *
 */
class Products extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
		$this->load->model('category_model');
    $this->load->model('product_model');
  }

  function index() {
    // header data
    $header = array(
        'description' => 'Lorem Ipsum Dolor',
        'keywords' => '',
        'robots' => '',
        'og_title' => '',
        'og_description' => '',
        'og_image' => '',
        'og_url' => '',
        'og_type' => '',
        'cannonical' => '',
        'title' => 'Cytek Solutions Inc. | Products'
    );
    $this->load->view('header',$header);
    $navigation = 
    $this->load->view('navigation');
    $this->load->view('product');
    $this->load->view('pre-footer');
    $this->load->view('footer');
  }

}
