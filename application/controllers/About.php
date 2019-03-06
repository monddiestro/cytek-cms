<?php 
class About extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('page_model');
    }

    function index () {


        $navigation["navs"] = $this->category_model->pull_subcategories();
        $navigation["page"] = "events";
        $footer["categories"] = $this->category_model->pull_categories();
        $footer["subcategories"] = $this->category_model->pull_subcategories();
        $footer["products"] = $this->product_model->pull_products();
        $footer["company"] = $this->page_model->pull_company_data();

        $this->load->view('header',$meta);
        $this->load->view('navigation',$navigation);
        $this->load->view('about');
        $this->load->view('pre-footer',$footer);
        $this->load->view('script');
        $this->load->view('footer');
    }
}
