<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
function __construct()
  {
    
                parent::__construct();
                $this->load->helper('url');
                
             
                //$this->load->library("pagination");

                $this->load->database();

                $this->load->library('mahana_messaging');

                // Load form helper library
                //$this->load->library('cart');

                // Load form validation library
                $this->load->library('form_validation');

                // Load session library
                $this->load->library('session');

                // Load database
                $this->load->model('Adminmodel');
                
                $this->load->helper('form');

                

  }



  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
         public function index()
  {

            $this->load->view('admin/login');
             
  }

    public function get_info()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

         $message= $this->mahana_messaging->get_msg_count($data['user_id'], $status_id = MSG_STATUS_UNREAD);
         $data['message_count']=$message['retval'];

         $data['completed']= $this->Adminmodel->get_completed();
         $data['technical']= $this->Adminmodel->get_technical();
         // print_r($data['completed']->num_rows());
         // die();
         $data['cancelled']= $this->Adminmodel->get_cancelled();
         $data['pending']= $this->Adminmodel->get_pending();
         $data['revision']= $this->Adminmodel->get_revision();
         $data['awaiting']= $this->Adminmodel->get_awaiting();
         $data['all']= $this->Adminmodel->get_all();
         $data['review']=$this->Adminmodel->get_review();
         $data['cancelled_orders']=$this->Adminmodel->cancelled_orders();
         $data['awaiting_approval']=$this->Adminmodel->get_awaiting_approval();
         $data['writer_approvals']=$this->Adminmodel->get_unconfirmed_writers();
         //$data['bal']= $this->Designmodel->get_current_balance($data['user_id']);

         
         $data['cancelled_orders_count']= $data['cancelled_orders']->num_rows();
        // print_r($data['cancelled_orders_count']); die();
         $data['technical_count']= $data['technical']->num_rows();
         $data['completed_count']= $data['completed']->num_rows();
         $data['pending_count']= $data['pending']->num_rows();
         $data['revision_count']= $data['revision']->num_rows();
         $data['awaiting_payments_count']= $data['awaiting']->num_rows();
         $data['all_count']= $data['all']->num_rows();
         $data['review_count']= $data['review']->num_rows();
         $data['cancelled_count']= $data['cancelled']->num_rows();
         $data['awaiting_count']= $data['awaiting_approval']->num_rows();
         $data['approval_count']= $data['writer_approvals']->num_rows();

        // print_r($data['writer_approvals']->num_rows()); die();

        //$data['pending_count']+$data['revision_count']+



       
        

         return $data;

  }

  public function discount()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');


         $data=$this->get_info();


         $data['discount']= $this->Adminmodel->get_discount();

       
         $data['userData'] = $data;

         $this->load->view('admin/discount',$data);
  }

   public function jobs()
  {

      $data=$this->session->userdata('loggged_in');


      $data=$this->get_info();

      


      $data['h']=$this->Adminmodel->get_jobs();


     


    


      $data['userData'] = $data;


    
      $this->load->view('admin/jobs',$data);
             
  }

   public function submit_paper()
  {
        //$this->load->model('Designmodelwriter');
        $data=$this->session->userdata('loggged_in');


        $data=$this->get_info();


        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

        // $data=$this->session->userdata('writerData');

         //$data=$this->get_info();

         $data['order_id']= $order_id;
         
         $data['userData'] = $data;

              
              
        $this->load->view('admin/submit_work',$data);
  }

    public function submit_process()
  {
        //new here
             $data=$this->session->userdata('loggged_in');

             //$this->model->designmodel;
             $this->load->model('Designmodel');

                    $id=$this->input->post('order_id');



                     $res= $this->Adminmodel->get_client_details($id);
                     $buyer_fname=$res[0]->user_fname;
                     $buyer_email=$res[0]->user_email;
                     $name=$res[0]->order_submission;
                     $account_balance=$res[0]->account_balance;
                     $order_commission=$res[0]->order_commission;
                     $order_amount=$res[0]->order_amount;
                     $writer_id=$res[0]->order_writer_id;
                     $order_website=$res[0]->order_website;

                       if($order_website==1)
                     {

                        $from="dispatch@aceflexpathcourse.com";
                        $reply="support@aceflexpathcourse.com";
                        $team="EssayLoop";
                        $pass="aceflexpathcourse2025";
                        $html_mail =  file_get_contents(base_url()."assets/templates/contact-us.html");

                     }
                     elseif ($order_website==2) {
                        $from="support@your-writers.org";
                        $reply="support@your-writers.org";
                        $team="Your Writers";
                        $pass="yourwriters2020";
                        $html_mail =  file_get_contents(base_url()."assets/templates/contact-us-two.html");

                     }



             $data=$this->get_info();

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
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls';
                        $config['max_size'] = '500000'; // max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 

                        $this->upload->initialize($config); 
               
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
                                  'smtp_host' => 'ssl://smtp.zoho.com',
                                  'smtp_port' => 465,
                                  'smtp_user' => $from,
                                  'smtp_pass' => $pass,
                                  'mailtype'  => 'html', 
                                  'charset'   => 'utf-8'
                              );
                                $this->load->library('email');
                                $this->email->initialize($config);
                                
                                $this->email->set_newline("\r\n");

                             

                              
                              // $this->email->attach($link); 

                              $this->email->attach($link);

                              // Initialize array
                              $filenames[] = $filename;

                          }

                        }

                      } //end of loop

                      if(isset($data['error']))
                       {


                          $data['userData'] = $data;

                         // $data['error']=$error['error'];

                          $this->load->view('admin/submit_work', $data);
                         




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
                                            'designation'=>2,
                                           );

                       $this->Designmodel->insert_uploads($insert_uploads);

                        }
                      }


                         $updatearray=array(
                                      'order_delivery_note'=>$this->input->post('order_delivery_note'),
                                      //'order_submission'=>$name,

                                      'order_status'=>3,

                                    );

                   $this->Adminmodel->update_order($id,$updatearray);


                     

                   
                     


              

            


          
               // $this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

              $subject='Dear client your order has been completed';

              $message = "Dear  $buyer_fname, <br> Your order has been completed, attached herein is your paper,you could also access your paper by clicking 'complete' on your client dashboard <br> Thank you for choosing $team. <br><br>
                   Kind regards, <br>
                   $team Team.

                ";

                 // $html_mail =  file_get_contents(base_url()."assets/templates/contact-us.html");

                  //Replacing Data with Keys
                  $data = array(
                     
                      "message" => $message,
                  );

                  $placeholders = array(
                     
                      "%MESSAGE%"
                  );
                  $final_mail = str_replace($placeholders, $data, $html_mail);
                  

                $this->email->from($from);
                $this->email->to($buyer_email); 
                $this->email->bcc('aceflexpathcoursewriters@gmail.com'); 

                $this->email->reply_to($reply);

               $this->email->subject($subject);
               $this->email->message($final_mail); 
               $this->email->send(); 


             $data=$this->get_info();

             $data['notification_title']= 'Paper successfully submitted';
             $data['notification_content']= 'Paper has been sent to client.';
            
            

             //$data['writerData'] = $data;

             //print_r($data); die();
             $data['userData'] = $data;


             $this->load->view('admin/general_notification', $data);





                      
                       

              }



                
        }

      }

  public function get_job()
  {
        //$this->load->model('Designmodelwriter');
        $data=$this->session->userdata('loggged_in');


        $data=$this->get_info();
        //get 5 most recent orders
         $order_id=$this->uri->segment(3);

        // $data=$this->session->userdata('writerData');

         //check if maximum orders have been reached
       

         $updatearray=array(
                              'order_writer_id'=>$data['user_id'],
                              'order_status'=>5,
                           );

         //$data=$this->get_info();

        $this->Adminmodel->update_order($order_id,$updatearray);


        
        $data['notification_title']= 'Order in Progress';
        $data['notification_content']= 'Kindly get to work and deliver quality content on time';

       
         $data['userData'] = $data;

         $this->load->view('admin/general_notification',$data);
      
  }

   public function get_job_details()
  {
        //$this->load->model('Designmodelwriter');
        $data=$this->session->userdata('loggged_in');


        $data=$this->get_info();
        //get 5 most recent orders
        $order_id=$this->uri->segment(3);
        


        
         $data['d']= $this->Adminmodel->get_order_details($order_id);
         $data['uploads']= $this->Adminmodel->get_uploads($order_id);
         $data['rev']= $this->Adminmodel->get_rev($order_id);
         $data['submission']= $this->Adminmodel->get_submissions($order_id);
         $data['plag']= $this->Adminmodel->get_plag($order_id);
       

       
          $data['userData'] = $data;

         $this->load->view('admin/paper_details_apply',$data);
  }


    public function affiliate()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');


         $data=$this->get_info();


         $data['affiliate']= $this->Adminmodel->get_affiliate_rate();

       
         $data['userData'] = $data;

         $this->load->view('admin/affiliate',$data);
  }

    public function get_due_date($deadline_id){


              $days=$this->Designmodel->get_days($deadline_id);

              $due=Date('y:m:d H:i:s', strtotime("+$days days"));

              $data['days']=$days;
              $data['due']=$due;

              return $data;


        }

   public function create_special()
  {
     


        $this->check_login();
        $this->load->model('Designmodel');
        //get data to populate the form

        $data=$this->session->userdata('loggged_in');

        $data=$this->get_info();
         
       
       // $data['title']="99Content|Buyer"; 
        $data['discipline'] = $this->Designmodel->get_discipline();
        $data['level'] = $this->Designmodel->get_level();
        $data['format'] = $this->Designmodel->get_format();
        $data['deadline'] = $this->Designmodel->get_deadline();
        $data['writers'] = $this->Designmodel->get_local_writers();
       // $data['coupons'] = $this->Designmodel->get_active_coupons();

        $data['userData'] = $data;

        //print_r($data['writers']); die();
              
              
        $this->load->view('admin/order',$data);
  }


   public function affiliate_tracker()
  {
        //$this->load->model('designmodel');
        $this->check_login();
       // $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         //$user_id=$data['user_id'];

         $data=$this->get_info();
         //weka hapa
         


         $data['earnings']= $this->Adminmodel->get_earnings_affiliate();
       //  $data['balance']= $this->Designmodel->get_balance($data['user_id']);

       
         $data['userData'] = $data;

         $this->load->view('admin/affiliate_tracker',$data);
  }



   public function process_order_login_new(){

               $this->check_login();

                $this->load->model('Designmodel');

               $data=$this->session->userdata('loggged_in');

               $data=$this->get_info();

               $amount=$this->input->post('order_amount');
               $service=$this->input->post('service');
               $words=$this->input->post('order_words');
               $pages=$this->input->post('order_pages');
               $description=$this->input->post('order_description');
               $title=$this->input->post('order_title');
               $level_id=$this->input->post('order_level_id');
               $deadline_id=$this->input->post('order_deadline_id');
               $format_id=$this->input->post('order_format_id');
               $discipline_id=$this->input->post('order_discipline_id');
               $sources=$this->input->post('order_sources');
               $other=$this->input->post('other');
               $writer_id=$this->input->post('user_id');
               $order_cpp=$this->input->post('order_cpp');



              // $order_other=$this->input->post('order_other');

               $data=$this->get_due_date($deadline_id);
               $due=$data['due'];
               $days=$data['days'];

               //do an insert first
             

           

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
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                        $config['max_size'] = '500000'; // max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
                        // File upload
                        if(!$this->upload->do_upload('file')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('loggged_in');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                       
                        


                        }
                        else
                        {

                            

                         

                              $uploadData = $this->upload->data();
                              $filename = $uploadData['file_name'];

                              // Initialize array
                              $filenames[] = $filename;

                          }

                        }

                      } //end of loop

                      if(isset($data['error']))
                       {


                          $data['discipline'] = $this->Designmodel->get_discipline();
                          $data['level'] = $this->Designmodel->get_level();
                          $data['format'] = $this->Designmodel->get_format();
                          $data['deadline'] = $this->Designmodel->get_deadline();
                          $data['writers'] = $this->Designmodel->get_local_writers();

                          $data['userData'] = $data;



                      
                          $this->load->view('admin/order', $data);
                         




                       }
                       else
                       {



                      // $user_id=$this->Designmodel->insert_buyer($user_array);
                         $data=$this->session->userdata('loggged_in');


                         $user_id=$data['user_id'];
                         $fname=$data['user_fname'];
                         $email=$data['user_email'];



                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_words' =>$words,
                        'order_cpp' =>$order_cpp,
                        'order_writer_id' =>$writer_id,
                        'order_status' =>5,
                        'order_type' =>3,
                        
                        //send email to client confirming receipt
                       );

                      $resp=$this->Designmodel->insert_order($orderarray);

                      if(!empty($filenames)){

                       foreach($filenames as $filename){

                  $insert_uploads=array(
                                        'order_id'=>$resp,
                                        'file_name'=>$filename,
                                        'designation'=>1,
                                       );

                   $this->Designmodel->insert_uploads($insert_uploads);
                      }
                    }
           

              
                 

                 // $this->log_user_activity($userData);


              
                //send order email
               
                 $result=$this->Designmodel->get_names($resp);

                 $discipline_name=$result[0]->discipline_name;

                 $format_name=$result[0]->format_name;

                  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Order placed successfully";
                 $message="Hi $fname, <br>Thank you for choosing EssayLoop. Your order has been placed successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Amount: $amount <br>
                  Due Date: $days days<br>
                  <br>
                  Regards. <br>
                  EssayLoop.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);


              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                $this->load->library('session');

                 $data=$this->session->userdata('loggged_in');

                   $data=$this->get_info();

                  //$this->load->model('designmodel');
                  
                  $res=$this->Adminmodel->get_user_details($writer_id);
                  $res=$res[0];
                  $fname=$res->user_fname;
                  $email=$res->user_email;

                  $subject="#$resp:New Order";
                  $message="Hi $fname, <br>A new order with ID:$resp has been assigned to you. <br>
                  Kindly get to work ASAP <br>
                  Kind regards,<br>
                  EssayLoop Team";

                 $this->send_mail($email,$subject,$message);

                         

                 // $data['title']="Excellent Writers|Complete order";
                  $data['notification']="Order has been sent to writer";

                  $data['userData'] = $data;
          
                 
                  $this->load->view('admin/notification',$data);






                      } //end of no error
                             
                   
                  }  //end proceed
                       
                  
               
                else
                {
                  //no upload
                    $data=$this->session->userdata('loggged_in');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                    



                               $orderarray = array(

                                'order_user_id' =>$user_id,
                                'order_title' =>$title,
                                'order_description' =>$description,
                                'order_level_id' =>$level_id,
                                'order_format_id' =>$format_id,
                                'order_discipline_id' =>$discipline_id,
                                'order_pages' =>$pages,
                                'order_sources' =>$sources,
                                'order_amount' =>$amount,
                                'order_added' =>$this->current_time(),
                                'order_due' =>$due,
                                'other' =>$other,
                                'order_service_id' =>$service,
                                'order_words' =>$words,
                                'order_cpp' =>$order_cpp,
                                'order_writer_id' =>$writer_id,
                                'order_status' =>5,
                                'order_type' =>3,
                                
                                //send email to client confirming receipt
                               );
                

                     $resp=$this->Designmodel->insert_order($orderarray);


                    
                 $result=$this->Designmodel->get_names($resp);

                 $discipline_name=$result[0]->discipline_name;

                 $format_name=$result[0]->format_name;

                  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Order placed successfully";
                 $message="Hi $fname, <br>Thank you for choosing EssayLoop. Your order has been placed successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Amount: $amount <br>
                  Due Date: $days days<br>
                  <br>
                  Regards. <br>
                  EssayLoop.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);

              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
               $this->load->library('session');

                 $data=$this->session->userdata('loggged_in');

                   $data=$this->get_info();

                

                  $res=$this->Adminmodel->get_user_details($writer_id);
                  $res=$res[0];
                  $fname=$res->user_fname;
                  $email=$res->user_email;

                  $subject="#$resp:New Order";
                  $message="Hi $fname, <br>A new order with ID:$resp has been assigned to you. <br>
                  Kindly get to work ASAP <br>
                  Kind regards,<br>
                  EssayLoop Team";

                  $this->send_mail($email,$subject,$message);
                         

                 // $data['title']="Excellent Writers|Complete order";
                  $data['notification']="order has been sent to writer";

                  $data['userData'] = $data;


          
                 
                  $this->load->view('admin/notification',$data);

                   }

                   //send mail to writer
                
                
            




          }

       public function generate_invoice($amount,$order_id,$fname,$email)
        {

           $subject="Invoice #$order_id generated";
           $message="Dear $fname, <br> Thank you for placing an order with us. <br> Invoice ID:$order_id has been generated. <br>
                     Kind regards,<br>
                     EssayLoop Support.";



           $this->send_mail($email,$subject,$message);







        }

   public function edit_sample()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders
        $id=$this->uri->segment(3);

        $data=$this->session->userdata('loggged_in');


         $data=$this->get_info();


         $data['h']= $this->Adminmodel->get_sample($id);

       
         $data['userData'] = $data;

         $this->load->view('admin/edit_sample',$data);
  }


   public function add_sample()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');


         $data=$this->get_info();


         //$data['a']= $this->Adminmodel->get_users();

       
         $data['userData'] = $data;

         $this->load->view('admin/create_sample',$data);
  }

   public function edit_sample_process()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        $id=$this->input->post('sample_id');
        $sample_title=$this->input->post('title');
        $sample_paragraph =$this->input->post('paragraph');
        $sample_paper =$this->input->post('paper');

         $insertion=array(
                                  'sample_title' => $sample_title, 
                                  'sample_paragraph' => $sample_paragraph, 
                                  'sample_paper' => $sample_paper, 
                     
                            );



         $this->previous_configuration();

         $insertion['sample_slug'] = $this->slug->create_uri($insertion);


          $this->Adminmodel->update_sample($id,$insertion); 


         $data=$this->get_info();

          $data['success']="Sample updated successfully";


         $data['h']= $this->Adminmodel->get_samples();

       
         $data['userData'] = $data;

         $this->load->view('admin/samples',$data);
  }


   public function delete_sample()
  {

      $this->check_login();

   
     $id=$this->uri->segment(3);
     
   
    

     $this->load->database();

     $this->load->model('Adminmodel');

     $arr=array(
                  'status'=>1,
               );



     $this->Adminmodel->del_sample($id,$arr);

      $data=$this->get_info();




     //unlink(FCPATH.'video/'.$name);

     // $ifile="/cms/video".$name;
     // unlink($_SERVER['DOCUMENT_ROOT'] .$ifile);

      $data['h']=$this->Adminmodel->get_samples(); 

     $data['success']="Entry deleted successfully";

   

     $this->load->view('admin/samples',$data);

  }

   public function get_samples()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        


         


         $data=$this->get_info();

         


         $data['h']= $this->Adminmodel->get_samples();

       
         $data['userData'] = $data;

         $this->load->view('admin/samples',$data);
  }

  public function previous_configuration()

      {

             

              $config = array(
                'field' => 'sample_slug',
                'title' => 'sample_title',
                'table' => 'tbl_sample',
                'id' => 'sample_id',
              );
              $this->load->library('slug', $config);

      }


   public function add_sample_process()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        $sample_title=$this->input->post('title');
        $sample_paragraph =$this->input->post('paragraph');
        $sample_paper =$this->input->post('paper');

         $insertion=array(
                                  'sample_title' => $sample_title, 
                                  'sample_paragraph' => $sample_paragraph, 
                                  'sample_paper' => $sample_paper, 
                     
                            );



         $this->previous_configuration();

         $insertion['sample_slug'] = $this->slug->create_uri($insertion);


          $this->Adminmodel->add_previous($insertion); 


         $data=$this->get_info();

          $data['success']="Sample added successfully";


         $data['h']= $this->Adminmodel->get_samples();

       
         $data['userData'] = $data;

         $this->load->view('admin/samples',$data);
  }



   public function process_refund()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        // $sender=$data['user_id'];

         //get variables
        // $sender_id= $sender;
        $order_id=$this->input->post('order_id');
        $order_amount=$this->input->post('amount');
        $refund_amount=$this->input->post('refund_amount');

        $new_amount=$order_amount-$refund_amount;


        $updatearr=array(

         'order_status'=>8,
         'order_amount'=>$new_amount,
         'refund_amount'=>$refund_amount,
         

         );


         $this->Adminmodel->update_order($order_id,$updatearr);

         $res= $this->Adminmodel->get_client_details($order_id);
         $buyer_fname=$res[0]->user_fname;
         $buyer_email=$res[0]->user_email;

         $subject="Refund process complete:#$order_id";
         $message="Dear $buyer_fname,<br> Your refund of $refund_amount is on the way following the cancellation of order ID:$order_id.<br><br>Kind regards, <br> EssayLoop Team";

         $this->send_mail($buyer_email,$subject,$message);

         $data=$this->get_info();


        //$this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);


          $data['notification_content']= "Cancellation processed kindly send refund amount to client";

          $data['notification_title']= "Cancellation successfull";

         // $data['discount']= $this->Adminmodel->get_discount();

       
          $data['userData'] = $data;

         // $data['cancelled']= $this->Adminmodel->get_cancelled();

          $this->load->view('admin/general_notification',$data);
  }

  
       

      




   public function create_discount_process()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        // $sender=$data['user_id'];

         //get variables
        // $sender_id= $sender;
        // $recipients[]=$this->input->post('user_id');
        $updatearr=array(

         'value'=> $this->input->post('first_discount'),
         

         );
        

         $data=$this->get_info();


        //$this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);

          $this->Adminmodel->update_discount($updatearr);

          $data['message']= "Discount updated successfully";

          $data['discount']= $this->Adminmodel->get_discount();

       
         $data['userData'] = $data;

         $this->load->view('admin/discount',$data);
  }

   public function create_affiliate_process()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        // $sender=$data['user_id'];

         //get variables
        // $sender_id= $sender;
        // $recipients[]=$this->input->post('user_id');
        $updatearr=array(

         'value'=> $this->input->post('affiliate_rate'),
         

         );
        

         $data=$this->get_info();


        //$this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);

          $this->Adminmodel->update_affiliate($updatearr);

          $data['message']= "Affiliate rate updated successfully";

          $data['affiliate']= $this->Adminmodel->get_affiliate_rate();

       
         $data['userData'] = $data;

         $this->load->view('admin/affiliate',$data);
  }


   public function send_selected_emails()

  {

     $this->check_login();

    // $id=$this->uri->segment(3);


     $receipients=$this->input->post('receipients');
     $msg=$this->input->post('message');
     $subject=$this->input->post('subject');

     //print_r($receipients); die();

    

        // $response=$this->Bulksmsmodel->get_advertisers($from,$to);

          foreach ($receipients as $recepient)
          {

              // echo $recepient; die();
         
                $tos[]=$recepient; 
                  


          }

       
        $to=implode(',', $tos);
       // print_r($to); die();


       // $fname=$row->advertiser_fname; 
        $message="Hello, <br>$msg. <br><br> EssayLoop Team";


        $data['success']="Emails sent successfully";

        $this->send_mail($to,$subject,$message);

        $data=$this->get_info();

        $data['h']=$this->Adminmodel->get_buyers();

        $data['d']=$this->Adminmodel->get_writers_new();

        $this->load->view('admin/send_to_selected',$data);






  }


   public function send_quotation()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        //$data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        // $sender=$data['user_id'];

         //get variables
        // $sender_id= $sender;
        $order_id=$this->input->post('order_id');
        $amount=$this->input->post('amount');
        $updatearr=array(

         'order_technical_status'=>1,
         'order_amount'=>$amount,
         

         );

         $this->Adminmodel->update_order($order_id,$updatearr);


         $res= $this->Adminmodel->get_client_details($order_id);
         $buyer_fname=$res[0]->user_fname;
         $buyer_email=$res[0]->user_email;

         $subject="Quotation for Order ID:#$order_id";
         $message="Dear $buyer_fname,<br> Your quotation for order ID:#$order_id is ready.<br>You will be charged USD: $amount for this service.
          Kindly make the payment from your client dash by visiting 'technical orders' menu and clicking 'make payment'. <br>Kind regards, <br> EssayLoop Team";

         $this->send_mail($buyer_email,$subject,$message);

         $this->generate_quotation($amount,$order_id,$buyer_fname,$buyer_email);


        

         $data=$this->get_info();



      

        //$this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);

          

          $data['message']= "Quotation sent successfully";

          $data['discount']= $this->Adminmodel->get_discount();

       
         $data['userData'] = $data;

         $data['technical']= $this->Adminmodel->get_technical();


         $this->load->view('admin/technical',$data);
  }

   public function generate_quotation($amount,$order_id,$fname,$email)
   {

           $subject="Quotation #$order_id generated";
           $message="Dear $fname, <br> Thank you for placing an order with us. <br> Quotation ID:$order_id has been generated. <br>
                     Kind regards,<br>
                     EssayLoop Support.";



           $this->send_mail($email,$subject,$message);







   }


   public function get_buyers()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

         $data['h']= $this->Adminmodel->get_buyers();
       

         $this->load->view('admin/buyers', $data);

  }

   public function get_cancelled()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

         $data['cancelled']= $this->Adminmodel->get_cancelled();
       

         $this->load->view('admin/cancelled', $data);

  }

  public function cancelled_orders()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

         $data=$this->get_info();

         $data['cancelled']= $this->Adminmodel->cancelled_orders();
       

         $this->load->view('admin/cancelled_orders', $data);

  }


  // public function get_admins()
  // {
  //       $this->check_login();
       
  //       //get 5 most recent orders

  //        $data=$this->session->userdata('loggged_in');

  //         $data=$this->get_info();

  //        $data['h']= $this->Adminmodel->get_admins();
       

  //        $this->load->view('admin/admins', $data);

  // }

    public function coupon_management()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

         $data['h']= $this->Adminmodel->coupon_management();
       

         $this->load->view('admin/coupon_management', $data);

  }

    public function payment_history()
  {
        $this->check_login();

       // $data['title']="99Content|Buyer"; 
        //$this->load->model('designmodel');
        $data=$this->session->userdata('loggged_in');

        $data=$this->get_info();
       
        $data['p']= $this->Adminmodel->get_payment_history(); 

        //$data['c']= $this->Designmodel->get_countries(); 
              
        $this->load->view('admin/payment_history',$data);
  }

   public function manage_payouts()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

         $data['h']= $this->Adminmodel->manage_payouts();
       

         $this->load->view('admin/payouts', $data);

  }

    public function get_writers()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

         $data['h']= $this->Adminmodel->get_writers();
       

         $this->load->view('admin/writers', $data);

  }

   public function add_admin()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

       //  $data['h']= $this->Adminmodel->get_writers();
       

         $this->load->view('admin/add_admin', $data);

  }

     public function get_writers_ratings()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

         $data['h']= $this->Adminmodel->get_writers();
       

         $this->load->view('admin/writer_ratings', $data);

  }

   public function past_payouts()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

          $data=$this->get_info();

         $data['h']= $this->Adminmodel->past_payouts();
       

         $this->load->view('admin/past_payouts', $data);

  }

   public function message_client()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

         $data=$this->get_info();


         $data['order_id']= $this->uri->segment(3);
         $data['user_id']= $this->uri->segment(4);


       
         $data['userData'] = $data;

         $this->load->view('admin/create_message_client',$data);
  }

   public function get_admins()
  {
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');


         $data=$this->get_info();

         $data['h']= $this->Adminmodel->get_admins();
       

         $this->load->view('admin/admin', $data);

  }

    public function submit_work_process()
  {
        $this->check_login();


         $datay=$this->session->userdata('loggged_in');

        

        $config['upload_path'] = './submit_subscriptions/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
        $config['max_size'] = '50000  '; // max_size in kb
       // $config['max_width'] = 15000;
       // $config['max_height'] = 15000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if (!$this->upload->do_upload('assignment')) {
            $error = array('error' => $this->upload->display_errors());

            $data['error']=$error;

            $this->load->view('admin/submit_subscriptions', $error);
        } else {
            $id=$this->input->post('order_id');
            $data = array('image_metadata' => $this->upload->data());
          
            $name=$data['image_metadata']['file_name'] ;

            $insertarr=array(
                                'more_info'=>$this->input->post('more_info'),
                                'file'=>$name,

                                'order_id'=>$id,
                                'date_added'=>$this->current_time(),

                              );

             $this->Adminmodel->add_work($insertarr);

             //get user id and order id
              $data=$this->Adminmodel->get_message_info($id);
              $recepient= $data['user_id'];
              $to= $data['user_email'];

              $sender=$datay['user_id'];
              $subject="Order ID:$id Order Submission";
              $message=$this->input->post('more_info');
              if(!empty($message)){

                $message=$message;
              }
              else
              {
                $message-"Dear client, your order has been submitted, kindly login to your portal to access the paper.";
              }

              $this->send_message_outta($sender,$recepient,$subject,$message);
  
            $data['subs']= $this->Adminmodel->view_submissions($id);

            $link= FCPATH."submit_subscriptions/".$name;
           // $_SERVER["DOCUMENT_ROOT"]."/complete/".$namefiles
            //$link2=  dirname(__FILE__);
          //  echo $link; die();
            $this->send_mail_with_attachment($to,$subject,$message,$link);



             
           
             $data['success']= 'You have success submitted your paper';

             $data['userData'] = $datay;

            $this->load->view('admin/submit_subscriptions', $data);
        }
  }


   public function send_mail_with_attachment($to,$subject,$message,$link)
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
          'smtp_user' => 'dispatch@aceflexpathcourse.com',
          'smtp_pass' => 'aceflexpathcourse2020',
          'mailtype'  => 'html', 
          'charset'   => 'utf-8'
      );

      $this->load->library('email');
      $this->email->initialize($config);
      
      $this->email->set_newline("\r\n");

      $this->email->from('dispatch@aceflexpathcourse.com');
      $this->email->to($to); 
      $this->email->cc('aceflexpathcoursewriters@gmail.com'); 

      $this->email->reply_to('support@aceflexpathcourse.com'); 

      $this->email->subject($subject);
      $this->email->message($final_mail); 
       $this->email->attach($link); 

      // Set to, from, message, etc.

      //$this->load->library('encrypt');

      $result = $this->email->send();


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
          'smtp_user' => 'dispatch@aceflexpathcourse.com',
          'smtp_pass' => 'aceflexpathcourse2020',
          'mailtype'  => 'html', 
          'charset'   => 'utf-8'
      );
      $this->load->library('email');
      $this->email->initialize($config);
      
      $this->email->set_newline("\r\n");

      $this->email->from('dispatch@aceflexpathcourse.com');
      $this->email->to($to); 
      $this->email->cc('aceflexpathcoursewriters@gmail.com'); 

      $this->email->reply_to('support@aceflexpathcourse.com');

      $this->email->subject($subject);
      $this->email->message($final_mail);  

      // Set to, from, message, etc.

      //$this->load->library('encrypt');

      $result = $this->email->send();


    }

    public function submit_work()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

         $data=$this->get_info();

        $data['order_id']= $this->uri->segment(3);

         $data['subs']= $this->Adminmodel->view_submissions($data['order_id']);


       //  $data['subs']= $this->Adminmodel->get_subs_admin();

       
         $data['userData'] = $data;

         $this->load->view('admin/submit_subscriptions',$data);
  }

   public function get_sub()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

         $data=$this->get_info();

         $data['leo']= $this->current_time();


         $data['subs']= $this->Adminmodel->get_subs_admin();

       
         $data['userData'] = $data;

         $this->load->view('admin/view_subscriptions',$data);
  }

   public function message_index()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');


         $data=$this->get_info();


         $data['a']= $this->Adminmodel->get_users();

       
         $data['userData'] = $data;

         $this->load->view('admin/create_message',$data);
  }

    public function create_coupon()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');


         $data=$this->get_info();


         $data['a']= $this->Adminmodel->get_users();

       
         $data['userData'] = $data;

         $this->load->view('admin/create_coupon',$data);
  }

    public function send_message_outta($sender,$recepient,$subject,$message)
  {
        //$this->load->model('designmodel');
        $this->check_login();
       // $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        //$data=$this->session->userdata('loggged_in');

        // $sender=$data['user_id'];

         //get variables
         $sender_id= $sender;
         $recipients[]=$recepient;
         $subject = $subject;
         $body =$message;
        

         //$data=$this->get_info();


        $this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);
       
        return;
  }


   public function create_coupon_process()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

        // $sender=$data['user_id'];

         //get variables
        // $sender_id= $sender;
        // $recipients[]=$this->input->post('user_id');
        $insertarr=array(

         'coupon_code'=> $this->input->post('coupon_code'),
         'coupon_discount' =>$this->input->post('coupon_discount'),

         );
        

         $data=$this->get_info();


        //$this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);

          $this->Adminmodel->insert_coupon($insertarr);

          $data['message']= "Coupon added successfully";
       
         $data['userData'] = $data;

         $this->load->view('admin/create_coupon',$data);
  }

   public function send_message()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');

         $sender=$data['user_id'];

         //get variables
         $sender_id= $sender;
         $recipients[]=$this->input->post('user_id');
         $subject = $this->input->post('subject');
         $body =$this->input->post('message');
        

         $data=$this->get_info();


        $this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);

          $data['a']= $this->Adminmodel->get_users();

          $data['message']= "Message successfully sent";
       
         $data['userData'] = $data;

         $this->load->view('admin/create_message',$data);
  }

   public function dashboard()
  {

      $data=$this->session->userdata('loggged_in');


      $data=$this->get_info();

      $data['p']=$this->Adminmodel->get_pending_number();

      $data['f']=$this->Adminmodel->get_jobs();

      $data['b']=$this->Adminmodel->get_buyers_count();

      $data['w']=$this->Adminmodel->get_writers_count();


      $data['e']=$this->Adminmodel->get_earnings_sum();

     


      $data['r']=$this->Adminmodel->get_unconfirmed_writers();


      $data['userData'] = $data;


    
      $this->load->view('admin/dash',$data);
             
  }

    public function inbox()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        $data=$this->session->userdata('loggged_in');
        $user_id=$data['user_id'];

         $data=$this->get_info();
        

        $response= $this->mahana_messaging->get_all_threads_grouped($user_id, $full_thread = FALSE, $order_by = 'DESC');
        $data['threads']=$response['retval'];

       


       
         $data['userData'] = $data;

         $this->load->view('admin/threads',$data);
  }

    public function reply()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $sender_id=$this->input->post('sender_id');
         $msg_id=$this->input->post('message_id');
         $body=$this->input->post('body');
         $thread=$this->input->post('thread');

        $data=$this->session->userdata('loggged_in');
        $user_id=$data['user_id'];

         $data=$this->get_info();
        

        $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);
        
      
       


       
         $data['userData'] = $data;

          redirect('admin/view_thread/'.$thread.'/7');
  }

   public function view_thread()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $user_id=$data['user_id'];
          $data=$this->get_info();

        

         $thread_id=$this->uri->segment(3);

         $status_id=1;

         //update message as read
        

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
       
         $data['userData'] = $data;

          if($this->uri->segment(4)==7)
         {
            $data['not'] = 'Message sent successfully';
         }

        // print_r($data['messages']); die();

         $this->load->view('admin/messages',$data);
  }

    public function registerUser(){
          // $this->load->library('session');
          //  if($this->session->userdata('loggged_in')){
          
               
          //   $data['jina'] = $this->session->userdata['loggged_in']['admin_name']; 

            // $fname =$this->input->post('admin_fname');
            // $email =$this->input->post('admin_email');
            // $password =$this->input->post('admin_password');
             $fname ='Kelvin';
             $email ='kelvinongaga93@gmail.com';
             $password ='aceflexpathcourse2020';

           $dara = array(
             'user_fname' => $fname,
             'user_email' => $email,
             'user_role' => 1,
             'user_authority' => 3,
             'user_login_type' => 1,
             'user_password' => $this->hash_password($password)
             );
           
         
           $this->Adminmodel->insert_admin( $dara);
          
           $data['success'] = "admin added successfully";

           die();
           $this->load->view('add_admin',$data);
           // }
           // else
           // {
           //      $this->load->view('admin_login');
           // }
           
           
        
        }


 public function add_admin_process(){

          $this->load->library('session');
           if($this->session->userdata('loggged_in')){
          
               
          //   $data['jina'] = $this->session->userdata['loggged_in']['admin_name']; 

            $fname =$this->input->post('user_fname');
            $email =$this->input->post('user_email');
            $password =$this->input->post('user_password');
            $role =$this->input->post('user_role');
             // $fname ='Alex';
             // $email ='admin@gmail.com';
             // $password ='admin';

           $dara = array(
             'user_fname' => $fname,
             'user_email' => $email,
             'user_role' => $role,
             'user_authority' => 3,
             'user_login_type' => 1,
             'user_password' => $this->hash_password($password)
             );
           
         
           $this->Adminmodel->insert_admin($dara);

           $data=$this->get_info();

            $data['h']=$this->Adminmodel->get_admins();

           $data['success'] = "admin added successfully";

           // die();
           $this->load->view('admin/admin',$data);
           }
           else
           {
                $this->load->view('admin/admin_login');
           }
           
           
        
        }


    public function get_earnings()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data=$this->get_info();

        $data['title']="99Content| orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
          $data=$this->get_info();

        // $data=$this->get_info();

         $data['e']= $this->Adminmodel->get_earnings();
         //$data['s']= $this->Adminmodel->get_subscription_earnings();
         
         $data['userData'] = $data;


              
              
        $this->load->view('admin/earnings',$data);
  }

   public function get_paper_details()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();

         $data['d']= $this->Adminmodel->get_order_details($order_id);
         $data['uploads']= $this->Adminmodel->get_uploads($order_id);
         $data['rev']= $this->Adminmodel->get_rev($order_id);
         $data['submission']= $this->Adminmodel->get_submissions($order_id);
         $data['plag']= $this->Adminmodel->get_plag($order_id);

        // print_r($data['d']); die();
         
         $data['userData'] = $data;
              
              
        $this->load->view('admin/paper_details',$data);
  }

   public function edit_rating()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();

         $data['d']= $this->Adminmodel->get_order_details($order_id);
         //$data['uploads']= $this->Adminmodel->get_uploads($order_id);
         //$data['rev']= $this->Adminmodel->get_rev($order_id);
        // $data['submission']= $this->Adminmodel->get_submissions($order_id);
        // $data['plag']= $this->Adminmodel->get_plag($order_id);

        // print_r($data['d']); die();
         
         $data['userData'] = $data;
              
              
        $this->load->view('admin/edit_rating',$data);
  }

  


    public function user_details()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $user_id=$this->uri->segment(3); 
        $authority=$this->uri->segment(4); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();

        

        // print_r($data['d']); die();
         
         $data['userData'] = $data;

         if($authority==1){

            $data['title'] = "Orders made by client";
            $data['h']= $this->Adminmodel->get_user_details_order($user_id,$authority);
            $this->load->view('admin/user_orders',$data);
         }
         else
         {
            $data['title'] = "Orders taken up by writer";
            $data['h']= $this->Adminmodel->get_user_details_order($user_id,$authority);
            $this->load->view('admin/user_orders',$data);
         }
              
              
       
  }

   public function change_status()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $user_id=$this->uri->segment(3); 
        $status=$this->uri->segment(4); 
        $authority=$this->uri->segment(5); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();sssss
         if($status==0)
         {
             $updatearr=array(
                                 'user_status' => 3, 

                              );
         }
         else
         {
                $updatearr=array(
                                 'user_status' => 1, 

                              );


         }

         $this->Adminmodel->change_user_status($user_id,$updatearr);

        // print_r($data['d']); die();
         
         $data['userData'] = $data;

         if($authority==1){
           $data['title'] = "Orders made by buyer";
           $authority=1;
           
           $data['h']= $this->Adminmodel->get_buyers();
           $this->load->view('admin/buyers',$data);
         }
         else
         {
           $data['title'] = "Orders taken up by writer";
           $authority=2;
           $data['h']= $this->Adminmodel->get_user_details_order($user_id,$authority);
           $this->load->view('admin/writers',$data);
         }
              
              
        
  }

   public function change_status_writer()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $user_id=$this->uri->segment(3); 
        $status=$this->uri->segment(4); 
        $authority=$this->uri->segment(5); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();sssss
         if($status==1)
         {
            //for activating
             $updatearr=array(
                                 'user_status' => 3, 

                              );
         }
          elseif($status==7)
         {
            //for suspending
             $updatearr=array(
                                 'user_status' => 7, 

                              );
         }
         else
         {
               //for deactivating
                $updatearr=array(
                                 'user_status' => 6, 

                              );


         }

         $this->Adminmodel->change_user_status($user_id,$updatearr);

        // print_r($data['d']); die();
         
         $data['userData'] = $data;

         if($authority==2){
           //$data['title'] = "Orders made by buyer";
          // $authority=1;
           
           $data['h']= $this->Adminmodel->get_writers();
           $this->load->view('admin/writers',$data);
         }
         else
         {
           $data['title'] = "Orders taken up by writer";
           $authority=2;
           $data['h']= $this->Adminmodel->get_user_details_order($user_id,$authority);
           $this->load->view('admin/writers',$data);
         }
              
              
        
  }



   public function change_coupon_status()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $status=$this->uri->segment(3); 
        $coupon_id=$this->uri->segment(4); 
        $data=$this->session->userdata('loggged_in');
        $data=$this->get_info();
       
         if($status==0)
         {
             $updatearr=array(
                                 'coupon_status' => 1, 

                              );
         }
         else
         {
                $updatearr=array(
                                 'coupon_status' => 0, 

                              );


         }

         $this->Adminmodel->change_coupon_status($coupon_id,$updatearr);

        // print_r($data['d']); die();
         
         $data['userData'] = $data;

        $data['h']= $this->Adminmodel->coupon_management();
        $this->load->view('admin/coupon_management',$data);
        
              
              
        
  }

   public function payout_details()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $request_id=$this->uri->segment(3); 
      
        $data=$this->session->userdata('loggged_in');
        $data=$this->get_info();
       

         //$this->Adminmodel->change_coupon_status($coupon_id,$updatearr);

        // print_r($data['d']); die();
         
         $data['userData'] = $data;

        $data['h']= $this->Adminmodel->get_payout_details($request_id);

        $this->load->view('admin/payout_details',$data);
        
              
              
        
  }

   public function get_revise_details()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();
         $data['order_id']=$order_id;

         //echo $order_id; die();

         $data['d']= $this->Adminmodel->get_order_details($order_id);
         
         $data['userData'] = $data;
              
              
        $this->load->view('admin/revise',$data);
  }

   public function review_paper()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();

         $data['d']= $this->Adminmodel->get_order_details($order_id);
         $data['submission']= $this->Adminmodel->get_submissions($order_id);
         
         $data['userData'] = $data;
              
              
        $this->load->view('admin/review_details',$data);
  }

    public function mark_revise()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $order_id=$this->input->post('order_id');
        $revision_details=$this->input->post('revision_details');
       // $paper_title=$this->uri->segment(4); 
         $res= $this->Adminmodel->get_writer_details($order_id);
         $writer_fname=$res[0]->user_fname;
         $writer_email=$res[0]->user_email;
         //update order status
         $updatearr=array(
                          'order_status'=>4,
                          'order_revision_details'=>$revision_details,
                         );


         $this->Adminmodel->update_order($order_id,$updatearr);

        


        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

              $this->load->helper('directory'); 

            


              $config = Array(

              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => '99contentdispatch@gmail.com',
              'smtp_pass' => '99content!',
              'mailtype'  => 'html', 
              'charset'   => 'utf-8'
              );


            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->from('celeventdispatch@gmail.com');
            $this->email->to($writer_email);

               // $this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

                $this->email->subject('Revision');

                $mseg = "Dear  $writer_fname , \n  Your order has the following revision. \n 
                $revision_details

                 Kindly attend to it ASAP. <br>

                   Kind regards, <br>
                   99Content.

                ";

                

                 



            $this->email->message($mseg);   


            $this->email->send();


        // $data=$this->get_info();

           //$data['d']= $this->Adminmodel->get_order_details($order_id);

           $data['notification'] = "Revision details sent to writer successfully";
           
           $data['userData'] = $data;
              
              
          $this->load->view('admin/notification',$data);
  }


  public function request_revision_process_new() {

               $this->check_login();

               $data=$this->session->userdata('loggged_in');

               $data=$this->get_info();


              // $file_upload=NULL;

                if(!empty($_FILES['files']['name']))
                {
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
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                        $config['max_size'] = '500000'; // max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);


                          if(!$this->upload->do_upload('file')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('loggged_in');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                         // print_r($data['error']); die();
                        


                        }
                        else
                        {

                            

                         

                              $uploadData = $this->upload->data();
                              $filename = $uploadData['file_name'];

                              // Initialize array
                              $filenames[] = $filename;

                          }

                        }

                      }


                     if(isset($data['error']))
                       {


                         
                           $data=$this->get_info();

                           $data=$this->session->userdata('loggged_in');

                 
                            $data['error'] = $this->upload->display_errors();

                            $this->load->view('admin/request', $data);
                         




                       }
                       else
                       {

                    //insert revision files
                     $id=$this->input->post('order_id');

                     if(!empty($filenames)){

                         foreach($filenames as $filename){

                        $insert_uploads=array(
                                              'order_id'=>$id,
                                              'file_name'=>$filename,
                                              'designation'=>3,
                                             );

                         $this->Designmodel->insert_uploads($insert_uploads);

                           }

                      }

          

                   
                   //update status

                    $data=$this->session->userdata('loggged_in');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                      //get variables from form
                     $order_revision_details=$this->input->post('order_revision_details');

                    // print_r($id); die();
                    

                     $updatearray = array(

                      'order_revision_details' =>$order_revision_details,
                      //'order_revision_uploads' =>$file_upload,
                      'order_status' =>4,
                      
                      
                      //send email to client confirming receipt
                      );

                      $resp=$this->Designmodel->update_rev($id,$updatearray);


                         
                      //send order email
                     
                       $result=$this->Designmodel->get_writer_details($id);

                       $fname=$result[0]->user_fname;

                       $email=$result[0]->user_email;

                      

                       $subject="#$id: Revision Request";
                       $message="Hi $fname, <br> Your have a revision request for order ID:$id. <br>
                        Revision details: $order_revision_details<br>
                        Revision files have also been uploaded to that effect, you can access them by clicking 'paper details'.</br>
                        Kindly visit your dashboard to resolve the issue.<br>
                        <br>
                        Regards. <br>
                       Excellent Writers.

                         ";
                       $this->send_mail($email,$subject,$message);

                      
           
                      
                      $data['success']="We've received your revision request, your paper will be attended to shortly"; 
                     
                      $this->load->view('buyer/request', $data);
                  }

                   


                }
                else
                {
                     // $id=$this->input->post('order_id');

                       $file_upload=NULL;
                     $id=$this->input->post('order_id');
                   

                    $data=$this->session->userdata('loggged_in');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                      //get variables from form
                     $order_revision_details=$this->input->post('order_revision_details');
                    

                     $updatearray = array(

                      'order_revision_details' =>$order_revision_details,
                      'order_revision_uploads' =>$file_upload,
                      'order_status' =>4,
                      
                      
                      //send email to client confirming receipt
                      );

                      $resp=$this->Designmodel->update_rev($id,$updatearray);


                         
                      //send order email
                     
                       $result=$this->Designmodel->get_writer_details($id);

                       $fname=$result[0]->user_fname;

                       $email=$result[0]->user_email;

                       //echo $email; die();

                      

                       $subject="#$id: Revision Request";
                       $message="Hi $fname, <br> Your have a revision request for order ID:$id. <br>
                        Revision details: $order_revision_details<br>
                        Kindly visit your dashboard to resolve the issue.<br>
                        <br>
                        Regards. <br>
                        EssayLoop.

                         ";


                       $this->send_mail($email,$subject,$message);

                      
           
                      
                      $data['success']="We've received your revision request, your paper will be attended to shortly"; 
                     
                      $this->load->view('admin/request', $data);

                      
               
                }

             
          }


   public function mark_complete()
  {
        
        $this->check_login();
        $this->load->model('Designmodel');

        $data['title']="99Content| orders";
        $order_id=$this->uri->segment(3);
       // $paper_title=$this->uri->segment(4); 
         $res= $this->Adminmodel->get_client_details($order_id);
         $buyer_fname=$res[0]->user_fname;
         $buyer_email=$res[0]->user_email;
        // $name=$res[0]->order_submission;
         $account_balance=$res[0]->account_balance;
         $order_commission=$res[0]->order_commission;
         $order_amount=$res[0]->order_amount;
         $writer_id=$res[0]->order_writer_id;


          $resp=$this->Adminmodel->get_writer_detailss($writer_id);
         // print_r($resp[0]->user_fname); die();
          $writer_fname=$resp[0]->user_fname;
          $writer_email=$resp[0]->user_email;



         //update order status
         $updatearr=array(
                          'order_status'=>3,
                         );


         $this->Adminmodel->update_order($order_id,$updatearr);


         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();



            //update account balance
            $what=$this->Designmodel->checkUserLocal($writer_id);

                if($what!=='no'){
                  //  $what=$what[0];                    
                  //update
                  //get prev bal
                  $old_bal=$what['account_balance'];
                  $new_bal=$old_bal+$order_amount;

                   $acc_arr=array(
                                    'account_balance'=>$new_bal,

                                 );
                   $this->Designmodel->updateAccountLocal($writer_id,$acc_arr);


                }
                else
                {
                  //insert
                       $wao=array(
                                    'account_balance'=>$order_amount,
                                    'user_id'=>$writer_id,
                                    'account_type'=>2,

                                 );

                    $this->Designmodel->inser_wao($wao);

                }


             //$this->Adminmodel->update_bal_kes($writer_id,$uparr);


             $writer_email=$writer_email;
             $writersubject="#$order_id:Payment has been credited to your account";
             $writermessage="Hi $writer_fname,<br> Following completion of Order ID:#$order_id, $order_amount KES has been credited to your account <br><br>
               Regards,<br>
               EssayLoop Team.

             ";

              $this->send_mail($writer_email,$writersubject,$writermessage);

          

             $data['notification'] = "Order marked as complete succcessfully";
             
             $data['userData'] = $data;
                
                
            $this->load->view('admin/notification',$data);
  }

   public function mark_complete_new()
  {
        //new here
             $data=$this->session->userdata('loggged_in');


             $data=$this->get_info();

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
                        $config['max_size'] = '5000000'; // max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
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
                                  'smtp_port' => '25',
                                  'useragent' => 'CodeIgniter',
                                 // 'smtp_user' => 'support@99content.com',
                                 // 'smtp_pass' => '99writer2019!',
                                  'mailtype'  => 'html', 
                                  'charset'   => 'UTF-8'
                              );
                              $this->load->library('email', $config);
                              //$this->email->set_newline("\r\n");

                              
                             

                              
                              // $this->email->attach($link); 

                              $this->email->attach($link);

                              // Initialize array
                              $filenames[] = $filename;

                          }

                        }

                      } //end of loop

                      if(isset($data['error']))
                       {


                          $data['userData'] = $data;

                         // $data['error']=$error['error'];

                          $this->load->view('admin/submit_work', $data);
                         




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
                                            'designation'=>2,
                                           );

                       $this->Designmodel->insert_uploads($insert_uploads);

                        }
                      }


                         $updatearray=array(
                                      'order_delivery_note'=>$this->input->post('order_delivery_note'),
                                      //'order_submission'=>$name,

                                      'order_status'=>3,

                                    );

                   $this->Adminmodel->update_order($id,$updatearray);


                     $res= $this->Adminmodel->get_client_details($id);
                     $buyer_fname=$res[0]->user_fname;
                     $buyer_email=$res[0]->user_email;
                     $name=$res[0]->order_submission;
                     $account_balance=$res[0]->account_balance;
                     $order_commission=$res[0]->order_commission;
                     $order_amount=$res[0]->order_amount;
                     $writer_id=$res[0]->order_writer_id;



              

            


          
               // $this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

              $subject='Dear client your order has been completed';

              $message = "Dear  $buyer_fname, <br> Your order has been completed. You could also access your paper by clicking 'complete' on your client dashboard <br> Thank you for choosing EssayLoop. <br>
                   Kind regards, <br>
                   EssayLoop.

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



                $this->email->from('dispatch@aceflexpathcourse.com');
                $this->email->to($buyer_email); 
                $this->email->cc('aceflexpathcoursewriters@gmail.com'); 

                $this->email->reply_to('support@aceflexpathcourse.com'); 

               $this->email->subject($subject);
               $this->email->message($final_mail); 
               $this->email->send(); 






            
    
             $data=$this->get_info();

             $data['notification_title']= 'Paper successfully submitted';
             $data['notification_content']= 'Paper has been sent to client.';
            
            

             //$data['writerData'] = $data;

             //print_r($data); die();
             $data['userData'] = $data;


             $this->load->view('admin/general_notification', $data);





                      
                       

              }



                
        }

      }

  public function request_revision()
  {
        $this->check_login();
        //$this->load->model('designmodel');
        //get data to populate the form

        $data=$this->session->userdata('loggged_in');




        $data=$this->get_info();
         
        $data['order_id']=$this->uri->segment(3);
        
        //$data['res'] = $this->Designmodel->first($data['user_id']);

        $data['userData'] = $data;

       // print_r($data['userData']); die();
              
              
        $this->load->view('buyer/request',$data);
  }

  public function writer_approvals(){

    $this->check_login();

    $data=$this->session->userdata('loggged_in');
    $data=$this->get_info();

   $data['r']=$this->Adminmodel->get_unconfirmed_writers();
   $this->load->view('admin/writer_requests',$data);

 }

   public function check_login(){

       if($this->session->userdata('loggged_in')){

         return;

       }
       else
       {
           //$data =  $this->get_logins();
            redirect('admin');

       }


    }

   public function pending()
  {

     $this->check_login();

      $data=$this->session->userdata('loggged_in');
      $data=$this->get_info();

      $data['pending']=$this->Adminmodel->get_pending();

      $this->load->view('admin/pending',$data);
             
  }

    public function review()
  {

     $this->check_login();

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['review']=$this->Adminmodel->get_review();

      $this->load->view('admin/review',$data);
             
  }

    public function all()
  {

     $this->check_login();

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['all']=$this->Adminmodel->get_all();

      $this->load->view('admin/all',$data);
             
  }

  public function complete()
  {

     $this->check_login();

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['complete']=$this->Adminmodel->get_completed();

      $this->load->view('admin/complete',$data);
             
  }

   public function commission_view()
  {

      $this->check_login();

      $writerid=$this->uri->segment(3);

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['comm']=$this->Adminmodel->get_current_commission();

      $this->load->view('admin/settings_commission',$data);
             
  }

   public function packages_view()
  {

     $this->check_login();

      $writerid=$this->uri->segment(3);

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['e']=$this->Adminmodel->get_packages();

     

      $this->load->view('admin/settings_pricing',$data);
             
  }

  public function writer_application()
  {

      $this->check_login();

      $writerid=$this->uri->segment(3);

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['d']=$this->Adminmodel->writer_application($writerid);

     // print_r($data['d']->result()); die();

      $response=$data['d']->result();

      $tags=$response[0]->user_industry;

      $data['i']=$this->Adminmodel->get_inda($tags);




      $this->load->view('admin/writer_application',$data);
             
  }

  public function approve_order_chron()
  {

        $resp=$this->Adminmodel->get_awaiting_approval_chron();
        //$resp=$resp[0];
       // print_r($resp); die();
        $super=array();

        foreach ($resp as $neon) {
            $arr=array(
                       'order_id'=> $neon->order_id,
                       'order_status'=>6,
                      );

         //  $super= $super+$arr;
            array_push($super, $arr); 
          # code...
        }

       // print_r($super); die();

        $this->Adminmodel->update_approval($super);



  }

   public function approve_order()
  {

      $this->check_login();

      $orderid=$this->input->post('order_id');
      $writer_id=$this->input->post('user_id');

      if(empty($writer_id)){

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $updatearr=array(
                       'order_status'=>6,
                      );

      $this->Adminmodel->update_order($orderid,$updatearr);

      $res=$this->Adminmodel->get_active_writers();
      
         foreach ($res->result() as $row)
          {
           # code...
               $tos[]=$row->user_email; 
               // echo $to; die();
              


          }
         // $tos[]=$row->advertiser_email; 
          $to=implode(',', $tos);

      $subject="#$orderid:New Order";
      $message="Dear writer, <br>A new order with ID:$orderid is available. <br>
      Kindly take it up if you are interested. <br>
      Kind regards,<br>
      EssayLoop Team";

      $this->send_mail($to,$subject,$message);


      $data['notification']="Order has been successfully approved";

      $data['awaiting']=$this->Adminmodel->get_awaiting_approval();

      $this->load->view('admin/awaiting_approval',$data);

     }
     else
     {

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $updatearr=array(
                       'order_status'=>5,
                       'order_writer_id'=>$writer_id,
                      );

      $this->Adminmodel->update_order($orderid,$updatearr);

      $res=$this->Adminmodel->get_user_details($writer_id);
      $res=$res[0];
      $fname=$res->user_fname;
      $email=$res->user_email;

      $subject="#$orderid:New Order";
      $message="Hi $fname, <br>A new order with ID:$orderid has been assigned to you. <br>
      Kindly get to work ASAP <br>
      Kind regards,<br>
      EssayLoop Team";

     $this->send_mail($email,$subject,$message);

      $data['notification']="Order has been successfully assigned to writer";

      $data['awaiting']=$this->Adminmodel->get_awaiting_approval();

      $this->load->view('admin/awaiting_approval',$data);

     }


             
  }

   public function approve_writer()
  {

      $this->check_login();

      $writerid=$this->input->post('writer_id');

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $updatearr=array(
                       'user_writer_status'=>3,
                       'user_level_id'=>$this->input->post('writer_level'),
                       'user_writer_type'=>$this->input->post('writer_type'),

                      );

      $this->Adminmodel->approve_writer($writerid,$updatearr);

      $res=$this->Adminmodel->get_user_details($writerid);
      $res=$res[0];
      $fname=$res->user_fname;
      $email=$res->user_email;

      $subject="#$writerid:Congratulations your application has been approved";
      $message="Hi $fname, <br>Congratulations your application has been approved.<br>Your writer ID is $writerid.<br>Kindly log in to your account to start taking up orders.<br>
      Kind regards,<br>
      EssayLoop Team";

      $this->send_mail($email,$subject,$message);




      $data['notification']="Writer has been successfully approved";

      $this->load->view('admin/notification',$data);
             
  }

   public function approve_step_one()
  {

      $this->check_login();

      $writerid=$this->uri->segment(3);

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['d']=$this->Adminmodel->writer_application($writerid);

      $data['t']=$this->Adminmodel->get_writer_types();

      $data['p']=$this->Adminmodel->get_packages();
      $data['writerid']=$writerid;

      $response=$data['d']->result();

      $tags=$response[0]->user_industry;

      $data['i']=$this->Adminmodel->get_inda($tags);




      $this->load->view('admin/step_one',$data);
             
  }

    public function settings_commission()
  {

     $this->check_login();

      $commission=$this->input->post('commission');
      $commissionid=1;

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $updatearr=array(
                       'industry_percentage '=>$commission,
                      );

      $this->Adminmodel->update_commission($commissionid,$updatearr);

      $data['comm']=$this->Adminmodel->get_current_commission();

      $data['notification']="Commission has been updated successfully";

      $this->load->view('admin/settings_commission',$data);
             
  }

   public function complete_payment()
  {

     $this->check_login();

      $request_id=$this->uri->segment(3);
     // $commissionid=1;

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $updatearr=array(
                       'request_paid_status '=>1,
                      );

      $this->Adminmodel->update_payments($request_id,$updatearr);

    //  $data['comm']=$this->Adminmodel->get_current_commission();

      $data['notification']="Payment details updated successfully, head to paypal to send the cash";

      $this->load->view('admin/notification',$data);
             
  }

   public function current_time()
  {

     date_default_timezone_set('Africa/Nairobi'); 
     return date("Y-m-d H:i:s");

  }


   public function settings_pricing()
  {

     $this->check_login();

    

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $uparr = array(

              array(
                'level_id' => 1 ,
                'level_per_word' => $this->input->post('Starter') ,
                
              ),
              array(
                'level_id' => 2 ,
                'level_per_word' => $this->input->post('Pro'),
               
              ),
               array(
                'level_id' => 3 ,
                'level_per_word' => $this->input->post('Expert'),
               
              )
          );    


      $this->Adminmodel->update_pricing($uparr);

       $data['e']=$this->Adminmodel->get_packages();

      $data['notification']="Pricing has been updated successfully";

      $this->load->view('admin/settings_pricing',$data);
             
  }

   public function reject()
  {

     $this->check_login();

      $writerid=$this->uri->segment(3);

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $updatearr=array(
                       'user_writer_status'=>5,
                      );

      $this->Adminmodel->approve_writer($writerid,$updatearr);

      $res=$this->Adminmodel->get_user_details($writerid);
      $res=$res[0];
      $fname=$res->user_fname;
      $email=$res->user_email;

      $subject="#$writerid:Sorry your application has been rejected";
      $message="Hi $fname, <br>Sorry your application has been rejected. <br>
      Kind regards,<br>
      EssayLoop Team";

      $this->send_mail($email,$subject,$message);

      $data['notification']="Writer application has been rejected";

      $this->load->view('admin/notification',$data);
             
  }
   public function request_more_info()
  {

     $this->check_login();

      $writerid=$this->input->post('writer_id');

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();
      
      $updatearr=array(
                       'user_writer_status'=>4,
                       'user_more'=>$this->input->post('more_info'),
                      );
      $more_info=$this->input->post('more_info');

      $this->Adminmodel->approve_writer($writerid,$updatearr);

      $res=$this->Adminmodel->get_user_details($writerid);
      $res=$res[0];
      $fname=$res->user_fname;
      $email=$res->user_email;

      $subject="#$writerid:Kindly provide more information.";
      $message="Hi $fname, <br>We have gone through your application. And we have requested more information as follows: $more_info<br>
      Kindly provide the information ASAP.<br>
      Kind regards,<br>
      EssayLoop Team";

      $this->send_mail($email,$subject,$message);



      $data['notification']="More information has been requested from the writer";

      $this->load->view('admin/notification',$data);
             
  }

   public function request_more_info_view()
  {

      $this->check_login();

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['writerid']=$this->uri->segment(3);

      $this->load->view('admin/more_info',$data);
             
  }
   public function revision()
  {

     $this->check_login();

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['revision']=$this->Adminmodel->get_revision();

      $this->load->view('admin/revision',$data);
             
  }

   public function awaiting()
  {

     $this->check_login();

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['awaiting']=$this->Adminmodel->get_awaiting();

      $this->load->view('admin/awaiting',$data);
             
  }

   public function get_technical()
  {
        //$this->load->model('designmodel');
        $this->check_login();
       
        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');

         $data=$this->get_info();


         $data['technical']= $this->Adminmodel->get_technical();

       
        // $data['userData'] = $data;

         $this->load->view('admin/technical',$data);
  }

   public function awaiting_approval()
  {

     $this->check_login();

      $data=$this->session->userdata('loggged_in');

      $data=$this->get_info();

      $data['awaiting']=$this->Adminmodel->get_awaiting_approval();
      $data['writers']=$this->Adminmodel->get_active_writers();


      $this->load->view('admin/awaiting_approval',$data);
             
  }
        
        public function add_officer()
  {
        //check sessions
        
         $this->load->library('session');
           if($this->session->userdata('loggged_in')){

            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
         
           $this->load->database();
     
           $this->load->model('Adminmodel');
          
           $this->load->view('adminaddofficer',$data);
           }
           else
           {
                $this->load->view('admin/login');
           }
             
        }
        
         public function guarantor_details()
  {
        //check if user is logged in
          $this->load->library('session');
           if($this->session->userdata('loggged_in')){

            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
           //display reason form and pass the variables
           $phone =  $this->uri->segment(3);
           //$data['id']=$idnumber;
           $this->load->database();
     
           $this->load->model('Adminmodel');

           $data['h']=$this->Adminmodel->guarantor_details($phone);
           
            $data['disbursecount'] = $this->Adminmodel->disburse_count();
           $data['requestcount'] = $this->Adminmodel-> request_count();
           date_default_timezone_set('Africa/Nairobi');
           $now = date('Y-m-d H:i:s');
           $data['leo'] = $now;
         
            
           
           $this->load->view('admin_guarantor_details',$data);
           }
           else
           {
               $this->load->view('admin_login');
           }
        }
        
      
      
        
        
        public function all_admins()
  {
      
       $this->load->library('session');
           if($this->session->userdata('loggged_in')){

            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];

           $this->load->database();
     
           $this->load->model('Adminmodel');

           $data['h'] = $this->Adminmodel->get_admins();
           
           $data['disbursecount'] = $this->Adminmodel->disburse_count();
           $data['requestcount'] = $this->Adminmodel-> request_count();
           
            $this->load->view('all_admins',$data);
           }
           else
           {
               $this->load->view('admin_login');
           }
             
      }


        public function change_password_process()

    {

             $this->check_login();

             $data=$this->session->userdata('loggged_in');

             $data=$this->get_info();

            //get the old password and check if it is correct

            $old_pass        = $this->input->post('old_password');

            $password        = $this->input->post('new_password');

            $pao=$this->hash_password($password);

            $datay=array(

                  'password'=>$old_pass ,

                  'user_id'=> $data['user_id'],

                        );

            $status=$this->Adminmodel->checkpasswordadvertiser($datay);


                //   echo $status; die();



                 if($status=='true')

                {

                  

                



                 $dasa=array(

                  'user_password'=>$pao,

                 );



                $this->Adminmodel->update_pass_advertiser( $data['user_id'],$dasa);



                 $data['userData'] = $data;

                $data['sucess']="Password update successful";

                $this->load->view('admin/change_password', $data);

           

           

                   

                }

                else

                {



                 $data['userData'] = $data;

                $data['fail']="Wrong old password";

                $this->load->view('admin/change_password', $data);



          

           

          

              }


      


             

            

        }
        
         public function change()
  {
      
       $this->load->library('session');
           if($this->session->userdata('loggged_in')){

            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];

           $this->load->database();
     
           $this->load->model('Adminmodel');

           //$data['h'] = $this->Adminmodel->get_officers();
           
           $data['disbursecount'] = $this->Adminmodel->disburse_count();
           $data['requestcount'] = $this->Adminmodel-> request_count();
           
            $this->load->view('admin_change',$data);
           }
           else
           {
               $this->load->view('admin_login');
           }
             
        }


          public function change_password()

        {

           //$this->check_login();

           $data=$this->session->userdata('loggged_in');

           $data=$this->get_info(); 

           

   

       

       
        

          $this->load->view('admin/change_password',$data);

        

            

        }
        
         public function change_process()
  {
      
       $this->load->library('session');
           if($this->session->userdata('loggged_in')){

            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
            $email= $this->session->userdata['loggged_in']['admin_email'];
            //get the old password and check if it is correct
            $old_pass        = $this->input->post('old');
             $password        = $this->input->post('password');
            $pao=$this->hash_password($password);

           $this->load->database();
     
           $this->load->model('Adminmodel');
           

           $result = $this->Adminmodel->confam($old_pass,$email);
           
           if($result===true)
           {
                $this->load->library('form_validation');
               $this->form_validation->set_rules('password', 'Password', 'required');
               $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]');
               
               

                if ($this->form_validation->run() == FALSE)
                {
                        $data['disbursecount'] = $this->Adminmodel->disburse_count();
                        $data['requestcount'] = $this->Adminmodel-> request_count();
                        $this->load->view('admin_change',$data);
                }
                else
                {
                        //update password
                        $dasa=array(
                            
                               'admin_password'=>$pao,
                            );
                         $data['messo'] = "password update successfully";
                        $this->Adminmodel->update_pass($email,$dasa);
                        $data['disbursecount'] = $this->Adminmodel->disburse_count();
                        $data['requestcount'] = $this->Adminmodel-> request_count();
                        $this->load->view('admin_change',$data);
                }
               
               
           }
           
           else
           {
               
           $data['message']="Your old password is wrong";    
           $data['disbursecount'] = $this->Adminmodel->disburse_count();
           $data['requestcount'] = $this->Adminmodel-> request_count();
           
            $this->load->view('admin_change',$data);
               
           }
           
           //confirm new passwords
           
          
           }
           else
           {
               $this->load->view('admin_login');
           }
             
        }


   public function create_email()

  {
       $this->check_login();

       $data=$this->get_info();


      $this->load->view('admin/create_email',$data);

  }


  public function send_client_emails()

  {

     $this->check_login();

     $id=$this->uri->segment(3);

    

    // $advertiser_type=$this->input->post('advertiser_type');
     $msg=$this->input->post('message');
     $subject=$this->input->post('subject');

    

        $res=$this->Adminmodel->get_buyers();

         foreach ($res->result() as $row)
          {
           # code...
               $tos[]=$row->user_email; 
               // echo $to; die();
              


          }
         // $tos[]=$row->advertiser_email; 
          $to=implode(',', $tos);
          // print_r($to); die();

          // $fname=$row->advertiser_fname; 
           $message="Dear client, <br> $msg. <br><br> EssayLoop Team";

           $this->send_mail($to,$subject,$message);

           $data=$this->get_info();

           $data['success']="Emails sent successfully";


           $this->load->view('admin/create_email',$data);

      




  }

  public function send_writer_emails()

  {

     $this->check_login();

     $id=$this->uri->segment(3);

    

    // $advertiser_type=$this->input->post('advertiser_type');
     $msg=$this->input->post('message');
     $subject=$this->input->post('subject');

    

        $res=$this->Adminmodel->get_writers_new();

         foreach ($res->result() as $row)
          {
           # code...
               $tos[]=$row->user_email; 
               // echo $to; die();
              


          }
         // $tos[]=$row->advertiser_email; 
          $to=implode(',', $tos);
          // print_r($to); die();

          // $fname=$row->advertiser_fname; 
           $message="Dear writer, <br> $msg. <br><br> EssayLoop Team";

           $this->send_mail($to,$subject,$message);

           $data=$this->get_info();

           $data['success']="Emails sent successfully";


           $this->load->view('admin/create_writer_email',$data);

      




  }


  public function send_to_selected()

  {

       $this->check_login();

       $data=$this->get_info();

       $data['h']=$this->Adminmodel->get_buyers();

       $data['d']=$this->Adminmodel->get_writers_new();

       $this->load->view('admin/send_to_selected',$data);

  }

   public function create_email_writer()

  {

       $this->check_login();

       $data=$this->get_info(); 

      $this->load->view('admin/create_writer_email',$data);

  }
        
          public function approve_process()
  {
           $idnumber = $this->uri->segment(3);
           
           $this->load->database();
     
           $this->load->model('Adminmodel');
           
           $max_id=$this->Adminmodel->get_max_id($idnumber);
           
           
           //update loan_request status
           $this->Adminmodel->update_request($idnumber,$max_id);

            //update loan_request status
           $this->Adminmodel->update_approved($idnumber,$max_id);

           /*
           //change status
           $this->load->helper('date');
           
   
              
           
            
             $this->load->database();

             $this->load->model('Adminmodel');
            //insert into database
            
            //$result=$this->Adminmodel->get_officer_id($idnumber);
              date_default_timezone_set('Africa/Nairobi');
              $now = date('Y-m-d H:i:s');
                $dara=array(
                       
                       'loan_name' => "Basic",                    
                       'customer_id' => $idnumber,
                       'principal' => 5000,
                       'loan_status' =>3,
                       'start_date' =>$now,
                       
                       );
                      
            
             $this->Adminmodel->add_successful($dara);
             */
             
             $this->load->database();
     
             $this->load->model('Adminmodel');

             $this->Adminmodel->approve_process($idnumber);
            
            redirect('admin/approve');
             
            
             
        }
         public function all_events()
    {
            $this->load->library('session');
             
           if($this->session->userdata('loggged_in')){
             
           $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
           
           $this->load->database();
     
           $this->load->model('Adminmodel');

           $data['h']=$this->Adminmodel->get_received();
           
           $this->load->view('admin_allevents',$data);
           }
           else
           {
                $this->load->view('admin_login');
           }
             
        }
        
        public function all_downloads()
    {
            $this->load->library('session');
             
           if($this->session->userdata('loggged_in')){
             
           $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
           
           $this->load->database();
     
           $this->load->model('Adminmodel');

           $data['h']=$this->Adminmodel->get_downloads();
           
           $this->load->view('admin_alldownloads',$data);
           }
           else
           {
                $this->load->view('admin_login');
           }
             
        }
        
         public function show_downloads()
    {
            $this->load->library('session');
             
           if($this->session->userdata('loggged_in')){
             
           $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
           
           $this->load->database();
     
           $this->load->model('Adminmodel');

           $data['h']=$this->Adminmodel->get_downloads();
           
           $this->load->view('admin_deletedownloads',$data);
           }
           else
           {
                $this->load->view('admin_login');
           }
             
        }


         public function delete_admin()
  {
           //display reason form and pass the variables
           //add session
           $this->load->library('session');
             
           if($this->session->userdata('loggged_in')){

            //$data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
            
            
                $userid =  $this->uri->segment(3);
           //$data['id']=$idnumber;
            //change status of customer
                 $this->load->database();

                 $this->load->model('Adminmodel');
            
                 $this->Adminmodel->deleteadminnew($userid);

                 $data=$this->get_info();

                 $data['h']=$this->Adminmodel->get_admins();
                 
                 
                 
               $data['success']='Admin Deleted Successfully';
           //call loan balance here
               $this->load->view('admin/admin',$data);
           
          
           }
           else
           {
               
               $this->load->view('admin/admin_login');
           
           }
             
        }
        
      
        
        public function delete_event_process()
  {
           //display reason form and pass the variables
           //add session
           $this->load->library('session');
             
           if($this->session->userdata('loggged_in')){

            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
            
            
           $eventid =  $this->uri->segment(3);
           //$data['id']=$idnumber;
            //change status of customer
                 $this->load->database();

                 $this->load->model('Adminmodel');
            
                 $this->Adminmodel->deleteevent($eventid);
                 
                 
                 
               $data['message']='Event Deleted Successfully';
           //call loan balance here
               $this->load->view('clear_success',$data);
           
          
           }
           else
           {
               
               $this->load->view('admin_login');
           
           }
             
        }
         public function delete_download_process()
  {
           //display reason form and pass the variables
           //add session
           $this->load->library('session');
             
           if($this->session->userdata('loggged_in')){

            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
            
            
           $downloadid =  $this->uri->segment(3);
           //$data['id']=$idnumber;
            //change status of customer
                 $this->load->database();

                 $this->load->model('Adminmodel');
            
                 $this->Adminmodel->deletedownload($downloadid);
                 
                 
                 
               $data['message']='Download Deleted Successfully';
           //call loan balance here
               $this->load->view('clear_success',$data);
           
          
           }
           else
           {
               
               $this->load->view('admin_login');
           
           }
             
        }
        
        
        
        public function approve()
  {
           $this->load->library('session');
           if($this->session->userdata('loggged_in')){
            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];
            
                       


           $this->load->database();
     
           $this->load->model('Adminmodel');
            $data['requestcount'] = $this->Adminmodel-> request_count();
               $data['disbursecount'] = $this->Adminmodel->disburse_count();

           $result = $this->Adminmodel->display_approve();
           if($result!=FALSE)
           {
           
               $data['h'] = $this->Adminmodel->display_approve();
              

               $this->load->view('approve_clients',$data);
               
           }
           else
           {
                 $data['message'] = "Sorry! There are no records at the moment";
                
                 $this->load->view('approve_clients',$data);
               
           }
           }
            
           else
           {
                $this->load->view('admin_login'); 
           }
             
        }
        
        public function pending_approval()
  {
           $this->load->library('session');
            $data['jina'] = $this->session->userdata['loggged_in']['admin_name'];

           $this->load->database();
     
           $this->load->model('Adminmodel');

           $result = $this->Adminmodel->display_approve();
           
            $data['disbursecount'] = $this->Adminmodel->disburse_count();
           $data['requestcount'] = $this->Adminmodel-> request_count();
           
           if($result!=FALSE)
           {
           
               $data['h'] = $this->Adminmodel->display_approve();

               $this->load->view('approve_pending',$data);
               
           }
           else
           {
                 $data['message'] = "Sorry! There are no records at the moment";
                
                 $this->load->view('approve_pending',$data);
               
           }
           
          
             
        }
        
        
        //  public function add_admin()
        // {
        //      $this->load->library('session');
        //    if($this->session->userdata('loggged_in')){
        //       $data['jina'] = $this->session->userdata['loggged_in']['admin_name']; 
               
        //     $this->load->database();
        //     $this->load->model('Adminmodel');
        //     $data['disbursecount'] = $this->Adminmodel->disburse_count();
        //     $data['requestcount'] = $this->Adminmodel-> request_count();
        //     $this->load->view('add_admin',$data);
        //    }
        //    else
        //    {
        //        $this->load->view('admin_login');
        //    }
        // }
        
        private function hash_password($password){
             return password_hash($password, PASSWORD_BCRYPT);
        }
        
       
        
        public function summary()
  {
            $this->load->library('session');
            $ema = $this->session->userdata['loggged_in']['admin_email'];
            
           if(isset($ema))
           {
           $this->load->database();
     
           $this->load->model('Adminmodel');

           $data['jina'] = $this->Adminmodel->get_admin_name($ema);
           } 

           $this->load->database();
     
           $this->load->model('Adminmodel');

           $data['h'] = $this->Adminmodel->summary();
           
            $this->load->view('admin_summary',$data);
             
        }
        
        
        
        public function logout() {

// Removing session data
        $sess_array = array(
        'admin_name' => ''
        );
         $this->load->library('session');
        $this->session->unset_userdata('loggged_in', $sess_array);
        $data['message_display'] = 'Successfully Logged out';
        $this->load->view('admin/login', $data);
}
        
         public function buyers()
     {
            $this->load->database();  
             //load the model  
            $this->load->model('Adminmodel');  
            
           $data['disbursecount'] = $this->Adminmodel->disburse_count();
           $data['requestcount'] = $this->Adminmodel-> request_count();
             
            $app =  $this->uri->segment(3);
            $str=base64_decode($app);
             //load the method of model  
            $data['h']=$this->Adminmodel->clients($str);  
             
            $this->load->view('officer_clients',$data);

        }

        public function user_login_process()
       {

        $data = array(
        'email' => $this->input->post('admin_email'),
        'password' => $this->input->post('admin_password'),
        'role' => $this->input->post('user_role')
        );

              

         $result = $this->Adminmodel->login($data);

          if ($result == TRUE) 
              
            {

              $admin_email = $this->input->post('admin_email');
              $result = $this->Adminmodel->read_user_information($admin_email);

              if ($result != false) 
              {
                 
                  $session_data = array(
                  'user_id' => $result[0]->user_id,
                  'user_fname' => $result[0]->user_fname,
                  'user_email' => $result[0]->user_email,
                  'user_role' => $result[0]->user_role,
                  'role_name' => $result[0]->role_name,
                  'role_id' => $result[0]->role_id,
                   );
              // Add user data in session
               $this->load->library('session');

               $this->session->set_userdata('loggged_in', $session_data);
                          // $this->load->database();
               
                         //$this->load->model('Adminmodel');

                        //$data['orders'] = $this->Adminmodel->get_orders();
                         
               redirect('admin/dashboard');
              }
          } 
          else 
          {
              
            $data['error_message'] ='Invalid Username or Password';
            $this->load->view('admin/login', $data);

          }

      }

        
  
}

?>