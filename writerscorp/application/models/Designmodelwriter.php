<?php  
       class designmodelwriter extends CI_Model  
       {  
          function __construct()  
          {  
             // Call the Model constructor  
             parent::__construct();  
             
          }  

          public function insert_writer($data) {

            $this->db->insert('tbl_user', $data);

            $insertId = $this->db->insert_id();


             return  $insertId;

          }

           public function insert_trans($data) {

            $this->db->insert('tbl_transactions', $data);

          

          }

           public function insert_initial_bal($data) {

            $this->db->insert('account_balance', $data);

          

          }

           public function req_funds($data) {

            $this->db->insert('tbl_payment_request', $data);

          

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

              public function get_cancelled($id)
            {


                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

                $this->db->where('(order_status = 7 or order_status=8)'); 
                //$this->db->where_in('order_status',5); 
               
                $this->db->where('order_writer_id',$id); 


                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
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

           public function update_password($email,$dasa)

            {

                $this->db->where('user_authority', 2);

                $this->db->where('user_email', $email);

                $this->db->update('tbl_user',$dasa); 

            }

           public function check_mail_exists($email) {

                $this->db->from('tbl_user');
                $this->db->where('user_email',$email);
                $this->db->where('user_authority',2);
             
                $query=$this->db->get();

                if ($query->num_rows()>0) {

                  return 'true';
                  
                }
                else
                {
                   return 'false';

                }


          }

             public function user_exist_status_w($email)
            {
                $condition = "user_email =" . "'" . $email . "'";
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where($condition);
                $this->db->where('user_authority=2');
                //$this->db->limit(1);
                $query = $this->db->get();

                  if($query->num_rows()>0)
                   {
                      
                      return 'true';

                   }
                    
                
            }

        





     


            public function user_deactivated($email) {
            //$condition = "username =" . "'" . $datum['username'] . "' AND " . "password =" . "'" . $datum['password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('user_email=',$email);
            // $this->db->where('username=',$data['username']);
             $this->db->where('user_authority=',2);
            
            
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
                
                $this->db->where('user_authority=',2);
                //$this->db->limit(1);
                $query = $this->db->get();

                if($query->num_rows()>0)
                   {
                      
                      return 'true';

                   }
                    
                
            }

              public function update_pass_advertiser($id,$dasa)

            {

                $this->db->where('user_id', $id);

                $this->db->update('tbl_user',$dasa); 

            }


             public function update_rev($id,$dasa)

            {

                $this->db->where('order_id', $id);

                $this->db->update('tbl_order',$dasa); 

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


           public function insert_order($data) {

            $this->db->insert('tbl_order', $data);

            $insertId = $this->db->insert_id();


             return  $insertId;

          }

            public function get_admins()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority',3); 
               

                $query = $this->db->get();
                
                return $query;
                     
                
            }

          
          public function get_logos() {
         
       
            $this->db->select('*');
          
            $this->db->from('evenlabs_logos');
            $data =$this->db->get();
             
               
             return $data;
         }

          public function get_names($contentid,$industryid)
            {
                $this->db->select('content_name,industry_name');
                $this->db->from('tbl_order,tbl_industry, tbl_content_type');
                $this->db->where('tbl_order.industry_id=tbl_industry.industry_id');
                $this->db->where('tbl_order.content_type_id=tbl_content_type.id');
                $this->db->where('tbl_order.industry_id',$industryid); 
                $this->db->where('tbl_order.content_type_id',$contentid); 

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

             public function get_writer_details($order_id)
            {
                $this->db->select('writer_id');
                $this->db->from('tbl_order');
                $this->db->where('order_id',$order_id);
                $user_id=$this->db->get()->row()->writer_id;




                $this->db->select('user_fname,user_email,user_id');
                $this->db->from('tbl_user');
                $this->db->where('user_id',$user_id); 

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

            public function get_five_orders($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->where('order_writer_id',$id); 
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


             public function get_allw($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->where('order_writer_id',$id); 
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
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',3); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

               public function get_completedw($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',3); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function max_reached($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
             
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',5); 
              

                $query = $this->db->get();
                
                $orders= $query->num_rows();
                if($orders<3)
                {
                  return 'true';
                }
                else
                {
                  return 'false';
                }
                     
                
            }

             public function get_jobs($writer_type)
            {
              if($writer_type==2){
                $this->db->select('*');
                $this->db->from('tbl_order');
               // $this->db->join('tbl_content_type', 'tbl_order.content_type_id=tbl_content_type.id','left');
               // $this->db->join('tbl_industry', 'tbl_order.industry_id=tbl_industry.industry_id','left');
               
                $this->db->where('order_status',6); 
               // $this->db->where('order_type',1); 
               // $this->db->where('package_id<=',$level_id); 
                
               
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
              }
              else
              {

                $this->db->select('*');
                $this->db->from('tbl_order');
               // $this->db->join('tbl_content_type', 'tbl_order.content_type_id=tbl_content_type.id','left');
               // $this->db->join('tbl_industry', 'tbl_order.industry_id=tbl_industry.industry_id','left');
               
                $this->db->where('order_status',6); 

                $this->db->where('(order_type=1 or order_type=2)'); 

                //$this->db->where('(order_status = 4 or order_status = 5)'); 


               // $this->db->where('package_id<=',$level_id); 
                
               
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;




              }
                     
                
            }

             public function get_pending($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_writer_id',$id); 
                //$this->db->where('order_status',5); 
                $this->db->where('(order_status = 4 or order_status = 5)'); 

                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_feedback($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_writer_id',$id); 
                //$this->db->where('order_status',5); 
                $this->db->where('order_status = 9'); 

                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_revision($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',4); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_rating($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                //$this->db->join('tbl_content_type', 'tbl_order.content_type_id=tbl_content_type.id','left');
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_rating!=',NULL); 
               // $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();

                $count=0;
                $sum=0;
                
                  foreach($query->result_array() as $row)
                {

                   $rating=$row['order_rating'];
                   $sum=$sum+$rating;
                   $count++;
                }

                if($count>0)
                {

                   $ans=$sum/$count;
                   $jibu=$ans*20;
                   return $jibu;

                }
                else
                {
                    $jibu=0;
                    return $jibu;

                }
                     
                
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

             public function get_earnings($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',3); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
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
                $this->db->join('tbl_order_type', 'tbl_order.order_type=tbl_order_type.order_type_id','left');


                $this->db->where('tbl_order.order_id',$order_id); 
                $this->db->limit(1); 
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

             public function get_payment_options()
            {
                $this->db->select('*');
                $this->db->from('tbl_payment_type');
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_paypal_id($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_id',$id);
              
                return $this->db->get()->row()->user_paypal_email;
                
                
                    
                
            }

            public function get_profile_details($writer_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->join('tbl_location', 'tbl_user.user_location_id=tbl_location.iso','left');
               
                $this->db->where('tbl_user.user_id',$writer_id); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_all_orders($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('buyer_id',$id); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_all_ordersw($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('order_writer_id',$id); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_writer_bal($id)
            {
                $this->db->select('*');
                $this->db->from('account_balance');
                $this->db->where('user_id',$id); 
                $this->db->where('account_type',1); 
               // return $this->db->get()->row()->account_balance;

                 $query = $this->db->get();
                
               
                foreach($query->result_array() as $row)
                {
                   return $row['account_balance'];
                }

                
               
                     
                
            }

             public function get_writer_bal_local($id)
            {
                $this->db->select('*');
                $this->db->from('account_balance');
                $this->db->where('user_id',$id); 
                $this->db->where('account_type',2); 
               // return $this->db->get()->row()->account_balance;

                 $query = $this->db->get();
                
               
                foreach($query->result_array() as $row)
                {
                   return $row['account_balance'];
                }

                
               
                     
                
            }

             public function get_balance($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('writer_id',$id); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_account_balance_one($id)
            {
                $this->db->select('account_balance');
                $this->db->from('account_balance');
                $this->db->where('user_id',$id); 
                $this->db->where('account_type',1); 
                return $this->db->get()->row()->account_balance;
                
                
                     
                
            }

              public function get_account_balance_two($id)
            {
                $this->db->select('account_balance');
                $this->db->from('account_balance');
                $this->db->where('user_id',$id); 
                $this->db->where('account_type',2); 
                return $this->db->get()->row()->account_balance;
                
                
                     
                
            }

            public function get_progress($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_writer_level($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
               
                $this->db->where('user_id',$id); 
               
                $query = $this->db->get();
                
               
                foreach($query->result_array() as $row)
                {
                   return $row['user_level_id'];
                }

            }

             public function get_add_info($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
               
                $this->db->where('user_id',$id); 
               
                $query = $this->db->get();
                
               
                foreach($query->result_array() as $row)
                {
                   return $row['user_more'];
                }

            }

              public function user_writer_status($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
               
                $this->db->where('user_id',$id); 
               
                $query = $this->db->get();
                
               
                foreach($query->result_array() as $row)
                {
                   return $row['user_writer_status'];
                }

            }

              public function user_writer_type($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
               
                $this->db->where('user_id',$id); 
               
                $query = $this->db->get();
                
               
                foreach($query->result_array() as $row)
                {
                   return $row['user_writer_type'];
                }

            }



              public function under_review($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',2); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function under_revision($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('order_writer_id',$id); 
                $this->db->where('order_status',4); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }



             public function get_content_type()
            {
                $this->db->select('*');
                $this->db->from('tbl_content_type');
                $this->db->where('content_status',1); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_industries()
            {
                $this->db->select('*');
                $this->db->from('tbl_discipline');
               // $this->db->where('industry_status',1); 
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
            $this->db->where('user_authority=',2);
            $this->db->limit(1);
            
            $query = $this->db->get();
            
            foreach($query->result_array() as $row)
            {
               
               $existingHashFromDb = $row['user_password'];
               $activestatus = $row['user_status'];


               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
               
               if(password_verify($datum['password'], $existingHashFromDb))
               {
                   if($activestatus==1 or $activestatus==2 or $activestatus==3 or $activestatus==4 or $activestatus==7)
                     {
                       return 'true';
                     }

                   elseif($activestatus==5)
                     {
                       return 'rejected';
                     }

                     elseif($activestatus==6)
                     {
                       return 'deactivated';
                     }
                     


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
                $this->db->where('user_authority',2);

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
                $this->db->where('user_authority',2);
                $this->db->limit(1);
                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                return $query->result();
                } else {
                return false;
                }
            }

             public function read_user_information_id($id) 
            {

                $condition = "user_id =" . "'" . $id . "'";
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

             public function user_activation($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }

               public function update_more_info($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }

             public function update_balance($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('account_balance',$update); 
            }

             public function update_balance_foreign($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->where('account_type', 1);
                $this->db->update('account_balance',$update); 
            }

              public function update_balance_local($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->where('account_type', 2);
                $this->db->update('account_balance',$update); 
            }

              public function update_order($id,$update)
            {
                $this->db->where('order_id', $id);
                $this->db->update('tbl_order',$update); 
            }

             public function updateTransaction($id,$update)
            {
                $this->db->where('order_id', $id);
                $this->db->update('tbl_order',$update); 
            }
            //update writer info
            public function update_profile($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }

             public function update_application($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }
  }