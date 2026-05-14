<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class professionalwriting extends CI_Controller {



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



    }

    public function index()

    {

        date_default_timezone_set('Africa/Nairobi');

        $today = date('Y-m-d');

        $this->load->database();

        $this->load->model('Writing_model');

       

        

       

               $data['calc']=$this->Writing_model->calculation(); 

               $data['high']=$this->Writing_model->home_high(); 

              $data['typeofpaper']=$this->Writing_model->typeofpaper(); 

              $data['undergrad_lower']=$this->Writing_model->undergrad_lower(); 

              $data['undergrad_higher']=$this->Writing_model->undergrad_higher(); 

              $data['masters']=$this->Writing_model->masters(); 

              $data['doctoral']=$this->Writing_model->doctoral(); 

               //$data = array();

                $data['typeofpaper']=$this->Writing_model->typeofpaper(); 

              $data['hi']=$this->Writing_model->home_high_js(); 

             

              $data['undergrad_lo']=$this->Writing_model->undergrad_lower_js(); 

              $data['undergrad_hi']=$this->Writing_model->undergrad_higher_js(); 

              $data['mast']=$this->Writing_model->masters_js(); 

              $data['doct']=$this->Writing_model->doctoral_js(); 

              $data['previous']=$this->Writing_model->get_previous(); 

              $data['title']="Writers Corp | Order Term Paper,Thesis, Research Paper, Dissertation, essays and any other academic Paper";

               $data['description']="Welcome to Writers Corp the home of quality and diverse written papers. Our team of experienced writers and our support staff ensure that your orders are attended to without delays. Our writers are highly qualified and thus you are guaranteed high quality work very affordably.";

                $data['keywords']="Writing services, writers, corp, Custom Writing platform, writing platform, essay writing, essays, place order online, homework, research papers ervices, writing service, essay writing company, term paper service, research paper service, paper writing service, custom papers, custom essay writing service, order essay, custom written papers, custom paper writing, custom essay writing, custom written essays, custom writing help, custom written papers, writing service, professional writing service, online writing service";



               $this->load->view('index',$data);

    }


    public function sitemap()
{
    // first load the library
     $this->load->model('Writing_model');
      $this->load->model('Adminmodel');

    $sampl=$this->Writing_model->get_samples(); 

     $prev=$this->Adminmodel->get_previous(); 

    $this->load->library('sitemap');

    // create new instance
    $sitemap = new Sitemap();

    // add items to your sitemap (url, date, priority, freq)
    $sitemap->add('https://www.writers-corp.net/', '2020-04-08', '1.0', 'daily');
    $sitemap->add('https://writers-corp.net/professionalwriting/pricing', '2020-04-08', '1.0', 'daily');
    $sitemap->add('https://writers-corp.net/professionalwriting/order_now', '2020-04-08', '1.0', 'daily');
    $sitemap->add('https://writers-corp.net/professionalwriting/our_services', '2020-04-08', '1.0', 'daily');
    $sitemap->add('https://writers-corp.net/professionalwriting/samples', '2020-04-08', '1.0', 'daily');
    $sitemap->add('https://writers-corp.net/Admin/get_previous_work', '2020-04-08', '1.0', 'daily');
    $sitemap->add('https://content.writers-corp.net/', '2020-04-08', '1.0', 'weekly');
    $sitemap->add('https://writers-corp.net/professionalwriting/contactus', '2020-04-08', '1.0', 'daily');



    // add multiple items with a loop
    foreach ($sampl->result() as $post)
    {
       // echo $post->sample_title; die();
        $sitemap->add(base_url().'admin/get_sample/'.$post->sample_slug, $post->sample_added, '1.0', 'daily');
    }

    foreach ($prev->result() as $post)
    {
       // echo $post->sample_title; die();
        $sitemap->add(base_url().'admin/get_prev/'.$post->previous_slug, $post->date, '1.0', 'daily');
    }


    // show your sitemap (options: 'xml', 'google-news', 'sitemapindex' 'html', 'txt', 'ror-rss', 'ror-rdf')
    //print_r($sitemap); die();
    $sitemap->generate('xml');
}

// public function sample_configuration()

// {

//     $config = array(
//       'field' => 'sample_slug',
//       'title' => 'sample_title',
//       'table' => 'tbl_sample',
//       'id' => 'sample_id',
//     );
//     $this->load->library('slug', $config);

// }


public function edit_slug()

