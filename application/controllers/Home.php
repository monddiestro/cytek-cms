<?php  
class Home extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('event_model');
    }
    function index() {
        $metas = $this->page_model->pull_page_meta(1);

        foreach ($metas as $meta) {
            $meta = array(
                'description' => $meta->meta_description,
                'keywords' => $meta->meta_keywords,
                'robots' => 'follow',
                'og_title' => $meta->title,
                'og_description' => $meta->meta_description,
                'og_image' => $meta->meta_image,
                'og_url' => base_url(),
                'cannonical' => base_url(),
                'title' => $meta->title .' | Cytek Solutions Inc.' 
            );
        }
        // data
        
        $navigation["navs"] = $this->category_model->pull_subcategories();
        $navigation["page"] = "";
        $body_data["categories"] = $this->category_model->pull_categories();
        $body_data["featured"] = $this->product_model->pull_products_featured();
        $body_data["events"] = $this->event_model->pull_events();
        $body_data["slider"] = $this->page_model->pull_slider();
        
        $footer["categories"] = $this->category_model->pull_categories();
        $footer["subcategories"] = $this->category_model->pull_subcategories();
        $footer["products"] = $this->product_model->pull_products();

        // load view
        $this->load->view('header',$meta);
        $this->load->view('navigation',$navigation);
        $this->load->view('home',$body_data);
        $this->load->view('pre-footer',$footer);
        $this->load->view('script');
        $this->load->view('footer');
    }
}
