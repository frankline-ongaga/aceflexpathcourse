<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {


         private $redirect_uri = ''; // Will be set in constructor

    
        function __construct()
  {
    
                 parent::__construct();
    
        
                $this->load->helper(array('form', 'url'));
                
             
                 $this->load->library("pagination");

                 $this->load->database();

                // Load form helper library


                // Load form validation library
                 $this->load->library('form_validation');

                // Load session library
                 $this->load->library('session');

                 $this->load->helper('date_helper');


                $this->load->helper('download');



               // $this->load->library('facebook');

               // $this->load->library('google');

                // Load database
                $this->load->model('Designmodel');

                 $this->load->model('Mahana_model');

                $this->load->library('mahana_messaging');

                $this->redirect_uri = base_url('client/return');

        }

  public function get_info()
  {
        $this->check_login();
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $message= $this->mahana_messaging->get_msg_count($data['user_id'], $status_id = MSG_STATUS_UNREAD);
         $data['message_count']=$message['retval'];
        

         $data['completed']= $this->Designmodel->get_completed($data['user_id']);
         // print_r($data['completed']->num_rows());
         // die();
         $data['mode_name']= $this->Designmodel->get_display_mode($data['user_id']);
         $data['technical']= $this->Designmodel->get_technical($data['user_id']);
         $data['pending']= $this->Designmodel->get_pending($data['user_id']);
         $data['revision']= $this->Designmodel->get_revision($data['user_id']);
         $data['awaiting']= $this->Designmodel->get_awaiting($data['user_id']);
         $data['all']= $this->Designmodel->get_all($data['user_id']);
         $data['bal']= $this->Designmodel->get_current_balance($data['user_id']);
         $data['cancel']= $this->Designmodel->get_cancelled($data['user_id']);

         $data['completed_count']= $data['completed']->num_rows();
         $data['technical_count']= $data['technical']->num_rows();
         $data['pending_count']= $data['pending']->num_rows();
         $data['revision_count']= $data['revision']->num_rows();
         $data['awaiting_count']= $data['awaiting']->num_rows();
         $data['all_count']= $data['all']->num_rows();
         $data['cancel_count']= $data['cancel']->num_rows();

         $response= $this->mahana_messaging->get_all_threads_grouped($data['user_id'], $full_thread = FALSE, $order_by = 'DESC');
         $data['threads']=$response['retval'];
         $data['thready']=array_slice($data['threads'], 0, 8);



         return $data;

  }

  public function change_mode(){
       $this->check_login();

        $data=$this->session->userdata('userData');

        $data=$this->get_info();

        $user_id=$data['user_id'];

        $mode=$this->input->post('mode');

        $update_arr=array(
                           'user_display_mode'=>$mode,
                         );

        $this->Designmodel->update_user($user_id, $update_arr);




  }

   public function download(){


      $pa=$this->uri->segment(3);
      $path=base64_decode($pa);

       if($_SERVER['HTTP_HOST'] == 'localhost')
        {
           $pa="/opt/lampp/htdocs/aceflexpathcourse/".$path;
        }
        else
        {
           
            $pa="/var/www/aceflexpathcourse.com/public_html/".$path;

        }

      force_download($path, NULL);
  }


    public function update_order(){

               $this->check_login();

               $this->load->model('Adminmodel');

               $data=$this->session->userdata('userData');

               $order_writer_id=$this->assign_admin();

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
               $timezone=$this->input->post('order_tz');
               $edit_note=$this->input->post('edit_note');
               $commission=$this->Designmodel->get_commission();

              // echo $edit_note; die();


               $order_id=$this->input->post('order_id');

               $resp= $order_id;
               //$file=$this->input->post('file');

              // echo $timezone; die();


              // $order_other=$this->input->post('order_other');
                 if(empty($timezone)){
                   
                    $timezone="America/New_York";

                 }
                 else
                 {
                    $timezone=$timezone;

                 }

                      
              

                   $time_manenos=$this->get_time_stuff($timezone,$deadline_id);
                   $due=$deadline_id;
                   $start=$time_manenos['start'];
                   $period=$time_manenos['period'];
              

               //do an insert first
             

           

                if(!empty($_FILES)){ 

                 // $filenames=array();

                  $countfiles = count($_FILES['file']['name']);

                   //print_r($countfiles); die();
                   
      // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['file']['name'][$i])){

                      // print_r($_FILES['file']['name'][$i]); die();
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['fil']['name'] = $_FILES['file']['name'][$i];
                        $_FILES['fil']['type'] = $_FILES['file']['type'][$i];
                        $_FILES['fil']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                        $_FILES['fil']['error'] = $_FILES['file']['error'][$i];
                        $_FILES['fil']['size'] = $_FILES['file']['size'][$i];

                        // Set preference
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                       // $config['max_size'] = '500000'; // max_size in kb
                       // $config['file_name'] = $_FILES['file']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
                        // File upload
                        if(!$this->upload->do_upload('fil')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                       
                        


                        }
                        else
                        {

                            

                         

                              $uploadData = $this->upload->data();

                            //  print_r($uploadData); die();

                             


                              // print_r($uploadData); die();
                              $filename = $uploadData['file_name'];

                              // // Initialize array
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
                          $data['userData'] = $data;



                      
                            $this->load->view('buyer/order', $data);
                         




                       }
                       else
                       {



                      // $user_id=$this->Designmodel->insert_buyer($user_array);
                         $data=$this->session->userdata('userData');


                         $user_id=$data['user_id'];
                         $fname=$data['user_fname'];
                         $email=$data['user_email'];


                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                      //  'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        'edit_note' =>$edit_note,
                        //send email to client confirming receipt
                       );
                      }
                      else
                      {

                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                       // 'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_writer_id' =>$writer_id,
                       // 'order_status' =>5,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        'edit_note' =>$edit_note,
                        
                        //send email to client confirming receipt
                       );


                      }

                     // print_r($filenames); die();


                      $this->Designmodel->update_order($order_id,$orderarray);

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


               
         


                 $subject="#$resp: Order updated successfully";
                 $message="Hi $fname, <br>Thanks for choosing AceFlexPathCourse. Your order has been updated successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Amount: $amount <br>
                  Order Placed: $start<br>
                  Due Date: $due<br>
                  Edit Note: $edit_note <br>
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

                // $this->generate_invoice($amount,$resp,$fname,$email);


                // die();

                 
              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                $this->load->library('session');

                 $data=$this->session->userdata('userData');

                 $data=$this->get_info();

                
                 
                  if ($this->session->flashdata('order_id')){
                    $data['order_id'] = $this->session->flashdata('order_id');
                  }
                  if ($this->session->flashdata('amount')){
                    $data['amount'] = $this->session->flashdata('amount');
                  }
                 


                    $data['userData'] = $data;

                   // echo $resp;

                   $this->session->set_flashdata('order_id',$resp); 
                   $this->session->set_flashdata('amount',$amount);
                    //redirect("client/paypal", "refresh");

                     $mydata['order_id']=$resp;
                    // $mydata['amount']=$amount;

                      //echo $data;
                      echo json_encode($mydata);



                      } //end of no error
                             
                   
                  }  //end proceed
                       
                  
               
                else
                {
                  //no upload
                    $data=$this->session->userdata('userData');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                    



                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                       // 'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        'edit_note' =>$edit_note,
                        
                        //send email to client confirming receipt
                       );
                      }
                      else
                      {

                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                       // 'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_writer_id' =>$writer_id,
                       // 'order_status' =>5,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        'edit_note' =>$edit_note,
                        
                        //send email to client confirming receipt
                       );


                      }

                   

                

                 $resp=$order_id;

                 $this->Designmodel->update_order($resp,$orderarray);


                    
                 $result=$this->Designmodel->get_names($resp);

                 $discipline_name=$result[0]->discipline_name;

                 $format_name=$result[0]->format_name;

                  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Order updated successfully";
                 $message="Hi $fname, <br>Thank you for choosing  AceFlexPathCourse. Your order has been updated successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Due Date: $due <br>
                  Edit Note: $edit_note <br>
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);


                 redirect("/client/get_paper_details/".$resp.'/'.'77');

                 //$this->generate_invoice($amount,$resp,$fname,$email);


               //  die();


              
     
                
               //  $this->session->set_flashdata('order_id',$resp); 
               //  $this->session->set_flashdata('amount',$amount);
               // $this->load->library('session');

               //   $data=$this->session->userdata('userData');

               //     $data=$this->get_info();

               //    //$this->load->model('designmodel');
               //            $data['title']="99Content|Home"; 
                         
               //            if ($this->session->flashdata('order_id')){
               //              $data['order_id'] = $this->session->flashdata('order_id');
               //            }
               //            if ($this->session->flashdata('amount')){
               //              $data['amount'] = $this->session->flashdata('amount');
               //            }
                         

               //    $data['title']="Excellent Writers|Complete order";
               //    $data['description']="Complete your order via Paypal";

               //    $data['userData'] = $data;
          
               //    $this->load->view('buyer/header',$data);
               //    $this->load->view('buyer/paypal',$data);
               //    $this->load->view('buyer/footer',$data);

                   }
                
            




          }

   public function invite_friend(){

          $this->check_login();
              

          $website="aceflexpathcourse.com";

          $data=$this->session->userdata('userData');
          $data=$this->get_info();

          $fname= $data['user_fname'];

          $id=$data['user_id'];
         //$stuff=$fname.$id;


         $link=base_url().'home/order_now/'.$id;

         $data['link'] = $link;



          $msg=$this->input->post('msg');
          $fnamey=$this->input->post('fname');
          $email=$this->input->post('email');


          $subject="Invitation to $website by $fname";

          $message="Hi $fnamey, <br>You have been invited to $website by $fname. <br>Kindly follow the link below to place an order with a 20% Discount.<br>

             $msg
             <br>
             <br>

             Warm Regards.

          ";





          $this->send_mail($email,$subject,$message);

          $data['success']="Invitation Successful";


         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/link',$data);
         $this->load->view('buyer/footer',$data);




  }

  
    
  public function get_awaiting()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['awaiting']= $this->Designmodel->get_awaiting($data['user_id']);

       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/awaiting',$data);
         $this->load->view('buyer/footer',$data);
  }

   public function get_cancelled()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['cancelled']= $this->Designmodel->get_cancelled($data['user_id']);

       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/cancelled',$data);
         $this->load->view('buyer/footer',$data);
  }


   public function paypal()
            {
                $this->load->library('session');

                 $data=$this->session->userdata('userData');

                   $data=$this->get_info();

                
                         
                          if ($this->session->flashdata('order_id')){
                            $data['order_id'] = $this->session->flashdata('order_id');
                          }
                          if ($this->session->flashdata('amount')){
                            $data['amount'] = $this->session->flashdata('amount');
                          }
                         


                  $data['userData'] = $data;
          
                  $this->load->view('buyer/header',$data);
                  $this->load->view('buyer/paypal',$data);
                  $this->load->view('buyer/footer',$data);
                  
            }

   public function get_technical()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['awaiting']= $this->Designmodel->get_technical($data['user_id']);

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/technical',$data);
         $this->load->view('buyer/footer',$data);
  }

   public function get_writer_ratings()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

          $writer_id=$this->uri->segment(3);

         $data=$this->get_info();


         $data['ratings']= $this->Designmodel->get_writer_ratings($writer_id);
         $data['average']= $this->Designmodel->get_average_ratings($writer_id);

       
         $data['userData'] = $data;

         $this->load->view('buyer/writer_ratings',$data);
  }

  

  public function make_orders()
  {
        //$this->load->model('designmodel');
        //$this->check_login();
        //$data['title']="99Content|Buyer"; 
        //get 5 most recent orders

        // $data=$this->session->userdata('userData');

        // $data=$this->get_info();


         $data['awaiting']= $this->Designmodel->make_orders();

       
         $data['userData'] = $data;

         $this->load->view('buyer/technical',$data);
  }



   public function request_funds_process()
  {
        $this->load->model('Designmodelwriter');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         //$writer_id=$this->input->post('writer_id');
         $request_amount=$this->input->post('request_amount');

         $data=$this->session->userdata('userData');
         $user_id=$data['user_id'];


         //subtract from account
        // $bal=$this->Designmodelwriter->get_balance($user_id);
         $bal= $this->Designmodel->get_balance($data['user_id']);

         if($bal>=3){



         $insertarr=array(
                           'user_id'=>$user_id,
                           'request_amount'=>$request_amount,
                           'request_designation'=>2,
                         );


         $this->Designmodelwriter->req_funds($insertarr);

         //new bal
         $newbal=$bal-$request_amount;

         $updatearr=array(
                            'account_balance'=>$newbal,
                         );

         $this->Designmodelwriter->update_balance($user_id,$updatearr);






         //

        

         $data=$this->get_info();
        

       // $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);


            $data['notification_title']= "We've received your request.";
            $data['notification_content']= 'Your funds are being processed';

           
            $data['writerData'] = $data;

            $this->load->view('buyer/header',$data);
            $this->load->view('buyer/general_notification',$data);
            $this->load->view('buyer/footer',$data);
        }
        else
        {

             $data=$this->get_info();
        

       // $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);


            $data['notification_title']= "Ooops you can't proceed";
            $data['notification_content']= 'You do not have enough money in your account';

           
            $data['writerData'] = $data;

            $this->load->view('buyer/header',$data);
            $this->load->view('buyer/general_notification',$data);
            $this->load->view('buyer/footer',$data);


        }
      
       


       
        
  }

   public function request_funds()
  {
        //$this->load->model('Designmodelwriter');
        $this->check_login();
       // $data['title']="99Content|writer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['user_id']= $data['user_id'];

         //$data['p']= $this->Designmodelwriter->get_payment_options();

         $data['balance']= $this->Designmodel->get_balance($data['user_id']);
       
         $data['userData'] = $data;

         $this->load->view('buyer/request_funds',$data);
  }

    public function my_earnings()
  {
        //$this->load->model('designmodel');
        $this->check_login();
      

         $data=$this->session->userdata('userData');
         $user_id=$data['user_id'];

         $data=$this->get_info();
         //weka hapa
         
              


         $data['earnings']= $this->Designmodel->my_coupons($data['user_id']);
         

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/earnings',$data);
         $this->load->view('buyer/footer',$data);
  }

   public function delete_order()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');
         $order_id=$this->uri->segment(3);

         $user_id=$data['user_id'];

         $data=$this->get_info();
        
            $wao=array(
                          'order_id'=>$order_id,

                       );

          $this->Designmodel->delete_order($wao);



         $data['awaiting']= $this->Designmodel->get_awaiting($data['user_id']);
         $data['message']= "Order deleted successfully";

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/awaiting',$data);
         $this->load->view('buyer/footer',$data);
  }

  public function load_account()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();

         if($this->uri->segment(3)){

             $data['amount']= $this->uri->segment(3);

           }

       
         $data['userData'] = $data;

         $this->load->view('buyer/load_account',$data);
  }

  public function my_link()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();
        // $fname=$data['user_fname'];
         $id=$data['user_id'];
         //$stuff=$fname.$id;


         $link=base_url().'home/order_now/'.$id;

         $data['link'] = $link;

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/link',$data);
         $this->load->view('buyer/footer',$data);

  }

   public function cancel_order()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();

         
        $order_id= $this->uri->segment(3);

        $update_array=array(
                        
                              'order_status'=>7,

                            );

        $this->Designmodel->update_order($order_id,$update_array);
        $email=$data['user_email'];
        $fname=$data['user_fname'];

        $subject="Order cancellation #$order_id";
        $message="Hi $fname,<br> We have received your order cancellation request. We will process your request within 48 hours according to our terms. <br>Kind regards, <br>AceFlexPathCourse Support";


        $this->send_mail($email,$subject,$message);


        $data['message']="We have successfully received your cancellation request.";

        
        $data['pending']= $this->Designmodel->get_pending($data['user_id']);
       
         $data['userData'] = $data;




         $this->load->view('buyer/pending',$data);
  }


   public function rate_paper()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| orders";
        $order_id=$this->uri->segment(3); 

        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();

        // $data=$this->get_info();

         $data['h']= $this->Designmodel->get_order_details($order_id);

        // print_r($data['d']); die();
         
         $data['userData'] = $data;
              
        $this->load->view('buyer/header',$data);      
        $this->load->view('buyer/rate',$data);
  }

  public function request_refund()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();

         $amount=$this->input->post('amount');

         if($amount>$data['bal'])
         {

            $data['userData'] = $data;

            $data['notification']="Go back to my account";

            $data['notification_url']=base_url().'buyer/my_account';

            $data['notification_title']="Oops! Refund Unsuccessful";

            $data['notification_message']="Your requested refund amount is greater than your account balance.";


            $this->load->view('buyer/super_notification',$data);


         }
         else
         {


         $insert_array=array(
                        'user_id'=>$data['user_id'],
                        'refund_amount'=>$amount,
                        'refund_status'=>1,

                      );

         $stuff=$this->Designmodel->add_refund($insert_array);

         $to=$data['user_email'];
         $fname=$data['user_fname'];
         $subject="#$stuff:Refund Request";
         $message="Dear $fname, <br>We have received your refund request. <br> Note that refunds will be processed to the payment method used for deposits. Please allow 1 day for refunds. <br> Kind regards, <br>99Content Team.";




         $this->send_mail($to,$subject,$message);

           

       
          $data['userData'] = $data;

          $data['notification']="View my refund status";

          $data['notification_url']=base_url().'buyer/get_refunds_status';

          $data['notification_title']="Processing your refund request";

          $data['notification_message']="We have received your refund request. <br> Note that refunds will be processed to the payment method used for deposits. Please allow 1 day for refunds.";


          $this->load->view('buyer/super_notification',$data);

        }
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

   public function recover_password()

  {

    // $this->check_session();

     $email=$this->input->post('email');




     $data=$this->get_calculation_variables();


    

     $res=$this->Designmodel->check_mail_exists($email);

     if($res=='true'){

         //create a random password
          $password=bin2hex(openssl_random_pseudo_bytes(8));

          $pass= $this->hash_password($password);

          $updatearr=array(
                            'user_password'=>$pass,

                          );

          $this->Designmodel->update_password($email,$updatearr);


          $subject="Password recovered successfully";
          $message="Dear client,<br>
                    Your password has been recovered successfully. Your new password is: <br><h2>".
                    trim($password) ."</h2> <br>

                    You can easily change your password from your client dashboard.<br><br>

                    AceFlexPathCourse Team.
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

   public function message_index()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['a']= $this->Designmodel->get_admins();

       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/create_message',$data);
         $this->load->view('buyer/footer',$data);
  }

  public function message_writer()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['order_id']= $this->uri->segment(3);
         $data['user_id']= $this->uri->segment(4);


       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/create_message_writer',$data);
         $this->load->view('buyer/footer',$data);
  }

  public function my_account()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $db= $this->load->database('default', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
        
         $data['h'] = $db->select('*')->where('user_id=',$data['user_id'])->where('refund_status=',0)->join('tbl_payment_type', 'type_status = payment_type')->order_by('transaction_added', 'DESC')->get('tbl_transactions');


        // $data['h']= $this->Designmodel->get_transactions();

       
         $data['userData'] = $data;

         $this->load->view('buyer/my_account',$data);
  }

  public function get_refunds_status()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $db= $this->load->database('default', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.

                       
        
         $data['h'] = $db->select('tbl_refund.refund_id as ido,refund_amount,refund_name,tbl_refund.user_id,refund_date')->where('tbl_refund.user_id=',$data['user_id'])->join('refund_status', 'refund_status = refund_status.refund_id')->order_by('refund_date', 'DESC')->group_by('refund_date')->get('tbl_refund');


        // $data['h']= $this->Designmodel->get_transactions();

       
         $data['userData'] = $data;

         $this->load->view('buyer/get_refunds',$data);
  }

   public function change_password()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['a']= $this->Designmodel->get_admins();

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/change_password',$data);
         $this->load->view('buyer/footer',$data);
  }

   public function change_password_process()

    {

             $this->check_login();

             $data=$this->session->userdata('userData');

             $data=$this->get_info();

            //get the old password and check if it is correct

            $old_pass        = $this->input->post('old_password');

            $password        = $this->input->post('new_password');

            $pao=$this->hash_password($password);

            $datay=array(

                  'password'=>$old_pass ,

                  'user_id'=> $data['user_id'],

                        );

            $status=$this->Designmodel->checkpasswordadvertiser($datay);


                //   echo $status; die();



                 if($status=='true')

                {

                  

                



                 $dasa=array(

                  'user_password'=>$pao,

                 );



                $this->Designmodel->update_pass_advertiser( $data['user_id'],$dasa);



                 $data['userData'] = $data;

                $data['sucess']="Password update successful";

                 $this->load->view('buyer/header',$data);
                 $this->load->view('buyer/change_password',$data);
                 $this->load->view('buyer/footer',$data);

           

           

                   

                }

                else

                {



                 $data['userData'] = $data;

                $data['fail']="Wrong old password";

                 $this->load->view('buyer/header',$data);
                 $this->load->view('buyer/change_password',$data);
                 $this->load->view('buyer/footer',$data);



          

           

          

              }


      


             

            

        }



   public function login()
  {
        //$this->load->model('designmodel');
      
         $data['title']="99Content|Buyer"; 
           $data =  $this->get_logins();
        //get 5 most recent orders
         if($this->uri->segment(3)==7)
         {
             $data['sign_in']="Kindly login to place an order";
         }

       
         $this->load->view('homepage/login',$data);
  }


  public function signup()
  {
        //$this->load->model('designmodel');
      
         $data['title']="99Content|Buyer"; 
          $data =  $this->get_logins();
        //get 5 most recent orders
       

       
         $this->load->view('homepage/signup',$data);
  }



  public function get_logins()
  {
     $data['loginURL'] = $this->google->loginURL();
     $data['authURL'] =  $this->facebook->login_url();
     
     return $data;  
  }

   public function send_message()
  {
        
        $this->check_login();

         $this->load->model('Adminmodel');
        
         $data=$this->session->userdata('userData');
         $sender=$data['user_id'];

         //get variables
         $sender_id= $sender;
         $recipients[]=$this->input->post('user_id');

         $id=$this->input->post('user_id');
         $subject = $this->input->post('subject');
         $body =$this->input->post('message');

         // $res= $this->Adminmodel->get_user_details($id);
         // $buyer_fname=$res[0]->user_fname;
         // $buyer_email=$res[0]->user_email;
         //$website=$res[0]->user_website;

        // echo ($website); die();


         $to="support@essayloop.com";
         $subj="New Message: $sender";
         $message="Dear support,<br> a new message has been sent to you, <br> '$body', kindly login to admin panel to respond. <br>
           Regards.";



         $this->send_mail($to,$subj,$message);
        

         $data=$this->get_info();


        $this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);
       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/notification',$data);
         $this->load->view('buyer/footer',$data);

  }

     public function send_message_to_writer()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');
         $sender=$data['user_id'];

         //get variables
         $sender_id= $sender;
         $recipients[]=$this->input->post('writer_id');
         $subject=$this->input->post('subject');
       
         $body =$this->input->post('body');
        

         $data=$this->get_info();


        $this->mahana_messaging->send_new_message($sender_id, $recipients, $subject , $body, $priority = PRIORITY_NORMAL);
       
         $data['userData'] = $data;

         $this->load->view('buyer/notification',$data);
  }
  //get all threads maybe grouped
   public function inbox()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');
         $user_id=$data['user_id'];

         $data=$this->get_info();
        

        $response= $this->mahana_messaging->get_all_threads_grouped($user_id, $full_thread = FALSE, $order_by = 'DESC');
        $data['threads']=$response['retval'];
        //print_r($data['threads']); die();



       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/threads',$data);
         $this->load->view('buyer/footer',$data);
  }

 
   public function reply()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        

         $sender_id=$this->input->post('sender_id');
         $msg_id=$this->input->post('message_id');
         $body=$this->input->post('body');
         $thread=$this->input->post('thread');

         $data=$this->session->userdata('userData');
         $user_id=$data['user_id'];

         $data=$this->get_info();

          $to="support@essayloop.com";
          $subj="New Message: $sender_id";
          $message="Dear support,<br> a new message has been sent to you, <br> '$body', kindly login to admin panel to respond. <br>
           Regards.";



         $this->send_mail($to,$subj,$message);
        

        $this->mahana_messaging->reply_to_message($msg_id, $sender_id, $subject = '', $body, $priority = PRIORITY_NORMAL);
        
      
       


       
         $data['userData'] = $data;

         redirect('Client/view_thread/'.$thread.'/7');
  }

    public function view_thread()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');
         $user_id=$data['user_id'];

        // echo $user_id; die();

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
                     $subject=$msg['subject'];
                     $this->mahana_messaging->update_message_status($msg_id, $user_id, $status_id);

                 }
               

                  $data['messages']=$thread['messages'];

                 // print_r($data['messages']); die();

           }
         
        }


         $message= $this->mahana_messaging->get_msg_count($user_id, $status_id = MSG_STATUS_UNREAD);
         $data['message_count']=$message['retval'];
         $data['subject']=$subject;

        // print_r($subject); die();

           if($this->uri->segment(4)==7)
         {
            $data['not'] = 'Message sent successfully';
         }


         
       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/messages',$data);
         $this->load->view('buyer/footer',$data);

  }

   public function get_revision()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['revision']= $this->Designmodel->get_revision($data['user_id']);

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/revision',$data);
         $this->load->view('buyer/footer',$data);
  }
   public function get_pending()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['pending']= $this->Designmodel->get_pending($data['user_id']);

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/pending',$data);
         $this->load->view('buyer/footer',$data);
  } 


   public function rate_writer()
  {
        //$this->load->model('designmodel');
       // $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders



         $data=$this->session->userdata('userData');

         $rating=$this->input->post('rating');
         $order_id=$this->input->post('order_id');




         $updatearray=array(
                               'order_rating' =>$rating , 
                            );

        // $data=$this->get_info();


        $this->Designmodel->update_rating($order_id,$updatearray);

        echo 'ok';

       
       
        
  }


   public function comment_writer()
  {
        //$this->load->model('designmodel');
        //$this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders



         $data=$this->session->userdata('userData');

         $comment=$this->input->post('comment');
         $order_id=$this->input->post('order_id');




         $updatearray=array(
                               'order_rating_comment' =>$comment , 
                            );

        // $data=$this->get_info();


        $this->Designmodel->update_rating($order_id,$updatearray);

        echo 'ok';

       
       
        
  }

   public function get_all()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['all']= $this->Designmodel->get_all($data['user_id']);

       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/all',$data);
         $this->load->view('buyer/footer',$data);
  }


  public function return() {
       
        $code = $this->input->get('code');
        
        if (!$code) {
            echo "Error: No authorization code received";
            return;
        }
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://accounts.zoho.com/oauth/v2/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'code' => $code,
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'redirect_uri' => $this->redirect_uri,
                'grant_type' => 'authorization_code'
            ]),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded'
            ]
        ]);
        
        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        if (curl_errno($curl)) {
            echo 'Curl error: ' . curl_error($curl);
            curl_close($curl);
            return;
        }
        
        curl_close($curl);
        $result = json_decode($response, true);

        print_r($result); die();



       // return $result['access_token'];

       

       
    }

     public function auth() {
        //'scope' => 'ZohoMail.messages.ALL';
        //'scope' => 'ZohoMail.accounts.ALL',

        $auth_url = 'https://accounts.zoho.com/oauth/v2/auth?' . http_build_query([
            'response_type' => 'code',
            'client_id' => $this->client_id,
            'scope' => 'ZohoMail.messages.ALL',
            'access_type' => 'offline',
            'prompt'=>'consent',
            'redirect_uri' => $this->redirect_uri
        ]);
        
        redirect($auth_url);
    }

      public function authacc() {
        //'scope' => 'ZohoMail.messages.ALL';
        //'scope' => 'ZohoMail.accounts.ALL',

        $auth_url = 'https://accounts.zoho.com/oauth/v2/auth?' . http_build_query([
            'response_type' => 'code',
            'client_id' => $this->client_id,
            'scope' => 'ZohoMail.accounts.ALL',
            'access_type' => 'offline',
            'redirect_uri' => $this->redirect_uri
        ]);
        
        redirect($auth_url);
    }

  


   public function getid(){

       $ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, "https://mail.zoho.com/api/accounts");

