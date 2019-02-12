<?php
/**
 *
 */
class Product extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
		$this->load->model('category_model');
    $this->load->model('product_model');
  }

  function index() {
    // get data
    echo $product_id = $this->input->get('id');

    // $this->load->view('header',$header);
    // $navigation["navs"] = $this->category_model->pull_subcategories();
    // $this->load->view('navigation',$navigation);
    // $this->load->view('product',$data);
    // $this->load->view('pre-footer');
    // $this->load->view('footer');
  }
  function category() {

    $subcategory = $this->uri->segment(3);
    $item = $this->uri->segment(4);

    if(empty($subcategory)) {
      $category_id = $this->input->get('id');
      $url = base_url('products/category?id='.$category_id);
      $category_data = $this->category_model->pull_category($category_id);
      foreach($category_data as $d) {
        $header_data = array (
          'cat_id' => $d->cat_id,
          'cat_title' => $d->cat_title,
          'description' => $d->description,
          'img' => $d->img,
          'keyword' => $d->keyword
        );
        
      }
      // data
      $header = $this->header_array($header_data["description"],$header_data["keyword"],$header_data["cat_title"]. " Category",$header_data["img"],$url);
      $navigation["navs"] = $this->category_model->pull_subcategories();
      $navigation["page"] = "products";
      $data["data"] = $this->category_model->pull_category_subcategories($category_id);
      $data["cat_title"] = $header_data["cat_title"];
      $data["description"] = $header_data["description"];
      $data["submenu"] = $this->category_model->pull_subcategories();
      $data["selected"] = $category_id;
      $view = "product-category";

    } elseif(!empty($item)) {

      $product_id = $this->input->get('id');
      $url = base_url('products/category/subcategory?id='.$item);
      $product_data = $this->product_model->pull_product($product_id);
      foreach($product_data as $d) {
        $header_data = array(
          'prod_id' => $d->prod_id,
          'title' => $d->prod_title,
          'description' => $d->description,
          'img' => $d->img,
          'keyword' => $d->keyword,
          'cat_id' => $d->cat_id,
          'cat_title' => $d->cat_title,
          'subcat_id' => $d->subcat_id,
          'subcat_title' => $d->subcat_title
        );
      }
      // data
      $header = $this->header_array($header_data["description"],$header_data["keyword"],$header_data["title"],$header_data["img"],$url);
      $navigation["navs"] = $this->category_model->pull_subcategories();
      $navigation["page"] = "products";
      $data["data"] = $this->category_model->pull_subcategory_product($header_data["subcat_id"]);
      $data["cat_id"] = $header_data["cat_id"];
      $data["cat_title"] = $header_data["cat_title"];
      $data["subcat_id"] = $header_data["subcat_id"];
      $data["subcat_title"] = $header_data["subcat_title"];
      $data["prod_id"] = $header_data["prod_id"];
      $data["prod_title"] = $header_data["title"];
      $data["description"] = $header_data["description"];
      $data["banners"] = $this->product_model->pull_banners($header_data["prod_id"]);
      $data["features"] = $this->product_model->pull_features($header_data["prod_id"]);
      $view = "product-item";

    } else {

      $id = $this->input->get('id');
      $url = base_url('products/category/subcategory?id='.$id);
      $subcategory_data = $this->category_model->pull_subcategory($id);
      foreach($subcategory_data as $d) {
        $header_data = array(
          'cat_id' => $d->cat_id,
          'cat_title' => $d->cat_title,
          'subcat_id' => $d->subcat_id,
          'subcat_title' => $d->subcat_title,
          'description' => $d->description,
          'keyword' => $d->keyword,
          'img' => $d->img
        );
      }
      $header = $this->header_array($header_data["description"],$header_data["keyword"],$header_data["subcat_title"]. " | " . $header_data["cat_title"] . " Category | " ,$header_data["img"],$url);
      $navigation["navs"] = $this->category_model->pull_subcategories();
      $navigation["page"] = "products";
      $data["data"] = $this->category_model->pull_subcategory_product($id);
      $data["subcat_title"] = $header_data["subcat_title"];
      $data["description"] = $header_data["description"];
      $data["submenu"] = $this->category_model->pull_subcategories();
      $data["selected"] = $header_data["cat_id"];
      $data["category"] = $header_data["cat_title"];
      $data["selected_subcat"] = $id;
      $view= "product-subcategory";
    }

    //load views
    $this->load->view('header',$header);
    $this->load->view('navigation',$navigation);
    $this->load->view($view,$data);
    $this->load->view('pre-footer');
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
