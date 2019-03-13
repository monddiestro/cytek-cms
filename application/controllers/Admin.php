<?php
class Admin extends CI_Controller
{
    function __construct() {
      parent::__construct();
      $this->load->model('category_model');
      $this->load->model('product_model');
      $this->load->model('user_model');
      $this->load->model('event_model');
      $this->load->model('article_model');
      $this->load->model('inquiry_model');
      $this->load->model('page_model');    
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
              'contact' => $u->contact,
              'image' => $u->img
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
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();
      $data["inquiry"] = $this->inquiry_model->pull_new_lead();
      $data["inquiry_cnt"] = $this->inquiry_model->pull_new_lead_cnt();
      $data["category"] = $this->category_model->pull_category_cnt();
      $data["subcategory"] = $this->category_model->pull_subcategory_cnt();
      $data["product"] = $this->product_model->pull_product_cnt();
      $data["event"] = $this->event_model->pull_events_count();
      $data["users"] = $this->user_model->pull_users();

      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin',$data);
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
        $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();
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
      $description = $this->input->post('description');
      $cat_id = $this->input->post('cat_id');
      $subcat_title = $this->input->post('subcat_title');
      $keyword = $this->input->post('keyword');
      $img = "";
      if(!empty($_FILES["meta_img"]["name"])) {
        $config["upload_path"] = './utilities/images/meta';
        $config["allowed_types"] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('meta_img')) {
          // new image
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $img = 'utilities/images/meta/'.$filename;
        }
      }

      $data = array (
        'subcat_title' => $subcat_title,
        'description' => $description,
        'keyword' => $keyword,
        'cat_id' => $cat_id,
        'img' => $img
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
      $cat_title = $this->input->post('cat_title');
      $cat_desc = $this->input->post('description');
      $keyword = $this->input->post('keyword');

      $data = array(
        'cat_title' => $cat_title,
        'description' => $cat_desc,
        'keyword' => $keyword
      );
      $this->category_model->update_category($cat_id,$data);

      if(!empty($_FILES["meta_img"]["name"])) {
        $config["upload_path"] = './utilities/images/meta';
        $config["allowed_types"] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('meta_img')) {
          // check if has existing image 
          $old_image = $this->category_model->pull_image($cat_id);
          // new image
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $data = array(
            'img' => 'utilities/images/meta/'.$filename
          );
          $this->category_model->update_category($cat_id,$data);
          // delete old
          if(!empty($old_image)) {
            unlink("./".$old_image);
          }
        }
      }

      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Category updated"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    function modify_subcategory() {
      $referer = $this->input->server('HTTP_REFERER');
      $cat_id = $this->input->post('cat_id');
      $subcat_id = $this->input->post('subcat_id');
      $subcat_title = $this->input->post('subcat_title');
      $subcat_desc = $this->input->post('description');
      $keyword = $this->input->post('keyword');


