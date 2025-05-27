<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



    /**

     * Index Page for this controller.

     *

     * Maps to the following URL

     *      http://example.com/index.php/welcome

     *  - or -

     *      http://example.com/index.php/welcome/index

     *  - or -

     * Since this controller is set as the default controller in

     * config/routes.php, it's displayed at http://example.com/

     *

     * So any other public methods not prefixed with an underscore will

     * map to /index.php/welcome/<method_name>

     * @see https://codeigniter.com/user_guide/general/urls.html

     */



      function __construct(){


         parent::__construct();

         $this->load->helper(array('form','url'));

         $this->load->database();

         $this->load->library('form_validation');

         $this->load->library('session');

         $this->load->library('pagination');

         $this->load->library('paypal_lib');

         $this->load->database();

         $this->load->model('Designmodel');



    }

     public function check_log_activity(){


            if($this->session->userdata('userData')){

                 
                 redirect('client/index');

             }


    }

     public function get_calculation_variables()
    {
       //$this->check_log_activity();


       $data['discipline']=$this->Designmodel->get_discipline();
       $data['level']=$this->Designmodel->get_level();
       $data['deadline']=$this->Designmodel->get_deadline();
       $data['format']=$this->Designmodel->get_format();

       $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");

         $data['services'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 3
                            
                            ORDER BY post_date DESC");



       return $data;

      

    }

    public function php_info(){

        echo phpinfo();
    }


      public function get_samples()
    {
        //$data=$this->get_calculation_variables();
       $data=$this->get_calculation_variables();
       $data['title']="AceFlexPathCourse sample papers";
       $data['description']="Explore our collection of high-quality FlexPath course samples. See the excellence and expertise that our tutors bring to every assignment, helping students achieve academic success.";

       //$data['samples']=$this->Designmodel->get_samples(); 

       $count= $this->Designmodel->get_samples_count();

          $config = [
            'base_url' => base_url('home/get_samples'),
            'total_rows' => $count,
            'per_page' => 20,
            'uri_segment' => 3,
            'full_tag_open' => '<ul class="pagination justify-content-center">',
            'full_tag_close' => '</ul>',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',
            'attributes' => ['class' => 'page-link'],
        ];

        $this->pagination->initialize($config);

        // Fetch data
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['samples']= $this->Designmodel->get_samples_result($config['per_page'],$page);

        //$data['results'] = $this->db->limit($config['per_page'], $page)->get('tbl_sample')->result();
        $data['pagination'] = $this->pagination->create_links();

        
       //print_r($data['samples']); die();

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/sample_papers',$data);
       $this->load->view('homepage/footer');

    }

       public function universities()
    {
        //$data=$this->get_calculation_variables();
       $data=$this->get_calculation_variables();
       $data['title']="AceFlexPathCourse| Some of the universities we support";
       $data['description']="Expert support for competency-based education programs across leading universities. Get personalized flexpath assistance tailored to your specific institution's requirements.";

       $data['samples']=$this->Designmodel->get_samples(); 

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/universities',$data);
       $this->load->view('homepage/footer');

    }

     public function get_current_time($timezone){


            date_default_timezone_set("$timezone"); 
            return date("Y-m-d H:i:s");

         



    }

     public function lead()
  {
        //$this->load->model('designmodel');
      
        $data['title']="AceFlexPathCourse 20% off coupon"; 
        $data['description']="Get a 20% discount when you make your first order.";

        //get 5 most recent orders

        $email=$this->input->post('email');

        $subject="Thank you for visiting AceFlexPathCourse";

        $message="Thank you for visiting AceFlexPathCourse, you have been awarded a 20% discount on your first order. Your 20% discount will take effect when you make your first order.";



        $this->send_mail($email,$subject,$message);

        $insert=array(
                        'lead_email'=>$email,
                        'lead_website'=>7,
                      );

        $this->Designmodel->insert_lead($insert);

         // $writer_id=$this->uri->segment(3);

         $data=$this->get_calculation_variables();


       
         $data['message'] = "Kindly place your order below, your 20% discount will automatically take effect";

         $this->load->view('homepage/header',$data);
         $this->load->view('homepage/order_now',$data);
         $this->load->view('homepage/footer',$data);

  }



     public function blog()
  {        
            $data=$this->get_calculation_variables();

            if($this->uri->segment(2)){

                 if(is_numeric($this->uri->segment(2))){


                    $data['title']="AceFlexPathCourse Blog Posts"; 
                    $data['name']="AceFlexPathCourse Blog Posts"; 
                    $data['description']="Browse through resources from our blog"; 
                     $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                     $data['h'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')->order_by('post_date','DESC')->get('wp_posts');

                    $config = array();
                    $config["base_url"] = base_url('blog');
                    $config["total_rows"] = $data['h']->num_rows();
                    $config["per_page"] = 20;
                    $config["uri_segment"] = 2;

                    $config['full_tag_open'] = '<ul class="pagination">';
                    $config['full_tag_close'] = '</ul>';
                    $config['attributes'] = ['class' => 'page-link'];
                    $config['first_link'] = false;
                    $config['last_link'] = false;
                    $config['first_tag_open'] = '<li class="page-item">';
                    $config['first_tag_close'] = '</li>';
                    $config['prev_link'] = '&laquo';
                    $config['prev_tag_open'] = '<li class="page-item">';
                    $config['prev_tag_close'] = '</li>';
                    $config['next_link'] = '&raquo';
                    $config['next_tag_open'] = '<li class="page-item">';
                    $config['next_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li class="page-item">';
                    $config['last_tag_close'] = '</li>';
                    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
                    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
                    $config['num_tag_open'] = '<li class="page-item">';
                    $config['num_tag_close'] = '</li>';

                    $this->pagination->initialize($config);

                    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

                    $data["links"] = $this->pagination->create_links();

                    //$data['authors'] = $this->authors_model->get_authors($config["per_page"], $page);

                    $data['h'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')->limit($config["per_page"], $page)->order_by('post_date','DESC')->get('wp_posts');  

                       
                      // $data =  $this->get_logins();
                 
                   $this->load->view('homepage/header',$data);
                   $this->load->view('homepage/blog',$data);
                   $this->load->view('homepage/footer',$data);

              

              }else
              {



                if($this->uri->segment(2)=="blog"){

                    
                $post_title=$this->uri->segment(3);
               
                $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
                //$data =  $this->get_logins();
                $data['h'] = $wordpress->select('*')->where('post_name=',$post_title)->get('wp_posts');
                //print_r($data['h']->result()); die();


                $data['title']=$data['h']->result()[0]->post_title; 

                $data['name']=$data['h']->result()[0]->post_title; 
             
                $data['description']=$data['h']->result()[0]->post_excerpt; 




                $this->load->view('homepage/header',$data);
                $this->load->view('homepage/blog_details',$data);
                $this->load->view('homepage/footer',$data);

               }
               else
               {



                $post_title=$this->uri->segment(2);
               
                $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
                //$data =  $this->get_logins();
                $data['h'] = $wordpress->select('*')->where('post_name=',$post_title)->get('wp_posts');
                //print_r($data['h']->result()); die();


                $data['title']=$data['h']->result()[0]->post_title; 

                $data['name']=$data['h']->result()[0]->post_title; 
             
                $data['description']=$data['h']->result()[0]->post_excerpt; 




                $this->load->view('homepage/header',$data);
                $this->load->view('homepage/blog_details',$data);
                $this->load->view('homepage/footer',$data);



                 }










              }



            }
            else
            {
                $data['title']="AceFlexPathCourse Blog Posts"; 
                $data['name']="Blog Posts";
                $data['description']="Browse through resources from our blog"; 
                     $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                     $data['h'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')->order_by('post_date','DESC')->get('wp_posts');

                    $config = array();
                    $config["base_url"] = base_url('blog');
                    $config["total_rows"] = $data['h']->num_rows();
                    $config["per_page"] = 20;
                    $config["uri_segment"] = 2;


                    $config['full_tag_open'] = '<ul class="pagination">';
                    $config['full_tag_close'] = '</ul>';
                    $config['attributes'] = ['class' => 'page-link'];
                    $config['first_link'] = false;
                    $config['last_link'] = false;
                    $config['first_tag_open'] = '<li class="page-item">';
                    $config['first_tag_close'] = '</li>';
                    $config['prev_link'] = '&laquo';
                    $config['prev_tag_open'] = '<li class="page-item">';
                    $config['prev_tag_close'] = '</li>';
                    $config['next_link'] = '&raquo';
                    $config['next_tag_open'] = '<li class="page-item">';
                    $config['next_tag_close'] = '</li>';
                    $config['last_tag_open'] = '<li class="page-item">';
                    $config['last_tag_close'] = '</li>';
                    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
                    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
                    $config['num_tag_open'] = '<li class="page-item">';
                    $config['num_tag_close'] = '</li>';

                    $this->pagination->initialize($config);

                    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

                    $data["links"] = $this->pagination->create_links();

                    //$data['authors'] = $this->authors_model->get_authors($config["per_page"], $page);

                    $data['h'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')->limit($config["per_page"], $page)->order_by('post_date','DESC')->get('wp_posts');

                       
                      // $data =  $this->get_logins();
                 
                   $this->load->view('homepage/header',$data);
                   $this->load->view('homepage/blog',$data);
                   $this->load->view('homepage/footer',$data);

           }
  }


    public function test_days($deadline="2020-11-21 04:00",$timezone='Africa/Nairobi'){

          $curr_date=$this->get_current_time($timezone);

          


           $date1 = $curr_date;
           $date2 = $deadline; 
           $diff = strtotime($date2) - strtotime($date1);
           $diff_in_hrs = $diff/3600;
           print_r($diff_in_hrs);




         



    }



    public function get_time_stuff($deadline,$timezone){

          $curr_date=$this->get_current_time($timezone);

          


           $date1 = $curr_date;
           $date2 = $deadline; 
           $diff = strtotime($date2) - strtotime($date1);
           $diff_in_hrs = $diff/3600;
           $days=$diff_in_hrs/24;

           return $days;



         



    }

      public function  get_deadline_algo($deadline=78)
            {
               //get avaalable deadlines then compare choose floor
                 $records=$this->db->get('tbl_draft_deadline')->result();

                 $arr=array();

                 foreach ($records as $record) {

                           $rec=$record->deadline_duration;


                           if($rec<=$deadline)
                           {
                             
                             
                              array_push($arr, $rec);
                             //$correct=1;

                           }
                  
                 }

                   $correct=max($arr);

                   echo $correct;






            }




      public function get_price()

     {

        $deadline=$this->input->post('deadline'); 
        $level=$this->input->post('level'); 
        $coupon=$this->input->post('coupon'); 
        $user_id=$this->input->post('user_id'); 
        $service=$this->input->post('service'); 
        $pages=$this->input->post('pages'); 
        $timezone=$this->input->post('timezone'); 

        $deadlineid=$this->get_time_stuff($deadline,$timezone);
      

        $price=$this->Designmodel->get_price($deadlineid,$level,$coupon,$user_id,$service,$pages); 


        echo $price;

     }


     public function paper_details()
    {

            
                $data=$this->get_calculation_variables();

                $post_title=$this->uri->segment(2);
               
                //$wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
                //$data =  $this->get_logins();
                $data['h'] = $this->Designmodel->get_sample($post_title);
                //print_r($data['h']->result()); die();


                $data['title']=$data['h']->result()[0]->sample_title; 
             
                $data['description']=$data['h']->result()[0]->sample_paragraph; 




                $this->load->view('homepage/header',$data);
                $this->load->view('homepage/paper_details',$data);
                $this->load->view('homepage/footer');



    }

   public function get_help(){


    $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");
        return $data;
   }


    public function index()
    {

       $data=$this->get_calculation_variables();

      

       $data['title']="Accelerate Your FlexPath Success";

       $data['description']="Accelerate your flexpath journey from RN to BSN or RN to MSN ,MHA, MBA, DNP, with our strategic, focused learning approach designed to maximize efficiency without compromising on quality.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/index',$data);
       $this->load->view('homepage/footer',$data);

    }

     public function services()
    {

       $data=$this->get_calculation_variables();

      

       $data['title']="Expert FlexPath Course Support Services";
       $data['description']="Comprehensive guidance across all FlexPath programs. From RN to BSN through doctoral studies, we provide personalized tutoring to accelerate your academic success.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/services',$data);
       $this->load->view('homepage/footer',$data);

    }

     public function pricing()
    {
        $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse Pricing";
       $data['description']="Discover affordable pricing plans at AceMyFlexPathCourse.com. Get expert help with your flexPath courses tailored packages to fit your academic needs and budget.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/pricing',$data);
       $this->load->view('homepage/footer');

    }


    public function faq()
    {
        $data=$this->get_help();

       //$data['title']="EssayBell|faq";
       $data['title']="FREQUENTLY ASKED QUESTIONS";

       $data['description']="AceFlexPathCourse.com stands out from other essay writing services for a number of reasons. Top-rated academic writing professionals, high-quality custom papers that follow all directions and requirements, plagiarism-free papers, and on-time delivery are just a few of the reasons. Other reasons include a guarantee of privacy and secrecy, a safe and secure ordering procedure, helpful customer service, affordable prices, and frequent discounts.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/faq',$data);
       $this->load->view('homepage/footer');

    }


     public function refund_policy()
    {
        $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse|refund_policy";
       $data['description']="AceFlexPathCourse.com offers a money-back guarantee policy. This gives a client the right to request a refund in case our service fails to fulfill our duties. We want to emphasize we offer a full refund only in the following situations:";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/refund_policy',$data);
       $this->load->view('homepage/footer');

    }

   public function about_us()
    {
       
       $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse writing service";
       $data['description']="AceFlexPathCourse.com is an academic writing website specializing in writing essays and other academic writing assignments. We provide our services to several students worldwide looking for essay writing services and online class help services. ";

      

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/about_us',$data);
       $this->load->view('homepage/footer');

    }

    public function aboutus()
    {
        $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse aboutus";
       $data['description']="AceFlexPathCourse pricing plan is based on academic level, number of pages and urgency. Enjoy our rates that are way below market rates. Also, get to enjoy a lot of discounts in form of coupons. ";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/aboutus',$data);
       $this->load->view('homepage/footer');

    }



    public function offers()
    {
        $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse|Offers";
       $data['description']="We want you to feel safe and be satisfied with our services, in return we have a lot offers and guarantees that will make you love AceFlexPathCourse. Enjoy discounts of upto 20% when you make your first order";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/offers',$data);
       $this->load->view('homepage/footer');

    }

      

     public function order_now()
    {
       //$data=$this->get_help();
       $data=$this->get_calculation_variables();

       $data['disc']=$this->input->post('discipline');
       $data['leve']=$this->input->post('level');
       $data['dead']=$this->input->post('order_deadline_id');
       $data['pago']=$this->input->post('quant');

      // echo  $data['dead']; die();

        if(isset($data['pago'])){

           $data['page']=$data['pago'][1];
        }

      // echo $data['page']; die();

       if(isset($data['leve'])){
            
            $data['leve']=$data['leve'];

       }
       else
       {

            $data['leve']=3;
       }


       $data['title']="Order your custom essay at AceFlexPathCourse";
       $data['description']="Complete a simple order form to order your custom paper.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/order_now',$data);
       $this->load->view('homepage/footer',$data);

    }

     public function technical_order()
    {
       $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse| Place Your Order Now";
       $data['description']="AceFlexPathCourse.com makes it easy to get expert help with your FlexPath assignments, projects, and discussions.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/special_order',$data);
       $this->load->view('homepage/footer',$data);

    }

      public function how_it_works()
    {
        $data=$this->get_calculation_variables();

       $data['title']="How to get help with your Flex Path Course";
       $data['description']=" Our streamlined process makes it easy to get high-quality flex path writing assistance. Follow these simple steps to get started with your order.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/how_it_works',$data);
       $this->load->view('homepage/footer');

    }

       public function reviews()
    {
        $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse|Reviews";
       $data['description']="Best essay writing service that met my deadline and delivered my essay work on time. If you're having trouble with an academic writing assignment, I recommend it.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/reviews',$data);
       $this->load->view('homepage/footer');

    }

     public function service_details()
    {
                $data=$this->get_calculation_variables();

               $post_title=$this->uri->segment(3);
               
                $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
               // $data =  $this->get_logins();
                $data['h'] = $wordpress->select('*')->where('post_name=',$post_title)->get('wp_posts');
                //print_r($data['h']->result()); die();


                $data['title']=$data['h']->result()[0]->post_title; 
             
                $data['description']=$data['h']->result()[0]->post_excerpt; 




                $this->load->view('homepage/header',$data);
                $this->load->view('homepage/service_details',$data);
                $this->load->view('homepage/footer');


    }

   

      public function help()
    {
       $data['title']="AceFlexPathCourse|Help";
       $data['description']="AceFlexPathCourse provides a simple and seamless process for placing orders, payments and tracking orders";

       $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
     //  $data =  $this->get_logins();
       $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");

        // $data['paperwork'] = $wordpress->query("SELECT *
        //                     FROM eJL_posts
        //                     LEFT JOIN  eJL_term_relationships  as t
        //                     ON ID = t.object_id
        //                     WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id =3
                            
        //                     ORDER BY post_date DESC");
      // print_r($data['coursework']->result()); die();

       // $data['paperwork'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')->where('cat=',3)->order_by('post_date','DESC')->get('posts');

       // $data['services'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')>where('cat=',2)->order_by('post_date','DESC')->get('wp_posts');

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/help',$data);
       $this->load->view('homepage/footer');

    }

     public function disciplines()
    {
       $data['title']="AceFlexPathCourse|Discipline";
       $data['description']="At AceFlexPathCourse, we acknowledge that our clients specialize in different majors and as such, we strive to ensure that we have writers from all subjects. In order to achieve this, our recruiting department carries out an intensive recruitment process so as to ensure that we only have competent writers on board. As a matter of fact, our experts are PhD and masters holders. Others posses important certifications such as ACCA, CPA, and Oracle Certifications. The following subjects, among others, are handled by our team of experts: ";

       $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
     //  $data =  $this->get_logins();
       $data['discipline'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 2
                            
                            ORDER BY post_date DESC");

        // $data['paperwork'] = $wordpress->query("SELECT *
        //                     FROM eJL_posts
        //                     LEFT JOIN  eJL_term_relationships  as t
        //                     ON ID = t.object_id
        //                     WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id =3
                            
        //                     ORDER BY post_date DESC");
      // print_r($data['coursework']->result()); die();

       // $data['paperwork'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')->where('cat=',3)->order_by('post_date','DESC')->get('posts');

       // $data['services'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')>where('cat=',2)->order_by('post_date','DESC')->get('wp_posts');

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/discipline',$data);
       $this->load->view('homepage/footer');

    }

     public function sample_papers()
    {
        $data=$this->get_calculation_variables();

      // $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
      //  //$data =  $this->get_logins();
      //  $data['h'] = $wordpress->select('*')->where('post_type=','post')->where('post_status=','publish')->order_by('post_date','DESC')->get('wp_posts');

      $data['title']="AceFlexPathCourse|Sample Papers";
      $data['description']="Our writers complete papers strictly according to your instructions and needs, no matter what university, college, or high school you study in.";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/sample_papers',$data);
       $this->load->view('homepage/footer');

    }

     public function client()
    {
        $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse login or signup";
       $data['description']="AceFlexPathCourse client account";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/client_account',$data);
       $this->load->view('homepage/footer');

    }

    public function privacy()
  {
      $data=$this->get_calculation_variables();

      $data['title']="AceFlexPathCourse|Privacy";
      $data['description']="Read our privacy policy";

      $this->load->view('homepage/header',$data);
      $this->load->view('homepage/privacy',$data);
      $this->load->view('homepage/footer');
  }

  public function terms()
  {
      $data=$this->get_calculation_variables();

      $data['title']="AceFlexPathCourse|Terms";
      $data['description']="Read our terms and conditions";

      $this->load->view('homepage/header',$data);
      $this->load->view('homepage/terms',$data);
      $this->load->view('homepage/footer');
  }


     public function writer()
    {
             $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse|Writer";
       $data['description']="Create writer account";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/writer_account',$data);
       $this->load->view('homepage/footer');

    }

    public function contactus()
    {
              $data=$this->get_calculation_variables();

       $data['title']="AceFlexPathCourse|Contact Us";
       $data['description']="Create writer account";

       $this->load->view('homepage/header',$data);
       $this->load->view('homepage/contact_us',$data);
       $this->load->view('homepage/footer');

    }


     public function contactus_process()
   {
                     $data=$this->get_calculation_variables();

                //get variables from form
              $response = $this->input->post('g-recaptcha-response');



              $url = 'https://www.google.com/recaptcha/api/siteverify';
         
              $secretKey ='6LdVpcgZAAAAAK3Y2qairHtLutmJurmliaZqhmog';
              $captcha =$response;
              
             
              //$context  = stream_context_create($options);
              $url ='https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
              $verify = file_get_contents($url);
              $captcha_success=json_decode($verify);

              if ($captcha_success->success==true) {

                $fname=$this->input->post('fname');
                $subject=$this->input->post('subject');
                $email=$this->input->post('email');
                //$data['subject']=$this->input->post('subject');
                $message=$this->input->post('message');
                
                //send to admin
                $to="support@AceFlexPathCourse.com";
                $subject="REF: Customer Enquiry by $fname";
                $msg="Hi admin,<br>
                          You have a support message:<br>
                          Customer Name:  $fname <br>
                          Customer Email:  $email <br>
                          Subject:  $subject <br>
                          Message:  $message <br>";

               

               $this->send_mail($to,$subject,$msg);


                 $data=$this->get_calculation_variables();
                 $data['title']="Excellent Writers|Writer";
                 $data['description']="Create writer account";
                 $data['message']="Thank you for contacting AceFlexPathCourse, we will revert ASAP";


               $this->load->view('homepage/header',$data);
               $this->load->view('homepage/contact_us',$data);
               $this->load->view('homepage/footer');


                

              }
               else
              {

                 $data=$this->get_calculation_variables();
                 $data['title']="AceFlexPathCourse|Contactus";
                // $data['description']="Create writer account";
                 $data['fail']="Kindly verify that you are not a robot";


                 $this->load->view('homepage/header',$data);
                 $this->load->view('homepage/contact_us',$data);
                 $this->load->view('homepage/footer');
              }



    }

    public function sitemap_loc()
{
    // first load the library
    $pages_per_sitemap=1000;

    $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

    $posts = $wordpress->query("SELECT *
                            FROM wp_posts
                            WHERE post_type = 'post' AND
                             post_status = 'publish'
                            ");

    $posts_count=$posts->num_rows();
    
    //entries


        $expression = $this->load->database('expression', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $entries = $expression->query("SELECT exp_channel_data.entry_id AS entry_id, exp_channel_titles.title AS title, exp_channel_titles.url_title AS url_title
          FROM exp_channel_data

          LEFT JOIN exp_channel_titles ON exp_channel_titles.entry_id = exp_channel_data.entry_id
         
           WHERE exp_channel_data.channel_id=2
      
          ");

        $entries_count=$entries->num_rows();


    // get samples or past _papers
    $samples=$this->Designmodel->get_samples(); 

    $paper_count= $samples->num_rows();


    $pages_count=6;

   // $links=$posts_count+$paper_count+$pages_count;
    $pgst=$pages_count/$pages_per_sitemap;
    $pagesitemap=ceil($pgst);

    $psst=$posts_count/$pages_per_sitemap;
    $postsitemap=ceil($psst);

    $ppst=$paper_count/$pages_per_sitemap;
    $papersitemap=ceil($ppst);

    $entr=$entries_count/$pages_per_sitemap;
    $entrysitemap=ceil($entr);






   // $numero=$links/$pages_per_sitemap;

    $data['page_count']=$pagesitemap;
    $data['post_count']=$postsitemap;
    $data['paper_count']=$papersitemap;
    $data['entry_count']=$entrysitemap;

     //print_r($data['count']); die();


     



     $this->load->view('sitemap/sitemap_loc',$data);


  
   
   
}

  


 public function sitemap()
{
    // first load the library
     $this->load->library('sitemap');

    // create new instance
    $sitemap = new Sitemap();

    

    $sitemap->add('https://aceflexpathcourse.com/', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/pricing', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/order_now', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/how_it_works', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/reviews', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/services', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/universities', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/samples', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/client', '2025-05-27', '1.0', 'daily');
    $sitemap->add('https://aceflexpathcourse.com/blog', '2025-05-27', '1.0', 'daily');



     $samples=$this->Designmodel->get_sample_papers(); 


   

    $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

    $posts = $wordpress->query("SELECT post_name, post_date
                            FROM wp_posts
                             WHERE post_type = 'post' AND
                              post_status = 'publish' ");

     foreach ($posts->result() as $post)
    {
       // echo $post->sample_title; die();
        $sitemap->add(base_url().'blog/'.$post->post_name, $post->post_date, '1.0', 'daily');
    }

      foreach ($samples->result() as $samply)
    {
   // echo $post->sample_title; die();
        $sitemap->add(base_url().'paper_details/'.$samply->sample_slug, $samply->sample_added, '1.0', 'daily');
     
     }


   
     $sitemap->generate('xml');
  
}

    

  public function get_expression_details()
    {

         $data=$this->get_calculation_variables();


         $segment=$this->uri->segment(2);



         $expression = $this->load->database('expression', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
         //get entry id

         $entry_id="";
         $data['description']="";

         $hey['hope'] = $expression->query("SELECT entry_id

          FROM exp_channel_titles

          WHERE url_title='$segment'
         
          ");

          foreach($hey['hope']->result() as $row){ 

                $entry_id=$row->entry_id;

          }





       
        $data['h'] = $expression->query("SELECT exp_channel_data.entry_id AS entry_id, exp_channel_titles.title AS title, exp_channel_titles.url_title AS url_title,exp_channel_data_field_6.field_id_6 AS description,exp_channel_data_field_10.field_id_10 AS content
          FROM exp_channel_data

          LEFT JOIN exp_channel_titles ON exp_channel_titles.entry_id = exp_channel_data.entry_id
          LEFT JOIN exp_channel_data_field_6 ON exp_channel_titles.entry_id = exp_channel_data_field_6.entry_id 
          LEFT JOIN exp_channel_data_field_10 ON exp_channel_titles.entry_id = exp_channel_data_field_10.entry_id

          WHERE exp_channel_data.entry_id= $entry_id

       
          GROUP BY entry_id
          ORDER BY entry_id DESC
          ");

           foreach($data['h']->result() as $row){ 

                $data['description']=$row->description;
                $data['title']=$row->title;

          }

         // print_r($data); die();



          $this->load->view('homepage/header',$data);     
          $this->load->view('homepage/expression_details',$data);
          $this->load->view('homepage/footer',$data);


    }

    


    public function test_manenos()
  {

      // $this->mail->SMTPAutoTLS = false;
     

   $config = Array(

          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.zoho.com',
          'smtp_port' => 465,
          'smtp_user' => 'dispatch@AceFlexPathCourse.com',
          'smtp_pass' => 'AceFlexPathCourse2020',
          'mailtype'  => 'html', 
          'charset'   => 'utf-8'
      );
      $this->load->library('email');
      $this->email->initialize($config);

      $this->email->set_newline("\r\n");

      $this->email->from('dispatch@AceFlexPathCourse.com');
      $this->email->to('kevinkirui2@gmail.com'); 
     // $this->email->cc('kelvinongaga93@gmail.com'); 
     // $this->email->reply_to('help@avidessaywriters.com'); 

      $this->email->subject("45 Lynn Lynn");
      $this->email->message("We should talk about us and the rest");  

      // Set to, from, message, etc.

      //$this->load->library('encrypt');

      $result = $this->email->send();

     echo $this->email->print_debugger();


    }

     public function send_mail($to,$subject,$message)
  {

     $html_mail =  file_get_contents(base_url()."assets/templates/contact-us.html");

    //Replacing Data with Keys
    $data = array(
       
        "message" => $message,
    );

    $placeholders = array(
       
        "%MESSAGE%"
    );
    $final_mail = str_replace($placeholders, $data, $html_mail);

     $config = Array(

          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.zoho.com',
          'smtp_port' => 465,
          'smtp_user' => 'support@aceflexpathcourse.com',
          'smtp_pass' => 'aceflexpathcourse2022!',
          'mailtype'  => 'html', 
          'charset'   => 'utf-8'
      );

      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->set_newline("\r\n");

      $this->email->from('support@aceflexpathcourse.com');
      $this->email->to($to); 
      $this->email->bcc('essayloopwriters@gmail.com'); 

      $this->email->reply_to('support@aceflexpathcourse.com'); 

      $this->email->subject($subject);
      $this->email->message($final_mail);  

      // Set to, from, message, etc.

      //$this->load->library('encrypt');

      $result = $this->email->send();

     // $this->email->print_debugger(); die();


    }
     
     public function completeOrder()
    {
        $this->load->library('session');

         $data=$this->session->userdata('userData');

          //$this->load->model('designmodel');
                  $data['title']="99Content|Home"; 
                 
                  if ($this->session->flashdata('order_id')){
                    $data['order_id'] = $this->session->flashdata('order_id');
                  }
                  if ($this->session->flashdata('amount')){
                    $data['amount'] = $this->session->flashdata('amount');
                  }
                 

          $data['title']="Essays Loop|Complete order";
          $data['description']="Complete your order via Paypal";
  
          $this->load->view('homepage/header',$data);     
          $this->load->view('homepage/complete',$data);
          $this->load->view('homepage/footer',$data);
    }

    public function login_user(){
            
               $data=$this->get_help();


        $email = $this->input->post('email');
        $password = $this->input->post('password');


      
     
          $data = array(
                          'email' =>  $email,
                          'password' => $password
                      );
        //check if passwords match and user is active
         
        $result = $this->Designmodel->login_user($data);

       // print_r($result); die();
                     
       // $status = $this->Marketplacemodel->get_confirmation_status($email);

        if ($result === 'true')          
        {

            $email = $email;
            $result = $this->Designmodel->read_user_information($email);
      
            $user_fname =  $result[0]->user_fname;
            $email = $result[0]->user_email;
            $user_id =  $result[0]->user_id;





            //$balance = $this->Bulksmsmodel->fetch_balance($user_id);
                      //  $sms_price = $this->Bulksmsmodel->fetch_sms_price($user_id);

            $userData = array(

            'user_fname' => $user_fname,
            'user_id' => $user_id, 
            'user_email' => $email,
            'user_login_type' => 1,  
            'user_authority'=>1,        
                       
            );


         // $this->log_user_activity($userData);


          $this->session->set_userdata('userData', $userData);
         
           
           redirect('client/index/');
                         
       
      }
      elseif ($result === 'wrong') {

          $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['services'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");



       $this->load->view('homepage/awaiting_activation');
      }
      elseif ($result === 'deactivated') {

          $data['error_message'] ='Ooops! Your account has been deactivated, kindly contact support';

           $data['title']="AceFlexPathCourse|Client";

             $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['services'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");
        //  $data['description']="";
        
       //  $this->load->view('homepage/client_account', $data);
           $this->load->view('homepage/header',$data);
           $this->load->view('homepage/client_account', $data);
           $this->load->view('homepage/footer');
      }
     else
      {
         // echo 'here'; die();
           $data['error_message'] ='Invalid Username or Password';
           $data['title']="AceFlexPathCourse| Client";
           //$data['description']="";

            $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


           $data['services'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");
        
       //  $this->load->view('homepage/client_account', $data);
           $this->load->view('homepage/header', $data);
           $this->load->view('homepage/client_account', $data);
           $this->load->view('homepage/footer');
      }
                                
      //}
  }

    private function hash_password($password){
             return password_hash($password, PASSWORD_BCRYPT);
        }

     public function normal_logout() {
        // Remove local Facebook session
        //$this->session->destroy();
        // Remove user data from session
        $this->session->unset_userdata('userData');

        $this->session->sess_destroy();
        // Redirect to login page
        redirect('home');
    }


}