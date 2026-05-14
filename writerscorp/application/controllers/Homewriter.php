<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homewriter extends CI_Controller {
    
        function __construct()
	{
    
        parent::__construct();
    
        
		$this->load->helper(array('form', 'url'));
                
             
                 $this->load->library("pagination");

                $this->load->database();

                // Load form helper library

               // $this->load->library('facebook');

               // $this->load->library('google');

                $this->load->model('user');



                // Load form validation library
                $this->load->library('form_validation');

                // Load session library
                $this->load->library('session');

                // Load database
                $this->load->model('Designmodelwriter');
        }
	
	public function index()
	{
	      //$this->load->model('Designmodelwriter');
                $data['title']="99Content|Home"; 
                $data['keywords']="Platinum private lending, loans, emergency loans, platinum loans, boda boda loans, personal loans "; 
                $data['description']="Mobitech Technologies is a leading provider of Bulk SMS services, USSD, Shortcodes and Mpesa integration services. Our mission is anchored on providing high quality services to our clients from within Kenya and beyond the borders, We are located in Westlands Nairobi, pay us a visit or call us, we'd be glad to work on your next project. "; 

               $data =  $this->get_logins();
              
	      $this->load->view('homepage/index',$data);
	}
        public function pricing()
	{
                $data['title']="99Content|Pricing"; 
                $data['keywords']="Mobitech Technologies,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi"; 
                $data['description']="Mobitech Technologies Limited was established in 2012. We are one of the leading mobile technology companies in Kenya. We major in provision of Mobile application solutions,Bulk SMS, USSD services, shortcodes,Mobile payments(M-Pesa) and other related IT services among others. We are locally based business with our offices located in Westlands, Nairobi."; 
                   $data =  $this->get_logins();
		             $this->load->view('homepage/pricing',$data);
	}
        public function howitworks()
	{
               
            
               // $data['h']=$this->Adminmodel->get_received();
                $data['title']="Platinum Private Lending|Events"; 
                $data['keywords']="Mobitech Technologies,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi, Kenya"; 
                $data['description']="Mobitech Technologies provides one of the most robust bulk sms services at an affordable rate.Send thousands of SMS at a go to your clients in a fast and efficient manner. Our system provides a panel for managing bulk sms plus real time analytics. ";
                  $data =  $this->get_logins();
		            $this->load->view('homepage/howitworks',$data);
	}
         public function faq()
	{
                $data['title']="Platinum Private Lending|FAQs"; 
                $data['keywords']="Mobitech Technologies,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi, Kenya"; 
                $data['description']="Mobitech Technologies provides one of the most robust bulk sms services at an affordable rate.Send thousands of SMS at a go to your clients in a fast and efficient manner. Our system provides a panel for managing bulk sms plus real time analytics. ";
              $data =  $this->get_logins();
		       $this->load->view('homepage/faq',$data);
	}
        public function about()
	{
                $data['title']="Platinum Private Lending|About us"; 
                $data['keywords']="Mobitech Technologies,pricing,plans,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi, Kenya"; 
                $data['description']="Mobitech Technologies provides well researched, tailored pricing plans that suites your needs, be it bulk sms, shortcodes,USSD, or mpesa payments we got you covered";
		$this->load->view('about',$data);
	}
        public function gallery()
	{
                $data['title']="Platinum Private Lending|gallery"; 
                $data['keywords']="Mobitech Technologies,ussdservices,services,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi, Kenya"; 
                $data['description']="Mobitech Technologies ussd services product enables you to build a real time interaction app. It is ideal for reaching clients with poor internet connection or for business looking to interact with their clients in real time.";
		
		$this->load->view('gallery',$data);
	}
        public function downloads()
	{       
                 $this->load->database();

                 $this->load->model('Adminmodel');
            
                $data['h']=$this->Adminmodel->get_downloads();
                
                $data['title']="Platinum Private Lending|downloads"; 
                $data['keywords']="Mobitech Technologies,ussdservices,services,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi, Kenya"; 
                $data['description']="Mobitech Technologies ussd services product enables you to build a real time interaction app. It is ideal for reaching clients with poor internet connection or for business looking to interact with their clients in real time.";
		$this->load->view('downloads',$data);
	}

     public function user_exist_status($email)
     {
        
        $res=$this->Designmodelwriter->user_exist_status($email);
        return $res;

     }
       
        public function careers()
	{
                 $this->load->database();

                 $this->load->model('Adminmodel');
            
                $data['h']=$this->Adminmodel->get_careers();
                
                $data['title']="Platinum Private Lending|careers"; 
                $data['keywords']="Mobitech Technologies,shortcodes,ussdservices,services,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi, Kenya"; 
                $data['description']="Mobitech Technologies short codes gives you the flexibility to configure SMS services in a number of ways that suits your business needs.";
		
		$this->load->view('careers',$data);
	}
        
         public function demo()
	{
		$this->load->view('homepage/registration_success');
	}

  public function privacy()
	{
      $data =  $this->get_logins();
		$this->load->view('homepage/privacy',$data);
	}
   public function terms()
  {
     $data =  $this->get_logins();
    $this->load->view('homepage/terms',$data);
  }
         public function contactus()
	{
          $data =  $this->get_logins();
          $data['title']="Platinum Private Lending|Contact us"; 
          $data['keywords']="Mobitech Technologies,contact us,email,info@mobitechtechnologies.com,USSD,SMS,Bulk SMS,Mpesa Payments,Shortcodes,Nairobi"; 
          $data['description']="Mobitech Technologies is located at Commercial centre, Westlands, Nairobi Kenya, email us at info@mobitechtechnologies.com or call us on (254) 728369514 "; 

	         	$this->load->view('homepage/contactus',$data);
	}
        

    public function current_time()
  {

     date_default_timezone_set('America/New_York'); 
     return date("Y-m-d H:i:s");

  }

    public function send_mail($to,$subject,$message)
  {

      //     $config = Array(

      //     'protocol' => 'smtp',
      //     'smtp_host' => 'ssl://smtp.googlemail.com',
      //     'smtp_port' => 465,
      //     'smtp_user' => '99writercontent@gmail.com',
      //     'smtp_pass' => '99writer2019!',
      //     'mailtype'  => 'html', 
      //     'charset'   => 'utf-8'
      // );
      // $this->load->library('email', $config);
      // $this->email->set_newline("\r\n");

      // $this->email->from('99writercontent@gmail.com');
      // $this->email->to($to); 

      // $this->email->subject($subject);
      // $this->email->message($message);  

      // // Set to, from, message, etc.

      // //$this->load->library('encrypt');

      // $result = $this->email->send();

   $config = Array(

          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.zoho.com',
          'smtp_port' => 465,
          'smtp_user' => 'dispatch@Aceflexpathcourse.com',
          'smtp_pass' => 'Aceflexpathcourse2025',
          'mailtype'  => 'html', 
          'charset'   => 'utf-8'
      );

    
      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->set_newline("\r\n");

      $this->email->from('dispatch@Aceflexpathcourse.com');
      $this->email->to($to); 
      $this->email->reply_to('support@Aceflexpathcourse.com'); 

      $this->email->subject($subject);
      $this->email->message($message);  

      // Set to, from, message, etc.

      //$this->load->library('encrypt');

      $result = $this->email->send();




    }


    public function add_initial_balance($user_id)
    {
          $insertarr=array(
                            'user_id'=>$user_id,
                          );


          $this->Designmodelwriter->insert_initial_bal($insertarr);


          return;


    }


     public function add_user()
    {
        $token=bin2hex(openssl_random_pseudo_bytes(16));
        $data['title']="99 Writer|Contact us"; 
        $data['keywords']=""; 
        $data['description']=""; 

         $fname=$this->input->post('writer_fname');
         $lname=$this->input->post('writer_lname');
         $email=$this->input->post('writer_email');
         $pass=$this->input->post('new_password');
         $password=$this->hash_password($pass);


         $user_array= array(         
                          
                       'user_fname' => $fname,
                       'user_lname' => $lname,
                       'user_token' => $token,
                       'user_authority' => 2,
                       'user_email' => $email,
                       'user_password' => $password,
                       'user_added' => $this->current_time(),
                      
                      
                     );

        $res=$this->user_exist_status($email);

        if($res!=='true')
        {

           $user_id=$this->Designmodelwriter->insert_writer($user_array);


            $this->add_initial_balance($user_id);


           $link=base_url('home/user_activation/').$user_id.'/'.$token;
            //send email with login details
           $subject="#$user_id: Welcome to 99 Writers";
           $message="Hi $fname,<br> Welcome to 99 Writers. Click the link below to activate your account.<br>
            <a href='$link'>$link</a>
            <br>
            Your login credentials are:<br>
            Email:$email <br>
            Password:$pass
            <br><br>
            Kind regards. <br>
            99 Content Team.

             ";

           $this->send_mail($email,$subject,$message);

           $data =  $this->get_logins();
           
           $this->load->view('homepage/registration_success',$data);
       }
       else
       {

           $this->load->view('homepage/user_exists');
       }
    }

     public function user_activation()
  {
      $id=$this->uri->segment(3);
      $token=$this->uri->segment(4);

      //get token
      $resul=$this->Designmodelwriter->get_token($id);
      $result=$resul->result();
     
      $res=$result[0]->user_token;
      $fname=$result[0]->user_fname;
      $email=$result[0]->user_email;

      if($res==$token)
      {


          $data= array(   

                      'user_status' => 1,
                     
                   );

           $this->Designmodelwriter->user_activation($id, $data);

           $subject="#$id: User activation successful";
           $message="Hi $fname, your account has been successfully activated. <br>
            You can now start writing great content for your clients. <br>
            Regards. <br>
            99 Content Team.

             ";



           $data['user_activation']="Your account has been successfully activated, kindly login below";
           $this->send_mail($email,$subject,$message);
           $data =  $this->get_logins();

           $this->load->view('homepage/login',$data);

       }
       else
        {
         
            $data =  $this->get_logins();
              
            $this->load->view('homepage/activation_failed');

        }




  }

  public function facebook_login(){
        $writerData = array();
        
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture,location');

          

            // Preparing data for database insertion
            $writerData['user_login_type'] = 2;
            $writerData['user_authority'] = 2;
            $writerData['user_oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';
            $writerData['user_fname']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            $writerData['user_lname']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $writerData['user_email']        = !empty($fbUser['email'])?$fbUser['email']:'';
           // $writerData['user_gender']        = !empty($fbUser['gender'])?$fbUser['gender']:'';
           
            //$writerData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            

            $activestatus = $this->Designmodelwriter->user_deactivated($writerData['user_email']);

             if ($activestatus=='true') {

             $res =$this->Designmodelwriter->user_exist_social_status($writerData['user_email']);


                if ($res=='true') {

                    $data['title']="Sorry";
                    $data['sub_title']="Email already in use";
                    $data['content']="Email already in use, kindly login";
                   
                 
                    $this->load->view('homepage/user_exists',$data);

                }

                else
                 {

           

            
           

            
            
            // Insert or update user data
            $userID = $this->user->checkUser($writerData);
             $this->add_initial_balance($userID);
            
            // Check user data insert or update status
            if(!empty($userID)){

               //get writer status
                $result = $this->Designmodelwriter->read_user_information_id($userID);
                $writerData['user_writer_status'] =  $result[0]->user_writer_status;

                $writerData['user_id']=$userID;
                $data['writerData'] = $writerData;
                $this->session->set_userData('writerData', $writerData);

            }else{
               $data['writerData'] = array();
            }
          

            // Get logout URL
            $writerData['logoutURL'] = $this->facebook->logout_url();
            
            redirect('writer/index');
          }
          }else{
            // Get login URL
           
            $this->load->view('homepage/deactivated');
        }

        }else{
            // Get login URL
            $data =  $this->get_logins();
            $this->load->view('homepage/index',$data);
        }
        
        // Load login & profile view
       
    }

    public function google(){

        $writerData = array();

        // Redirect to profile page if the user already logged in
        if($this->session->userData('logedIn') == true){
            
               
           
            redirect('writer/index/');
        }
        
        if(isset($_GET['code'])){
            
            // Authenticate user with google
            if($this->google->getAuthenticate()){

              //generate token

               
               
            
                // Get user info from google
                $gpInfo = $this->google->getUserInfo();
                
                // Preparing data for database insertion
                $writerData['user_login_type'] = 3;
                $writerData['user_authority'] = 2;
                $writerData['user_oauth_uid']      = $gpInfo['id'];
                $writerData['user_fname']     = $gpInfo['given_name'];
                $writerData['user_lname']      = $gpInfo['family_name'];
                $writerData['user_email']          = $gpInfo['email'];
               // $writerData['user_gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
               // $writerData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
               // $writerData['user_link']           = !empty($gpInfo['link'])?$gpInfo['link']:'';
                //$writerData['picture']        = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
                 $activestatus = $this->Designmodelwriter->user_deactivated($writerData['user_email']);
            
                if ($activestatus=='true') {
               

                         $res =$this->Designmodelwriter->user_exist_social_status($writerData['user_email']);


                        if ($res=='true') {

                            $data['title']="Sorry";
                            $data['sub_title']="Email already in use";
                            $data['content']="Email already in use, kindly login";
                           
                         
                             $this->load->view('homepage/user_exists',$data);

                        }
                        else
                        {
   
                        // Insert or update user data to the database
                         $userID = $this->user->checkUser($writerData);

                          $this->add_initial_balance($userID);
                         //$writerData['user_mode'] = 0;
                          $result = $this->Designmodelwriter->read_user_information_id($userID);
                         $writerData['user_writer_status'] =  $result[0]->user_writer_status;
                         $writerData['user_id'] =$userID;
                        
                        // Store the status and user profile info into session
                        $this->session->set_userData('logedIn', true);
                        $this->session->set_userData('writerData', $writerData);

                       

                       
                       
                       
                        
                        // Redirect to profile page
                       // $this->load->view('user/user_dash',$writerData);
                        redirect('writer/index/');
              }
             }
             else
               {

        
                // Google authentication url
               
                
                // Load google login view
                $this->load->view('homepage/deactivated');

                }
            }
        }
        else
        {

        
        // Google authentication url
        $data['loginURL'] = $this->google->loginURL();
        
        // Load google login view
        $this->load->view('homepage/index',$data);

        }

   }

    public function logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userData('writerData');
        // Redirect to login page
        redirect('home');
    }



    public function check_login(){

       if($this->session->writerData('writerData')){

         return;

       }
       else
       {
           $data =  $this->get_logins();
            redirect('home');

       }


    }

   public function google_logout(){
        // Reset OAuth access token
        $this->google->revokeToken();
        
        // Remove token and user data from the session
        $this->session->unset_userData('logedIn');
        $this->session->unset_userData('writerData');
        
        // Destroy entire session data
        $this->session->sess_destroy();
        
        // Redirect to login page
        redirect('/Home/');
    }

     public function get_logins()
  {
     //$data['loginURL'] = $this->google->loginURL();
     //$data['authURL'] =  $this->facebook->login_url();
     
     //return $data;  
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

        if ($result === 'true')          
        {



          $email = $email;
          $result = $this->Designmodelwriter->read_user_information($email);
          
          
         
        

            $user_fname =  $result[0]->user_fname;
            $email = $result[0]->user_email;
            $user_id =  $result[0]->user_id;
            $status =  $result[0]->user_writer_status;
            $stato =  $result[0]->user_status;


           


           





            //$balance = $this->Bulksmsmodel->fetch_balance($user_id);
                      //  $sms_price = $this->Bulksmsmodel->fetch_sms_price($user_id);

            $writerData = array(

            'user_fname' => $user_fname,
            'user_id' => $user_id, 
            'user_email' => $email,
            'user_writer_status' => $status,
            'user_status' => $stato,
            'user_login_type' => 1,          
                       
            );


         // $this->log_user_activity($writerData);


          $this->session->set_userData('writerData', $writerData);
         
           
           redirect('Writer/index/');
                         
       
      }
      elseif ($result === 'deactivated') {

          $data['error_message'] ='Sorry, your account has been deactivated. Kindly contact support';

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

         $data =  $this->get_logins();
         $data['error_message'] ='Invalid Username or Password';

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
                                
      //}
  }

    private function hash_password($password){
             return password_hash($password, PASSWORD_BCRYPT);
        }

     public function normal_logout() {
        // Remove local Facebook session
        //$this->session->destroy();
        // Remove user data from session
        $this->session->unset_userData('logedIn');

        $this->session->sess_destroy();
        // Redirect to login page
        redirect('home');
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