{
    $id=3;

    $this->load->model('Writing_model');

    $sampl=$this->Writing_model->edit_slug($id); 

}








     public function contactus()

    {

         $data['title']="Writers Corp | Contact us";

       $data['description']="We'd love to hear from you. Kindly leave us a message by filling the form below.";

        $data['keywords']="writers, corp, contact, us";



        $this->load->view('contact');

    }
    
    public function paypal_payments()

    {

        $data['title']="Writers Corp | Paypal Payments";

       $data['description']="You can now make direct payments to Paypal.";

        $data['keywords']="paypal, payments";



        $this->load->view('paypal',$data);

    }

     public function contact_us_process()

    {

       $name=$this->input->post('name');
       $email=$this->input->post('email');
       $subject=$this->input->post('subject');
       $message=$this->input->post('message');

                $config = array();

                $config['useragent']           = "CodeIgniter";

                $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"

                $config['protocol']            = "smtp";

                $config['smtp_host']           = "localhost";

                $config['smtp_port']           = "25";

                $config['mailtype'] = 'html';

                $config['charset']  = 'utf-8';

                $config['newline']  = "\r\n";

                $config['wordwrap'] = TRUE;



                $this->load->library('email');



                $this->email->initialize($config);



                $this->email->from('info@writers-corp.net');

                $this->email->to('henrykuto@gmail.com');

                //$this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

                $this->email->subject("WRITERS CORP CUSTOMER INQUIRY");

                

               

                //$msg = "Hey a new order has been received from {$name}, \n Email: {$cust_email}";


   
              $this->email->message("Customer inquiry details:<br>
                                    Name:$name <br>
                                    Email:$email <br>
                                    Subject:$subject <br>
                                    Message:$message"); 

            



            $this->email->send();

        $data['success']="Thank you for contacting Writers Corp, we will get bacj to you ASAP.";

        $this->load->view('contact',$data);

    }










     public function order_now()

    {

       $this->load->database();  

            

      $this->load->model('Writing_model');

      $data['typeofpaper']=$this->Writing_model->typeofpaper(); 

      $data['discipline']=$this->Writing_model->discipline(); 

      $data['format']=$this->Writing_model->format(); 

      $data['level']=$this->Writing_model->level(); 

      

      $data['hi']=$this->Writing_model->home_high_js(); 

 

      $data['undergrad_lo']=$this->Writing_model->undergrad_lower_js(); 

      $data['undergrad_hi']=$this->Writing_model->undergrad_higher_js(); 

      $data['mast']=$this->Writing_model->masters_js(); 

      $data['doct']=$this->Writing_model->doctoral_js(); 

    

        $data['high']=$this->Writing_model->home_high(); 

        $data['dropdown']=$this->Writing_model->dropdown(); 

        $data['undergrad_lower']=$this->Writing_model->undergrad_lower(); 

        $data['undergrad_higher']=$this->Writing_model->undergrad_higher(); 

        $data['masters']=$this->Writing_model->masters(); 

        $data['doctoral']=$this->Writing_model->doctoral(); 

    

    $data['title']="Writers Corp order now | Order for your paper in 3 easy steps";

   $data['description']="Order custom written papers, essays, term papers, research papers, thesis writing from Custom Writing Service. All papers are written from scratch by professional academic writers with no possibility of plagiarism.";

    $data['keywords']="order essay, order a paper, order term paper, order research paper, order thesis, order thesis paper, order writing, order academic paper, order custom essay, order custom term paper, order custom research paper, order essay now, order custom thesis, order custom writing, order custom written paper, custom writing, custom writing service, order dissertation, order report, order review, custom writings hub, order an essay, order papers, order paper now, order writing now, essays to order, term papers to order, research papers to order, thesis to order";

        $this->load->view('order_now', $data);



        

    }



    public function our_writers()

    {
      $data['title']="Writers Corp our writers | We have qualified writers";

   $data['description']="Helping people with writing is what we love, and we take pride in what we've achieved so far. But it wouldn't have been possible without our team of experienced writers. At Writers Corp we strive to deliver exceptional work to our clients.";

    $data['keywords']="writers, corp, our, writers, custom, written, papers,qualified";
       



        $this->load->view('our_writers',$data);

    }


     public function our_services()

    {
      $data['title']="Writers Corp our writers | We have qualified writers";

   $data['description']="Helping people with writing is what we love, and we take pride in what we've achieved so far. But it wouldn't have been possible without our team of experienced writers. At Writers Corp we strive to deliver exceptional work to our clients.";

    $data['keywords']="writers, corp, our, writers, custom, written, papers,qualified";
       



        $this->load->view('services',$data);

    }

     public function privacy()

    {
      $data['title']="Writers Corp privacy | Privacy Policy";

   $data['description']="Read our comprehensive privacy policy. At Writers Corp we are committed to protecting the privacy of all website users and clients.";

    $data['keywords']="writers, corp, our, writers, custom, written, papers, privacy";
       



        $this->load->view('privacy',$data);

    }


    public function req()
    {

       $this->load->database();

        $this->load->model('Writing_model');

       

        

       

        $data['samples']=$this->Writing_model->get_samples(); 
        // $data['typeofpaper']=$this->Writing_model->typeofpaper(); 

      $data['discipline']=$this->Writing_model->discipline(); 

      $data['format']=$this->Writing_model->format(); 

      $data['level']=$this->Writing_model->level(); 

       $data['deadline']=$this->Writing_model->deadline(); 


       return $data;



    }




      public function samples()

    {
       $data['title']="Writers Corp samples | our sample papers";

   $data['description']="View paper samples written by our writers, find out how your paper will look like, and make sure we provide our customers with quality writing from scratch according to all their instructions.";

    $data['keywords']="writers, corp, sample, custom, written, papers,qualified";


        $this->load->database();

        $this->load->model('Writing_model');

       

        

       

        $data['samples']=$this->Writing_model->get_samples(); 
        // $data['typeofpaper']=$this->Writing_model->typeofpaper(); 

      $data['discipline']=$this->Writing_model->discipline(); 

      $data['format']=$this->Writing_model->format(); 

      $data['level']=$this->Writing_model->level(); 

       $data['deadline']=$this->Writing_model->deadline(); 

     
      

     
       



        $this->load->view('samples',$data);

    }



     public function get_price()

     {

        $deadline=$this->input->post('deadline'); 
        $level=$this->input->post('level'); 

        $this->load->database();  

        $this->load->model('Writing_model');

         $price=$this->Writing_model->get_price($deadline,$level); 


         echo $price;



       

      // $this->load->view('help',$data);



     }

    

       



     public function help()

     {

       $data['title']="Betstadia| Help";

       $data['description']="At Betstadia we are ready to solve all of our customers' problems, hit us via email or calls";

       

       $this->load->view('help',$data);



     }





       public function process_orders()

  {

  

  

    if($this->input->post('submit') == "Check out with PayPal") { 

           $this->load->library('form_validation');



  

           $this->form_validation->set_rules('email', 'Email', 'is_unique[tbl_customer.cust_email]');

           

            if ($this->form_validation->run() == FALSE)

                    {



                       $data['messo']="Email already in use, login below";

                       $this->load->view('client_login',$data);

                    } 

                 

                    

                else 

                    {



                 $this->load->library('upload');

            

                 if(!$this->input->post('userfiles[]'))

                   {

                       $imagename='';

                   }

                    

                   $number_of_files = sizeof($_FILES['userfile']['tmp_name']);

                   $files = $_FILES['userfile'];

                   

                   // next we pass the upload path for the images

                    $config['upload_path'] = './files/';

                    $config['allowed_types'] = 'jpg|png|pdf|doc|xml|docx';

                    $config['max_size'] = '50000';

                    $config['max_width']  = '15000';

                    $config['max_height']  = '15000';

                    

                   

                    

                   for ($i = 0; $i < $number_of_files; $i++) 

                   {

                     $_FILES['userfile']['name'] = $files['name'][$i];

                     $_FILES['userfile']['type'] = $files['type'][$i];

                     $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];

                     $_FILES['userfile']['error'] = $files['error'][$i];

                     $_FILES['userfile']['size'] = $files['size'][$i];

                     //now we initialize the upload library

                     $this->upload->initialize($config);

                     

                     if (!$this->upload->do_upload('userfile'))

                     {

                        $error['upload_errors'][$i] = $this->upload->display_errors(); 

                        



                         //$this->load->view('submit_paid', $error);

                     }

                     

                     else

                     {

                         

                        $images = array('upload_data'=>$this->upload->data());

                        $imagename[]= $images['upload_data']['file_name'];

                        

                        

                       

                     

                     }

                  }

                      if($imagename!=NULL)

                    {

                      $namefiles= implode(',', $imagename);

                    }

                    else

                    {

                        $imagename='';

                        $namefiles=NULL;

                    }

                    

                     

                     

                    

                  $dara= array(

                        'cust_email' => $this->input->post('email'),

                        'cust_pass' => $this->input->post('password'),

                        'cust_name' => $this->input->post('name'),

                        'cust_country' => $this->input->post('country'),

                        'cust_phone' => $this->input->post('phone'),

                        );



                        

                        

                         $this->load->model('Writing_model');  



                         $tableid=$this->Writing_model->customer_details($dara);

                         

                         

                         

                      if($this->input->post('level')==1)

                       {

                           $amount=number_format(($this->input->post('amounthigh')*0.65),2,'.','');

                       }

                       else if($this->input->post('level')==2)

                       {

                             $amount =number_format(($this->input->post('amountunder')*0.65),2,'.','');

                       }

                       else if($this->input->post('level')==3)

                       {

                               $amount=number_format(($this->input->post('amountupper')*0.65),2,'.','');

                       

                       }

                       else if($this->input->post('level')==4)

                       {

                               $amount=number_format(($this->input->post('amountmasters')*0.65),2,'.','');

                       }

                      else if($this->input->post('level')==5)

                       {

                               $amount=number_format(($this->input->post('amountdoctoral')*0.65),2,'.','');

                       }

            

           

                         

                         $data= array(

                 

                       

                                           

                        'order_levelid' => $this->input->post('level'),

                        'order_essaytypeid' => $this->input->post('typeofpaper'),

                        'order_disciplineid' => $this->input->post('discipline'),

                        'order_topic' => $this->input->post('topic'),

                        'order_instructions' => $this->input->post('instructions'),

                        'order_files' => $namefiles,

                        'order_sources' => $this->input->post('sources'),

                        'order_formatid' => $this->input->post('format'),

                        'order_custid' => $tableid,

                        'order_deadlineid' => 1,

                        'order_price' => $amount,

                        'order_paymentstatus'=>"Pending",

                        'order_statusid'=>4,

                        'order_pages'=>$this->input->post('orderpages'),

                        



                        );

                        

                        

                        $this->load->model('Writing_model');  

                        $orderid=$this->Writing_model->process_orders($data);

                         $cust_email = $this->input->post('email');

                          $this->load->model('Writing_model');

                        $g=$this->Writing_model->client_name($cust_email,$orderid);

                          foreach ($g->result() as $row)  

			             {  

 

                                    

                                      $mail= $row->cust_email;

                                       $name= $row->cust_name; 

                                        $format= $row->format_name; 

                                        $posted=$row->posted_date; 

                                        $title=$row->order_topic; 

                                        $noofpages=$row->order_pages;

                                        $instructions=$row->order_instructions; 

                                     

                                        $payment=$row->order_paymentstatus; 
                             }

                        

                        

                       

                        $name= $this->input->post('name');

                       

                       $order_topic = $this->input->post('topic');        

                         

                        // $data['notification']="Congratulations your order has been received successfully";

                         //$//this->load->view('order_now', $data);

                   $this->load->library('paypal_lib');      

                         

        // $paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //test PayPal api url

       // $paypalID = 'payments@writers-corp.net'; //business email

        $returnURL = base_url().'paypal/success'; //payment success url

        $cancelURL = base_url().'paypal/cancel'; //payment cancel url

        $notifyURL = base_url().'paypal/success'; //ipn url

        //get particular product data

       // $product = $//this->product->getRows($id);

        $userID = 1; //current user id

        $logo = base_url().'assets/images/codexworld-logo.png';

        

       // $this->paypal_lib->add_field('business', $paypalID);

        $this->paypal_lib->add_field('return', $returnURL);

        $this->paypal_lib->add_field('cancel_return', $cancelURL);

        $this->paypal_lib->add_field('notify_url', $notifyURL);

        $this->paypal_lib->add_field('item_name', 'YO Sthg');

        //$this->paypal_lib->add_field('custom',  $orderid);

        $this->paypal_lib->add_field('item_number',  $orderid);

        $this->paypal_lib->add_field('amount',   $amount);        

        $this->paypal_lib->image($logo);

        

        $this->paypal_lib->paypal_auto_form();

        

               //email to admin

               $config = array();

                $config['useragent']           = "CodeIgniter";

                $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"

                $config['protocol']            = "smtp";

                $config['smtp_host']           = "localhost";

                $config['smtp_port']           = "25";

                $config['mailtype'] = 'html';

                $config['charset']  = 'utf-8';

                $config['newline']  = "\r\n";

                $config['wordwrap'] = TRUE;



                $this->load->library('email');



                $this->email->initialize($config);



                $this->email->from('info@writers-corp.net');

                $this->email->to('henrykuto@gmail.com');

                //$this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

                $this->email->subject("WRITERS CORP ORDER: {$orderid}");

                

              //  $msg = $this->load->view('emailformat',$dasa,TRUE);

                //$msg = "Hey a new order has been received from {$name}, \n Email: {$cust_email}";



            $this->email->message("Dear admin,<br> An order has been made with the following details:<br>
            	                   Client Name:$name <br>
            	                    Client Email:$mail <br>
            	                    Paper Title:$title <br>
            	                    Paper Format:$format <br>
            	                    No. of pages:$noofpages <br>
            	                    Instructions:$instructions <br>
            	                    Date Posted:$posted <br>
            	                    Payment Status:$payment <br>

            	                    Thank you. Dispatcher.
            	                 "); 

            

            //echo $//this->email->print_debugger();

            //$//this->email->message($//this->load->view('email/'.$type.'-html', $data, TRUE));



            $this->email->send();



                        

                        

                        

                         

                         

                         

                        //email to customer  

                        $cust_email = $this->input->post('email');

                        $name= $this->input->post('name');

                        

                        $config = array();

                $config['useragent']           = "CodeIgniter";

                $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"

                $config['protocol']            = "smtp";

                $config['smtp_host']           = "localhost";

                $config['smtp_port']           = "25";

                $config['mailtype'] = 'html';

                $config['charset']  = 'utf-8';

                $config['newline']  = "\r\n";

                $config['wordwrap'] = TRUE;



                $this->load->library('email');



                $this->email->initialize($config);



                $this->email->from('info@writers-corp.net');

                $this->email->to($cust_email);

                //$this->email->cc('xxx@gmail.com'); 

                //$this->email->bcc($this->input->post('email')); 

                $this->email->subject("ORDER: {$orderid}");



               // $msg = $this->load->view('clientformat',$dasa,TRUE);

                //$msg = "Hey a new order has been received from {$name}, \n Email: {$cust_email}";



            $this->email->message(" Dear $name,<br> Thank you for placing an order with Writers Corp. Your order is being processed, details is as follows:<br>
            	                    Name:$name <br>
            	                    Email:$mail <br>
            	                    Paper Title:$title <br>
            	                    Paper Format:$format <br>
            	                    No. of pages:$noofpages <br>
            	                    Instructions:$instructions <br>
            	                    Date Posted:$posted <br>
            	                    Payment Status:$payment <br>
            	                    We will inform you the progress of your order.<br>
            	                    In case of any queries send us an email at support@writers-corp.net or use the live chat on our website.

            	                    Thank you. <br>
            	                    Writers Corp Team. <br>

            	                    ");   

            

            //echo $//this->email->print_debugger();

            //$//this->email->message($//this->load->view('email/'.$type.'-html', $data, TRUE));



            $this->email->send();

                         

        

           } 

          }

       else {   

        //card payment starts here

        // include_once('../top.php');

  // require_once('OAuth.php');

  //       require_once('checkStatus.php');

  // //require_once('../db/dbconnector.php');

  // $this->load->library('form_validation');



  

                         

              



  

  //          $this->form_validation->set_rules('email', 'Email', 'is_unique[tbl_customer.cust_email]');

           

  //           if ($this->form_validation->run() == FALSE)

  //                   {



  //                      $data['messo']="Email already in use, login below";

  //                      $this->load->view('Client/login',$data);

  //                   } 

                 

                    

  //               else 

  //                   {



  //           $this->load->library('upload');

            

  //                if(!$this->input->post('userfiles[]'))

  //                  {

  //                      $imagename='';

  //                  }

                    

  //                  $number_of_files = sizeof($_FILES['userfile']['tmp_name']);

  //                  $files = $_FILES['userfile'];

                   

  //                  // next we pass the upload path for the images

  //                  $config['upload_path'] = './files/';

  //                   $config['allowed_types'] = 'jpg|png|pdf|doc|xml|docx';

  //                   $config['max_size'] = '5000';

  //                   $config['max_width']  = '1500';

  //                   $config['max_height']  = '1500';

                    

                   

                    

  //                  for ($i = 0; $i < $number_of_files; $i++) 

  //                  {

  //                    $_FILES['userfile']['name'] = $files['name'][$i];

  //                    $_FILES['userfile']['type'] = $files['type'][$i];

  //                    $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];

  //                    $_FILES['userfile']['error'] = $files['error'][$i];

  //                    $_FILES['userfile']['size'] = $files['size'][$i];

  //                    //now we initialize the upload library

  //                    $this->upload->initialize($config);

                     

  //                    if (!$this->upload->do_upload('userfile'))

  //                    {

  //                       $error['upload_errors'][$i] = $this->upload->display_errors(); 

                        



  //                        //$this->load->view('submit_paid', $error);

  //                    }

                     

  //                    else

  //                    {

                         

  //                       $images = array('upload_data'=>$this->upload->data());

  //                       $imagename[]= $images['upload_data']['file_name'];

                        

                        

                       

                     

  //                    }

  //                 }

  //                     if($imagename!=NULL)

  //                   {

  //                     $namefiles= implode(',', $imagename);

  //                   }

  //                   else

  //                   {

  //                       $imagename='';

  //                       $namefiles=NULL;

  //                   }

                    

                     

                     

                    

  //                 $dara= array(

                 

                       

                                           

  //                         'cust_email' => $this->input->post('email'),

                           

  //                       'cust_pass' => $this->input->post('password'),

  //                       'cust_name' => $this->input->post('name'),

  //                        'cust_country' => $this->input->post('country'),

  //                        'cust_phone' => $this->input->post('phone'),

                         

                        



  //                       );

                        

                        

                        

  //                        $this->load->model('Writingmodel');  



  //                        $tableid=$this->Writingmodel->customer_details($dara);

                         

                         

                         

  //                        if($this->input->post('level')==1)

  //                    {

  //                        $amount=$this->input->post('amounthigh');

  //                    }

  //                    else if($this->input->post('level')==2)

  //                    {

  //                          $amount =$this->input->post('amountunder');

  //                    }

  //                    else if($this->input->post('level')==3)

  //                    {

  //                            $amount=$this->input->post('amountupper');

                     

  //                    }

  //                    else if($this->input->post('level')==4)

  //                    {

  //                            $amount=$this->input->post('amountmasters');

  //                    }

  //                   else if($this->input->post('level')==5)

  //                    {

  //                            $amount=$this->input->post('amountdoctoral');

  //                    }

            

           

                         

  //                        $data= array(

                 

                       

                                           

  //                         'order_levelid' => $this->input->post('level'),

  //                       'order_essaytypeid' => $this->input->post('typeofpaper'),

  //                       'order_disciplineid' => $this->input->post('discipline'),

  //                        'order_topic' => $this->input->post('topic'),

  //                        'order_instructions' => $this->input->post('instructions'),

  //                        'order_files' => $namefiles,

  //                        'order_sources' => $this->input->post('sources'),

  //                          'order_formatid' => $this->input->post('format'),

  //                           'order_custid' => $tableid,

  //                           'order_deadlineid' => 1,

  //                            'order_price' => $amount,

  //                            'order_paymentstatus'=>"Pending",

  //                              'order_statusid'=>4,

  //                               'order_pages'=>$this->input->post('orderpages'),

                        



  //                       );

                        

                        

  //                       $this->load->model('Writingmodel');  

  //                       $orderid=$this->Writingmodel->process_orders($data);

  //                         $cust_email = $this->input->post('email');

                        

  //                       $this->load->model('Writingmodel');  

                        

  //                         $dasa['g']=$this->Writingmodel->client_name($cust_email,$orderid);

                        

                        

                         

                         

                         

                         

                          

            

            

           

                        

                        

  

  //   //$api = 'https://www.pesapal.com';

  

  // $token = $params  = NULL;

  // $iframelink     = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';

  

  // //Kenyan keys

  // $consumer_key     = "LBS6DCgQK8AQ1ClN4/qLRF2/P6YI/65o"; 

  // $consumer_secret  = "VY/urpjSz/yPiX3q/OqKcet6MYk=";

   

  // $signature_method = new OAuthSignatureMethod_HMAC_SHA1();

  // $consumer       = new OAuthConsumer($consumer_key, $consumer_secret);

  

  

  

  // //get form details

  

  //   $ref        =  str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5);

  //   $_POST['reference'] =  substr(str_shuffle($ref),0,10);

  

  

  // //$amount     = str_replace(',','',$_POST['amount']); // remove thousands seperator if included

  // $amount     = number_format($amount, 2); //format amount to 2 decimal places

  // $desc       = $this->input->post('description');

  // $type       = 'MERCHANT'; 

  // $first_name   = $this->input->post('name');

  // //$last_name    = $_POST['last_name'];

  // $email      =$this->input->post('email');

  // $phonenumber  = $this->input->post('phone');

  // $currency     = $this->input->post('currency');

  // $reference    = $orderid;//unique transaction id, generated by merchant.

  // $callback_url   = 'customwritingshub.com/writing/pesapalipn'; //URL user to be redirected to after payment

  

  // //Record order in your database.

  // //$database = new pesapalDatabase();

  // //$database->store($_POST); 

    

  // $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>

  //          <PesapalDirectOrderInfo 

  //           xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" 

  //             xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" 

  //             Currency=\"".$currency."\" 

  //             Amount=\"".$amount."\" 

  //             Description=\"".$desc."\" 

  //             Type=\"".$type."\" 

  //             Reference=\"".$reference."\" 

  //             FirstName=\"".$first_name."\" 

              

  //             Email=\"".$email."\" 

  //             PhoneNumber=\"".$phonenumber."\" 

  //             xmlns=\"http://www.pesapal.com\" />";

  // $post_xml = htmlentities($post_xml);

  

  // //post transaction to pesapal

  // $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);

  // $iframe_src->set_parameter("oauth_callback", $callback_url);

  // $iframe_src->set_parameter("pesapal_request_data", $post_xml);

  // $iframe_src->sign_request($signature_method, $consumer, $token);  ?>

  

  // <iframe src="<?php echo $iframe_src;?>" width="100%" height="700px"  scrolling="no" frameBorder="0">

  //         <p>Browser unable to load iFrame</p>

  //       </iframe>

        

  //      <?php 

       

       

       

  //      $cust_email = $this->input->post('email');

  //                       $name= $this->input->post('name');

                        

  //                       $config = array();

  //               $config['useragent']           = "CodeIgniter";

  //               $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"

  //               $config['protocol']            = "smtp";

  //               $config['smtp_host']           = "localhost";

  //               $config['smtp_port']           = "25";

  //               $config['mailtype'] = 'html';

  //               $config['charset']  = 'utf-8';

  //               $config['newline']  = "\r\n";

  //               $config['wordwrap'] = TRUE;



  //               $this->load->library('email');



  //               $this->email->initialize($config);



  //               $this->email->from('info@customwritingshub.com');

  //               $this->email->to('customwritingshub@gmail.com');

  //               //$this->email->cc('xxx@gmail.com'); 

  //               //$this->email->bcc($this->input->post('email')); 

  //              $this->email->subject("ORDER: {$orderid}");

  //              $mseg= $this->load->view('emailformat',$dasa,TRUE);



  //           $this->email->message($mseg);   

            

  //           //echo $//this->email->print_debugger();

  //           //$//this->email->message($//this->load->view('email/'.$type.'-html', $data, TRUE));



  //           $this->email->send();



                        

                        

                        

                         

                         

                         

                          

  //                       $cust_email = $this->input->post('email');

  //                       $name= $this->input->post('name');

                        

  //                       $config = array();

  //               $config['useragent']           = "CodeIgniter";

  //               $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"

  //               $config['protocol']            = "smtp";

  //               $config['smtp_host']           = "localhost";

  //               $config['smtp_port']           = "25";

  //               $config['mailtype'] = 'html';

  //               $config['charset']  = 'utf-8';

  //               $config['newline']  = "\r\n";

  //               $config['wordwrap'] = TRUE;



  //               $this->load->library('email');



  //               $this->email->initialize($config);



  //               $this->email->from('info@customwritingshub.com');

  //               $this->email->to($cust_email);

  //               //$this->email->cc('xxx@gmail.com'); 

  //               //$this->email->bcc($this->input->post('email')); 

  //              $this->email->subject("ORDER: {$orderid}");

  //               $msg= $this->load->view('clientformat',$dasa,TRUE);



  //           $this->email->message($msg);   

            

  //           //echo $//this->email->print_debugger();

  //           //$//this->email->message($//this->load->view('email/'.$type.'-html', $data, TRUE));



  //           $this->email->send();

           }

        

     }  



     public function logout_user() {

                // Removing session data

                $sess_array = array(

                'phoneno' => ''

                );

                 date_default_timezone_set('Africa/Nairobi');

                  $now = date('Y-m-d');

                $this->load->library('session');

                $this->session->unset_userdata('loggged_in_user', $sess_array);



                // $this->load->database();            

                // $this->load->model('Writing_model');



                 $data['message_display'] = 'You have successfully logged out';

                // $today = date('Y-m-d');

                //     $next_7_days = date('Y-m-d', strtotime($today.' +7 day'));

                //     $last_2_days = date('Y-m-d', strtotime($today.' -1 day'));

                //     $data['data_paid_today'] = $this->Writing_model->today_paid_predictions($now);  

                //     $data['this_week_jp'] =  $this->Writing_model->thisweek_jp($last_2_days,$next_7_days);

                //     $data['cost_of_jackpot'] =  $this->Writing_model->cost_of_jackpot();

                //     $data['cost_of_odds'] =  $this->Writing_model->cost_of_odds();

                //     $data['till_number'] =  $this->Writing_model->till_number();  

                // //get free predictions today

                // $data['data_paid_today'] = $this->Writing_model->today_paid_predictions($now);

                $this->load->view('login', $data);



                //get premiumpredictions today

        }



        public function user_login_process()

            {



                $this->load->library('form_validation');

                $this->form_validation->set_rules('admin_password', 'Password', 'trim|required');



        if ($this->form_validation->run() == FALSE) 

            {            

            if(isset($this->session->userdata['loggged_in']))

                {            

                    $this->admin();

            

                }

            else

            {            

                    $this->index();            

            }

        } 

        else 

        {

                $data = array(

                'admin_username' => $this->input->post('admin_username'),

                'admin_password' => $this->input->post('admin_password')

            );



            $this->load->database();            

            $this->load->model('Writing_model');

            $result = $this->Writing_model->login($data);



        if ($result == TRUE) 

            

        {

            $admin_username = $this->input->post('admin_username');

            $result = $this->Writing_model->read_user_information($admin_username);

            if ($result != false) 

            {

                $session_data = array(

                'admin_username' => $result[0]->username

                );

            // Add user data in session

            $this->load->library('session');

            $this->session->set_userdata('loggged_in', $session_data);

                                     

            $this->adminportal();

            }

        } 

        else 

        {

            

        $data['error_message'] ='Invalid Username or Password';

        $today = date('Y-m-d');

        $now = date('Y-m-d');

                    $next_7_days = date('Y-m-d', strtotime($today.' +7 day'));

                    $last_2_days = date('Y-m-d', strtotime($today.' -1 day'));

                    $data['data_paid_today'] = $this->Writing_model->today_paid_predictions($now);  

                    $data['this_week_jp'] =  $this->Writing_model->thisweek_jp($last_2_days,$next_7_days);

                    $data['cost_of_jackpot'] =  $this->Writing_model->cost_of_jackpot();

                    $data['cost_of_odds'] =  $this->Writing_model->cost_of_odds();

                    $data['till_number'] =  $this->Writing_model->till_number();  

        $this->load->view('index', $data);

            }

        }

        }



     public function adminportal(){

        $this->load->database();

        $this->load->model('Writing_model');

        //till number payments

        $data['till_today_earnings'] =  $this->Writing_model->earnings_today_till();

        $data['till_yesterday_earnings'] = $this->Writing_model->earnings_yesterday_till();

        $data['till_thisweek_earnings'] = $this->Writing_model->earnings_thisweek_till();

        $data['till_lastweek_earnings'] = $this->Writing_model->earnings_lastweek_till();

        $data['till_thismonth_earnings'] = $this->Writing_model->earnings_thismonth_till();

        $data['till_lastmonth_earnings'] = $this->Writing_model->earnings_lastmonth_till();

        $data['till_all_earnings'] = $this->Writing_model->earnings_all_till();

      

        $data['cost_of_jackpot'] =  $this->Writing_model->cost_of_jackpot();

        $data['cost_of_odds'] =  $this->Writing_model->cost_of_odds();



         $data['till_number'] =  $this->Writing_model->till_number();



        $this->load->view('adminportal', $data);

    }

     public function subscribers(){

        $this->load->database();

        $this->load->model('Writing_model');

        $data['mysubscribers'] = $this->Writing_model->fetch_subscribers();

        $this->load->view('subscribers', $data);

    }

      //controller to handle Till number transactions

        public function till_transactions(){



        $this->load->database();

        $this->load->model('Writing_model'); 

       

         $config["base_url"] = base_url() . "index.php/superodds/till_transactions"; //current url

            $config["total_rows"] = $this->Writing_model->till_count(); //get all records

            $config["per_page"] = 30; //records per page

            $config["uri_segment"] = 4;

            //styling the links

                $config['full_tag_open'] = "<ul class='pagination'>";

            $config['full_tag_close'] = '</ul>';

            $config['num_tag_open'] = '<li>';

            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><a href="#">';

            $config['cur_tag_close'] = '</a></li>';

            $config['prev_tag_open'] = '<li>';

            $config['prev_tag_close'] = '</li>';

            $config['first_tag_open'] = '<li>';

            $config['first_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li>';

            $config['last_tag_close'] = '</li>';

        

        

        

            $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

            $config['prev_tag_open'] = '<li>';

            $config['prev_tag_close'] = '</li>';

        

        

            $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

            $config['next_tag_open'] = '<li>';

            $config['next_tag_close'] = '</li>';

        



                $this->pagination->initialize($config); //initialize settings

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;





        

        $data['till_transactions'] = $this->Writing_model->fetch_till_transactions();

        $data["links"] = $this->pagination->create_links();



        $this->load->view('till_transactions', $data);

    }



     

 

 

    

    public function pricing(){

        $this->load->database();

        $this->load->model('Writing_model');



             $data['high']=$this->Writing_model->home_high(); 

              $data['typeofpaper']=$this->Writing_model->typeofpaper(); 

              $data['undergrad_lower']=$this->Writing_model->undergrad_lower(); 

              $data['undergrad_higher']=$this->Writing_model->undergrad_higher(); 

              $data['masters']=$this->Writing_model->masters(); 

              $data['doctoral']=$this->Writing_model->doctoral(); 

               //$data = array();

              $data['oneday']=$this->Writing_model->home_high_table(); 

              $data['typeofpaper']=$this->Writing_model->typeofpaper(); 

              $data['eight']=$this->Writing_model->undergrad_lower_table(); 

              $data['twodays']=$this->Writing_model->undergrad_higher_table(); 

              $data['threedays']=$this->Writing_model->masters_table(); 

              $data['fivedays']=$this->Writing_model->doctoral_table(); 

              $data['sevendays']=$this->Writing_model->sevendays(); 

              $data['fourteendays']=$this->Writing_model->fourteendays(); 

              $data['onemonth']=$this->Writing_model->onemonth(); 

              $data['title']="Writers Corp Pricing | Our affordable pricing table";

               $data['description']="At Writers Corp we offer pocket friendly rates for all your writing needs. We deliver quality yet affordable papers. You also enjoy 10% off your first order.";

                $data['keywords']="pricing, writers, corp, writing, rates";

             



        

      

        $this->load->view('pricing',$data);



    }

    public function premium(){    

        $this->load->view('premium');

    }

       



    public function login(){



        $data['title']="Betstadia|Login";

        $data['description']="Login to Betstadia to access our latest winning tips ";

        $this->load->view('login');

    }

    public function new_customer(){

          $this->load->view('new_customer');

    }

    public function reset_password(){

        $data['title']="Betstadia| Reset Password";

        $data['description']="Reset your password ";     

        $this->load->view('reset_password',$data);

  }

}

?>