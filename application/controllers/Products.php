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
    // get data
    $product_id = $this->input->get('p');
    $category_id = $this->input->get('c');
    $category_desc = $this->input->get('category');
    $subcategory_id = $this->input->get('s');
    if(!empty($category_id)) {
      // get headers
      $header = $this->header_meta($this->category_model->pull_category_headers($category_id));
      $data["data"] = $this->category_model->pull_category_subcategories($category_id);
      $data["category_desc"] = $category_desc;
      $data["submenu"] = $this->category_model->pull_subcategories();
      $data["selected_category"] = $category_id;
    } elseif (!empty($subcategory_id)) {
      
    } elseif (!empty($product_id)) {

    } else {

    }
    $this->load->view('header',$header);
    $navigation["navs"] = $this->category_model->pull_subcategories();
    $this->load->view('navigation',$navigation);
    $this->load->view('product',$data);
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

  function header_meta($data) {
    $header = array();
    foreach ($data as $d) {
      $header = array(
        'description' => $d->meta_desc,
        'keywords' => $d->meta_keywords,
        'robots' => 'follow',
        'og_title' => $d->meta_title,
        'og_description' => $d->meta_desc,
        'og_image' => base_url('utilities/images/meta/'.$d->meta_img),
        'og_url' => current_url(),
        'cannonical' =>  current_url(),
        'title' =>  $d->cat_desc .' | Products | Cytek Solutions Inc.'
      );
    }
    return $header;
  }

}
