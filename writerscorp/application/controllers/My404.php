   <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My404 extends CI_Controller {
function __construct()
  {
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
       public function index()
       {
           $this->output->set_status_header('404');

           $data=$this->get_calculation_variables();

           $this->load->view('homepage/header',$data);    
           $this->load->view('homepage/err404',$data); 
           $this->load->view('homepage/footer');       

       }

      public function check_log_activity(){


            if($this->session->userdata('userData')){

                 
                 redirect('client/index');

             }


           

         



    }



    public function get_calculation_variables()
    {
       
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


    }