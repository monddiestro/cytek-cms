<?php
class Admin extends CI_Controller
{
    function __construct() {
      parent::__construct();
      $this->load->model('category_model');
      $this->load->model('product_model');
      $this->load->model('user_model');
      $this->load->model('event_model');
    }

    function check_session() {
      if(empty($this->session->userdata('user_id'))) {
        redirect(base_url('admin'));
      }
    }

    function check_account() {
      $referer = $this->input->server('HTTP_REFERER');
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $user_cnt = $this->user_model->pull_user($email);
      if($user_cnt > 0) {
        // if user count is more than one check the password if match then return appropriate message to user
        $user = $this->user_model->pull_userdata($email,$password);
        if(empty($user)) {
          $notif = array(
            'message' => "<strong>Oops!</strong> Invalid Password",
            'class' => "danger"
          );
          $this->session->set_flashdata($notif);
          redirect($referer);
        } else {
          foreach ($user as $u) {
            $userdata = array(
              'user_id' => $u->user_id,
              'f_name' => $u->f_name,
              'l_name' => $u->l_name,
              'uac_id' => $u->uac_id,
              'email' => $u->email,
              'contact' => $u->contact
            );
            $this->session->set_userdata($userdata);
            redirect(base_url('admin/dashboard'));
          }
        }
      } else {
        // return invalid username message to user
        $notif = array(
          'message' => "<strong>Oops!</strong> Username doesn't exist",
          'class' => "danger"
        );
        $this->session->set_flashdata($notif);
        redirect($referer);
      } 

    }
    function logout() {
      session_destroy();
      redirect(base_url('admin'));
    }
    function index() {
        if(!empty($this->session->userdata('user_id'))) {
          redirect(base_url('admin/dashboard'));
        } else {
          $header = $this->header_array('','','','Admin Security Check | Cytek Solutions Inc.','',base_url('admin'));
          $this->load->view('header',$header);
          $this->load->view('login');
          $this->load->view('script');
          $this->load->view('footer');
        }
        
    }
    // header data 
    function header_array($description,$keywords,$robots,$title,$image,$url) {
      $header = array(
        'description' => $description,
        'keywords' => $keywords,
        'robots' => $robots,
        'og_title' => $title,
        'og_description' => $description,
        'og_image' => $image,
        'og_url' => $url,
        'cannonical' => $url,
        'title' => $title
      );
      return $header;
    }
    function dashboard() {

      $this->check_session(); // check if logged in
      // view data
      $header = $this->header_array('','','','Admin Dashboard | Cytek Solutions Inc.','',base_url('admin/dashboard'));
      $nav["page"] = "dashboard";
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin');
      $this->load->view('script');
      $this->load->view('footer');

    }
    // Category and Sub category CRUD
    function category() {
        // check session 
        $this->check_session();
      
        // header data
        $header = $this->header_array('','','','Admin Category | Cytek Solutions Inc.','',base_url('admin/category'));
        // admin-navigation data
        $nav["page"] = "category";
        // body data
        $body_data["categories"] = $this->category_model->pull_categories();
        $body_data["subcategories"] = $this->category_model->pull_subcategories();
        //view
        $this->load->view('header',$header);
        $this->load->view('admin-navigation',$nav);
        $this->load->view('category',$body_data);
        $this->load->view('script');
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
      // view data
      $header = $this->header_array('','','','Admin Products | Cytek Solutions Inc.','',base_url('admin/products'));
      $nav["page"] = "products";
      $body_data["products"] = $this->product_model->pull_products();
      $body_data["categories"] = $this->category_model->pull_categories();

      // load view
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-product',$body_data);
      $this->load->view('script');
      $this->load->view('admin-product-script');
      $this->load->view('footer');
    }

    function new_products() {

      $referer = $this->input->server('HTTP_REFERER');
      $cat_id = $this->input->post('cat_id');
      $subcat_id = $this->input->post('subcat_id');
      $meta_title = $this->input->post('meta_title');
      $meta_desc = $this->input->post('meta_desc');
      $meta_keywords = $this->input->post('meta_keywords');
      $meta_img = "";

      $config["upload_path"] = './utilities/images/meta';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('meta_img')) {
        $meta_img = 'utilities/images/meta/' . $this->upload->data('raw_name').$this->upload->data('file_ext');
      }

      $product = array(
        'cat_id' => $cat_id,
        'subcat_id' => $subcat_id,
        'prod_title' => $meta_title,
        'description' => $meta_desc,
        'keyword' => $meta_keywords,
        'img' => $meta_img,
        'date_created' => date('Y-m-d H:i:s')
      );

      $prod_id = $this->product_model->push_product($product);

      $specs = array(
        'prod_id' => $prod_id,
        'specs' => ''
      );
      // push specs of product and set to empty
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
      // product data
      $product = $this->product_model->pull_product($prod_id);

