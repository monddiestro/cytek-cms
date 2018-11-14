<?php
class Admin extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
    $this->load->model('product_model');
	}
    function index() {
        $this->load->view('header');
        $this->load->view('admin-navigation');
        $this->load->view('admin');
        $this->load->view('pre-footer');
        $this->load->view('footer');
    }
    // Category and Sub category CRUD
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
        // admin-navigation data
        $nav["active"] = "category";
        $this->load->view('admin-navigation',$nav);
        // body data
        $body_data["categories"] = $this->category_model->pull_categories();
        $body_data["subcategories"] = $this->category_model->pull_subcategories();
        $this->load->view('category',$body_data);
        $this->load->view('pre-footer');
        $this->load->view('category-script');
        $this->load->view('footer');
    }
    function new_category() {
        $referer = $this->input->server('HTTP_REFERER');
        $category_name = $this->input->post('category_name');
        $meta_title = $this->input->post('meta_title');
        $meta_keywords = $this->input->post('meta_keywords');
        $meta_desc = $this->input->post('meta_desc');
        $meta_img = "";

        $config["upload_path"] = './utilities/images/meta';
        $config["allowed_types"] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('meta_img')) {
          $meta_img = $this->upload->data('raw_name').$this->upload->data('file_ext');
        }

        $data = array(
            'cat_desc' => $category_name,
            'meta_title' => $meta_title,
            'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_img' => $meta_img
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
    function sub_category() {
      $cat_id = $this->input->post('cat_id');
      $subcategories = $this->category_model->pull_category_subcategories($cat_id);
      $option = "";
      foreach ($subcategories as $sc) {
        $option .= "<option value='".$sc->subcat_id."'>" . $sc->subcat_desc . "</option>";
      }
      echo $option;
    }
    // End
    // Products CRUD
    function products() {
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
          'title' => 'Cytek Solutions Inc. | Product'
      );
      $this->load->view('header',$header);
      // admin-navigation data
      $nav["active"] = "products";
      $this->load->view('admin-navigation',$nav);
      // body data
      $body_data["products"] = $this->product_model->pull_products();
      $body_data["categories"] = $this->category_model->pull_categories();
      $this->load->view('admin-product',$body_data);
      $this->load->view('pre-footer');
      $this->load->view('admin-product-script');
      $this->load->view('footer');
    }
    function new_products() {
      $referer = $this->input->server('HTTP_REFERER');
      $cat_id = $this->input->post('cat_id');
      $subcat_id = $this->input->post('subcat_id');
      $prod_name = $this->input->post('prod_name');
      $prod_desc = $this->input->post('prod_desc');
      $meta_title = $this->input->post('meta_title');
      $meta_desc = $this->input->post('meta_desc');
      $meta_keywords = $this->input->post('meta_keywords');
      $meta_img = "";

      $config["upload_path"] = './utilities/images/meta';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('meta_img')) {
        $meta_img = $this->upload->data('raw_name').$this->upload->data('file_ext');
      }

      $product = array(
        'prod_name' => $prod_name,
        'prod_desc' => $prod_desc,
        'cat_id' => $cat_id,
        'subcat_id' => $subcat_id,
        'meta_title' => $meta_title,
        'meta_desc' => $meta_desc,
        'meta_keyword' => $meta_keywords,
        'meta_img' => $meta_img
      );
      $prod_id = $this->product_model->push_product($product);
      $specs = array(
        'prod_id' => $prod_id,
        'specs' => ''
      );
      $this->product_model->push_specs($specs);
      // result alert
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $prod_name . " added to database."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function config_product() {
      $prod_id = $this->input->get('id');
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
          'title' => 'Cytek Solutions Inc. | Product'
      );
      $this->load->view('header',$header);
      // admin-navigation data
      $nav["active"] = "products";
      $this->load->view('admin-navigation',$nav);
      // body data
      $product = $this->product_model->pull_product($prod_id);
      $categories = $this->category_model->pull_categories();
      $subcategories = $this->category_model->pull_subcategories();
      $specification = $this->product_model->pull_specs($prod_id);
      foreach ($product as $p) {
        $detail = array (
          'prod_id' => $p->prod_id,
          'prod_name' => $p->prod_name,
          'prod_desc' => $p->prod_desc,
          'cat_id' => $p->cat_id,
          'subcat_id' => $p->subcat_id,
          'meta_title' => $p->meta_title,
          'meta_desc' => $p->meta_desc,
          'meta_img' => $p->meta_img,
          'meta_keyword' => $p->meta_keyword,
          'specs' => $specification
        );
      }
      $body["product"] = $detail;
      $body["categories"] = $categories;
      $body["subcategories"] = $subcategories;
      $body["features"] = $this->product_model->pull_features($prod_id);
      $body["specification"] = $specification;
      $body["banners"] = $this->product_model->pull_banners($prod_id);
      $this->load->view('config-product',$body);
      $this->load->view('pre-footer');
      $this->load->view('config-product-script');
      $this->load->view('footer');
    }
    function update_product_meta() {
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->post('prod_id');
      $meta_title = $this->input->post('meta_title');
      $meta_desc = $this->input->post('meta_desc');
      $meta_keyword = $this->input->post('meta_keyword');
      // image update
      if($_FILES["meta_img"]["size"] != 0) {
        $old_meta_img = $this->product_model->pull_meta_img($prod_id);
        $config["upload_path"] = './utilities/images/meta';
        $config["allowed_types"] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('meta_img')) {
          $meta_img = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $data = array('meta_img' => $meta_img);
          // upload new and update db
          $this->product_model->push_product_update($data,$prod_id);
          // delete old pic
          $dir = "utilities/images/meta/".$old_meta_img;
          unlink($dir);
        }
      }
      $data = array (
        'meta_title' => $meta_title,
        'meta_desc' => $meta_desc,
        'meta_keyword' => $meta_keyword
      );
      $this->product_model->push_product_update($data,$prod_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Product meta updated"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function update_product_details() {
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->post('prod_id');
      $prod_name = $this->input->post('prod_name');
      $prod_desc = $this->input->post('prod_desc');
      $cat_id = $this->input->post('cat_id');
      $subcat_id = $this->input->post('subcat_id');
      // data array
      $data = array(
        'prod_name' => $prod_name,
        'prod_desc' => $prod_desc,
        'cat_id' => $cat_id,
        'subcat_id' => $subcat_id
      );
      $this->product_model->push_product_update($data,$prod_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Product details updated"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function drop_product() {
    }
    // product feature
    function add_feature() {
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->post('prod_id');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $image = "";
      $config["upload_path"] = './utilities/images/product_src';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('image')) {
        $image = $this->upload->data('raw_name').$this->upload->data('file_ext');
      }
      // data
      $data = array(
        'prod_id' => $prod_id,
        'feature_title' => $title,
        'feature_desc' => $description,
        'feature_img' => $image
      );
      $this->product_model->push_feature($data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $title . " feature added to product"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function drop_feature() {
      $referer = $this->input->server('HTTP_REFERER');
      $feature_id = $this->input->get('id');
      $this->product_model->drop_feature($feature_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Product feature removed"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function update_specs() {
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->post('prod_id');
      $prod_specs = $this->input->post('prod_specs');
      $specs = array(
        'specs' => $prod_specs
      );
      $this->product_model->push_update_specs($prod_id,$prod_specs);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Product specification updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    // ajax request
    function pull_subcategories() {
      $cat_id = $this->input->post('cat_id');
      $subcategories = $this->category_model->pull_category_subcategories($cat_id);
      $subcategories_str = "";
      foreach ($subcategories as $sc) {
        $subcategories_str .= '<option value="'.$sc->subcat_id.'">';
        $subcategories_str .= $sc->subcat_desc;
        $subcategories_str .= '</option>';
      }
      echo $subcategories_str;
    }
    function add_banner() {
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->post('prod_id');
      $banner = "";
      $config["upload_path"] = './utilities/images/banners';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('image')) {
        $banner = $this->upload->data('raw_name').$this->upload->data('file_ext');
      }
      $data = array(
        'prod_id' => $prod_id,
        'image_path' => $banner
      );
      $this->product_model->push_banner($data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> New banner image added to product."
      );
      redirect($referer);
    }

    function drop_banner() {
      $referer = $this->input->server('HTTP_REFERRER');
      $banner_id = $this->input->get('id');
      $image_name = $this->product_model->pull_banner($banner_id);
      $dir = "utilities/images/banners/".$image_name;
      unlink($dir);
      $this->product_model->drop_banner($banner_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $image_name . " remove from product banner"
      );
      redirect($referer);
    }

}
