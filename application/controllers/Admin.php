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
        $body_data["categories"] = $this->category_model->pull_categories();
        $body_data["subcategories"] = $this->category_model->pull_subcategories();
        $this->load->view('category',$body_data);
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
    function new_subcategory() {
      $referer = $this->input->server('HTTP_REFERER');
      $subcat_desc = $this->input->post('subcategory');
      $cat_id = $this->input->post('cat_id');
      $cat_desc = $this->input->post('cat_desc');
      $data = array (
        'subcat_desc' => $subcat_desc,
        'cat_id' => $cat_id
      );
      $this->category_model->push_subcategory($data);
      // result alert
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> ".$subcat_desc." added to ". $cat_desc . " subcategory"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function drop_category() {
      $referer = $this->input->server('HTTP_REFERER');
      $cat_id = $this->input->post('cat_id');
      $cat_desc = $this->input->post('cat_desc');
      $this->category_model->drop_category($cat_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> ".$cat_desc." removed to database including subcategories"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function drop_subcategory() {
      $referer = $this->input->server('HTTP_REFERER');
      $subcat_id = $this->input->post('subcat_id');
      $subcat_desc = $this->input->post('subcat_desc');
      $this->category_model->drop_subcategory($subcat_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> ".$subcat_desc." removed from subcategories"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function modify_category() {
      $referer = $this->input->server('HTTP_REFERER');
      $cat_id = $this->input->post('cat_id');
      $cat_desc = $this->input->post('cat_desc');
      $data = array(
        'cat_desc' => $cat_desc
      );
      $this->category_model->update_category($cat_id,$data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Category updated"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function modify_subcategory() {
      $referer = $this->input->server('HTTP_REFERER');
      $subcat_id = $this->input->post('subcat_id');
      $subcat_desc = $this->input->post('subcat_desc');
      $data = array(
        'subcat_desc' => $subcat_desc
      );
      $this->category_model->update_subcategory($subcat_id,$data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Sub Category updated"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

}