      foreach ($product as $p) {
        $prod_data = array(
          'prod_id' => $p->prod_id,
          'prod_title' => $p->prod_title,
          'description' => $p->description,
          'cat_id' => $p->cat_id,
          'cat_title' => $p->cat_title,
          'subcat_id' => $p->subcat_id,
          'subcat_title' => $p->subcat_title,
          'img' => $p->img,
          'keyword' => $p->keyword,
          'date_created' => $p->date_created
        );
      }

      $header = $this->header_array($prod_data["description"],$prod_data["keyword"],'',$prod_data["subcat_title"]. " " .$prod_data["prod_title"] . " | " . $prod_data["cat_title"] . " | Product Configuration" . " | Cytek Solutions Inc." ,base_url($prod_data["img"]),base_url('admin/config_product?id='.$prod_id));
      $nav["page"] = "products";

      $body["product"] = $prod_data;
      $body["categories"] = $this->category_model->pull_categories();
      $body["subcategories"] = $this->category_model->pull_subcategories();
      $body["features"] = $this->product_model->pull_features($prod_id);
      $body["feature_img"] = $this->product_model->pull_feature_img($prod_id);
      $body["specification"] = $this->product_model->pull_specs($prod_id);
      $body["banners"] = $this->product_model->pull_banners($prod_id);


      // load view
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('config-product',$body);
      $this->load->view('script');
      $this->load->view('footer');
    }

    function update_product_details() {
      $referer = $this->input->server('HTTP_REFERER');

      $prod_id = $this->input->post('prod_id');
      $prod_title = $this->input->post('prod_title');
      $description = $this->input->post('description');
      $cat_id = $this->input->post('cat_id');
      $subcat_id = $this->input->post('subcat_id');
      $keyword = $this->input->post('keyword');

      // image update 
      if(!empty($_FILES["user_image"]["name"])) {
        if($this->upload->do_upload('user_image')) {
          // check if has existing image 
          $old_image = $this->product_model->pull_product_img($prod_id);
          // new image
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $data = array(
            'img' => 'utilities/images/'.$filename
          );
          $this->product_model->push_product_update($data,$prod_id);
          // delete old
          if(!empty($old_image)) {
            unlink("./".$old_image);
          }
        }
      }
      // data array
      $data = array(
        'prod_title' => $prod_title,
        'description' => $description,
        'cat_id' => $cat_id,
        'subcat_id' => $subcat_id,
        'keyword' => $keyword,
        'date_created' => date('Y-m-d H:i:s')
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
  
      $data = array(
        'prod_id' => $prod_id,
        'title' => $title,
        'description' => $description
      );
      $this->product_model->push_feature($data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $title . " feature added to product"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function add_feature_img() {
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->post('prod_id');
      $feature_id = $this->input->post('feature_id');
      $title = $this->input->post('title');
      $img = "";
      $config["upload_path"] = './utilities/images/feature';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('meta_img')) {
        $img = "utilities/images/feature/". $this->upload->data('raw_name').$this->upload->data('file_ext');
      }
      $data = array(
        'feature_id' => $feature_id,
        'prod_id' => $prod_id,
        'img' => $img,
        'title' => $title
      );
      $this->product_model->push_feature_img($data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> New feature image added."
      );
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
        $subcategories_str .= $sc->subcat_title;
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
      if($this->upload->do_upload('meta_img')) {
        $banner = "utilities/images/banners/". $this->upload->data('raw_name').$this->upload->data('file_ext');
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

    function events() {
      $header = $this->header_array('','','','Admin Events | Cytek Solutions Inc.','',base_url('admin/events'));
      $nav["page"] = "events";
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-events');
      $this->load->view('script');
      $this->load->view('footer');
    }

    function new_event() {
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $content = $this->input->post('content');
      $event_date = $this->input->post('date');
      $img = "";

      $config["upload_path"] = './utilities/images/events';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('meta_img')) {
        $img = 'utilities/images/events/' . $this->upload->data('raw_name').$this->upload->data('file_ext');
      }

      $data = array(
        'title' => $title,
        'description' => $description,
        'content' => $content,
        'event_date' => date("Y-m-d",strtotime($event_date)),
        'img' => $img,
        'date_created' => date('Y-m-d H:i:s')
      );

      $this->event_model->push_new_event($data);

    }

    function users() {
      $header = $this->header_array('','','','Admin Users | Cytek Solutions Inc.','',base_url('admin/users'));
      $nav["page"] = "users";
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-users');
      $this->load->view('script');
      $this->load->view('footer');
    }
    function settings() {
      $header = $this->header_array('','','','Admin Settings | Cytek Solutions Inc.','',base_url('admin/settings'));
      $nav["page"] = "settings";
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-settings');
      $this->load->view('script');
      $this->load->view('footer');
    }

}
