<?php  
class Home extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
        $this->load->model('category_model');
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
        // header data
        $this->load->view('header',$meta);
        $navigation["navs"] = $this->category_model->pull_subcategories();
        $this->load->view('navigation',$navigation);
        $body_data["categories"] = $this->category_model->pull_categories();
        $this->load->view('home',$body_data);
        $this->load->view('pre-footer');
        $this->load->view('script');
        $this->load->view('footer');
    }
}
