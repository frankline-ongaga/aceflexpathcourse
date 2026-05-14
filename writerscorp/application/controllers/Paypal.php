<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('Paypal_lib');

        $this->load->library('ZohoOAuth');

        $this->load->database();
        $this->load->model('Writing_model');

     }

      public function callback() {

                $this->load->library('session');
                $this->load->database();     
                $this->load->model('Designmodel'); 
                $this->load->model('Adminmodel'); 

               $data=$this->session->userdata('userData');

               $fname=$data['user_fname'];
               $email=$data['user_email'];

                $txn_id = $this->input->get('txn_id');
                $invoice_id = $this->input->get('invoice_id');
                // $token = $this->input->get('token');
                $order_id = $this->input->get('order_id');
                $amount = $this->input->get('amount');
                $status = $this->input->get('status');
               
            if(!empty($txn_id) && !empty($invoice_id) && !empty($status) && !empty($order_id) && !empty($amount)){

                 //check if tip or not
                  $response=$this->Designmodel->ifcomplete($order_id);
                  $back=$this->Designmodel->checkAffiliate($order_id);
                  $back=$back[0];
                  $user_fname=$back['user_fname'];
                  $user_email=$back['user_email'];
                  $user_id=$back['user_id'];
                  $order_coupon=$back['order_coupon'];

                  //print_r($user_email); die();

                 if($response=='yes'){
                   //tip here


                   $update_tip=array(
                                     'transaction_code' => $txn_id,
                                     'transaction_status' => $status,
                                    );

                   $this->Designmodel->update_tip($order_id,$update_tip);
                   
                   $subject="Thank you for your $ $amount tip";
                   $message="Dear $user_fname, <br> Thank you for the tip, it will go a long way in motivating top writers. <br>
                            AceFlexPathCourse Team";

                   $this->send_mail($user_email,$subject,$message);

                   $data['notification_title']="Thank You";
                   $data['notification_content']="We have successfully received your tip";

                   $this->load->view('buyer/header', $data);
                   $this->load->view('buyer/general_notification', $data);
                   $this->load->view('buyer/footer', $data);





                 }
                 else
                 {
                  //normal order

               
                $transarray = array(
                    'transaction_payment_type' => 1,
                    'transaction_order_id' => $order_id,
                    'transaction_status' => $status,
                    'transaction_code' => $txn_id,
                    'transaction_amount' => $amount,
                   
                    );

                $uparray = array(
                    'order_status' =>1,
                    );




                $this->Designmodel->insert_trans($transarray);
                $this->Designmodel->updateTransaction($order_id,$uparray);

                //check if there is a personal coupon

               
               

                 //technical orders manenos

                  if($back['order_type']==2){

                       $uparray = array(
                            'order_technical_status' =>2,
                         );
                        $this->Designmodel->updateTransaction($order_id,$uparray);


                   }
                    if($back['order_type']==3){

                       $uparray = array(
                            'order_technical_status' =>2,
                            'order_status' =>3,
                         );
                        $this->Designmodel->updateTransaction($order_id,$uparray);


                        $subject="REF#$txn_id Invoice Payment Successful";
                        $message="Hi $fname,<br>
                                  We have successfully received funds for invoice id #$order_id. Details as follows: <br>
                                  Amount:$amount <br>
                                  Transaction Code:$txn_id <br>
                                  Transaction Status:$status <br> <br>
                                Regards,<br>
                                AceFlexPathCourse.
                                ";

                        $this->send_mail($email,$subject,$message);


                   }


               



                if($back['affiliate_id']>0){

                  //get affiliate commission
                  //check double dealing
                      if($back['affiliate_id']!=$user_id){

                          $comm=$this->Designmodel->getAffiliateCommission();

                       

                          $mat=$this->Designmodel->get_refferer_details($back['affiliate_id']);
                          $mat=$mat[0];
                          $referrer_fname=$mat['user_fname'];
                          $referrer_email=$mat['user_email'];
                          $referrer_user_id=$mat['user_id'];
                          $coupon=$this->gen_random();

                          //generate coupon
                          $coupony=array(
                                         'coupon_code'=>$coupon,
                                         'coupon_discount'=>$comm,
                                         'coupon_type'=>2,
                                         'user_id'=>$referrer_user_id,
                                         'generated_by'=>1,

                                        );
                          //insert coupon
                          $this->Designmodel->insertCoupon($coupony);



                         $subject="Referral Discount";
                         $message="Hi $referrer_fname,<br><br>
                                You have been awarded a coupon:$coupon via our referral program. Get $comm % off your next order when you use the coupon aforementioned.<br><br>
                                
                              Regards,<br>
                              AceFlexPathCourse Team </br>.
                              ";

                          $this->send_mail($referrer_email,$subject,$message);
                        }

                  }




                  //update account balance


                  //notify refferer



                   

                    //change coupon status if used
                    if(!empty($order_coupon)){

                         //if coupon personal change status
                         $sema=$this->Designmodel->checkCouponType($order_coupon);

                         //if personal or promotional change status
                         if($sema=='yes'){
                           //deactivate coupon
                            $deactivate_coupon=array(

                                                      'coupon_status'=>1,

                                                    );

                            $this->Designmodel->updateCoupon($order_coupon,$deactivate_coupon);


                          

                         }





                    }





                    $subject="REF#$txn_id Paypal Payment Successful";
                    $message="Hi $fname,<br>
                              We have successfully received funds for order id #$order_id. Details as follows: <br>
                              Amount:$amount <br>
                              Transaction Code:$txn_id <br>
                              Transaction Status:$status <br> <br>
                            Regards,<br>
                            AceFlexPathCourse.
                            ";

                    $this->send_mail($email,$subject,$message);

                    

                    $this->session->set_flashdata('order_id',$order_id); 
                    $this->session->set_flashdata('amount',$amount);
                    $this->session->set_flashdata('txn_id',$txn_id);
                    $this->session->set_flashdata('status',$status);

                    



                    
                    $this->session->set_flashdata('success_msg',"Payment received Successfully"); 
                    redirect("client/success", "refresh");
                   } 
                }

           else {
            $this->session->set_flashdata('error_msg',"Payment Failed. Kindly Retry"); 
            redirect("client/success", "refresh");
        }
           
               
    } 

     public function generate_receipt($amount,$order_id,$fname,$email)
   {

           $subject="Receipt#$order_id generated";
           $message="Dear $fname, <br> Thank you for making payment for order ID:#$order_id. <br> Receipt ID:$order_id has been generated. <br>
                     Kind regards,<br>
                     AceFlexPathCourse Support.";



           $this->send_mail($email,$subject,$message);







   }

     
     function success(){
        //get the transaction data
        $paypalInfo = $this->input->get();
          
        $data['item_number'] = $paypalInfo['item_number']; 
        $data['txn_id'] = $paypalInfo["tx"];
       
        
        $data['payment_amt'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status'] = $paypalInfo["st"];

        $this->load->database();
        
        $this->load->model('Writing_model');  
        
        $this->Writing_model->updateTransaction($data);
        
        //TOGGLE VIEW
         $this->load->library('session');
             if($this->session->userdata('logged_in')){
                 $client_email = ($this->session->userdata['logged_in']['client_email']);
                 $cust_name = ($this->session->userdata['logged_in']['client_name']);

                  $data['cust_name']= $cust_name; 
                  $this->load->view('Client/success', $data);
               }
        else
        {
            $this->load->view('success', $data);

        }
     }

     public function gen_random(){


          $key = random_int(0, 999999);
          $key = str_pad($key, 6, 0, STR_PAD_LEFT);
          return $key;
     }
     
     function cancel(){
        $this->load->library('session');
             if($this->session->userdata('logged_in')){
                 $client_email = ($this->session->userdata['logged_in']['client_email']);
                 $cust_name = ($this->session->userdata['logged_in']['client_name']);

                  $data['cust_name']= $cust_name; 
                  $this->load->view('Client/cancel', $data);
               }
        else
        {
        $this->load->view('cancel');

        }
     }
     
     function ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();

        $custom = $paypalInfo['custom'];
       // echo  $custom;
        //$itemnumber    = $paypalInfo["item_number"];
        $transactionid = $paypalInfo["txn_id"];
        $gross = $paypalInfo["payment_gross"];
        //$data['currency_code'] = $paypalInfo["mc_currency"];
        $email= $paypalInfo["payer_email"];
        $status   = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
        
        //check whether the payment is verified
        //if(eregi("VERIFIED",$result)){
            //insert the transaction data into the database
          $this->Writing_model->updateTransaction($custom,$transactionid, $gross,$email,$status);
       // }
    }

     public function send_mail($to,$subject,$message)
   {

    
             $response = $this->zohooauth->send_mail($to, $subject, $message);


    }



}