// Set the request method to GET
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

// Set headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Zoho-oauthtoken 1000.b69084289c4c3b6a434a873300944c10.60d57981a290019708b18295efed2265"
]);

// Return the response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo "cURL error: " . curl_error($ch);
} else {
    // Process the response
    echo $response;
}

// Close the cURL session
curl_close($ch);





   }



  public function get_completed()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['completed']= $this->Designmodel->get_completed($data['user_id']);

       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/completed',$data);
         $this->load->view('buyer/footer',$data);
  }

   public function to_be_revised()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['completed']= $this->Designmodel->get_completed($data['user_id']);

       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/to_be_revised',$data);
         $this->load->view('buyer/footer',$data);
  }

   public function get_subs()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['subs']= $this->Designmodel->get_subs($data['user_id']);
         $data['leo']= $this->current_time();

       
         $data['userData'] = $data;

         $this->load->view('buyer/view_subscriptions',$data);
  }

    public function view_submissions()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');
         $order_id=$this->uri->segment(3);

         $data=$this->get_info();


         $data['subs']= $this->Designmodel->view_submissions($order_id);
         $data['leo']= $this->current_time();

       
         $data['userData'] = $data;

         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/view_submissions',$data);
         $this->load->view('buyer/footer',$data);
  }
  
  public function index()
  {
        //$this->load->model('designmodel');
        $this->check_login();
        $data['title']="99Content|Buyer"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();


         $data['o']= $this->Designmodel->get_five_orders($data['user_id']);

       
         $data['userData'] = $data;
         
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/dash',$data);
         $this->load->view('buyer/footer',$data);
  }


   public function get_paper_details()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| My orders";
        $order_id=$this->uri->segment(3); 
        $writer_id=$this->uri->segment(4); 

        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();

         $data['h']= $this->Designmodel->get_order_details($order_id);
         $data['uploads']= $this->Designmodel->get_uploads($order_id);
         $data['submission']= $this->Designmodel->get_submissions($order_id);
         $data['rev']= $this->Designmodel->get_rev($order_id);
         $data['plag']= $this->Designmodel->get_plag($order_id);

         $data['writer_id']= $writer_id;
         
         $data['userData'] = $data;
              
         $this->load->view('buyer/header',$data);
         $this->load->view('buyer/paper_details',$data);
         $this->load->view('buyer/footer',$data);

  }

    public function edit_order()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| My orders";
        $order_id=$this->uri->segment(3); 
       // $writer_id=$this->uri->segment(4); 

        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();

         $data['h']= $this->Designmodel->get_order_details($order_id);
         $data['uploads']= $this->Designmodel->get_uploads($order_id);
         $data['submission']= $this->Designmodel->get_submissions($order_id);
         $data['rev']= $this->Designmodel->get_rev($order_id);
         $data['plag']= $this->Designmodel->get_plag($order_id);

        $data['discipline'] = $this->Designmodel->get_discipline();
        $data['level'] = $this->Designmodel->get_level();
        $data['format'] = $this->Designmodel->get_format();
        $data['deadline'] = $this->Designmodel->get_deadline();
      //  $data['res'] = $this->Designmodel->first($data['user_id']);
       // $data['coupons'] = $this->Designmodel->get_active_coupons();
        $data['writers'] = $this->Designmodel->get_active_writers();

        // $data['writer_id']= $writer_id;
         
         $data['userData'] = $data;
              
        $this->load->view('buyer/header',$data);      
        $this->load->view('buyer/edit_order',$data);
        $this->load->view('buyer/footer',$data);
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

     public function get_subscription_details()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| My orders";
        $order_id=$this->uri->segment(3); 
        $writer_id=$this->uri->segment(4); 

        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data=$this->get_info();

         $data['d']= $this->Designmodel->get_order_details($order_id);
         $data['writer_id']= $writer_id;
         
         $data['userData'] = $data;
              
              
        $this->load->view('buyer/subscription_details',$data);
  }

  public function get_all_orders()
  {
        //$this->load->model('designmodel');
        $this->check_login();

        $data['title']="99Content| My orders"; 
        //get 5 most recent orders

         $data=$this->session->userdata('userData');

         $data['o']= $this->Designmodel->get_all_orders($data['user_id']);
         
         $data['userData'] = $data;
              
              
        $this->load->view('buyer/dash',$data);
  }

    public function profile()
  {
        $this->check_login();

       

       
        $data=$this->session->userdata('userData');

        $data=$this->get_info();
        

      

        $data['p']= $this->Designmodel->get_profile_details($data['user_id']); 

        $data['c']= $this->Designmodel->get_countries(); 
              
        $this->load->view('buyer/header',$data);      
        $this->load->view('buyer/profile',$data);
        $this->load->view('buyer/footer',$data);
  }

    public function payment_history()
  {
        $this->check_login();

       

       // $data['title']="99Content|Buyer"; 
        //$this->load->model('designmodel');
        $data=$this->session->userdata('userData');

        $data=$this->get_info();
        

      

        $data['p']= $this->Designmodel->get_payment_history($data['user_id']); 

        //$data['c']= $this->Designmodel->get_countries(); 
              
        $this->load->view('buyer/header',$data);      
        $this->load->view('buyer/payment_history',$data);
        $this->load->view('buyer/footer',$data);
  }

   public function order()
  {
        $this->check_login();
        //$this->load->model('designmodel');
        //get data to populate the form

        $data=$this->session->userdata('userData');

        $data=$this->get_info();
         
       
        $data['title']="99Content|Buyer"; 
        $data['discipline'] = $this->Designmodel->get_discipline();
        $data['level'] = $this->Designmodel->get_level();
        $data['format'] = $this->Designmodel->get_format();
        $data['deadline'] = $this->Designmodel->get_deadline();
        $data['res'] = $this->Designmodel->first($data['user_id']);
        $data['coupons'] = $this->Designmodel->get_active_coupons();
        $data['specialcoupons'] = $this->Designmodel->get_special_coupons($data['user_id']);
        $data['writers'] = $this->Designmodel->get_active_writers();


        $data['userData'] = $data;

        //print_r($data['discipline']->num_rows()); die();
              
        $this->load->view('buyer/header',$data);     
        $this->load->view('buyer/order',$data);
        $this->load->view('buyer/footer',$data);
  }


   public function make_technical()
  {
        $this->check_login();
        //$this->load->model('designmodel');
        //get data to populate the form

        $data=$this->session->userdata('userData');

        $data=$this->get_info();
         
       
        $data['title']="99Content|Buyer"; 
        // $data['discipline'] = $this->Designmodel->get_discipline();
        // $data['level'] = $this->Designmodel->get_level();
        // $data['format'] = $this->Designmodel->get_format();
        // $data['deadline'] = $this->Designmodel->get_deadline();
        $data['res'] = $this->Designmodel->first($data['user_id']);
        $data['writers'] = $this->Designmodel->get_active_writers();


        $data['userData'] = $data;

       // print_r($data['userData']); die();
              
        $this->load->view('buyer/header',$data);      
        $this->load->view('buyer/special_order',$data);
        $this->load->view('buyer/footer',$data);
  }


  public function request_revision()
  {
        $this->check_login();
        //$this->load->model('designmodel');
        //get data to populate the form

        $data=$this->session->userdata('userData');




        $data=$this->get_info();
         
        $data['order_id']=$this->uri->segment(3);
        $data['order_revision_details']=$this->Designmodel->get_order_revision_details($data['order_id']);
        $data['title']="99Content|Buyer"; 
        $data['discipline'] = $this->Designmodel->get_discipline();
        $data['level'] = $this->Designmodel->get_level();
        $data['format'] = $this->Designmodel->get_format();
        $data['deadline'] = $this->Designmodel->get_deadline();
        $data['res'] = $this->Designmodel->first($data['user_id']);

        $data['userData'] = $data;

       // print_r($data['userData']); die();
              
        $this->load->view('buyer/header',$data);      
        $this->load->view('buyer/request',$data);
        $this->load->view('buyer/footer',$data);
  }

 

   public function complete_pending()
  {
      $this->load->library('session');
      $this->check_login();
      $data=$this->session->userdata('userData');

      $data=$this->get_info();

      $data['userData'] = $data;
              
     
      $order_id = $this->uri->segment(3);
    
      $amount = $this->uri->segment(4);

      $order_type = $this->uri->segment(5);

       $current_bal= $this->Designmodel->get_current_balance($data['user_id']);

      //check if money is enough
        if($current_bal>=$amount)
         {
                   //update bal
                   $new_balance=$current_bal-$amount;

                    $uparr = array(
                                 'user_account' => $new_balance,
                                );

                    $this->Designmodel->update_bal($data['user_id'],$uparr);
           
                     $order_status=1;
                     $payment_status=1;



                    $focusarr = array(

                                 'order_status' => $order_status,
                                 'payment_status' => $payment_status,

                                );

                      $this->Designmodel->update_order($order_id,$focusarr);

                      $data['bal']=$new_balance;

                      if($order_type==1){

                      $data['notification']="View order";

                      $data['notification_url']=base_url().'buyer/get_paper_details/'.$order_id;

                      $data['notification_title']="Order placement successful";

                      $data['notification_message']="Congratulations your content is now being handled by our team of creative writers";


                      $this->load->view('buyer/super_notification',$data);
                    }else
                    {


                    $data['notification']="View Subscription";
                    $data['notification_url']=base_url().'buyer/get_subscription_details/'.$order_id;

                    $data['notification_title']="Subscription initiated successfully";

                    $data['notification_message']="Congratulations your content is now being handled by our team of creative writers";


                    $this->load->view('buyer/super_notification',$data);




                    }



         }
         else
         {

            $data['notification']="Sorry! we couldn't complete your order, kindly deposit funds to proceed";
            $this->load->view('buyer/load_account',$data);

         }
       
    // $this->load->view('buyer/completeorder',$data);
  }

   public function complete_pending_new()
    {
        $this->load->library('session');

        $data=$this->session->userdata('userData');

         
                 
                 
        $data['order_id'] = $this->uri->segment(3);
     
        $data['amount'] = $this->uri->segment(4);

        $this->session->set_flashdata('order_id',$data['order_id']); 
        $this->session->set_flashdata('amount',$data['amount']);
        redirect("client/paypal", "refresh");
    
                 

         
    }

   public function order_subscription()
  {
        $this->check_login();
        //$this->load->model('designmodel');
        //get data to populate the form

        $data=$this->session->userdata('userData');


         $data=$this->get_info();
         
       
        $data['title']="99Content|Buyer"; 
        $data['t'] = $this->Designmodel->get_subscriptions();
       
        $data['userData'] = $data;
              
              
        $this->load->view('buyer/subscriptions',$data);
  }

    public function choose_order()
  {
        $this->check_login();
        //$this->load->model('designmodel');
        //get data to populate the form

        $data=$this->session->userdata('userData');

        $data=$this->get_info();
         
       
        $data['userData'] = $data;
              
              
        $this->load->view('buyer/choose_order',$data);
  }

   public function test_mail()
  {
    // $this->load->library('emailclass');

     $to="kevinkirui2@gmail.com";
     $subject="Ping me";
     $message="Ping there for me";
     $this->emailclass->send_mail($to,$subject,$message);

  }
       

   
    public function current_time()
  {

     date_default_timezone_set('Africa/Nairobi'); 
     return date("Y-m-d H:i:s");

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
          'smtp_pass' => 'AceFlexPathCourse2022!',
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


     

    
    public function check_login(){

       if(!empty($this->session->userdata('userData'))){

         return;

       }
       else
       {
          // $data =  $this->get_logins();
           redirect('home/client/');

             // $this->load->view('homepage/login');

       }


    }

     public function login_user(){
            
    

    $email = $this->input->post('email');
    $password = $this->input->post('password');


      
     
          $data = array(
          'email' =>  $email,
          'password' => $password
          );
        //check if passwords match and user is active
         
        $result = $this->Designmodel->login_user($data);

        
                     
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
                       
            );


         // $this->log_user_activity($userData);


          $this->session->set_userdata('userData', $userData);
         
           
           redirect('Client/index/');
                         
       
      }
      elseif ($result === 'deactivated') {

       $this->load->view('homepage/awaiting_activation');
      }
     else
      {
         $data['error_message'] ='Invalid Username or Password';
        
         $this->load->view('homepage/login', $data);
      }
                                
      //}
  }

    private function hash_password($password){
             return password_hash($password, PASSWORD_BCRYPT);
        }


        public function update_profile()
       {
                //get variables from form
               $this->check_login();

              
               $id=$this->input->post('user_id');
    
               $updatearray = array(

                'user_id' =>$this->input->post('user_id'),
                'user_fname' =>$this->input->post('user_fname'),
                'user_lname' =>$this->input->post('user_lname'),
                'user_profile_pic' =>$this->input->post('user_profile_pic'),
                'user_location_id' =>$this->input->post('user_location_id'),
                'user_paypal_email' =>$this->input->post('user_paypal_email'),
                'user_phone' =>$this->input->post('user_phone'),
               );

               $this->Designmodel->update_profile($id,$updatearray);

                $this->session->set_flashdata('message', 'Profile updated successfully');


               redirect('client/profile');

           

            


        }


           public function process_order_login() {

               $this->check_login();

               $data=$this->session->userdata('userData');

               $data=$this->get_info();


              // $file_upload=NULL;

                if(empty($_FILES['userfile']['name']))
                {

                       $file_upload=NULL;
                        $id=$this->input->post('order_id');
                   

                    $data=$this->session->userdata('userData');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                      //get variables from form
                     $amount=$this->input->post('order_amount');
                     $pages=$this->input->post('order_pages');
                     $description=$this->input->post('order_description');
                     $title=$this->input->post('order_title');
                     $level_id=$this->input->post('order_level_id');
                     $deadline_id=$this->input->post('order_deadline_id');
                     $format_id=$this->input->post('order_format_id');
                     $discipline_id=$this->input->post('order_discipline_id');
                     $sources=$this->input->post('order_sources');
                     $other=$this->input->post('other');


                    // $order_other=$this->input->post('order_other');

                     $data=$this->get_due_date($deadline_id);
                     $due=$data['due'];
                     $days=$data['days'];

                     //do an insert first
                   

                    
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
                      'order_files' =>$file_upload,
                      'order_due' =>$due,
                      'other' =>$other,
                      'order_website' =>8,
                      
                      //send email to client confirming receipt
                     );

                      $resp=$this->Designmodel->insert_order($orderarray);


                         
                      //send order email
                     
                       $result=$this->Designmodel->get_names($resp);

                       $discipline_name=$result[0]->discipline_name;

                       $format_name=$result[0]->format_name;

                        $level_name=$result[0]->level_name;


                     
               


                       $subject="#$resp: Order placed successfully";
                       $message="Hi $fname, <br> Your order has been placed successfully. <br>
                        Order details:<br>
                        Order ID: $resp <br>
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
                        AceFlexPathCourse.

                         ";
                       $this->send_mail($email,$subject,$message);

                      
           
                      
                      $this->session->set_flashdata('order_id',$resp); 
                      $this->session->set_flashdata('amount',$amount);
                      redirect("client/paypal", "refresh");

                }
                else
                {

                $config['upload_path'] = './userfile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                $config['max_size'] = '50000  '; // max_size in kb
               // $config['max_width'] = 15000;
               // $config['max_height'] = 15000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if (!$this->upload->do_upload('userfile')) {

                     

                       $data=$this->get_info();

                       $data=$this->session->userdata('userData');

                       
         
       
       

                        $data['error'] = $this->upload->display_errors();

                       // print_r($data['error']); die();
                        $data['discipline'] = $this->Designmodel->get_discipline();
                        $data['level'] = $this->Designmodel->get_level();
                        $data['format'] = $this->Designmodel->get_format();
                        $data['deadline'] = $this->Designmodel->get_deadline();
                        $data['userData'] = $data;



                    

                         $this->load->view('buyer/order', $data);

                } else {

                    $id=$this->input->post('order_id');
                    $data = array('image_metadata' => $this->upload->data());
                    $file_upload=$data['image_metadata']['file_name'] ;

                    $data=$this->session->userdata('userData');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                      //get variables from form
                     $amount=$this->input->post('order_amount');
                     $pages=$this->input->post('order_pages');
                     $description=$this->input->post('order_description');
                     $title=$this->input->post('order_title');
                     $level_id=$this->input->post('order_level_id');
                     $deadline_id=$this->input->post('order_deadline_id');
                     $format_id=$this->input->post('order_format_id');
                     $discipline_id=$this->input->post('order_discipline_id');
                     $sources=$this->input->post('order_sources');
                     $other=$this->input->post('other');



                    // $order_other=$this->input->post('order_other');

                     $data=$this->get_due_date($deadline_id);
                     $due=$data['due'];
                     $days=$data['days'];

                     //do an insert first
                   

                    
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
                      'order_files' =>$file_upload,
                      'order_due' =>$due,
                      'other' =>$other,
                      'order_website' =>8,
                      
                      //send email to client confirming receipt
                     );

                      $resp=$this->Designmodel->insert_order($orderarray);


                         
                      //send order email
                     
                       $result=$this->Designmodel->get_names($resp);

                       $discipline_name=$result[0]->discipline_name;

                       $format_name=$result[0]->format_name;

                        $level_name=$result[0]->level_name;


                     
               


                       $subject="#$resp: Order placed successfully";
                       $message="Hi $fname, <br> Your order has been placed successfully. <br>
                        Order details:<br>
                        Order ID: $resp <br>
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
                        AceFlexPathCourse.

                         ";
                       $this->send_mail($email,$subject,$message);

                      
           
                      
                      $this->session->set_flashdata('order_id',$resp); 
                      $this->session->set_flashdata('amount',$amount);
                      redirect("client/paypal", "refresh");
                  }
                }


           }
           public function current_time_timezone($timezone)
           {

             date_default_timezone_set("$timezone"); 
             return date("Y-m-d H:i:s");

          }

          public function get_time_stuff($timezone,$due){

                 $start=$this->current_time_timezone($timezone);

                // echo $start; die();

                 $date1 = $start;
                 $date2 = $due; 
                 $diff = strtotime($date2) - strtotime($date1);
                 $diff_in_hrs = $diff/3600;
                 $days=$diff_in_hrs/24;
                 $hours= $diff_in_hrs%24;
                 $min= $hours%60;

                 $data['period']=$days." ".$hours." ".$min;
                 $data['start']= $start;

                 return $data;




          }

          public function assign_admin(){

              $id=$this->Designmodel->get_admin_id();
              return $id;



          }

          function dragDropUpload(){ 
            if(!empty($_FILES)){ 
                // File upload configuration 
                $uploadPath = 'uploads/'; 
                $config['upload_path'] = $uploadPath; 
                $config['allowed_types'] = '*'; 
                 
                // Load and initialize upload library 
                $this->load->library('upload', $config); 
                $this->upload->initialize($config); 
                 
                // Upload file to the server 
                if($this->upload->do_upload('file')){ 
                    $fileData = $this->upload->data(); 
                    $uploadData['file_name'] = $fileData['file_name']; 
                    $uploadData['uploaded_on'] = date("Y-m-d H:i:s"); 
                     
                    // Insert files info into the database 
                    $insert = $this->file->insert($uploadData); 
                } 
              }
            } 



          public function process_order_login_new(){

               $this->check_login();

               $this->load->model('Adminmodel');

               $data=$this->session->userdata('userData');

               $order_writer_id=$this->assign_admin();

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
               $timezone=$this->input->post('order_tz');
               $commission=$this->Designmodel->get_commission();
               //$file=$this->input->post('file');

              // echo $timezone; die();


              // $order_other=$this->input->post('order_other');
                 if(empty($timezone)){
                   
                    $timezone="America/New_York";

                 }
                 else
                 {
                    $timezone=$timezone;

                 }

                      
              

                   $time_manenos=$this->get_time_stuff($timezone,$deadline_id);
                   $due=$deadline_id;
                   $start=$time_manenos['start'];
                   $period=$time_manenos['period'];
              

               //do an insert first
             

           

                if(!empty($_FILES)){ 

                 // $filenames=array();

                  $countfiles = count($_FILES['file']['name']);

                   //print_r($countfiles); die();
                   
      // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['file']['name'][$i])){

                      // print_r($_FILES['file']['name'][$i]); die();
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['fil']['name'] = $_FILES['file']['name'][$i];
                        $_FILES['fil']['type'] = $_FILES['file']['type'][$i];
                        $_FILES['fil']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                        $_FILES['fil']['error'] = $_FILES['file']['error'][$i];
                        $_FILES['fil']['size'] = $_FILES['file']['size'][$i];

                        // Set preference
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                       // $config['max_size'] = '500000'; // max_size in kb
                       // $config['file_name'] = $_FILES['file']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
                        // File upload
                        if(!$this->upload->do_upload('fil')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                       
                        


                        }
                        else
                        {

                            

                         

                              $uploadData = $this->upload->data();

                            //  print_r($uploadData); die();

                             


                              // print_r($uploadData); die();
                              $filename = $uploadData['file_name'];

                              // // Initialize array
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
                          $data['userData'] = $data;



                      
                            $this->load->view('buyer/order', $data);
                         




                       }
                       else
                       {



                      // $user_id=$this->Designmodel->insert_buyer($user_array);
                         $data=$this->session->userdata('userData');


                         $user_id=$data['user_id'];
                         $fname=$data['user_fname'];
                         $email=$data['user_email'];


                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        //send email to client confirming receipt
                       );
                      }
                      else
                      {

                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_writer_id' =>$writer_id,
                       // 'order_status' =>5,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        
                        //send email to client confirming receipt
                       );


                      }

                     // print_r($filenames); die();


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
                 $message="Hi $fname, <br>Thanks for choosing AceFlexPathCourse. Your order has been placed successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Amount: $amount <br>
                  Order Placed: $start<br>
                  Due Date: $due<br>
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);

                 
              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                $this->load->library('session');

                 $data=$this->session->userdata('userData');

                 $data=$this->get_info();

                
                 
                  if ($this->session->flashdata('order_id')){
                    $data['order_id'] = $this->session->flashdata('order_id');
                  }
                  if ($this->session->flashdata('amount')){
                    $data['amount'] = $this->session->flashdata('amount');
                  }
                 


                    $data['userData'] = $data;

                   // echo $resp;

                   $this->session->set_flashdata('order_id',$resp); 
                   $this->session->set_flashdata('amount',$amount);
                    //redirect("client/paypal", "refresh");

                     $mydata['order_id']=$resp;
                     $mydata['amount']=$amount;

                      //echo $data;
                      echo json_encode($mydata);



                      } //end of no error
                             
                   
                  }  //end proceed
                       
                  
               
                else
                {
                  //no upload
                    $data=$this->session->userdata('userData');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                    



                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        
                        //send email to client confirming receipt
                       );
                      }
                      else
                      {

                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_coupon' =>$this->input->post('coupon'),
                        'order_words' =>$words,
                        'order_writer_id' =>$writer_id,
                       // 'order_status' =>5,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        
                        //send email to client confirming receipt
                       );


                      }

                     // echo "here"; die();

                

                     $resp=$this->Designmodel->insert_order($orderarray);


                    
                 $result=$this->Designmodel->get_names($resp);

                 $discipline_name=$result[0]->discipline_name;

                 $format_name=$result[0]->format_name;

                  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Order placed successfully";
                 $message="Hi $fname, <br>Thank you for choosing AceFlexPathCourse. Your order has been placed successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Amount: $amount <br>
                  Due Date: $$due <br>
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);


              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
               $this->load->library('session');

                 $data=$this->session->userdata('userData');

                   $data=$this->get_info();

                  //$this->load->model('designmodel');
                          $data['title']="99Content|Home"; 
                         
                          if ($this->session->flashdata('order_id')){
                            $data['order_id'] = $this->session->flashdata('order_id');
                          }
                          if ($this->session->flashdata('amount')){
                            $data['amount'] = $this->session->flashdata('amount');
                          }
                         

                  $data['title']="Excellent Writers|Complete order";
                  $data['description']="Complete your order via Paypal";

                  $data['userData'] = $data;
          
                  $this->load->view('buyer/header',$data);
                  $this->load->view('buyer/paypal',$data);
                  $this->load->view('buyer/footer',$data);

                   }
                
            




          }

         public function edit_order_login_new(){

               $this->check_login();

               $this->load->model('Adminmodel');

               $data=$this->session->userdata('userData');

               $data=$this->get_info();


               $resp=$this->input->post('order_id');
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
               $commission=$this->Designmodel->get_commission();


              // $order_other=$this->input->post('order_other');
              if($deadline_id>7){

                   $data=$this->get_days($deadline_id);
                   $due=$data['due'];
                   $days=$data['days'];
               }
               else
               {
                   $data=$this->get_due_date($deadline_id);
                   $due=$data['due'];
                   $days=$data['days'];
               }

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

                           $data=$this->session->userdata('userData');

                       
         
       
       

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
                          $data['userData'] = $data;



                      
                            $this->load->view('buyer/edit_order', $data);
                         




                       }
                       else
                       {



                      // $user_id=$this->Designmodel->insert_buyer($user_array);
                         $data=$this->session->userdata('userData');


                         $user_id=$data['user_id'];
                         $fname=$data['user_fname'];
                         $email=$data['user_email'];


                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_words' =>$words,
                        'order_commission' =>$commission,
                        
                        //send email to client confirming receipt
                       );
                      }
                      else
                      {

                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_words' =>$words,
                        'order_writer_id' =>$writer_id,
                       // 'order_status' =>5,
                        'order_commission' =>$commission,
                        
                        //send email to client confirming receipt
                       );


                      }

                      $this->Designmodel->update_order($resp,$orderarray);

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


               
         


                 $subject="#$resp: Order Edited successfully";
                 $message="Hi $fname, <br> Your order has been edited successfully. <br>
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
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);

                 
              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                $this->load->library('session');

                 $data=$this->session->userdata('userData');

                   $data=$this->get_info();

                  //$this->load->model('designmodel');
                          $data['title']="99Content|Home"; 
                         
                          if ($this->session->flashdata('order_id')){
                            $data['order_id'] = $this->session->flashdata('order_id');
                          }
                          if ($this->session->flashdata('amount')){
                            $data['amount'] = $this->session->flashdata('amount');
                          }
                         

                  $data['title']="AceFlexPathCourse|Complete order";
                  $data['description']="Complete your order via Paypal";

                  $data['userData'] = $data;
          
                 
                  $this->load->view('buyer/paypal',$data);





                      } //end of no error
                             
                   
                  }  //end proceed
                       
                  
               
                else
                {
                  //no upload
                    $data=$this->session->userdata('userData');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];
                    



                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_words' =>$words,
                        'order_commission' =>$commission,
                        
                        //send email to client confirming receipt
                       );
                      }
                      else
                      {

                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_words' =>$words,
                        'order_writer_id' =>$writer_id,
                       // 'order_status' =>5,
                        'order_commission' =>$commission,
                        
                        //send email to client confirming receipt
                       );


                      }

                     // echo "here"; die();

                

                     $resp=$this->Designmodel->update_order($resp,$orderarray);


                    
                 $result=$this->Designmodel->get_names($resp);

                 $discipline_name=$result[0]->discipline_name;

                 $format_name=$result[0]->format_name;

                  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Order edited successfully";
                 $message="Hi $fname, <br>Welcome to AceFlexPathCourse. Your order has been edited successfully. <br>
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
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);


              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
               $this->load->library('session');

                 $data=$this->session->userdata('userData');

                   $data=$this->get_info();

                  //$this->load->model('designmodel');
                          $data['title']="99Content|Home"; 
                         
                          if ($this->session->flashdata('order_id')){
                            $data['order_id'] = $this->session->flashdata('order_id');
                          }
                          if ($this->session->flashdata('amount')){
                            $data['amount'] = $this->session->flashdata('amount');
                          }
                         

                  $data['title']="AceFlexPathCourse|Complete order";
                  $data['description']="Complete your order via Paypal";

                  $data['userData'] = $data;
          
                 
                  $this->load->view('buyer/paypal',$data);

                   }
                
            




          }

          public function mark_complete_chron()
          {
              $this->load->model('Adminmodel');

             $resp=$this->Designmodel->get_awaiting_feedback_chron();
        //$resp=$resp[0];
       // print_r($resp); die();
              $super=array();

              foreach ($resp as $neon) {
                  $order_id=$neon->order_id;
                  // $arr=array(
                  //            'order_id'=> $neon->order_id,
                  //            'order_status'=>3,
                  //           );

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

        


        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();


         //get files and attach
         // $comp= $this->Adminmodel->get_order_files_complete($order_id);


         
            


          
               // $this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

              $subject='Order ID:$order_id marked as complete';

              $message = "Dear  $buyer_fname, <br>$order_id marked as complete. You can access your paper by clicking 'complete' on your client dash <br> Don't forget to leave a rating. Thank you for choosing AceFlexPathCourse. <br>
                   Kind regards, <br>
                   AceFlexPathCourse.";

            

              
               $this->send_mail($buyer_email,$subject,$message); 
              
             


           // $link= FCPATH."submission/".$name;
           // $_SERVER["DOCUMENT_ROOT"]."/complete/".$namefiles
            //$link2=  dirname(__FILE__);
          //  echo $link; die();
           // $this->send_mail_with_attachment($buyer_email,$subject,$message,$link);



            //update account
            //get writer portion
            $writer_portion=100-$order_commission;

            $newamount=($writer_portion/100)*$order_amount;


            $account_balance=$account_balance+$newamount;


             $what=$this->Designmodel->checkUser($writer_id);

                if($what!=='no'){
                  //  $what=$what[0];                    
                  //update
                  //get prev bal
                  // $old_bal=$what['account_balance'];
                  // $new_bal=$old_bal+$refferer_amount;

                   $acc_arr=array(
                                    'account_balance'=>$account_balance,

                                 );
                   $this->Designmodel->updateAccount($writer_id,$acc_arr);


                }
                else
                {
                  //insert
                       $wao=array(
                                    'account_balance'=>$account_balance,
                                    'user_id'=>$writer_id,

                                 );

                    $this->Designmodel->inser_wao($wao);

                }

            //update account balance
            // $uparr=array(
            //               'account_balance'=>$account_balance,

            //             );


            //  $this->Adminmodel->update_bal($writer_id,$uparr);


             $writer_email=$writer_email;
             $writersubject="#$order_id:Payment has been credited to your account";
             $writermessage="Hi $writer_fname,<br> Following completion of Order ID:#$order_id, $newamount USD has been credited to your account <br> Your new balance is: $account_balance USD <br>
               Regards,<br>
               AceFlexPathCourse.

             ";

              $this->send_mail($writer_email,$writersubject,$writermessage);

               //  $super= $super+$arr;
                  //array_push($super, $arr); 
                # code...
              }

             // print_r($super); die();

              //$this->Adminmodel->update_approval($super);
         

          }

         public function mark_complete()
  {
        $this->load->model('Adminmodel');
        $this->check_login();

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

        


        //get 5 most recent orders

         $data=$this->session->userdata('loggged_in');
         $data=$this->get_info();


         //get files and attach
         // $comp= $this->Adminmodel->get_order_files_complete($order_id);


         
            


          
               // $this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

              $subject='Order ID:$order_id marked as complete';

              $message = "Dear  $buyer_fname, <br>$order_id marked as complete. You can access your paper by clicking 'complete' on your client dash <br> Don't forget to leave a rating. Thank you for choosing AceFlexPathCourse. <br>
                   Kind regards, <br>
                   AceFlexPathCourse.";

            

              
               $this->send_mail($buyer_email,$subject,$message); 
              
             


           // $link= FCPATH."submission/".$name;
           // $_SERVER["DOCUMENT_ROOT"]."/complete/".$namefiles
            //$link2=  dirname(__FILE__);
          //  echo $link; die();
           // $this->send_mail_with_attachment($buyer_email,$subject,$message,$link);



            //update account
            //get writer portion
            $writer_portion=100-$order_commission;

            $newamount=($writer_portion/100)*$order_amount;


            $account_balance=$account_balance+$newamount;


             $what=$this->Designmodel->checkUser($writer_id);

                if($what!=='no'){
                  //  $what=$what[0];                    
                  //update
                  //get prev bal
                  // $old_bal=$what['account_balance'];
                  // $new_bal=$old_bal+$refferer_amount;

                   $acc_arr=array(
                                    'account_balance'=>$account_balance,

                                 );
                   $this->Designmodel->updateAccount($writer_id,$acc_arr);


                }
                else
                {
                  //insert
                       $wao=array(
                                    'account_balance'=>$account_balance,
                                    'user_id'=>$writer_id,

                                 );

                    $this->Designmodel->inser_wao($wao);

                }

            //update account balance
            // $uparr=array(
            //               'account_balance'=>$account_balance,

            //             );


            //  $this->Adminmodel->update_bal($writer_id,$uparr);


             $writer_email=$writer_email;
             $writersubject="#$order_id:Payment has been credited to your account";
             $writermessage="Hi $writer_fname,<br> Following completion of Order ID:#$order_id, $newamount USD has been credited to your account <br> Your new balance is: $account_balance USD <br>
               Regards,<br>
               AceFlexPathCourse.

             ";

              $this->send_mail($writer_email,$writersubject,$writermessage);

                

                 





        // $data=$this->get_info();

           //$data['d']= $this->Adminmodel->get_order_details($order_id);

           $data['notification_title'] = "Order marked as complete";

           $data['notification_content'] = "You may proceed and rate this writer.";
           
           $data['userData'] = $data;
              
              
            $this->load->view('buyer/header',$data);
            $this->load->view('buyer/general_notification',$data);
            $this->load->view('buyer/footer',$data);
  }

        public function get_notification(){
             $this->check_login();

              $data=$this->session->userdata('userData');

              $data=$this->get_info();

              $data['notification_title']="Revision request successful"; 

              $data['notification_content']="We've received your revision request, your paper will be attended to shortly";

             
            $this->load->view('buyer/header',$data);
            $this->load->view('buyer/general_notification',$data);
            $this->load->view('buyer/footer',$data);


        }

        public function tip_writer(){

              $amount=$this->input->post('amount');
              $order_id=$this->input->post('order_id');

              // insert into tips table
              $ins=array(
                          'tip_amount'=>$amount,
                          'order_id'=>$order_id,
                          'tip_added'=>$this->current_time(),
                        );

               $this->Designmodel->insert_tips($ins);

               $this->session->set_flashdata('order_id',$order_id); 
               $this->session->set_flashdata('amount',$amount);
               redirect("client/paypal", "refresh");

               //redirect to payments page






        }

        public function request_revision_process_new() {

               $this->check_login();

               $data=$this->session->userdata('userData');

               $data=$this->get_info();


              // $file_upload=NULL;

                if(!empty($_FILES)){ 

                 // $filenames=array();

                  
                    

                 // $filenames=array();

                  $countfiles = count($_FILES['file']['name']);
                   
      // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['file']['name'][$i])){
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['fil']['name'] = $_FILES['file']['name'][$i];
                        $_FILES['fil']['type'] = $_FILES['file']['type'][$i];
                        $_FILES['fil']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                        $_FILES['fil']['error'] = $_FILES['file']['error'][$i];
                        $_FILES['fil']['size'] = $_FILES['file']['size'][$i];

                        // Set preference
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                        $config['max_size'] = '5000000'; // max_size in kb
                        $config['file_name'] = $_FILES['file']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
                        // File upload
                        if(!$this->upload->do_upload('fil')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

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

                           $data=$this->session->userdata('userData');

                 
                            $data['error'] = $this->upload->display_errors();

                            $this->load->view('buyer/header',$data);
                            $this->load->view('buyer/request', $data);
                            $this->load->view('buyer/footer',$data);
                         




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

                    $data=$this->session->userdata('userData');


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
                        AceFlexPathCourse Team.

                         ";
                       $this->send_mail($email,$subject,$message);

                       echo 0;

                      
           
                      
                      

                      //echo json_encode($data);
                  }

                   


                }
                else
                {
                     //no upload

                     $file_upload=NULL;
                     $id=$this->input->post('order_id');
                   

                    $data=$this->session->userdata('userData');


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
                        AceFlexPathCourse Team.

                         ";


                       $this->send_mail($email,$subject,$message);

                      
                      $data['notification_title']="Revision request successful"; 

                      $data['notification_content']="We've received your revision request, your paper will be attended to shortly"; 

                      $this->load->view('buyer/header',$data);
                      $this->load->view('buyer/general_notification', $data);
                      $this->load->view('buyer/footer',$data);

                      
               
                }

             
          }

        public function special_first(){
             // $this->check_login();
                //get variables from form
         //$this->load->helper('form');


          $response = $this->input->post('g-recaptcha-response');



           $url = 'https://www.google.com/recaptcha/api/siteverify';
         
            $secretKey ='6LdVpcgZAAAAAK3Y2qairHtLutmJurmliaZqhmog';
            $captcha =$response;
              
             
              //$context  = stream_context_create($options);
              $url ='https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
              $verify = file_get_contents($url);
              $captcha_success=json_decode($verify);

              if ($captcha_success->success==false) {
                  

                  $this->session->set_flashdata('warning','Verify that you are not a robot before submitting the form');       

                  redirect('home/special_order');

              } else{



               $amount=0;
              // $service=$this->input->post('service');
              // $words=$this->input->post('order_words');
               //$pages=$this->input->post('order_pages');
               $description=$this->input->post('order_description');
               $title=$this->input->post('order_title');
               $level_id=$this->input->post('order_level_id');
               $deadline_id=$this->input->post('order_deadline_id');
               $format_id=$this->input->post('order_format_id');
               $discipline_id=$this->input->post('order_discipline_id');
               $sources=$this->input->post('order_sources');
               $other=$this->input->post('other');
               $commission=$this->Designmodel->get_commission();

                $timezone=$this->input->post('order_tz');


              // $order_other=$this->input->post('order_other');

               if(empty($timezone)){
                   
                    $timezone="America/New_York";

                 }
                 else
                 {
                    $timezone=$timezone;

                 }

                      
              

                 $time_manenos=$this->get_time_stuff($timezone,$deadline_id);
                 $due=$deadline_id;
                 $start=$time_manenos['start'];
                 $period=$time_manenos['period'];



              // $order_other=$this->input->post('order_other');

               // $data=$this->get_due_date($deadline_id);
               // $due=$data['due'];
               // $days=$data['days'];

               //do an insert first
               $fname=$this->input->post('user_fname');
               $lname=$this->input->post('user_lname');
               $email=$this->input->post('user_email');
               $pass=$this->input->post('password');
               $password=$this->hash_password($pass);



               $user_array= array(         
                                
                             'user_fname' => $fname,
                             'user_lname' => $lname,
                             'user_phone' => $this->input->post('user_phone'),
                             'user_login_type' => 1,
                             'user_status' => 1,
                             'user_authority' => 1,
                             'user_email' => $email,
                             'user_password' => $password,
                             'user_added' => $this->current_time(),
                             'user_website' => 8,
                            
                            
                           );
              $res=$this->user_exist_status($email);

              if($res!=='true')
              {

               // 
           
               
              
                 if(!empty($_FILES)){ 

                 // $filenames=array();

                  $countfiles = count($_FILES['file']['name']);
                   
      // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['file']['name'][$i])){
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['fil']['name'] = $_FILES['file']['name'][$i];
                        $_FILES['fil']['type'] = $_FILES['file']['type'][$i];
                        $_FILES['fil']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                        $_FILES['fil']['error'] = $_FILES['file']['error'][$i];
                        $_FILES['fil']['size'] = $_FILES['file']['size'][$i];

                        // Set preference
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                        $config['max_size'] = '5000000'; // max_size in kb
                        $config['file_name'] = $_FILES['file']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
                        // File upload
                        if(!$this->upload->do_upload('fil')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                         // print_r($data['error']); die();
                        


                        }
                        else
                        {


                            

                         

                              $uploadData = $this->upload->data();
                              $filename = $uploadData['file_name'];

                              // Initialize array
                              $filenames[] = $filename;
                             // print_r($filenames); die();

                          }

                        }

                      } //end of loop

                      if(isset($data['error']))
                       {


                          // $data['discipline'] = $this->Designmodel->get_discipline();
                          // $data['level'] = $this->Designmodel->get_level();
                          // $data['format'] = $this->Designmodel->get_format();
                          // $data['deadline'] = $this->Designmodel->get_deadline();
                          $data['userData'] = $data;



                      
                            $this->load->view('homepage/header', $data);
                            $this->load->view('homepage/special_order', $data);
                            $this->load->view('homepage/footer', $data);




                       }
                       else
                       {



                       $user_id=$this->Designmodel->insert_buyer($user_array);



                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        //'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_type' =>2,
                        'other' =>$other,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                      //  'order_words' =>$words,
                        
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
           

              
                    $userData = array(

                    'user_fname' => $fname,
                    'user_id' => $user_id, 
                    'user_email' => $email,
                    'user_login_type' => 1,          
                               
                    );


                 // $this->log_user_activity($userData);


                $this->session->set_userdata('userData', $userData);

                 $data=$this->session->userdata('userData');
                //send order email
               
                 // $result=$this->Designmodel->get_names($resp);

                 // $discipline_name=$result[0]->discipline_name;

                 // $format_name=$result[0]->format_name;

                 //  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Technical Order";
                 $message="Hi $fname, <br>Welcome to AceFlexPathCourse. Your will receive quotation for your technical order in minutes. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                
                
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                redirect("client/get_technical", "refresh");





                    //  } //end of no error
                             
                   
                  }  //end proceed

                }
                       
                  
               
                else
                {
                  //no upload
                      //  print_r($_FILES['files']['name']); die();
                       $user_id=$this->Designmodel->insert_buyer($user_array);



                               $orderarray = array(

                                'order_user_id' =>$user_id,
                                'order_title' =>$title,
                                'order_description' =>$description,
                                'order_level_id' =>$level_id,
                                'order_format_id' =>$format_id,
                                'order_discipline_id' =>$discipline_id,
                                'order_due' =>$due,
                                'order_start' =>$start,
                                'order_period' =>$period,
                                'order_tz' =>$timezone,
                                //'order_pages' =>$pages,
                                'order_sources' =>$sources,
                                'order_amount' =>$amount,
                                'order_added' =>$this->current_time(),
                                'order_type' =>2,
                                'other' =>$other,
                                'order_commission' =>$commission,
                                'order_website' =>8,

                               // 'order_service_id' =>$service,
                               // 'order_words' =>$words,
                                
                                //send email to client confirming receipt
                               );
                

                     $resp=$this->Designmodel->insert_order($orderarray);


                    $userData = array(

                    'user_fname' => $fname,
                    'user_id' => $user_id, 
                    'user_email' => $email,
                    'user_login_type' => 1,          
                               
                    );


                 // $this->log_user_activity($userData);


                $this->session->set_userdata('userData', $userData);

                 $data=$this->session->userdata('userData');
                //send order email
               
                 // $result=$this->Designmodel->get_names($resp);

                 // $discipline_name=$result[0]->discipline_name;

                 // $format_name=$result[0]->format_name;

                 //  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Technical Order";
                 $message="Hi $fname, <br>Welcome to AceFlexPathCourse. Your will receive quotation for your technical order in minutes. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                
                
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

              
                
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                 redirect("client/get_technical", "refresh");

                   }
                
              }
              else
              {
                if (!$this->input->is_ajax_request()) {

                  redirect('client/registered',"refresh");


                }
                else
                {

                   echo "registered";
                }
              }

               


             

         
             

          //  }
            //  }
             
            //}
    }


  }     


       public function special(){


              $order_writer_id=$this->assign_admin();

         


               $amount=0;
              // $service=$this->input->post('service');
              // $words=$this->input->post('order_words');
               //$pages=$this->input->post('order_pages');
               $description=$this->input->post('order_description');
               $title=$this->input->post('order_title');
               $level_id=$this->input->post('order_level_id');
               $deadline_id=$this->input->post('order_deadline_id');
               $format_id=$this->input->post('order_format_id');
               $discipline_id=$this->input->post('order_discipline_id');
               $sources=$this->input->post('order_sources');
               $other=$this->input->post('other');
               $writer_id=$this->input->post('user_id');


               $commission=$this->Designmodel->get_commission();

               $timezone=$this->input->post('order_tz');


              // $order_other=$this->input->post('order_other');

               if(empty($timezone)){
                   
                    $timezone="America/New_York";

                 }
                 else
                 {
                    $timezone=$timezone;

                 }

                      
              

                 $time_manenos=$this->get_time_stuff($timezone,$deadline_id);
                 $due=$deadline_id;
                 $start=$time_manenos['start'];
                 $period=$time_manenos['period'];



              
              
               if(!empty($_FILES)){ 

                 // $filenames=array();

                  
                     $data=$this->session->userdata('userData');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];

                 // $filenames=array();

                  $countfiles = count($_FILES['file']['name']);
                   
      // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['file']['name'][$i])){
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['fil']['name'] = $_FILES['file']['name'][$i];
                        $_FILES['fil']['type'] = $_FILES['file']['type'][$i];
                        $_FILES['fil']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                        $_FILES['fil']['error'] = $_FILES['file']['error'][$i];
                        $_FILES['fil']['size'] = $_FILES['file']['size'][$i];

                        // Set preference
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                        $config['max_size'] = '5000000'; // max_size in kb
                        $config['file_name'] = $_FILES['file']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
                        // File upload
                        if(!$this->upload->do_upload('fil')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

                          $data['error'] = $this->upload->display_errors();

                         // print_r($data['error']); die();
                        


                        }
                        else
                        {


                            

                         

                              $uploadData = $this->upload->data();
                              $filename = $uploadData['file_name'];

                              // Initialize array
                              $filenames[] = $filename;
                             // print_r($filenames); die();

                          }

                        }

                      } //end of loop

                      if(isset($data['error']))
                       {


                          // $data['discipline'] = $this->Designmodel->get_discipline();
                          // $data['level'] = $this->Designmodel->get_level();
                          // $data['format'] = $this->Designmodel->get_format();
                          // $data['deadline'] = $this->Designmodel->get_deadline();
                          $data['userData'] = $data;



                      
                            //$this->load->view('homepage/header', $data);
                            $this->load->view('buyer/special_order', $data);
                            //$this->load->view('homepage/footer', $data);




                       }
                       else
                       {



                      // $user_id=$this->Designmodel->insert_buyer($user_array);


                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_writer_id' =>$order_writer_id,

                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        //'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_type' =>2,
                        'other' =>$other,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        
                        //send email to client confirming receipt
                       );
                     }
                     else
                      {
                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'order_added' =>$this->current_time(),
                        'order_type' =>2,
                        'other' =>$other,
                        'order_commission' =>$commission,
                        'order_writer_id' =>$writer_id,
                        'order_website' =>8,
                        
                        //send email to client confirming receipt
                       );


                      }

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
           

              
                   
                 $data=$this->session->userdata('userData');
                //send order email
               
                 // $result=$this->Designmodel->get_names($resp);

                 // $discipline_name=$result[0]->discipline_name;

                 // $format_name=$result[0]->format_name;

                 //  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Technical Order";
                 $message="Hi $fname, <br>Welcome to AceFlexPathCourse. Your will receive quotation for your technical order in minutes. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                
                
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);


                 echo 0;





                    //  } //end of no error
                             
                   
                  }  //end proceed

                }
                       
                  
               
                else
                {
                  //no upload
                      //  print_r($_FILES['files']['name']); die();
                      // $user_id=$this->Designmodel->insert_buyer($user_array);
                      $data=$this->session->userdata('userData');


                     $user_id=$data['user_id'];
                     $fname=$data['user_fname'];
                     $email=$data['user_email'];



                               
                      if(empty($writer_id)){
                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'order_type' =>2,
                        'other' =>$other,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        
                        //send email to client confirming receipt
                       );
                     }
                     else
                      {
                         $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'order_type' =>2,
                        'other' =>$other,
                        'order_commission' =>$commission,
                        'order_writer_id' =>$writer_id,
                        'order_website' =>8,
                        
                        //send email to client confirming receipt
                       );


                      }
                

                     $resp=$this->Designmodel->insert_order($orderarray);


                   
                 $data=$this->session->userdata('userData');
                //send order email
               
                 // $result=$this->Designmodel->get_names($resp);

                 // $discipline_name=$result[0]->discipline_name;

                 // $format_name=$result[0]->format_name;

                 //  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Technical Order";
                 $message="Hi $fname, <br>Welcome to AceFlexPathCourse. Your will receive quotation for your technical order in minutes. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                
                
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                 redirect("client/get_technical", "refresh");

                   }
                
            
               


             

         
             

          //  }
            //  }
             
            //}



  }



        public function request_revision_process() {

               $this->check_login();

               $data=$this->session->userdata('userData');

               $data=$this->get_info();


              // $file_upload=NULL;

                if(empty($_FILES['userfile']['name']))
                {

                     $file_upload=NULL;
                     $id=$this->input->post('order_id');
                   

                    $data=$this->session->userdata('userData');


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
                        AceFlexPathCourse.

                         ";


                       $this->send_mail($email,$subject,$message);

                      
           
                      
                      $data['success']="We've received your revision request, your paper will be attended to shortly"; 
                     
                      $this->load->view('buyer/request', $data);


                }
                else
                {

                $config['upload_path'] = './userfile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx';
                $config['max_size'] = '5000000'; // max_size in kb
               // $config['max_width'] = 15000;
               // $config['max_height'] = 15000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if (!$this->upload->do_upload('userfile')) {

                     

                       $data=$this->get_info();

                       $data=$this->session->userdata('userData');

             
                        $data['error'] = $this->upload->display_errors();

                        $this->load->view('buyer/request', $data);

                } else {

                    $id=$this->input->post('order_id');
                    $data = array('image_metadata' => $this->upload->data());
                    $file_upload=$data['image_metadata']['file_name'] ;

                    $data=$this->session->userdata('userData');


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

                      

                       $subject="#$id: Revision Request";
                       $message="Hi $fname, <br> Your have a revision request for order ID:$id. <br>
                        Revision details: $order_revision_details<br>
                        Kindly visit your dashboard to resolve the issue.<br>
                        <br>
                        Regards. <br>
                        AceFlexPathCourse.

                         ";
                       $this->send_mail($email,$subject,$message);

                      
           
                      
                      $data['success']="We've received your revision request, your paper will be attended to shortly"; 
                     
                      $this->load->view('buyer/request', $data);
                  }
                }


           }
        
        


         public function process_order() {
              $this->check_login();

              $data=$this->session->userdata('userData');

               $data=$this->get_info();


              $email=$data['user_email'];
              $fname=$data['user_fname'];
                //get variables from form
               $amount=$this->input->post('order_amount');


               $current_bal= $this->Designmodel->get_current_balance($data['user_id']);

              





               $words=$this->input->post('order_word_count');
               $description=$this->input->post('order_description');
               $title=$this->input->post('order_title');
               $order_other=$this->input->post('order_other');

               $day=$words/750;
               $days=ceil($day);
               date_default_timezone_set('America/New_York'); 

               $due=Date('y:m:d H:i:s', strtotime("+$days days"));

               if ($this->input->post('coupon')) {
                 # code...check if coupon is valid
                   $coupon=$this->input->post('coupon');
                   $reslt=$this->Designmodel->coupon($coupon);
                   if($reslt!='false')
                   {

                       $percent=100-$reslt;
                       $amount=($percent/100)*$amount;

                   }
                   else
                   {
                     $amount=$amount;
                   }
               }
               else
               {
                 
                 $amount=$amount;

               }

                if($current_bal>=$amount)
               {

                 $order_status=1;
                 $payment_status=1;

               }
               else
               {

                 $order_status=0;
                 $payment_status=0;

               }
    
               $orderarray = array(

                'buyer_id' =>$this->input->post('user_id'),
                'order_title' =>$this->input->post('order_title'),
                'order_description' =>$this->input->post('order_description'),
                'content_type_id' =>$this->input->post('content_type_id'),
                'industry_id' =>$this->input->post('industry_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'package_id' =>$this->input->post('package_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'order_word_count' =>$this->input->post('order_word_count'),
                'other' =>$this->input->post('other'),
                'order_amount' =>$amount,
                'order_status' =>$order_status,
                'payment_status' =>$payment_status,
                'order_other' =>$order_other,
                'order_added' =>$this->current_time(),
                'order_due' =>$due,
                
                //send email to client confirming receipt
               );

                $resp=$this->Designmodel->insert_order($orderarray);
                //send order email
                 $contentid=$this->input->post('content_type_id');
                 $industryid=$this->input->post('industry_id');
                 $result=$this->Designmodel->get_names($contentid,$industryid);

                 $content_name=$result[0]->content_name;

                 $industry_name=$result[0]->industry_name;


                
         
                 if($current_bal>=$amount)
                {
                    $new_balance=$current_bal-$amount;

                    $uparr = array(
                                 'user_account' => $new_balance,
                                );

                    $this->Designmodel->update_bal($data['user_id'],$uparr);

                    $data['bal']=$new_balance;

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
                      99 Content Team.

                       ";





                     $this->send_mail($email,$subject,$message);

                      $data['notification']="View order";
                      $data['notification_url']=base_url().'buyer/get_paper_details/'.$resp;

                      $data['notification_title']="Order placement successful";

                      $data['notification_message']="Congratulations your content is now being handled by our team of creative writers";


                      $this->load->view('buyer/super_notification',$data);

                }
                else
                {
                     $subject="#$resp: Insufficient funds";
                     $message="Hi $fname, <br> We couldn't complete processing your order. Kindly deposit funds to your account to proceed. <br>
                      
                      <br>
                      Regards. <br>
                      99 Content Team.

                       ";




                     $this->send_mail($email,$subject,$message);

                     $data['notification']="Sorry! we couldn't complete your order, kindly deposit funds to proceed";
                     $this->load->view('buyer/load_account',$data);

                }




  }

   public function user_exist_status($email)
     {
        
        $res=$this->Designmodel->user_exist_status($email);
        return $res;

     }

     public function get_information(){

                $data['t'] = $this->Designmodel->get_content_type();
                $data['i'] = $this->Designmodel->get_industries();
                $data['p'] = $this->Designmodel->get_package();
                $data['s'] = $this->Designmodel->get_subscriptions();
                return $data;
     }
        

        public function get_due_date($deadline_id){


              $days=$this->Designmodel->get_days($deadline_id);

              $due=Date('y:m:d H:i:s', strtotime("+$days days"));

              $data['days']=$days;
              $data['due']=$due;

              return $data;


        }

         public function get_days($days){


             // $days=$this->Designmodel->get_days($deadline_id);

              $due=Date('y:m:d H:i:s', strtotime("+$days days"));

              $data['days']=$days;
              $data['due']=$due;

              return $data;


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

                  


                  $data = $this->get_calculation_variables();
                  

                  $this->session->set_flashdata('warning','Verify that you are not a robot before submitting the form');       
                  $this->load->view('homepage/header', $data);
                  $this->load->view('homepage/client_account',$data);
                  $this->load->view('homepage/footer',$data);


              } else if ($captcha_success->success==true) {

               $pass=$this->input->post('password');
               $password=$this->hash_password($pass);
               $fname=$this->input->post('user_fname');
               $lname=$this->input->post('user_lname');
               $email=$this->input->post('user_email');

               $user_array= array(         
                                
                             'user_fname' => $fname,
                             'user_lname' => $lname,
                             'user_website' => 8,
                             'user_login_type' => 1,
                             'user_status' => 1,
                             'user_authority' => 1,
                             'user_email' => $email,
                             'user_password' =>$password,
                             'user_added' => $this->current_time(),
                            
                            
                           );

               $res=$this->user_exist_status($this->input->post('user_email'));

                if($res!=='true')
                {


                     $user_id=$this->Designmodel->insert_buyer($user_array);

                     $subject="Welcome to AceFlexPathCourse $fname";
                     $message="Hi $fname, <br> We are pleased to welcome you to AceFlexPathCourse. Enjoy 20% discount when you make your first order. <br> Kindly send any inquiries to support@AceFlexPathCourse.com or use our chat on the website. <br>
                       Kind regards,<br>
                       AceFlexPathCourse Team.
                     ";

                     $to=$email;


                     $this->send_mail($to,$subject,$message);

                     $data = $this->get_calculation_variables();



                     $data['success_message']="Registration successful, kindly sign in to place your order";

                     

                     $this->load->view('homepage/header',$data);
                     $this->load->view('homepage/client_account',$data);
                     $this->load->view('homepage/footer',$data);

                }
                else
                {
                       $data = $this->get_calculation_variables();

                       $data['error_message']="You are already registered, Kindly login below to place your order";


                       $this->load->view('homepage/header',$data);
                       $this->load->view('homepage/client_account',$data);
                       $this->load->view('homepage/footer',$data);


                }

             }



        }


        public function generate_invoice($amount,$order_id,$fname,$email)
        {

           $subject="Invoice #$order_id generated";
           $message="Dear $fname, <br> Thank you for placing an order with us. <br> Invoice ID:$order_id has been generated. <br>
                     Kind regards,<br>
                     AceFlexPathCourse Support.";



           $this->send_mail($email,$subject,$message);







        }



         public function process_order_first(){
                    // $this->check_login();
                //get variables from form
         //$this->load->helper('form');


             $response = $this->input->post('g-recaptcha-response');



             $url = 'https://www.google.com/recaptcha/api/siteverify';
         
              $secretKey ='6LdVpcgZAAAAAK3Y2qairHtLutmJurmliaZqhmog';
              $captcha =$response;
              
             
              //$context  = stream_context_create($options);
              $url ='https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
              $verify = file_get_contents($url);
              $captcha_success=json_decode($verify);

              if ($captcha_success->success==false) {
                  

                  $this->session->set_flashdata('warning','Verify that you are not a robot before submitting the form');       

                  redirect('home/order_now');

              } else{

              $order_writer_id=$this->assign_admin();

          
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
               $affiliate_id=$this->input->post('affiliate');
               $commission=$this->Designmodel->get_commission();
               $timezone=$this->input->post('order_tz');







              // $order_other=$this->input->post('order_other');

               if(empty($timezone)){
                   
                    $timezone="America/New_York";

                 }
                 else
                 {
                    $timezone=$timezone;

                 }

                      
              

                 $time_manenos=$this->get_time_stuff($timezone,$deadline_id);
                 $due=$deadline_id;
                 $start=$time_manenos['start'];
                 $period=$time_manenos['period'];

               //do an insert first
               $fname=$this->input->post('user_fname');
               $lname=$this->input->post('user_lname');
               $email=$this->input->post('user_email');
               $pass=$this->input->post('password');
               $password=$this->hash_password($pass);



               $user_array= array(         
                                
                             'user_fname' => $fname,
                             'user_lname' => $lname,
                             'user_phone' => $this->input->post('user_phone'),
                             'user_login_type' => 1,
                             'user_status' => 1,
                             'user_authority' => 1,
                             'user_email' => $email,
                             'user_password' => $password,
                             'user_added' => $this->current_time(),
                             'user_website' => 8,
                            
                            
                           );
              $res=$this->user_exist_status($email);

              if($res!=='true')
              {
                

           

                 if(!empty($_FILES)){ 

                 // $filenames=array();

                  $countfiles = count($_FILES['file']['name']);

                   //print_r($countfiles); die();
                   
      // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['file']['name'][$i])){

                      // print_r($_FILES['file']['name'][$i]); die();
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['fil']['name'] = $_FILES['file']['name'][$i];
                        $_FILES['fil']['type'] = $_FILES['file']['type'][$i];
                        $_FILES['fil']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                        $_FILES['fil']['error'] = $_FILES['file']['error'][$i];
                        $_FILES['fil']['size'] = $_FILES['file']['size'][$i];

                        // Set preference
                        $config['upload_path'] = './userfile/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xml|xlsx|csv|doc|xls|ppt|pptx|pub';
                       // $config['max_size'] = '500000'; // max_size in kb
                       // $config['file_name'] = $_FILES['file']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
                        $this->upload->initialize($config);

               
                        // File upload
                        if(!$this->upload->do_upload('fil')){

                           $data=$this->get_info();

                           $data=$this->session->userdata('userData');

                       
         
       
       

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

                      } //end of loop

                      if(isset($data['error']))
                       {


                          $data['discipline'] = $this->Designmodel->get_discipline();
                          $data['level'] = $this->Designmodel->get_level();
                          $data['format'] = $this->Designmodel->get_format();
                          $data['deadline'] = $this->Designmodel->get_deadline();
                          $data['userData'] = $data;



                      
                            $this->load->view('homepage/header', $data);
                            $this->load->view('homepage/order_now', $data);
                            $this->load->view('homepage/footer', $data);




                       }
                       else
                       {



                       $user_id=$this->Designmodel->insert_buyer($user_array);



                       $orderarray = array(

                        'order_user_id' =>$user_id,
                        'order_title' =>$title,
                        'order_description' =>$description,
                        'order_level_id' =>$level_id,
                        'order_format_id' =>$format_id,
                        'order_discipline_id' =>$discipline_id,
                        'order_deadline_id' =>$deadline_id,
                        'order_writer_id' =>$order_writer_id,
                        'order_pages' =>$pages,
                        'order_sources' =>$sources,
                        'order_amount' =>$amount,
                        'order_added' =>$this->current_time(),
                        'order_due' =>$due,
                        'order_start' =>$start,
                        'order_period' =>$period,
                        'order_tz' =>$timezone,
                        'other' =>$other,
                        'order_service_id' =>$service,
                        'order_words' =>$words,
                        'affiliate_id' =>$affiliate_id,
                        'order_commission' =>$commission,
                        'order_website' =>8,
                        
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
           

              
                    $userData = array(

                    'user_fname' => $fname,
                    'user_id' => $user_id, 
                    'user_email' => $email,
                    'user_login_type' => 1,          
                               
                    );


                 // $this->log_user_activity($userData);


                $this->session->set_userdata('userData', $userData);

                 $data=$this->session->userdata('userData');
                //send order email
               
                 $result=$this->Designmodel->get_names($resp);

                 $discipline_name=$result[0]->discipline_name;

                 $format_name=$result[0]->format_name;

                  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Order placed successfully";
                 $message="Hi $fname, <br>Welcome to AceFlexPathCourse. Your order has been placed successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Amount: $amount <br>
                  Due Date: $due<br>
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);

              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                //redirect("client/paypal", "refresh");

                    $mydata['order_id']=$resp;
                    $mydata['amount']=$amount;

                    echo json_encode($mydata);







                      } //end of no error
                             
                   
                  }  //end proceed
                       
                  
               
                else
                {
                  //no upload
                       $user_id=$this->Designmodel->insert_buyer($user_array);



                               $orderarray = array(

                                'order_user_id' =>$user_id,
                                'order_title' =>$title,
                                'order_description' =>$description,
                                'order_level_id' =>$level_id,
                                'order_format_id' =>$format_id,
                                'order_discipline_id' =>$discipline_id,
                                'order_deadline_id' =>$deadline_id,
                                'order_writer_id' =>$order_writer_id,
                                'order_pages' =>$pages,
                                'order_sources' =>$sources,
                                'order_amount' =>$amount,
                                'order_added' =>$this->current_time(),
                                'order_due' =>$due,
                                'order_start' =>$start,
                                'order_period' =>$period,
                                'order_tz' =>$timezone,
                                'other' =>$other,
                                'order_service_id' =>$service,
                                'order_words' =>$words,
                                'affiliate_id' =>$affiliate_id,
                                'order_commission' =>$commission,
                                'order_website' =>8,

                                
                                //send email to client confirming receipt
                               );
                

                     $resp=$this->Designmodel->insert_order($orderarray);


                    $userData = array(

                    'user_fname' => $fname,
                    'user_id' => $user_id, 
                    'user_email' => $email,
                    'user_login_type' => 1,          
                               
                    );


                 // $this->log_user_activity($userData);


                $this->session->set_userdata('userData', $userData);

                 $data=$this->session->userdata('userData');
                //send order email
               
                 $result=$this->Designmodel->get_names($resp);

                 $discipline_name=$result[0]->discipline_name;

                 $format_name=$result[0]->format_name;

                  $level_name=$result[0]->level_name;


               
         


                 $subject="#$resp: Order placed successfully";
                 $message="Hi $fname, <br>Welcome to AceFlexPathCourse. Your order has been placed successfully. <br>
                  Order details:<br>
                  Order Title: $title <br>
                  Order Description: $description  <br>
                  Sources: $sources <br>
                  Discipline: $discipline_name <br>
                  Academic Level: $level_name <br>
                  Format: $format_name <br>
                  Pages: $pages <br>
                  Amount: $amount <br>
                  Due Date: $due<br>
                  <br>
                  Regards. <br>
                  AceFlexPathCourse.

                   ";
                 $this->send_mail($email,$subject,$message);

                 $this->generate_invoice($amount,$resp,$fname,$email);






              
     
                
                $this->session->set_flashdata('order_id',$resp); 
                $this->session->set_flashdata('amount',$amount);
                redirect("client/paypal", "refresh");

                   }
                  //generate invoice




                
              }
              else
              {
                 
                if (!$this->input->is_ajax_request()) {



                  redirect('client/registered',"refresh");

                }
                else
                {

                   echo "registered";
                }
                   
              }
            // }

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

    

  public function registered(){


                 

                   $data = $this->get_calculation_variables();

                   $data['error_message']="You are already registered, Kindly login below to place your order";

                   $data['title']="AceFlexPathCourse.com|Client";
                   $data['description']="Create your client account at AceFlexPathCourse.com";

                  $this->load->view('homepage/header',$data);
                  $this->load->view('homepage/client_account',$data);
                  $this->load->view('homepage/footer',$data);





  }
 



  //        public function process_order_first(){
  //            // $this->check_login();
  //               //get variables from form

  //          // $response = $this->input->post('g-recaptcha-response');



  //          // $url = 'https://www.google.com/recaptcha/api/siteverify';
         
  //          //  $secretKey ='6LdKNwEVAAAAAFm8utMJOz9zfW_iFom8sGjmgSTj';
  //          //  $captcha =$response;
              
             
  //          //    //$context  = stream_context_create($options);
  //          //    $url ='https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  //          //    $verify = file_get_contents($url);
  //          //    $captcha_success=json_decode($verify);

  //          //    if ($captcha_success->success==false) {
                  

  //          //        $this->session->set_flashdata('warning','Verify that you are not a robot before submitting the form');       

  //          //        redirect('home/order_now');

  //          //    } else if ($captcha_success->success==true) {


  //              $amount=$this->input->post('order_amount');
  //              $pages=$this->input->post('order_pages');
  //              $description=$this->input->post('order_description');
  //              $title=$this->input->post('order_title');
  //              $level_id=$this->input->post('order_level_id');
  //              $deadline_id=$this->input->post('order_deadline_id');
  //              $format_id=$this->input->post('order_format_id');
  //              $discipline_id=$this->input->post('order_discipline_id');
  //              $sources=$this->input->post('order_sources');
  //              $other=$this->input->post('other');


  //             // $order_other=$this->input->post('order_other');

  //              $data=$this->get_due_date($deadline_id);
  //              $due=$data['due'];
  //              $days=$data['days'];

  //              //do an insert first
  //              $fname=$this->input->post('user_fname');
  //              $lname=$this->input->post('user_lname');
  //              $email=$this->input->post('user_email');
  //              $pass=$this->input->post('new_password');
  //              $password=$this->hash_password($pass);



  //              $user_array= array(         
                                
  //                            'user_fname' => $fname,
  //                            'user_lname' => $lname,
                            
  //                            'user_login_type' => 1,
  //                            'user_status' => 1,
  //                            'user_authority' => 1,
  //                            'user_email' => $email,
  //                            'user_password' => $password,
  //                            'user_added' => $this->current_time(),
                            
                            
  //                          );
  //             $res=$this->user_exist_status($email);

  //             if($res!=='true')
  //             {


  //               $user_id=$this->Designmodel->insert_buyer($user_array);



    
  //              $orderarray = array(

  //               'order_user_id' =>$user_id,
  //               'order_title' =>$title,
  //               'order_description' =>$description,
  //               'order_level_id' =>$level_id,
  //               'order_format_id' =>$format_id,
  //               'order_discipline_id' =>$discipline_id,
  //               'order_pages' =>$pages,
  //               'order_sources' =>$sources,
  //               'order_amount' =>$amount,
  //               'order_added' =>$this->current_time(),
  //               'order_due' =>$due,
  //               'other' =>$other,
                
  //               //send email to client confirming receipt
  //              );

  //               $resp=$this->Designmodel->insert_order($orderarray);


  //                   $userData = array(

  //                   'user_fname' => $fname,
  //                   'user_id' => $user_id, 
  //                   'user_email' => $email,
  //                   'user_login_type' => 1,          
                               
  //                   );


  //                // $this->log_user_activity($userData);


  //               $this->session->set_userdata('userData', $userData);

  //                $data=$this->session->userdata('userData');
  //               //send order email
               
  //                $result=$this->Designmodel->get_names($resp);

  //                $discipline_name=$result[0]->discipline_name;

  //                $format_name=$result[0]->format_name;

  //                 $level_name=$result[0]->level_name;


               
         


  //                $subject="#$resp: Order placed successfully";
  //                $message="Hi $fname, <br>Welcome to Essays Corp. Your order has been placed successfully. <br>
  //                 Order details:<br>
  //                 Order Title: $title <br>
  //                 Order Description: $description  <br>
  //                 Sources: $sources <br>
  //                 Discipline: $discipline_name <br>
  //                 Academic Level: $level_name <br>
  //                 Format: $format_name <br>
  //                 Pages: $pages <br>
  //                 Amount: $amount <br>
  //                 Due Date: $days<br>
  //                 <br>
  //                 Regards. <br>
  //                 Essays Corp.

  //                  ";
  //                $this->send_mail($email,$subject,$message);

              
     
                
  //               $this->session->set_flashdata('order_id',$resp); 
  //               $this->session->set_flashdata('amount',$amount);
  //               redirect("client/paypal", "refresh");
  //             }
  //             else
  //             {

  //                 $data['error_message']="You are already registered, Kindly login below to place your order";

  //                 $this->load->view('homepage/header',$data);
  //                 $this->load->view('homepage/client_account',$data);
  //                 $this->load->view('homepage/footer',$data);
  //             }
  //           // }



  // }

    function success(){
       $this->load->library('session');

       $data=$this->session->userdata('userData');

        $data=$this->get_info();

      if ($this->session->flashdata('order_id')){
        $data['order_id'] = $this->session->flashdata('order_id');
      }
      if ($this->session->flashdata('amount')){
        $data['amount'] = $this->session->flashdata('amount');
      }

      if ($this->session->flashdata('new_balance')){
        $data['new_balance'] = $this->session->flashdata('new_balance');
      }

      if ($this->session->flashdata('status')){
        $data['status'] = $this->session->flashdata('status');
      }
      if ($this->session->flashdata('txn_id')){
        $data['txn_id'] = $this->session->flashdata('txn_id');
      }

      // $this->session->set_flashdata('order_id',$order_id); 
      // $this->session->set_flashdata('amount',$amount);
      // $this->session->set_flashdata('txn_id',$txn_id);
      // $this->session->set_flashdata('status',$status);

       $data['userData'] = $data;

      $this->load->view('buyer/header', $data);
      $this->load->view('buyer/success', $data);
      $this->load->view('buyer/footer', $data);
    }

   


   public function process_order_subscription()
  {
              $this->check_login();
                //get variables from form

              $data=$this->session->userdata('userData');

               $data=$this->get_info();


              $user_id= $data['user_id'];

               $current_bal= $this->Designmodel->get_current_balance($user_id);

               $amount=$this->input->post('amount');

               
               $months=$this->input->post('months');
              
               $title=$this->input->post('order_title');

              date_default_timezone_set('America/New_York'); 

             //  $due= date('d/m/Y', strtotime('+2 months'));

               $packageid=$this->input->post('package_id');

               // see if there is a previous package on the same, use end date as the start date
                $package_name=$this->Designmodel->get_package_name($packageid);
                
               // $user_id=$data['user_id'];

                $response=$this->Designmodel->get_if_previous($user_id);


                if($response=='false')
                {
                    $due=Date('y:m:d H:i:s', strtotime("+$months months"));
                }
                else
                {
                    $duedate=$this->Designmodel->get_due_date($response);

                    $due=Date('y:m:d H:i:s', strtotime("+$months months",strtotime($duedate)));
                   

                }

                 if ($this->input->post('coupon')) {
                 # code...check if coupon is valid
                   $coupon=$this->input->post('coupon');
                   $reslt=$this->Designmodel->coupon($coupon);
                   if($reslt!='false')
                   {

                       $percent=100-$reslt;
                       $amount=($percent/100)*$amount;

                   }
                   else
                   {
                     $amount=$amount;
                   }
               }
               else
               {
                 
                 $amount=$amount;

               }

                if($current_bal>=$amount)
               {

                 $order_status=1;
                 $payment_status=1;

               }
               else
               {

                 $order_status=0;
                 $payment_status=0;

               }
    

               

              
               $orderarray = array(
                'order_type' =>2,
                'buyer_id' =>$user_id,
                'order_title' =>$package_name,
                'order_description' =>$this->input->post('order_description'),
                'content_type_id' =>$this->input->post('content_type_id'),
                'industry_id' =>$this->input->post('industry_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'package_id' =>$this->input->post('package_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'order_word_count' =>$this->input->post('order_word_count'),
                'order_amount' =>$amount,
                'order_status' =>$order_status,
                'payment_status' =>$payment_status,
                'order_added' =>$this->current_time(),
                'order_due' =>$due,
                
                //send email to client confirming receipt
               );

                $resp=$this->Designmodel->insert_order($orderarray);
                //get subscriptio package
               

                


               // $data=$this->session->userdata('userData');


                $email=$data['user_email'];
                $fname=$data['user_fname'];

                if($current_bal>=$amount)
                {
                    $new_balance=$current_bal-$amount;

                    $uparr = array(
                                 'user_account' => $new_balance,
                                );

                    $this->Designmodel->update_bal($user_id,$uparr);

                    $data['bal']=$new_balance;
         


                 $subject="#$resp: Your Subscription has been initiated.";

                 $message="Hi $fname, <br> Your subscription order has been placed successfully. <br>
                  Order details:<br>
                  Subscription Package: $package_name <br>
                 
                
                 
                  Amount: $amount <br>
                  Due Date: $due<br>

                  <br>
                  Regards. <br>
                  99 Content Team.

                   ";


 


                   $this->send_mail($email,$subject,$message);

                    $data['notification']="View Subscription";
                    $data['notification_url']=base_url().'buyer/get_subscription_details/'.$resp;

                    $data['notification_title']="Subscription initiated successfully";

                    $data['notification_message']="Congratulations your content is now being handled by our team of creative writers";


                    $this->load->view('buyer/super_notification',$data);
                 }
                else
                {
                      $data=$this->get_info();

                     $subject="#$resp: Insufficient funds";
                     $message="Hi $fname, <br> We couldn't complete processing your subscription request. Kindly deposit funds to your account to proceed. <br>
                      
                      <br>
                      Regards. <br>
                      99 Content Team.

                       ";




                     $this->send_mail($email,$subject,$message);

                    // print_r($data); die();

                     $data['notification']="Sorry! we couldn't complete your order, kindly deposit funds to proceed";
                     $this->load->view('buyer/load_account',$data);

                }




  }

   public function process_order_subscription_first()
  {
             
                //get variables from form

              $data=$this->session->userdata('userData');

              $user_id= $data['user_id'];

               $amount=$this->input->post('amount');

               
               $months=$this->input->post('months');
              
               $title=$this->input->post('order_title');

              date_default_timezone_set('America/New_York'); 

             //  $due= date('d/m/Y', strtotime('+2 months'));

               $packageid=$this->input->post('package_id');

               // see if there is a previous package on the same, use end date as the start date
                $package_name=$this->Designmodel->get_package_name($packageid);
                
                $user_id=$data['user_id'];

                $response=$this->Designmodel->get_if_previous($user_id);

                if($response=='false')
                {
                    $due=Date('y:m:d H:i:s', strtotime("+$months months"));
                }
                else
                {
                    $duedate=$this->Designmodel->get_due_date($response);
                  
                     $due=Date('y:m:d H:i:s', strtotime("+$months months",strtotime($duedate)));
                }

                  if ($this->input->post('coupon')) {
                 # code...check if coupon is valid
                   $coupon=$this->input->post('coupon');
                   $reslt=$this->Designmodel->coupon($coupon);
                   if($reslt!='false')
                   {

                       $percent=100-$reslt;
                       $amount=($percent/100)*$amount;

                   }
                   else
                   {
                     $amount=$amount;
                   }
               }
               else
               {
                 
                 $amount=$amount;

               }

              $fname=$this->input->post('user_fname');
               $lname=$this->input->post('user_lname');
               $email=$this->input->post('user_email');
               $pass=$this->input->post('new_password');
               $password=$this->hash_password($pass);


               $user_array= array(         
                                
                             'user_fname' => $fname,
                             'user_lname' => $lname,
                            
                             'user_login_type' => 1,
                             'user_status' => 1,
                             'user_authority' => 1,
                             'user_email' => $email,
                             'user_password' => $password,
                             'user_added' => $this->current_time(),
                            
                            
                           );
              $res=$this->user_exist_status($email);

              if($res!=='true')
              {

                $user_id=$this->Designmodel->insert_buyer($user_array);
               

              
               $orderarray = array(
                'order_type' =>2,
                'buyer_id' =>$user_id,
                'order_title' =>$package_name,
                'order_description' =>$this->input->post('order_description'),
                'content_type_id' =>$this->input->post('content_type_id'),
                'industry_id' =>$this->input->post('industry_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'package_id' =>$this->input->post('package_id'),
                'order_keywords' =>$this->input->post('order_keywords'),
                'order_word_count' =>$this->input->post('order_word_count'),
                'order_amount' =>$amount,
                'order_added' =>$this->current_time(),
                'order_due' =>$due,
                
                //send email to client confirming receipt
               );

                $resp=$this->Designmodel->insert_order($orderarray);
                //get subscriptio package

                  $userData = array(

                    'user_fname' => $fname,
                    'user_id' => $user_id, 
                    'user_email' => $email,
                    'user_login_type' => 1,          
                               
                    );


                 // $this->log_user_activity($userData);


                  $this->session->set_userdata('userData', $userData);
               

                


                $data=$this->session->userdata('userData');


                $email=$data['user_email'];
                $fname=$data['user_fname'];
         


                 $subject="#$resp: Your Subscription has been initiated.";

                 $message="Hi $fname, <br>Welcome to 99 Content. Your subscription order has been placed successfully. <br>
                  Order details:<br>
                  Subscription Package: $package_name <br>
                 
                
                 
                  Amount: $amount <br>
                  Due Date: $due<br>

                  <br>
                  Regards. <br>
                  99 Content Team.

                   ";




                 $this->send_mail($email,$subject,$message);

                 $this->session->set_flashdata('order_id',$resp); 
                 $this->session->set_flashdata('amount',$amount);
                 redirect("client/paypal", "refresh");
          }
          else
          {

            
                 
                  $data['sign_in']="You are already registered, Kindly login below to place your order";

                  $this->load->view('homepage/login',$data);


          }




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
