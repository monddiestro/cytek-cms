<?php 
class Events extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('category_model');
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
        }

        $navigation["navs"] = $this->category_model->pull_subcategories();
        $navigation["page"] = "events";
        $footer["categories"] = $this->category_model->pull_categories();
        $footer["subcategories"] = $this->category_model->pull_subcategories();

        $this->load->view('header',$meta);
        $this->load->view('navigation',$navigation);
        $this->load->view('event',$data);
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
          'title' =>  $title .' | Products | Cytek Solutions Inc.'
        );
        return $header;
      }
}
