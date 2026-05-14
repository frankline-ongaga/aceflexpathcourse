<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Writer extends CI_Controller {
    
        function __construct()
	{
    
        parent::__construct();
    
        
		$this->load->helper(array('form', 'url'));
                
             
                $this->load->library("pagination");

                $this->load->database();

               // $this->load->library('facebook');

               // $this->load->library('google');

                // Load form helper library


                // Load form validation library
                $this->load->library('form_validation');

                // Load session library
                $this->load->library('session');

                // Load database
                $this->load->model('Designmodelwriter');

                $this->load->model('Designmodel');


                $this->load->model('Adminmodel');

                $this->load->model('Mahana_model');

                $this->load->library('mahana_messaging');
        }

  public function get_info()
  {
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');
         $message= $this->mahana_messaging->get_msg_count($data['user_id'], $status_id = MSG_STATUS_UNREAD);
         $data['message_count']=$message['retval'];
         $data['completed']= $this->Designmodelwriter->get_completedw($data['user_id']);
         // print_r($data['completed']->num_rows());
         // die();
         $data['pending']= $this->Designmodelwriter->get_pending($data['user_id']);
         $data['user_writer_status']= $this->Designmodelwriter->user_writer_status($data['user_id']);
         $data['user_writer_type']= $this->Designmodelwriter->user_writer_type($data['user_id']);

         $data['cancelled']= $this->Designmodelwriter->get_cancelled($data['user_id']);
         $data['review']= $this->Designmodelwriter->under_review($data['user_id']);
         $data['revision']= $this->Designmodelwriter->under_revision($data['user_id']);
         $data['awaiting']= $this->Designmodelwriter->get_awaiting($data['user_id']);
         $data['all']= $this->Designmodelwriter->get_all_ordersw($data['user_id']);
         $data['balance']= $this->Designmodelwriter->get_writer_bal($data['user_id']);
         $data['feedback']= $this->Designmodelwriter->get_feedback($data['user_id']);

         $data['level']= $this->Designmodelwriter->get_writer_level($data['user_id']);
         $data['jobs']= $this->Designmodelwriter->get_jobs($level=1);

         $data['cancelled_count']= $data['cancelled']->num_rows();
         $data['review_count']= $data['review']->num_rows();
         $data['completed_count']= $data['completed']->num_rows();
         $data['pending_count']= $data['pending']->num_rows();
         $data['revision_count']= $data['revision']->num_rows();
         $data['awaiting_count']= $data['awaiting']->num_rows();
         $data['feedback_count']= $data['feedback']->num_rows();
         $data['jobs_count']= $data['jobs']->num_rows();

         $data['all_count']= $data['all']->num_rows();
         $data['rating']= $this->Designmodelwriter->get_rating($data['user_id']);

        // print_r($data['rating']); die();

         return $data;

  }


   public function recover_password()

  {

    // $this->check_session();

     $email=$this->input->post('email');


    

     $res=$this->Designmodelwriter->check_mail_exists($email);

     //print_r($email); die();

     if($res=='true'){

         //create a random password
          $password=bin2hex(openssl_random_pseudo_bytes(16));

          $pass= $this->hash_password($password);

          $updatearr=array(
                            'user_password'=>$pass,

                          );

          $this->Designmodelwriter->update_password($email,$updatearr);


          $subject="Password recovered successfully";
          $message="Dear writer,<br>
                    Your password has been recovered successfully. Your new password is: <br>
                    $password <br>
                    You can easily change your password from your writer dashboard.<br><br>

                    99Content Team.
                    ";

          $this->send_mail($email,$subject,$message);


          $data['notification_header']="Password recovered successfully";
          $data['notification_message']="Your password has been recovered successfully. Your new password has been sent to your email.";

          $this->load->view('homepage/header',$data);
          $this->load->view('homepage/notification',$data);
          $this->load->view('homepage/footer',$data);




     }
     else
     {

          $data['notification_header']="We don't have your credentials";
          $data['notification_message']="Kindly sign up to access our services.";

          $this->load->view('homepage/header',$data);
          $this->load->view('homepage/notification',$data);
          $this->load->view('homepage/footer',$data);


     }


    // $this->load->view('advertiser/edit_ad',$data);



  }

   public function my_earnings()
  {
        
        $this->check_login();
        $this->load->model('Designmodel');
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');
         $user_id=$data['user_id'];

         $data=$this->get_info();
         $user_writer_type=$data['user_writer_type'];
         //weka hapa
          $what=$this->Designmodel->checkUserForeign($user_id);

                if($what=='no'){
                  //  $what=$what[0];                    
                  //update
                  //get prev bal
                  // $old_bal=$what['account_balance'];
                  // $new_bal=$old_bal+$refferer_amount;

                   $wao=array(
                                    'account_balance'=>0.00,
                                    'user_id'=>$user_id,

                                 );

                    $this->Designmodel->inser_wao($wao);

                }
                $saa=$this->Designmodel->checkUserLocal($user_id);

                if($saa=='no'){
                  //  $what=$what[0];                    
                  //update
                  //get prev bal
                  // $old_bal=$what['account_balance'];
                  // $new_bal=$old_bal+$refferer_amount;

                   $wao=array(
                                    'account_balance'=>0.00,
                                    'user_id'=>$user_id,
                                    'account_type'=>2,

                                 );

                    $this->Designmodel->inser_wao($wao);

                }
              

         if($user_writer_type==1){
             $data['earnings']= $this->Designmodelwriter->get_earnings($data['user_id']);
             $data['balance']= $this->Designmodelwriter->get_account_balance_one($data['user_id']);
         }
         else
         {
             $data['earnings']= $this->Designmodelwriter->get_earnings($data['user_id']);
             $data['balance']= $this->Designmodelwriter->get_account_balance_one($data['user_id']);
             $data['balancetwo']= $this->Designmodelwriter->get_account_balance_two($data['user_id']);

         }

       
         $data['writerData'] = $data;

         $this->load->view('writer/earnings',$data);
  }

  public function get_awaiting()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['awaiting']= $this->Designmodelwriter->get_awaiting($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/awaiting',$data);
  }

   public function get_cancelled()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['cancelled']= $this->Designmodelwriter->get_cancelled($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/cancelled',$data);
  }

   public function get_feedback()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['feedback']= $this->Designmodelwriter->get_feedback($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/feedback',$data);
  }

    public function message_client()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['order_id']= $this->uri->segment(3);
         $data['user_id']= $this->uri->segment(4);


       
         $data['writerData'] = $data;

         $this->load->view('writer/create_message_writer',$data);
  }

   public function get_revision()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['revision']= $this->Designmodelwriter->get_revision($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/revision',$data);
  }
   public function get_pending()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['pending']= $this->Designmodelwriter->get_pending($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/pending',$data);
  }

   public function get_all()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['all']= $this->Designmodelwriter->get_allw($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/all',$data);
  }

   public function in_progress()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['pending']= $this->Designmodelwriter->get_progress($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/pending',$data);
  }

   public function under_review()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['review']= $this->Designmodelwriter->under_review($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/review',$data);
  }

     public function get_job_details()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders
         $order_id=$this->uri->segment(3);
         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


        
        $data['de']= $this->Designmodelwriter->get_order_details($order_id);
       

       
         $data['writerData'] = $data;

         $this->load->view('writer/paper_details_apply',$data);
  }

    public function set_payment_option()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders
         $order_id=$this->uri->segment(3);
         $data=$this->session->userdata('writerData');
         $data=$this->get_info();
        

         //check if maximum orders have been reached
       
       

         $updatearray=array(
                              'user_payment_type'=>$this->input->post('payment_type'),
                              'user_paypal_email'=>$this->input->post('paypalid'),
                              
                           );

       

        $this->Designmodelwriter->update_profile($data['user_id'],$updatearray);


        
        $data['notification_title']= 'Payment successfully set';
        $data['notification_content']= 'Your payment option has been successfully set';

       
         $data['writerData'] = $data;

         $this->load->view('writer/general_notification',$data);
      
    }

    public function view_thread()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');
         $user_id=$data['user_id'];

         $data=$this->get_info();

         $thread_id=$this->uri->segment(3);

         $status_id=1;
        

        $response= $this->mahana_messaging->get_all_threads_grouped($user_id, $full_thread = FALSE, $order_by = 'ASC');
        $data['threads']=$response['retval'];
         foreach ($data['threads'] as $thread) {
           if($thread['thread_id']==$thread_id)
           {
               //update all messages in that thread as seen
                 foreach ($thread['messages'] as $msg) {
                     $msg_id=$msg['id'];
                     $this->mahana_messaging->update_message_status($msg_id, $user_id, $status_id);

                 }
               

                  $data['messages']=$thread['messages'];

           }
         
        }


         $message= $this->mahana_messaging->get_msg_count($user_id, $status_id = MSG_STATUS_UNREAD);
         $data['message_count']=$message['retval'];
         if($this->uri->segment(4)==7)
         {
            $data['not'] = 'Message sent successfully';
         }


         
       
         $data['writerData'] = $data;

         $this->load->view('writer/messages',$data);
  }

     public function inbox()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');
         $user_id=$data['user_id'];

         $data=$this->get_info();
        

        $response= $this->mahana_messaging->get_all_threads_grouped($user_id, $full_thread = FALSE, $order_by = 'DESC');
        $data['threads']=$response['retval'];



       
         $data['writerData'] = $data;

         $this->load->view('writer/threads',$data);
  }

    public function get_job()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders
         $order_id=$this->uri->segment(3);

         $data=$this->session->userdata('writerData');

         //check if maximum orders have been reached
        $res=$this->Designmodelwriter->max_reached($data['user_id']);
        if($res=='true'){

         $updatearray=array(
                              'order_writer_id'=>$data['user_id'],
                              'order_status'=>5,
                           );

         $data=$this->get_info();

        $this->Designmodelwriter->update_order($order_id,$updatearray);


        
        $data['notification_title']= 'Order successfully placed';
        $data['notification_content']= 'Kindly get to work and deliver quality content on time';

       
         $data['writerData'] = $data;

         $this->load->view('writer/general_notification',$data);
       }
       else
      {
        $data=$this->get_info();

        $data['notification_title']= 'Maximum orders reached';
        $data['notification_content']= 'You can only have a maximum of 3 orders in progress';

       
        $data['writerData'] = $data;

        $this->load->view('writer/general_notification',$data);

      }
  }

  public function get_completed()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['completed']= $this->Designmodelwriter->get_completed($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/completed',$data);
  }

   public function get_payment_options()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['user_id']= $data['user_id'];

         $data['p']= $this->Designmodelwriter->get_payment_options();

         $data['paypalid']= $this->Designmodelwriter->get_paypal_id($data['user_id']);

       
         $data['writerData'] = $data;

         $this->load->view('writer/payment_options',$data);
  }

   public function request_funds()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $account_type=$this->uri->segment(3);

         $data=$this->get_info();

         //$data['account_type']=$account_type;
         $data['user_id']= $data['user_id'];

         //$data['p']= $this->Designmodelwriter->get_payment_options();
       
         $data['writerData'] = $data;
         if($account_type==1){

            $this->load->view('writer/request_funds',$data);

         }
         else
         {
           
            $this->load->view('writer/request_funds_local',$data);

         }
  }
	
	public function index()
	{
	      //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['o']= $this->Designmodelwriter->get_five_orders($data['user_id']);

       
         $data['writerData'] = $data;

   //      print_r($data); die();

	       $this->load->view('writer/dash',$data);
	}


   public function get_paper_details()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();

        $data['title']="99Content| My orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();

         $data['d']= $this->Designmodelwriter->get_order_details($order_id);
         $data['uploads']= $this->Designmodelwriter->get_uploads($order_id);
         $data['rev']= $this->Designmodelwriter->get_rev($order_id);
         $data['submission']= $this->Designmodelwriter->get_submissions($order_id);
         $data['plag']= $this->Designmodelwriter->get_plag($order_id);

         
         $data['writerData'] = $data;
              
              
        $this->load->view('writer/paper_details',$data);
  }

   public function submit_paper()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();

        $data['title']="99Content| My orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();

         $data['order_id']= $order_id;
         
         $data['writerData'] = $data;
              
              
        $this->load->view('writer/submit_work',$data);
  }

  public function get_all_orders()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();

        $data['title']="99Content| My orders"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');
         $data=$this->get_info();

         $data['o']= $this->Designmodelwriter->get_all_orders($data['user_id']);
         
         $data['writerData'] = $data;
              
              
        $this->load->view('writer/dash',$data);
  }

   public function apply_view()
  {
        $this->check_login();

        if($this->uri->segment(3)==77)
        {

          //$data['message']="Profile updated successfully";
          $this->session->set_flashdata('message', 'Profile updated successfully');

        }

      
        

        $data['title']="99Content|writer"; 
        //$this->load->model('Designmodelwriter');
        $data=$this->session->userdata('writerData');
        $data=$this->get_info();

        $data['p']= $this->Designmodelwriter->get_profile_details($data['user_id']); 
        
        $data['c']= $this->Designmodelwriter->get_countries(); 

        $data['i'] = $this->Designmodelwriter->get_industries();

        $this->load->view('writer/apply',$data);
  }


   public function more_info_view()
  {
        $this->check_login();

        if($this->uri->segment(3)==77)
        {

          //$data['message']="Profile updated successfully";
          $this->session->set_flashdata('message', 'Profile updated successfully');

        }

      
        

        $data['title']="99Content|writer"; 
        //$this->load->model('Designmodelwriter');
        $data=$this->session->userdata('writerData');
        $data=$this->get_info();

        $data['i']= $this->Designmodelwriter->get_add_info($data['user_id']); 

//$data['p']= $this->Designmodelwriter->get_profile_details($data['user_id']); 
        
       // $data['c']= $this->Designmodelwriter->get_countries(); 

       // $data['i'] = $this->Designmodelwriter->get_industries();

        $this->load->view('writer/more',$data);
  }

  public function jobs()
  {
        $this->check_login();

       

        $data['title']="99Content|writer"; 
        //$this->load->model('Designmodelwriter');
       
        $data=$this->session->userdata('writerData');
       // print_r($data); die();
       // $type=$data['user_writer_type'];
        $data['p']= $this->Designmodelwriter->get_profile_details($data['user_id']); 
        $res=$data['p']->result();
        $level= $res[0]->user_level_id;
        $industry= $res[0]->user_industry;
        $type= $res[0]->user_writer_type;

        if($level===NULL)
        {

             $data=$this->get_info();

            $data['notification_title']= 'Ooops';
            $data['notification_content']= 'Your profile has to be approved to view jobs';

           
            $data['writerData'] = $data;

            $this->load->view('writer/general_notification',$data);

        }
        else
        {

        $data=$this->get_info();
       

        //get jobs based on rank.
      

         $data['writerData'] = $data;

       // $jobs=array();

       // $inda=explode(',',  $industry);

         //curate jobs
        //print_r($data['user_writer_type']); die();
        //$type=$data['user_writer_type'];
        $data['h']=$this->Designmodelwriter->get_jobs($type);

      
         


        $this->load->view('writer/jobs',$data);

      }
  }

  public function submit_process()
  {
        $this->check_login();
         $data=$this->session->userdata('writerData');

        

        $config['upload_path'] = './submission/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
        $config['max_size'] = '50000  '; // max_size in kb
       

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('assignment')) {
          //  $error = array('error' => $this->upload->display_errors());

           // print_r($error); die();

            $error = array('error' => $this->upload->display_errors());



                            // $this->session->set_flashdata('error',$error['error']);

            
            $data=$this->session->userdata('writerData');
            $data=$this->get_info();

            $data['error']=$error['error'];

            $this->load->view('writer/submit_work', $data);
        } else {
            $id=$this->input->post('order_id');
            $data = array('image_metadata' => $this->upload->data());
          
            $name=$data['image_metadata']['file_name'] ;

            $updatearray=array(
                                'order_delivery_note'=>$this->input->post('order_delivery_note'),
                                'order_submission'=>$name,

                                'order_status'=>2,

                              );

             $this->Designmodelwriter->update_order($id,$updatearray);
              
             

            



             

             $data=$this->session->userdata('writerData');

             $data=$this->get_info();

             $data['notification_title']= 'Paper successfully submitted';
             $data['notification_content']= 'Your paper is under review now';
            
            

             //$data['writerData'] = $data;

             //print_r($data); die();


             $this->load->view('writer/general_notification', $data);
        }
  }

   public function submit_process_new()
  {
        //new here
             $data=$this->session->userdata('loggged_in');


             $data=$this->get_info();
             //s

             if(!empty($_FILES['files']['name'])){

                 // $filenames=array();

                  $countfiles = count($_FILES['files']['name']);
                   
      // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['files']['name'][$i])){
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                        // Set preference
                        $config['upload_path'] = './submission/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                        $config['max_size'] = '50000  '; // max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
 
                       // $this->load->library('upload',$config); 
               
                        // File upload
                        if(!$this->upload->do_upload('file')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                         // print_r($data['error']); die();
                        


                        }
                        else
                        {

                              

                            

                         
                              $this->load->helper('directory'); 
                              $uploadData = $this->upload->data();
                              $filename = $uploadData['file_name'];

                              $link= FCPATH."submission/".$filename;


                              $config = Array(

                                  'protocol' => 'smtp',
                                  'mailpath' => '/usr/sbin/sendmail',
                                  'smtp_host' => 'localhost',
                                  'smtp_port' => '587',
                                  'useragent' => 'CodeIgniter',
                                 // 'smtp_user' => 'support@99content.com',
                                 // 'smtp_pass' => '99writer2019!',
                                  'mailtype'  => 'html', 
                                  'charset'   => 'UTF-8'
                              );
                              $this->load->library('email', $config);

                             

                              
                              // $this->email->attach($link); 

                              $this->email->attach($link);

                              // Initialize array
                              $filenames[] = $filename;

                          }

                        }



                      if(!empty($_FILES['plagiarism']['name'][$i])){

                      //  echo "here"; die();
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['file']['name'] = $_FILES['plagiarism']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['plagiarism']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['plagiarism']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['plagiarism']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['plagiarism']['size'][$i];

                        // Set preference
                        $config2['upload_path'] = './submission/'; 
                        $config2['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                        $config2['max_size'] = '50000  '; // max_size in kb
                        $config2['file_name'] = $_FILES['plagiarism']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config2);
                        $this->upload->initialize($config2);
 
                       // $this->load->library('upload',$config); 
               
                        // File upload
                        if(!$this->upload->do_upload('file')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                         // print_r($data['error']); die();
                        


                        }
                        else
                        {

                              

                            

                         
                             
                              $uploadPl = $this->upload->data();
                              $filenamepl = $uploadPl['file_name'];

                              $filenamespl[] = $filenamepl;

                          }

                        }

                      } //end of loop

                      if(isset($data['error']))
                       {


                          $data['writerData'] = $data;

                         // $data['error']=$error['error'];

                          $this->load->view('writer/submit_work', $data);
                         




                       }
                       else
                       {



                      // $user_id=$this->Designmodel->insert_buyer($user_array);
                         $id=$this->input->post('order_id');
                         $data=$this->session->userdata('userData');


                         $user_id=$data['user_id'];
                         $fname=$data['user_fname'];
                         $email=$data['user_email'];



                      


                        if(!empty($filenames)){
                       foreach($filenames as $filename){

                        $insert_uploads=array(
                                            'order_id'=>$id,
                                            'file_name'=>$filename,
                                            'designation'=>2,  //
                                           );

                       $this->Adminmodel->insert_uploads($insert_uploads);

                        }
                      }

                        if(!empty($filenamespl)){
                       foreach($filenamespl as $filenamey){

                        $insert_uploads=array(
                                            'order_id'=>$id,
                                            'file_name'=>$filenamey,
                                            'designation'=>7,  //
                                           );

                       $this->Adminmodel->insert_uploads($insert_uploads);

                        }
                      }



                         $updatearray=array(
                                      'order_delivery_note'=>$this->input->post('order_delivery_note'),
                                      'order_plagiarism_report'=>$this->input->post('order_plagiarism_report'),
                                      //'order_submission'=>$name,

                                      'order_status'=>9,

                                    );

                   $this->Adminmodel->update_order($id,$updatearray);


                     //get writer details
                     $res= $this->Adminmodel->get_specific_writer($id);
                     $res=$res[0];

                    $user_mail=$res->user_email;
                    $fname=$res->user_fname;


                    
                  $subject='ORDER ID:#$id Order submission';

                  $message = "Dear  $fname, <br> Order ID:$id has been submitted by the writer. Kindly go through the submission, if you are satsified mark the order as complete.<br>
                    You can also request a revision. <br>
                       Kind regards, <br>
                       Aceflexpathcourse Team.

                    ";

                $html_mail =  file_get_contents(base_url()."assets/templates/contact-us.html");

    //Replacing Data with Keys
                  $data = array(
                     
                      "message" => $message,
                  );

                  $placeholders = array(
                     
                      "%MESSAGE%"
                  );
                  $final_mail = str_replace($placeholders, $data, $html_mail);

                $this->email->from('dispatch@essayloop.com');
                $this->email->to($user_mail); 
                $this->email->cc('essayloopwriters@gmail.com'); 

                $this->email->reply_to('support@essayloop.com'); 

                 $this->email->subject($subject);
                 $this->email->message($final_mail); 
                 $this->email->send(); 






            
    
             $data=$this->get_info();

             $data['notification_title']= 'Paper delivered';
             $data['notification_content']= 'Paper has been sent to client and is awaiting feedback.';
            
            

             //$data['writerData'] = $data;

             //print_r($data); die();
             $data['writerData'] = $data;


             $this->load->view('writer/general_notification', $data);





                      
                       

              }



                
        }

      }




  public function apply_process()
  {
      
      $this->check_login();

       $config2['upload_path']='./experience/';
       $config2['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
       $config2['max_size'] = '50000  '; // max_size in kb
       //$config2['max_width']=15000;
       //$config2['max_height']=15000;

       $this->load->library('upload',$config2);
       //$this->upload->initialize($config2);


       if(!$this->upload->do_upload('experience')){

       // $error=array('error'=>$this->upload->display_errors());

        $data=$this->get_info();

        $data['writerData']=$this->session->userdata('writerData');

        $data['error'] = $this->upload->display_errors();

       // print_r($data['error']); die();
        $data['p']= $this->Designmodelwriter->get_profile_details($data['user_id']); 
        
        $data['c']= $this->Designmodelwriter->get_countries(); 

        $data['i'] = $this->Designmodelwriter->get_industries();

        //$data['writerData'] = $data;

       // print_r($data); die();




        $this->load->view('writer/apply', $data);


       }
       else
       {

        $data=array('image_metadata'=>$this->upload->data());
        $experiencename=$data['image_metadata']['file_name'];

        $data=$this->get_info();

        $data=$this->session->userdata('writerData');

      $inda=null;

      if($this->input->post('industry')){
       $industry=$this->input->post('industry');

       $inda=implode(',',$industry);

       }
       

       $updatearray = array(

        'user_why' =>$this->input->post('why'),
        'user_industry' =>$inda,
        'user_experience' =>$experiencename,
        'user_portfolio_link' =>$this->input->post('user_portfolio_link'),
        'user_writer_status' =>2,
        'user_location_id' =>$this->input->post('user_location_id'),
      

       );

       $this->Designmodelwriter->update_application($data['user_id'],$updatearray);

        $detailsData    =   $this->session->userdata('writerData');
                      
        $detailsData['user_writer_status']= 2;
        $this->session->set_userdata('writerData', $detailsData);  

    
        // $data=$this->get_info();

        $data['title']="99Content|writer"; 
        //$this->load->model('Designmodelwriter');
       // $data=$this->session->userdata('writerData');



         $data=$this->get_info();
         $data['writerData']=$this->session->userdata('writerData');

        

      

       
      
              
              
        $this->load->view('writer/apply_notification',$data);
      }
  }

   public function add_user(){
              $response = $this->input->post('g-recaptcha-response');



              $url = 'https://www.google.com/recaptcha/api/siteverify';
         
              $secretKey ='6LdVpcgZAAAAAK3Y2qairHtLutmJurmliaZqhmog';
              $captcha =$response;
              
             
              //$context  = stream_context_create($options);
              $url ='https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
              $verify = file_get_contents($url);
              $captcha_success=json_decode($verify);

              if ($captcha_success->success==false) {

                   $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");
                  

                  $this->session->set_flashdata('warning','Verify that you are not a robot before submitting the form');       
                  $this->load->view('homepage/header');
                  $this->load->view('homepage/writer_account');
                  $this->load->view('homepage/footer');

              } else if ($captcha_success->success==true) {

               $pass=$this->input->post('password');
               $password=$this->hash_password($pass);
               $fname=$this->input->post('user_fname');
               $lname=$this->input->post('user_lname');
               $email=$this->input->post('user_email');

               $user_array= array(         
                                
                             'user_fname' => $fname,
                             'user_lname' => $lname,
                            
                             'user_login_type' => 1,
                             'user_status' => 1,
                             'user_authority' =>2,
                             'user_email' => $email,
                             'user_password' =>$password,
                             'user_added' => $this->current_time(),
                            
                            
                           );

               $res=$this->user_exist_status($this->input->post('user_email'));

                if($res!=='true')
                {


                     $user_id=$this->Designmodelwriter->insert_writer($user_array);
                     $data['success_message']="Registration successful, sign in below";

                       $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");

                     $this->load->view('homepage/header',$data);
                     $this->load->view('homepage/writer_account',$data);
                     $this->load->view('homepage/footer',$data);

                }
                else
                {

                      $data['error_message']="You are already registered, Kindly login to access your account";

                        $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");

                       $this->load->view('homepage/header',$data);
                       $this->load->view('homepage/writer_account',$data);
                       $this->load->view('homepage/footer',$data);


                }

              

          }

        }


   public function user_exist_status($email)
     {
        
        $res=$this->Designmodelwriter->user_exist_status_w($email);
        return $res;

     }


   public function request_funds_process()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         //$writer_id=$this->input->post('writer_id');
         $request_amount=$this->input->post('request_amount');

         $data=$this->session->userdata('writerData');
         $user_id=$data['user_id'];


         //subtract from account
         $bal=$this->Designmodelwriter->get_writer_bal($user_id);

         if($bal>=20 and  $request_amount>=20){



         $insertarr=array(
                           'user_id'=>$user_id,
                           'request_amount'=>$request_amount,
                         );


         $this->Designmodelwriter->req_funds($insertarr);

         //new bal
         $newbal=$bal-$request_amount;

         $updatearr=array(
                            'account_balance'=>$newbal,
                         );

         $this->Designmodelwriter->update_balance_foreign($user_id,$updatearr);






         //

        

         $data=$this->get_info();
        

       // $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);


            $data['notification_title']= "We've received your request.";
            $data['notification_content']= 'Your funds are being processed';

           
            $data['writerData'] = $data;

            $this->load->view('writer/general_notification',$data);
        }
        else
        {

             $data=$this->get_info();
        

       // $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);


            $data['notification_title']= "Ooops you can't proceed";
            $data['notification_content']= 'You do not have enough money in your account';

           
            $data['writerData'] = $data;

            $this->load->view('writer/general_notification',$data);


        }
      
       


       
        
  }


   public function request_funds_process_local()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         //$writer_id=$this->input->post('writer_id');
         $request_amount=$this->input->post('request_amount');

         $data=$this->session->userdata('writerData');
         $user_id=$data['user_id'];


         //subtract from account
         $bal=$this->Designmodelwriter->get_writer_bal_local($user_id);

        // echo $bal; die();

         if($bal>=100 and  $request_amount>=100 ){



         $insertarr=array(
                           'user_id'=>$user_id,
                           'request_amount'=>$request_amount,
                           'request_designation'=>3,
                         );


         $this->Designmodelwriter->req_funds($insertarr);

         //new bal
         $newbal=$bal-$request_amount;

         $updatearr=array(
                            'account_balance'=>$newbal,
                         );

         $this->Designmodelwriter->update_balance_local($user_id,$updatearr);






         //

        

         $data=$this->get_info();
        

       // $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);


            $data['notification_title']= "We've received your request.";
            $data['notification_content']= 'Your funds are being processed';

           
            $data['writerData'] = $data;

            $this->load->view('writer/general_notification',$data);
        }
        else
        {

             $data=$this->get_info();
        

       // $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);


            $data['notification_title']= "Ooops you can't proceed";
            $data['notification_content']= 'You do not have enough money in your account';

           
            $data['writerData'] = $data;

            $this->load->view('writer/general_notification',$data);


        }
      
       


       
        
  }

   public function reply()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $sender_id=$this->input->post('sender_id');
         $msg_id=$this->input->post('message_id');
         $body=$this->input->post('body');
         $thread=$this->input->post('thread');

         $data=$this->session->userdata('writerData');
         $user_id=$data['user_id'];

         $data=$this->get_info();
        

        $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);
        
      
       


       
         $data['writerData'] = $data;

         redirect('writer/view_thread/'.$thread.'/7');
  }

    public function apply_process_with_i()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99writer | Writer"; 
        //get 5 most recent orders
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                $config['max_size'] = '50000  '; // max_size in kb
                $config['max_size'] = 200000;
               // $config['max_width'] = 15000;
               // $config['max_height'] = 15000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('userfile')) {

                     

                       $data=$this->get_info();

                       $data=$this->session->userdata('userData');

             
                        $data['error'] = $this->upload->display_errors();

                        $this->load->view('writer/more', $data);

                } else {

                    $id=$this->input->post('order_id');
                    $data = array('image_metadata' => $this->upload->data());
                    $file_upload=$data['image_metadata']['file_name'] ;


                    $info=$this->input->post('info');

         

         $data=$this->session->userdata('writerData');
         $user_id=$data['user_id'];

          $updatearray = array(
          'user_more_writer' =>  $info,
          'user_writer_status' => 2,
          'user_more_file'=>$file_upload,
          );


          $this->Designmodelwriter->update_more_info($user_id,$updatearray);
        

       // $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);
        
      
       


       
            $data=$this->get_info();

            $data['notification_title']= "We've received your request.";
            $data['notification_content']= 'We will get back to you ASAP';

           
            $data['writerData'] = $data;

            $this->load->view('writer/general_notification',$data);

      }
  }

    public function profile()
  {
        $this->check_login();

        if($this->uri->segment(3)==77)
        {

          //$data['message']="Profile updated successfully";
          $this->session->set_flashdata('message', 'Profile updated successfully');

        }


       

        $data['title']="99Content|writer"; 
        //$this->load->model('Designmodelwriter');
        $data=$this->session->userdata('writerData');
        $data=$this->get_info();

      

        $data['p']= $this->Designmodelwriter->get_profile_details($data['user_id']); 
        $data['c']= $this->Designmodelwriter->get_countries(); 

              
              
        $this->load->view('writer/profile',$data);
  }

   public function order()
  {
        $this->check_login();
        //$this->load->model('Designmodelwriter');
        //get data to populate the form

        $data=$this->get_info();

        $data=$this->session->userdata('writerData');
         
       
        $data['title']="99Content|writer"; 
        $data['t'] = $this->Designmodelwriter->get_content_type();
        $data['i'] = $this->Designmodelwriter->get_industries();
        $data['p'] = $this->Designmodelwriter->get_package();
        $data['writerData'] = $data;
              
              
        $this->load->view('writer/order',$data);
  }
       

   
    public function current_time()
  {

     date_default_timezone_set('America/New_York'); 
     return date("Y-m-d H:i:s");

  }

   public function send_message()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');
         $sender=$data['user_id'];

         //get variables
         $sender_id= $sender;
         $recipients[]=$this->input->post('user_id');
         $subject = $this->input->post('subject');
         $body =$this->input->post('message');

        // print_r($sender); die();
        

         $data=$this->get_info();


        $this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);
       
         $data['writerData'] = $data;

         $this->load->view('writer/notification',$data);
  }

    public function message_index()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


         $data['a']= $this->Designmodel->get_admins();

       
         $data['writerData'] = $data;

         $this->load->view('writer/create_message',$data);
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
          'smtp_user' => 'dispatch@essayloop.com',
          'smtp_pass' => 'essayloop2020',
          'mailtype'  => 'html', 
          'charset'   => 'utf-8'
      );
      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->set_newline("\r\n");


      $this->email->from('dispatch@essayloop.com');
      $this->email->to($to); 
      $this->email->cc('essayloopwriters@gmail.com'); 

      $this->email->reply_to('support@essayloop.com');

      $this->email->subject($subject);
      $this->email->message($final_mail);  

      // Set to, from, message, etc.

      //$this->load->library('encrypt');

      $result = $this->email->send();



    }


     

    
    public function check_login(){

       if($this->session->userdata('writerData')){

         return;

       }
       else
       {
           //$data =  $this->get_logins();
            redirect('home');

       }


    }

      public function get_logins()
      {
         $data['loginURL'] = $this->google->loginURL();
         $data['authURL'] =  $this->facebook->login_url();
         
         return $data;  
      }

     public function login(){

        $data =  $this->get_logins();
        $this->load->view('homepage/login',$data);

     }

      public function signup(){

        $data =  $this->get_logins();
        $this->load->view('homepage/signup',$data);

     }

     public function login_user(){
            
    

    $email = $this->input->post('email');
    $password = $this->input->post('password');


      
     
          $data = array(
          'email' =>  $email,
          'password' => $password
          );
        //check if passwords match and user is active
         
        $result = $this->Designmodelwriter->login_user($data);
                     
       // $status = $this->Marketplacemodel->get_confirmation_status($email);

        if ($result ==='true')          
        {

          $email = $email;
          $result = $this->Designmodelwriter->read_user_information($email);
          
          
         
        

            $user_fname =  $result[0]->user_fname;
            $email = $result[0]->user_email;
            $user_id =  $result[0]->user_id;
            $user_writer_type = $result[0]->user_writer_type;
            $user_status = $result[0]->user_status;

          //  echo $user_status; die();




            //$balance = $this->Bulksmsmodel->fetch_balance($user_id);
                      //  $sms_price = $this->Bulksmsmodel->fetch_sms_price($user_id);

            $writerData = array(

            'user_fname' => $user_fname,
            'user_id' => $user_id, 
            'user_email' => $email,
            'user_login_type' => 1, 
            'user_writer_status' => 1,  
            'user_writer_type' =>$user_writer_type,  
            'user_status' =>$user_status,                 
               
                       
            );


         // $this->log_user_activity($writerData);


          $this->session->set_userdata('writerData', $writerData);
         
           
           redirect('writer/index/');
                         
       
      }
      elseif ($result === 'deactivated') {
               $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");

            $data['error_message'] ='Sorry, your account has been deactivated, kindly contact support.';
            $this->load->view('homepage/header',$data);
            $this->load->view('homepage/writer_account',$data);
            $this->load->view('homepage/footer',$data);
      }
      elseif ($result==='rejected') {
            
            $data['error_message'] ='Sorry, we cannot log you in at this moment.';

              $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");

            $this->load->view('homepage/header',$data);
            $this->load->view('homepage/writer_account',$data);
            $this->load->view('homepage/footer',$data);
       
      }
     else
      {
         $data['error_message'] ='Invalid Username or Password';

           $wordpress = $this->load->database('wordpress', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.


        $data['help'] = $wordpress->query("SELECT *
                            FROM wp_posts
                            LEFT JOIN  wp_term_relationships  as t
                            ON ID = t.object_id
                            WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = 4
                            
                            ORDER BY post_date DESC");

         $this->load->view('homepage/header',$data);
         $this->load->view('homepage/writer_account', $data);
        $this->load->view('homepage/footer',$data);
      }
                                
      //}
  }

    private function hash_password($password){
             return password_hash($password, PASSWORD_BCRYPT);
        }


        public function update_profile()
       {
                //get variables from form
               $id=$this->input->post('user_id');
    
               $updatearray = array(

                'user_id' =>$this->input->post('user_id'),
                'writer_fname' =>$this->input->post('writer_fname'),
                'writer_lname' =>$this->input->post('writer_lname'),
                'writer_profile_pic' =>$this->input->post('writer_profile_pic'),
                'writer_location_id' =>$this->input->post('writer_location_id'),

               );

               $this->Designmodelwriter->update_profile($id,$updatearray);


               redirect('writer/profile/77');


        }

       public function change_password_process()

    {

             $this->check_login();

             $data=$this->session->userdata('writerData');

             $data=$this->get_info();

            //get the old password and check if it is correct

            $old_pass        = $this->input->post('old_password');

            $password        = $this->input->post('new_password');

            $pao=$this->hash_password($password);

            $datay=array(

                  'password'=>$old_pass ,

                  'user_id'=> $data['user_id'],

                        );

            $status=$this->Designmodelwriter->checkpasswordadvertiser($datay);


                //   echo $status; die();



                 if($status=='true')

                {

                  

                



                 $dasa=array(

                  'user_password'=>$pao,

                 );



                $this->Designmodelwriter->update_pass_advertiser( $data['user_id'],$dasa);



                 $data['writerData'] = $data;

                $data['sucess']="Password update successful";

                $this->load->view('writer/change_password', $data);

           

           

                   

                }

                else

                {



                 $data['writerData'] = $data;

                $data['fail']="Wrong old password";

                $this->load->view('writer/change_password', $data);



          

           

          

              }


      


             

            

        }


        public function change_password()
  {
        //$this->load->model('designmodel');
        $this->check_login();
       // $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('writerData');

         $data=$this->get_info();


        // $data['a']= $this->Designmodel->get_admins();

       
         $data['writerData'] = $data;

         $this->load->view('writer/change_password',$data);
  }
        
        


         public function process_order()
  {
              $this->check_login();
                //get variables from form
               $amount=$this->input->post('order_amount');
               $words=$this->input->post('order_word_count');
               $description=$this->input->post('order_description');
               $title=$this->input->post('order_title');

               $day=$words/750;
               $days=ceil($day);
               date_default_timezone_set('America/New_York'); 

               $due=Date('y:m:d H:i:s', strtotime("+$days days"));
    
               $orderarray = array(

                'buyer_id' =>$this->input->post('buyer_id'),
                'order_title' =>$this->input->post('order_title'),
                'order_description' =>$this->input->post('order_description'),
                'content_type_id' =>$this->input->post('content_type_id'),
                'industry_id' =>$this->input->post('industry_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'package_id' =>$this->input->post('package_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'order_word_count' =>$this->input->post('order_word_count'),
                'order_amount' =>$this->input->post('order_amount'),
                'order_added' =>$this->current_time(),
                'order_due' =>$due,
                
                //send email to client confirming receipt
               );

                $resp=$this->Designmodelwriter->insert_order($orderarray);
                //send order email
                 $contentid=$this->input->post('content_type_id');
                 $industryid=$this->input->post('industry_id');
                 $result=$this->Designmodelwriter->get_names($contentid,$industryid);

                 $content_name=$result[0]->content_name;

                 $industry_name=$result[0]->industry_name;


                $data=$this->session->userdata('writerData');


                $email=$data['buyer_email'];
                $fname=$data['buyer_fname'];
         


                 $subject="#$resp: Order placed successfully";
                 $message="Hi $fname, <br> Your order has been placed successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Content Type: $content_name <br>
                  Industry:  $industry_name <br>
                  Word count: $words <br>
                  Amount: $amount <br>
                  Due Date: $due<br>

                  <br>
                  Regards. <br>
                  EssaysCorp.

                   ";




                 $this->send_mail($email,$subject,$message);

                //then send to paypal
                 $this->load->library('paypal_lib');      


               // $returnURL = base_url().'paypal/ipn'; //payment success url

                $cancelURL = base_url().'paypal/cancel'; //payment cancel url

               // $notifyURL = base_url().'paypal/ipn'; //ipn url

                //get particular product data

               // $product = $//this->product->getRows($id);

                $userID = 1; //current user id

                $logo = base_url().'assets/images/codexworld-logo.png';

                

                //$this->paypal_lib->add_field('business', $paypalID);

               // $this->paypal_lib->add_field('return', $returnURL);

                $this->paypal_lib->add_field('cancel_return', $cancelURL);

               // $this->paypal_lib->add_field('notify_url', $notifyURL);

                $this->paypal_lib->add_field('item_name', 'YO Sthg');

                $this->paypal_lib->add_field('custom',  $resp);

                $this->paypal_lib->add_field('item_number',  $resp);

                $this->paypal_lib->add_field('amount',   $amount);        

               // $this->paypal_lib->image($logo);

                

                $this->paypal_lib->paypal_auto_form();




  }
        
         public function contactus_process()
	{
                //get variables from form
                $data['fname']=$this->input->post('fname');
                $data['lname']=$this->input->post('lname');
                $data['email']=$this->input->post('email');
                //$data['subject']=$this->input->post('subject');
                $data['message']=$this->input->post('message');
                
                //send email to client confirming receipt
                $config = array();
              //  $config['useragent']           = "CodeIgniter";
               // $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
               // $config['protocol']            = "smtp";
               // $config['smtp_host']           = "localhost";
               // $config['smtp_port']           = "25";
                $config['mailtype'] = 'html';
                $config['charset']  = 'utf-8';
                $config['newline']  = "\r\n";
                $config['wordwrap'] = TRUE;
                
                
                
                
                $this->load->library('email');

                $this->email->initialize($config);

                $this->email->from('info@mobitechtechnologies.com');
                $this->email->to($data['email']);
                //$this->email->cc('xxx@gmail.com'); 
                //$this->email->bcc($this->input->post('email')); 
                $this->email->subject("New query received");
                
                $msg = $this->load->view('webquote_admin',$data,TRUE);
                //$msg = "Hey a new order has been received from {$name}, \n Email: {$cust_email}";

               $this->email->message($msg); 
            
                //echo $this->email->print_debugger();
            //$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));

            if($this->email->send())
            {
               $data['title']="Mobitech Technologies|Contact us"; 
               $data['keywords']="Mobitech Technologies,contact us,email,info@mobitechtechnologies.com,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi"; 
               $data['description']="Mobitech Technologies is located at Commercial centre, Westlands, Nairobi Kenya, email us at info@mobitechtechnologies.com or call us on (254) 728369514 "; 
              
               $data['success']="Hello, we have received your message,we will get back to you ASAP";
               $this->load->view('contactus',$data);
               
            }
            else
            {
                $data['title']="Mobitech Technologies|Contact us"; 
                $data['keywords']="Mobitech Technologies,contact us,email,info@mobitechtechnologies.com,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi"; 
                $data['description']="Mobitech Technologies is located at Commercial centre, Westlands, Nairobi Kenya, email us at info@mobitechtechnologies.com or call us on (254) 728369514 "; 
                
                $data['error']="oops something went wrong";
                $this->load->view('contactus',$data);
            }
            
            //send to info@mobitechtechnologies.com the message received from client
            
               $config = array();
              //  $config['useragent']           = "CodeIgniter";
               // $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
               // $config['protocol']            = "smtp";
               // $config['smtp_host']           = "localhost";
               // $config['smtp_port']           = "25";
                $config['mailtype'] = 'html';
                $config['charset']  = 'utf-8';
                $config['newline']  = "\r\n";
                $config['wordwrap'] = TRUE;
                
                
                
                
                $this->load->library('email');

                $this->email->initialize($config);

                $this->email->from('request@mobicomtechnologies.com');
                $this->email->to('info@mobicomtechnologies.com');
                $this->email->cc('kevinkirui2@gmail.com'); 
                //$this->email->bcc($this->input->post('email')); 
                $this->email->subject("New message from a client");
                
                $msg = $this->load->view('webquote_client',$data,TRUE);
                //$msg = "Hey a new order has been received from {$name}, \n Email: {$cust_email}";

               $this->email->message($msg); 
               $this->email->send();
                
 
		
	}


       
}