      if(!empty($_FILES["meta_img"]["name"])) {
        $config["upload_path"] = './utilities/images/meta';
        $config["allowed_types"] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('meta_img')) {
          // check if has existing image 
          $old_image = $this->category_model->pull_subcategory_image($subcat_id);
          // new image
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $data = array(
            'img' => 'utilities/images/meta/'.$filename
          );
          $this->category_model->update_subcategory($subcat_id,$data);
          // delete old
          if(!empty($old_image)) {
            unlink("./".$old_image);
          }
        }
      };

      $data = array(
        'cat_id' => $cat_id,
        'subcat_title' => $subcat_title,
        'description' => $subcat_desc,
        'keyword' => $keyword
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
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();
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
      $featured = $this->input->post('featured');
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
        'featured' => $featured,
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
        'message' => "<strong>Success!</strong> " . $meta_title . " added to products."
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
          'featured' => $p->featured,
          'date_created' => $p->date_created
        );
      }

      $header = $this->header_array($prod_data["description"],$prod_data["keyword"],'',$prod_data["subcat_title"]. " " .$prod_data["prod_title"] . " | " . $prod_data["cat_title"] . " | Product Configuration" . " | Cytek Solutions Inc." ,base_url($prod_data["img"]),base_url('admin/config_product?id='.$prod_id));
      $nav["page"] = "products";
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();

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
      $featured = $this->input->post('featured');

      // image update 
      if(!empty($_FILES["meta_img"]["name"])) {
        $config["upload_path"] = './utilities/images/meta';
        $config["allowed_types"] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('meta_img')) {
          // check if has existing image 
          $old_image = $this->product_model->pull_product_img($prod_id);
          // new image
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $data = array(
            'img' => 'utilities/images/meta/'.$filename
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
        'featured' => $featured,
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
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->get('id');

      // remove banners
      $banners = $this->product_model->pull_banners($prod_id);
      foreach($banners as $b) {
        unlink('./'.$b->image_path);
        $this->product_model->drop_banner($$b->banner_id);
      }
      // remove features
      $features = $this->product_model->pull_features($prod_id);
      foreach($features as $f) {
        $feature_images = $this->product_model->pull_feature_images($feature_id);
        foreach($feature_images as $img) {
          unlink('./'.$img->img);
        }
        // drop records from db
        $this->product_model->drop_feature_images($feature_id);
        // drop feature from db
        $this->product_model->drop_feature($feature_id);
      }

      $this->product_model->drop_product($prod_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Product succesfully removed"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }
    // product feature
    function add_feature() {
      $referer = $this->input->server('HTTP_REFERER');
      $prod_id = $this->input->post('prod_id');
      $title = $this->input->post('title');
      $description = $this->db->escape_str($this->input->post('description'));
  
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

    function mod_feature(){
      $referer = $this->input->server('HTTP_REFERER');
      $feature_id = $this->input->post('feature_id');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      
      $data = array(
        'title' => $title,
        'description' => $description
      );

      $this->product_model->push_feature_update($feature_id,$data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> ".ucwords($title)." succesfully updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
      
    }

    function drop_feature() {
      $referer = $this->input->server('HTTP_REFERER');
      $feature_id = $this->input->get('id');

      // drop images from storage
      $feature_images = $this->product_model->pull_feature_images($feature_id);
      foreach($feature_images as $img) {
        unlink('./'.$img->img);
      }
      // drop records from db
      $this->product_model->drop_feature_images($feature_id);
      // drop feature from db
      $this->product_model->drop_feature($feature_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Product feature removed"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function drop_feature_img() {
      $referer = $this->input->server('HTTP_REFERER');
      $img_id = $this->input->get('id');
      $image_url = $this->product_model->pull_feature_img_url($img_id);
      // delete images uploaded to minimize storage usage
      unlink('./'.$image_url);
      $this->product_model->drop_feature_img($img_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Feature image removed."
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
      $referer = $this->input->server('HTTP_REFERER');
      $banner_id = $this->input->get('id');
      $dir = $this->product_model->pull_banner($banner_id);
      $dir = "./" . $dir;
      unlink($dir);
      $this->product_model->drop_banner($banner_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Image removed from product banner"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function events() {
      $header = $this->header_array('','','','Admin Events | Cytek Solutions Inc.','',base_url('admin/events'));
      $nav["page"] = "events";
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();
      $data["events"] = $this->event_model->pull_events();

      // load view
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-events',$data);
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

      $event_id = $this->event_model->push_new_event($data);

      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $title . " event is created."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect(base_url('admin/events'));

    }

    function modify_event() {
      $event_id = $this->input->post('event_id');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $content = $this->input->post('content');
      $event_date = $this->input->post('date');
      $img = "";

      $old_image = $this->event_model->pull_image($event_id);

      $config["upload_path"] = './utilities/images/events';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {
          $img = 'utilities/images/events/' . $this->upload->data('raw_name').$this->upload->data('file_ext');
          unlink('./'.$old_image);
          $this->event_model->push_update(array('img' => $img),$event_id);
        }
      }

      $data = array(
        'title' => $title,
        'description' => $description,
        'content' => $content,
        'event_date' => date("Y-m-d",strtotime($event_date))
      );

      $this->event_model->push_update($data,$event_id);

      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $title . " event data is updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect(base_url('admin/events'));

    }

    function drop_event() {
      $referer = $this->input->server('HTTP_REFERER');
      $event_id = $this->input->post('event_id');
      $image = $this->event_model->pull_image($event_id);
      !empty($image) ? unlink('./'.$image) : '';
      $this->event_model->drop_event($event_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Event removed from database."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function config_event() {
      $id = $this->input->get('id');
      $event_data = $this->event_model->pull_event($id);
      
      foreach($event_data as $e) {
        $data['event'] = array(
          'event_id' => $e->event_id,
          'title' => $e->title,
          'description' => $e->description,
          'content' => $e->content,
          'img' => $e->img,
          'event_date' => $e->event_date,
          'keyword' => $e->keyword
        );
      }

      $header = $this->header_array('','','','Admin Events | Cytek Solutions Inc.','',base_url('admin/config_event?id='.$id));
      $nav["page"] = "events";

      // load view
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('config-event',$data);
      $this->load->view('script');
      $this->load->view('footer');
      
    }
    function users() {
      $header = $this->header_array('','','','Admin Users | Cytek Solutions Inc.','',base_url('admin/users'));
      $nav["page"] = "users";
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();
      $data["users"] = $this->user_model->pull_users();

      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-users',$data);
      $this->load->view('script');
      $this->load->view('footer');
    }

    function new_user() {
      $f_name = $this->input->post('f_name');
      $l_name = $this->input->post('l_name');
      $email = $this->input->post('email');
      $contact = $this->input->post('contact');
      $password = $this->input->post('password');
      $img = "";

      $config["upload_path"] = './utilities/images/users';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('meta_img')) {
        $img = 'utilities/images/users/' . $this->upload->data('raw_name').$this->upload->data('file_ext');
      }

      $data = array(
        'f_name' => $f_name,
        'l_name' => $l_name,
        'email' => $email,
        'contact' => $contact,
        'password' => md5($password),
        'img' => $img
      );

      $this->user_model->push_new_user($data);

      redirect(base_url('admin/users'));

    }

    function update_user() {
      
      $referer = $this->input->server('HTTP_REFERER');
      $user_id = $this->input->post('user_id');
      $f_name = $this->input->post('f_name');
      $l_name = $this->input->post('l_name');
      $email = $this->input->post('email');
      $contact = $this->input->post('contact');
      $password = $this->input->post('password');
      $img = "";
      $config["upload_path"] = './utilities/images/users';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {   
          // check if has existing image 
          $old_image = $this->user_model->pull_user_img($user_id);
          // new image
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $data = array(
            'img' => 'utilities/images/users/'.$filename
          );
          $this->user_model->push_user_update($data,$user_id);
          // delete old
          if(!empty($old_image)) {
            unlink("./".$old_image);
          }
        }
      }

      $data =  array(
        'f_name' => $f_name,
        'l_name' => $l_name,
        'email' => $email,
        'contact' => $contact,
        'password' => md5($password),
      );

      $this->user_model->push_user_update($data,$user_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> ".$f_name. " " . $l_name . " user data updated"
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function drop_user() {
      $referer = $this->input->server('HTTP_REFERER');
      $user_id = $this->input->post('user_id');
      $name = $this->input->post('name');
      $this->user_model->drop_user($user_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> ".$name. " user removed from database."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function settings() {
      $header = $this->header_array('','','','Admin Settings | Cytek Solutions Inc.','',base_url('admin/settings'));
      $nav["page"] = "settings";
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();

      // data
      $data["sliders"] = $this->page_model->pull_slider();
      $data["home"] = $this->page_model->pull_page_meta(1);
      $data["product"] = $this->page_model->pull_page_meta(2);
      $data["company_settings"] = $this->page_model->pull_company_data();
      $data["about"] = $this->page_model->pull_page_meta(4);
      // view
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-settings',$data);
      $this->load->view('script');
      $this->load->view('footer');
    }

    function leads() {

      $lead_id = $this->input->get('id');

      if(empty($lead_id)) {
        $data["leads"] = $this->inquiry_model->pull_leads();
        $view = "leads";
      } else {
        $this->inquiry_model->update_read_status($lead_id);
        $detail = $this->inquiry_model->pull_lead($lead_id);
        foreach($detail as $d) {
          $lead = array(
            'name' => $d->name,
            'contact' => $d->contact,
            'email' => $d->email,
            'company' => $d->company_name,
            'department' => $d->department,
            'position' => $d->position,
            'source' => $d->source,
            'message' => $d->message,
            'date_created' => $d->date_created
          );
        }
        $data["detail"] = $lead;
        $view = "lead-details";
      }

      $header = $this->header_array('','','','Admin Leads | Cytek Solutions Inc.','',base_url('admin/settings'));
      $nav["page"] = "leads";
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();
      
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view($view,$data);
      $this->load->view('script');
      $this->load->view('footer');
    }

    function drop_lead() {
      $lead_id = $this->input->get('id');
      $this->inquiry_model->drop_lead($lead_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Lead removed from database."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect(base_url('admin/leads'));
    }

    function add_slider() {
      $referer = $this->input->server('HTTP_REFERER');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $url = $this->input->post('url');
      $img = "";

      $config["upload_path"] = './utilities/images/slider';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {   
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $img = 'utilities/images/slider/'.$filename;
        }
      }

      $data = array(
        'title' => $title,
        'description' => $description,
        'url' => $url,
        'img' => $img
      );

      $this->page_model->push_slider($data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> New slider saved."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function drop_slider() {
      $referer = $this->input->server('HTTP_REFERER');
      $slider_id = $this->input->get('id');
      $old_image = $this->page_model->pull_slider_img($slider_id);
      $old_image = './' . $old_image;
      unlink($old_imgage);
      $this->page_model->drop_slider($slider_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Slider removed."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function modify_slider() {

      $referer = $this->input->server('HTTP_REFERER');
      $slider_id = $this->input->post('slider_id');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $url = $this->input->post('url');
      $img = "";

      $old_image = $this->page_model->pull_slider_img($slider_id);
      $old_image = './' . $old_image;

      $config["upload_path"] = './utilities/images/slider';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {   
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $img = 'utilities/images/slider/'.$filename;
          $this->page_model->push_update(array('img'=>$img), $slider_id);
          unlink($old_image);
        }
      }

      $data = array(
        'title' => $title,
        'description' => $description,
        'url' => $url,
      );

      $this->page_model->push_update($data,$slider_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> ".$title." slider updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);

    }

    function modify_homepage () {
      $referer = $this->input->server('HTTP_REFERER');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $keywords = $this->input->post('keywords');

      $old_image = $this->page_model->pull_page_image(1);
      $old_image = './' . $old_image;

      $config["upload_path"] = './utilities/images/meta';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {   
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $img = 'utilities/images/meta/'.$filename;
          $this->page_model->push_update_page(array('meta_image'=>$img), 1);
          unlink($old_image);
        }
      }

      $data = array( 'title' => $title, 'meta_description' => $description, 'meta_keywords' => $keywords );
      $this->page_model->push_update_page($data,1);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Home details updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);

    }

    function modify_product() {
      $referer = $this->input->server('HTTP_REFERER');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $keywords = $this->input->post('keywords');

      $old_image = $this->page_model->pull_page_image(2);
      $old_image = './' . $old_image;

      $config["upload_path"] = './utilities/images/meta';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {   
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $img = 'utilities/images/meta/'.$filename;
          $this->page_model->push_update_page(array('meta_image'=>$img), 2);
          unlink($old_image);
        }
      }

      $data = array( 'title' => $title, 'meta_description' => $description, 'meta_keywords' => $keywords );
      $this->page_model->push_update_page($data,2);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Product details updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function modify_company() {
      $referer = $this->input->server('HTTP_REFERER');
      $contact = $this->input->post('contact');
      $email = $this->input->post('email');
      $hours = $this->input->post('office_hours');
      $address = $this->input->post('address');
      $facebook = $this->input->post('facebook');
      $twitter = $this->input->post('twitter');
      $instagram = $this->input->post('instagram');
      $description = $this->input->post('description');
      $img = "";

      $data = array(
        'address' => $address,
        'contact' => $contact,
        'email' => $email,
        'office_hours' => $hours,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'description' => $description
      );

      $this->page_model->push_update_company($data);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Company details updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);

    }

    function modify_about() {
      $referer = $this->input->server('HTTP_REFERER');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $keywords = $this->input->post('keywords');

      $old_image = $this->page_model->pull_page_image(4);
      $old_image = './' . $old_image;

      $config["upload_path"] = './utilities/images/meta';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {   
          $filename = $this->upload->data('raw_name').$this->upload->data('file_ext');
          $img = 'utilities/images/meta/'.$filename;
          $this->page_model->push_update_page(array('meta_image'=>$img), 4);
          unlink($old_image);
        }
      }

      $data = array( 'title' => $title, 'meta_description' => $description, 'meta_keywords' => $keywords );
      $this->page_model->push_update_page($data,4);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> About details updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

    function articles() {
      $header = $this->header_array('','','','Admin Articles | Cytek Solutions Inc.','',base_url('admin/articles'));
      $nav["page"] = "articles";
      $nav["inquiry"] = $this->inquiry_model->pull_new_lead_cnt();
      $data["articles"] = $this->article_model->pull_articles();

      // load view
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('admin-articles',$data);
      $this->load->view('script');
      $this->load->view('footer');
    }

    function new_article() {
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $content = $this->input->post('content');
      $img = "";

      $config["upload_path"] = './utilities/images/articles';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if($this->upload->do_upload('meta_img')) {
        $img = 'utilities/images/articles/' . $this->upload->data('raw_name').$this->upload->data('file_ext');
      }

      $data = array(
        'title' => $title,
        'description' => $description,
        'content' => $content,
        'img' => $img,
        'date_created' => date('Y-m-d H:i:s')
      );

      $event_id = $this->article_model->push_article($data);

      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $title . " article is created."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect(base_url('admin/articles'));
    }

    function config_article() {
      $id = $this->input->get('id');
      $article_data = $this->article_model->pull_article($id);
      
      foreach($article_data as $a) {
        $data['article'] = array(
          'article_id' => $a->article_id,
          'title' => $a->title,
          'description' => $a->description,
          'content' => $a->content,
          'img' => $a->img,
          'keyword' => $a->keyword
        );
      }

      $header = $this->header_array('','','','Admin Article | Cytek Solutions Inc.','',base_url('admin/config_article?id='.$id));
      $nav["page"] = "articles";

      // load view
      $this->load->view('header',$header);
      $this->load->view('admin-navigation',$nav);
      $this->load->view('config-article',$data);
      $this->load->view('script');
      $this->load->view('footer');
    }

    function modify_article() {
      $article_id = $this->input->post('article_id');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $content = $this->input->post('content');
      $keyword = $this->input->post('keyword');
      $img = "";

      $old_image = $this->article_model->pull_image($article_id);

      $config["upload_path"] = './utilities/images/articles';
      $config["allowed_types"] = 'gif|jpg|png';
      $this->load->library('upload', $config);
      if(!empty($_FILES["meta_img"]["name"])) {
        if($this->upload->do_upload('meta_img')) {
          $img = 'utilities/images/articles/' . $this->upload->data('raw_name').$this->upload->data('file_ext');
          unlink('./'.$old_image);
          $this->article_model->push_update(array('img' => $img),$article_id);
        }
      }

      $data = array(
        'title' => $title,
        'description' => $description,
        'content' => $content,
        'keyword' => $keyword
        'date_created' => date("Y-m-d H:i:s")
      );

      $this->article_model->push_update($data,$article_id);

      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> " . $title . " article data is updated."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect(base_url('admin/articles'));
    }

    function drop_article() {
      $referer = $this->input->server('HTTP_REFERER');
      $article_id = $this->input->post('article_id');
      $image = $this->article_model->pull_image($article_id);
      !empty($image) ? unlink('./'.$image) : '';
      $this->article_model->drop_article($article_id);
      $result_data = array(
        'class' => "success",
        'message' => "<strong>Success!</strong> Article removed from database."
      );
      $this->session->set_flashdata('result',$result_data);
      redirect($referer);
    }

}
