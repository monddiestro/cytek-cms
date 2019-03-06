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

        $about = $this->page_model->pull_page_meta(4);
        foreach($about as $a) {
            $title = $a->title;
            $keyword = $a->meta_keywords;
            $description = $a->meta_description;
            $img = base_url($a->meta_image);
        }
        $meta = $this->header_array($description,$keyword,$title,$img,base_url('about'));

        $data["company"] = $this->page_model->pull_company_data();
        $navigation["navs"] = $this->category_model->pull_subcategories();
        $navigation["page"] = "about";
        $footer["categories"] = $this->category_model->pull_categories();
        $footer["subcategories"] = $this->category_model->pull_subcategories();
        $footer["products"] = $this->product_model->pull_products();
        $footer["company"] = $this->page_model->pull_company_data();

        $this->load->view('header',$meta);
        $this->load->view('navigation',$navigation);
        $this->load->view('about',$data);
        $this->load->view('pre-footer',$footer);
        $this->load->view('script');
        $this->load->view('footer');
    }

    function header_array($description,$keyword,$title,$img,$url) {
        $header = array(
          'description' => $description,
          'keywords' => $keyword,
          'robots' => 'follow',
          'og_title' => $title,
          'og_description' => $description,
          'og_image' => base_url($img),
          'og_url' => $url,
          'cannonical' =>  $url,
          'title' =>  $title .' | News and Events | Cytek Solutions Inc.'
        );
        return $header;
      }
}
