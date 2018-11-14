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
    $navigation["navs"] = $this->category_model->pull_subcategories();
    $this->load->view('navigation',$navigation);
    $this->load->view('product');
    $this->load->view('pre-footer');
    $this->load->view('footer');
  }
  function category() {
    $subcat_desc = $this->input->get('sub_category');
    $id = $this->input->get('id');

    if(empty($subcat_desc)) {
      // show category page with products
    } else {
      // show subcategory with products
    }

  }
  function sub_category_page($subcat_id) {
    // header data
    $header = array(
        'description' => 'Lorem Ipsum Dolor',
        'keywords' => '',
        'robots' => 'yes',
        'og_title' => '',
        'og_description' => '',
        'og_image' => '',
        'og_url' => '',
        'og_type' => '',
        'cannonical' => '',
        'title' => 'Cytek Solutions Inc. | Products'
    );
    $this->load->view('header',$header);
    $navigation["navs"] = $this->category_model->pull_subcategories();
    $this->load->view('navigation',$navigation);
    $this->load->view('product');
    $this->load->view('pre-footer');
    $this->load->view('footer');
  }

}
