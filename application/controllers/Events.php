<?php 
class Events extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('page_model');
    }

    function index() {
        $id = $this->input->get('id');

        if(!empty($id)) {
            $event = $this->event_model->pull_event($id);
            foreach($event as $e) {
                $title = $e->title;
                $keyword = $e->keyword;
                $description = $e->description;
                $content = $e->content;
                $img = base_url($e->img);
                $date = $e->event_date;
                $date_created = $e->date_created;
                $url = base_url('event?id='.$id);
            }
            $meta = $this->header_array($description,$keyword,$title,$img,$url);
            $data["title"] = $title;
            $data["descripton"] = $description;
            $data["content"] = $content;
            $data["img"] = $img;
            $data["date"] = date("F d, Y",strtotime($date));
            $view = "event";
        } else {
            $event = $this->page_model->pull_page_meta(3);
            foreach($event as $e) {
                $title = $e->title;
                $keyword = $e->meta_keywords;
                $description = $e->meta_description;
                $img = base_url($e->meta_image);
            }
            $meta = $this->header_array($description,$keyword,$title,$img,base_url('events'));
            $data["title"] = $title;
            $data["descripton"] = $description;
            $data["img"] = $img;
            $data["events"] = $this->event_model->pull_events();
            $data["page_description"] = $this->page_model->pull_description(3);
            $view = "event-catalog";
        }

        $navigation["navs"] = $this->category_model->pull_subcategories();
        $navigation["page"] = "events";
        $footer["categories"] = $this->category_model->pull_categories();
        $footer["subcategories"] = $this->category_model->pull_subcategories();
        $footer["products"] = $this->product_model->pull_products();
        $footer["company"] = $this->page_model->pull_company_data();

        $this->load->view('header',$meta);
        $this->load->view('navigation',$navigation);
        $this->load->view($view,$data);
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
