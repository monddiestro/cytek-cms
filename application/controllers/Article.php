<?php
class Article extends CI_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('page_model');
    }

    function index() {
        $id = $this->input->get('id');

        if(!empty($id)) {
            $article = $this->article_model->pull_article($id);
            foreach($article as $a) {
                $title = $a->title;
                $keyword = $a->keyword;
                $description = $a->description;
                $content = $a->content;
                $img = base_url($a->img);
                $date_created = $a->date_created;
                $url = base_url('event?id='.$id);
            }
            $meta = $this->header_array($description,$keyword,$title,$img,$url);
            $data["article_id"] = $id;
            $data["title"] = $title;
            $data["descripton"] = $description;
            $data["content"] = $content;
            $data["img"] = $img;
            $data["articles"] = $this->article_model->pull_articles();
            $data["date"] = date("F d, Y",strtotime($date_created));
            $view = "article";
        } else {
            $article = $this->page_model->pull_page_meta(5);
            foreach($article as $a) {
                $title = $a->title;
                $keyword = $a->meta_keywords;
                $description = $a->meta_description;
                $img = base_url($a->meta_image);
            }
            $meta = $this->header_array($description,$keyword,$title,$img,base_url('article'));
            $data["title"] = $title;
            $data["descripton"] = $description;
            $data["img"] = $img;
            $data["articles"] = $this->article_model->pull_articles();
            $data["page_description"] = $this->page_model->pull_description(5);
            $view = "article-catalog";
        }


        $navigation["navs"] = $this->category_model->pull_subcategories();
        $navigation["page"] = "articles";
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
          'title' =>  $title .' | Articles & Blogs | Cytek Solutions Inc.'
        );
        return $header;
      }
}
