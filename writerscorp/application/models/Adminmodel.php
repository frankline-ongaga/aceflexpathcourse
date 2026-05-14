<?php

 class Adminmodel extends CI_Model  
       {  
          function __construct()  
          {  
             // Call the Model constructor  
             parent::__construct();  
             
          }  
           // public function login($data) {

           //  //$condition = "admin_email =" . "'" . $data['admin_email'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "'";
           //  $this->db->select('*');
           //  $this->db->from('tbl_admin');
           //  $this->db->where('admin_email=',$data['admin_email']);
           //  $this->db->limit(1);
           //  $query = $this->db->get();
           //   if($query->num_rows() >0)
           //  {
               
             
           //         return true;
           //    }
           //     else
           //     {
           //         return false;
           //     }
           
           //  }

             public function login($datum) {
            //$condition = "username =" . "'" . $datum['username'] . "' AND " . "password =" . "'" . $datum['password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('user_email=',$datum['email']);
            $this->db->where('user_role=',$datum['role']);
            $this->db->where('user_authority=',3);
            $this->db->limit(1);
            
            $query = $this->db->get();
            
            foreach($query->result_array() as $row)
            {
               
               $existingHashFromDb = $row['user_password'];
             


               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
               
               if(password_verify($datum['password'], $existingHashFromDb))
               {
                 
                  return true;
                   


               }
               else
               {
                   return false;
               }
            }

           
         }

             public function get_jobs()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_user', 'tbl_order.order_user_id=tbl_user.user_id','left');
               // $this->db->join('tbl_industry', 'tbl_order.industry_id=tbl_industry.industry_id','left');
               
                $this->db->where('order_status',1); 
               // $this->db->where('order_type',1); 
               // $this->db->where('package_id<=',$level_id); 
                
               
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
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

           public function get_earnings_affiliate()
            {


                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                //$this->db->where_in('order_status',5); 
               
                $this->db->where('affiliate_id!=',NULL); 
                $this->db->where('affiliate_amount!=',NULL); 


                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_awaiting_approval_chron()
            {


                $this->db->select('*');
                $this->db->from('tbl_order');
                //$this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                //$this->db->where_in('order_status',5); 
               
               // $this->db->where('affiliate_id!=',NULL); 
                $this->db->where('order_status',1); 


                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

          public function add_previous($data)
          {

             $this->db->insert('tbl_sample',$data);


          }

           public function update_approval($data)
          {

              $this->db->update_batch('tbl_order', $data, 'order_id');

          }

           public function del_sample($id,$data)
            {
                $this->db->where('sample_id', $id);
                $this->db->update('tbl_sample',$data); 
            }

             public function get_sample($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_sample');
                $this->db->where('sample_id',$order_id); 
               // $this->db->where('designation',1); 
               // $this->db->order_by('date','DESC');
                $query = $this->db->get();
                
                return $query;


            }

              public function update_sample($id,$data)
            {
                $this->db->where('sample_id', $id);
                $this->db->update('tbl_sample',$data); 
            }


           public function get_samples()
            {
                $this->db->select('*');
                $this->db->from('tbl_sample');
                $this->db->where('status',0); 
                
                $query = $this->db->get();
                
                return $query;


            }

          public function get_pending_number()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                //$this->db->where('buyer_id',$id); 
                $this->db->where('order_status',1); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query->num_rows();
                     
                
            }

             public function update_discount($arr)
            {
                $this->db->where('thekey', 'discount');
                $this->db->update('value_store',$arr); 
            }

             public function update_affiliate($arr)
            {
                $this->db->where('thekey', 'affiliate_percentage');
                $this->db->update('value_store',$arr); 
            }

              public function get_discount()
            {
                //get papers
                  $this->db->select('value');
                  $this->db->from('value_store');
                  $this->db->where('thekey=','discount');
                  $query = $this->db->get();
                  return $query->row()->value;

            }

              public function get_affiliate_rate()
            {
                //get papers
                  $this->db->select('value');
                  $this->db->from('value_store');
                  $this->db->where('thekey=','affiliate_percentage');
                  $query = $this->db->get();
                  return $query->row()->value;

            }



             public function get_admins()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority',3);
                $this->db->join('admin_roles', 'tbl_user.user_role=admin_roles.role_id','left');
              

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }


               public function get_users()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->join('tbl_user_authority', 'tbl_user.user_authority=tbl_user_authority.number','left');
              

                $query = $this->db->get();
                
                return $query;
                     
                
            }

               public function get_user_details($user_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_id',$user_id);
              

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

              public function get_writer_types()
            {
                $this->db->select('*');
                $this->db->from('tbl_writer_type');
               // $this->db->join('tbl_user_authority', 'tbl_user.user_authority=tbl_user_authority.number','left');
              

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_payment_history()
            {
                
                $this->db->select('*');
                $this->db->from('tbl_transaction');
              
                $this->db->join('tbl_order', 'tbl_order.order_id=tbl_transaction.transaction_order_id','left');
                $this->db->join('tbl_user', 'tbl_user.user_id=tbl_order.order_user_id','left');
                //$this->db->join('tbl_refund_status', 'tbl_refund_status.refund_status=tbl_transaction.refund_status','left');

               // $this->db->where('tbl_order.order_user_id',$user_id); 
               // $this->db->order_by('order_added','DESC'); 
               // $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function approve_writer($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }

             public function change_user_status($id,$update)
            {
                $this->db->where('user_id', $id);
                $this->db->update('tbl_user',$update); 
            }


             public function change_coupon_status($id,$update)
            {
                $this->db->where('coupon_id', $id);
                $this->db->update('coupon',$update); 
            }

             //get pending writers
              public function get_unconfirmed_writers()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
               // $this->db->join('tbl_content_type', 'tbl_order.content_type_id=tbl_content_type.id','left');
                $this->db->where('user_authority',2); 
                $this->db->where('user_writer_status',2); 
                $this->db->order_by('user_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function writer_application($writerid)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->join('tbl_location', 'tbl_user.user_location_id=tbl_location.iso','left');
                $this->db->where('user_id',$writerid); 
                $this->db->where('user_writer_status',2); 
                $this->db->order_by('user_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_uploads($order_id)
            {

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

             public function get_order_files_complete($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_files');
                $this->db->where('order_id',$order_id); 
                $this->db->where('designation',2); 
                $this->db->order_by('date','DESC'); 
                $query = $this->db->get();
                
                return $query->result();


            }


             public function get_technical()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_technical_status', 'tbl_order.order_technical_status=tbl_technical_status.technical_status','left');
                //$this->db->where('order_user_id',$id); 
                $this->db->where('order_type',2); 
                $this->db->where('order_status',0); 
                $this->db->or_where('order_status',1); 
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

             public function get_inda($tags)
            {
                $inda=array();
                $result=array();
                $result=explode(',', $tags);
                

                for($i=0; $i<count($result);$i++) {

                $this->db->select('*');
                $this->db->from('tbl_discipline');
                $this->db->where('discipline_id',$result[$i]); 
               

                $query = $this->db->get();
                  foreach($query->result_array() as $row)
                {
                   
                   $inda[] = $row['discipline_name'];
                
               // return $query;
                  # code...
                }

              }

                return $inda;

                
                     
                
            }



             public function get_order_details($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_user', 'tbl_order.order_user_id=tbl_user.user_id','left');
                $this->db->join('tbl_course_level', 'tbl_order.order_level_id=tbl_course_level.level_id','left');
                $this->db->join('tbl_paper_format', 'tbl_order.order_format_id=tbl_paper_format.format_id','left');
                $this->db->join('tbl_transaction', 'tbl_order.order_id=tbl_transaction.transaction_order_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->join('tbl_order_type', 'tbl_order.order_type=tbl_order_type.order_type_id','left');
                $this->db->join('website', 'tbl_order.order_website=website.id','left');

                $this->db->where('tbl_order.order_id',$order_id); 
               // $this->db->order_by('order_added','DESC'); 
               // $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_all()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

               // $this->db->where('buyer_id',$id); 
                $this->db->order_by('order_added','DESC'); 
               // $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }

               public function get_buyers()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority=',1);
              
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_writers_new()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority=',2);
              
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }


               public function get_writers()
            {
                $this->db->select('*,AVG(order_rating) as rato');
                $this->db->from('tbl_user');
               // $this->db->join('account_balance', 'account_balance.user_id=tbl_user.user_id','left');
                $this->db->join('tbl_order', 'tbl_order.order_writer_id =tbl_user.user_id','left');

                $this->db->where('user_authority=',2);

                $this->db->group_by('user_id');
              
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }

                public function get_rating()
            {
                $this->db->select('AVG(rating) as rato');
                $this->db->from('tbl_order');
                $this->db->join('tbl_user', 'tbl_order.writer_id=tbl_user.user_id','left');
               // $this->db->where('writer_id',$id); 
                //$this->db->where('rating!=',NULL); 
                $this->db->group_by('writer_id'); 

                $query = $this->db->get();

                return $query;
                     
                
            }

             public function past_payouts()
            {
                $this->db->select('*');
                $this->db->from('tbl_payment_request');
                $this->db->join('tbl_user', 'tbl_payment_request.user_id=tbl_user.user_id','left');
                $this->db->where('request_paid_status=',1);
              
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function manage_payouts()
            {
                $this->db->select('*');
                $this->db->from('tbl_payment_request');
                $this->db->join('tbl_user', 'tbl_payment_request.user_id=tbl_user.user_id','left');
                $this->db->where('request_paid_status=',0);
              
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_payout_details($request_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_payment_request');
                $this->db->join('tbl_user', 'tbl_payment_request.user_id=tbl_user.user_id','left');
                $this->db->where('tbl_payment_request.id=',$request_id);
              
              
                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_revision()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

                //$this->db->where('buyer_id',$id); 
                $this->db->where('order_status',4); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_user_details_order($user_id,$authority)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
               // $this->db->join('tbl_content_type', 'tbl_order.content_type_id=tbl_content_type.id','left');
                if($authority==1){

                 $this->db->where('order_user_id',$user_id); 

                }
                 else
                {
                  $this->db->where('order_writer_id',$user_id); 

                }
               // $this->db->where('user_authority',$authority); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_client_details($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_user', 'tbl_order.order_user_id=tbl_user.user_id','left');
                $this->db->join('account_balance', 'account_balance.user_id=tbl_order.order_writer_id','left');
                $this->db->where('order_id',$order_id); 
                

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

            public function get_specific_writer($order_id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_user', 'tbl_order.order_user_id=tbl_user.user_id','left');
                $this->db->join('account_balance', 'account_balance.user_id=tbl_order.order_writer_id','left');
                $this->db->where('order_id',$order_id); 
                

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

            public function get_writer_details()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_user', 'tbl_order.order_writer_id=tbl_user.user_id','left');
                //$this->db->where('buyer_id',$id); 
                

                $query = $this->db->get();
                
                return $query->result();
                     
                
            }

              public function view_submissions($order_id)
            {

                $this->db->select('*');
                $this->db->from('tbl_subscription_submission');
                $this->db->where('order_id',$order_id); 
                $query=$this->db->get();
                return $query;
                
               
                     
                
            }

               public function get_message_info($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order,tbl_user');
                $this->db->where('tbl_order.buyer_id=tbl_user.user_id');
               // $this->db->where('buyer_id',$id); 
                $this->db->where('order_id',$id); 
                //$this->db->order_by('order_added','DESC'); 
                 $query = $this->db->get();


                  foreach($query->result_array() as $row)
                {
                   
                  $data['user_id'] = $row['user_id'];
                  $data['user_email'] = $row['user_email'];
                 
                  return $data;

                
                }


             // echo $this->db->get()->row()->user_id; die();
                     
                
            }


            public function get_awaiting()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

               // $this->db->where('buyer_id',$id); 
                $this->db->where('order_status',0); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_awaiting_approval()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->join('tbl_order_type', 'tbl_order.order_type=tbl_order_type.order_type_id','left');

               // $this->db->where('buyer_id',$id); 
                $this->db->where('order_status',1); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }


              public function get_completed()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                //$this->db->where('buyer_id',$id); 
                $this->db->where('order_status',3); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_review()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

                //$this->db->where('buyer_id',$id); 
                $this->db->where('order_status',2); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_earnings_sum()
            {
                //get papers
                $this->db->select_sum('transaction_amount');
                $this->db->from('tbl_transaction');
                //$this->db->where('(closedPos = 0) ');
                $query = $this->db->get();
                return $query->row()->transaction_amount;

          }

               public function get_subscription_earnings()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->where('order_type',2); 
                $this->db->where('order_paid_status',1); 
               
                $this->db->where('order_status',0); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

            public function get_current_commission()
            {
                $this->db->select('industry_percentage');
                $this->db->from('tbl_commission');
              
              
                $this->db->where('commission_id',1); 
              

                $query = $this->db->get();

             
                
                foreach($query->result_array() as $row)
                {
                   
                  $industry_percentage = $row['industry_percentage'];
                  return $industry_percentage;
                
                }

               

          }


             public function get_earnings()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                //$this->db->where('order_type',1); 
               
                $this->db->where('order_status',3); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_packages()
            {

                $this->db->select('*');

                $this->db->from('tbl_level');

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function update_pricing($uparr)
            {
              
              $this->db->update_batch('tbl_level', $uparr, 'level_id');
                                 
            }


            public function get_writer_detailss($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                  //$this->db->join('tbl_content_type', 'tbl_order.content_type_id=tbl_content_type.id','left');
                $this->db->where('user_id=',$id);
              
              
               

                $query = $this->db->get();

                 return $query->result();
                
               
                     
                
            }



              public function get_buyers_count()
            {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority=',1);
              
              
               

                $query = $this->db->get();
                
                return $query->num_rows();
                     
                
            }

             public function get_cancelled()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

               // $this->db->where('buyer_id',$id); 
                $this->db->where('order_status',7); 
               
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function cancelled_orders()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');

               // $this->db->where('buyer_id',$id); 
                $this->db->where('order_status',8); 
               
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

               public function get_pending()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                 $this->db->where('(order_status = 1 or order_status = 5 or order_status = 6 or order_status = 2 or order_status = 9)'); 

               // $this->db->where('buyer_id',$id); 
                
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

              public function get_subs($id)
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_user', 'tbl_user.user_id=tbl_order.buyer_id','left');
                $this->db->where('order_type',2); 
                //$this->db->where('order_status',2); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }
             public function get_subs_admin()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_user', 'tbl_user.user_id=tbl_order.buyer_id','left');
                $this->db->where('order_type',2); 
                //$this->db->where('order_status',2); 
                $this->db->order_by('order_added','DESC'); 

                $query = $this->db->get();
                
                return $query;
                     
                
            }

             public function get_writers_count()
            {
                
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('user_authority=',2);
              
              
               

                $query = $this->db->get();
                
                return $query->num_rows();
                     
                
            }

         public function get_five_orders()
            {
                $this->db->select('*');
                $this->db->from('tbl_order');
                $this->db->join('tbl_discipline', 'tbl_order.order_discipline_id=tbl_discipline.discipline_id','left');
                $this->db->join('tbl_order_status', 'tbl_order.order_status=tbl_order_status.status_id','left');
                $this->db->join('tbl_user', 'tbl_order.order_user_id=tbl_user.user_id','left');
               // $this->db->where('buyer_id',$id); 
                $this->db->order_by('order_added','DESC'); 
                $this->db->limit(5); 
                $query = $this->db->get();
                
                return $query;
                     
                
            }




          
          public function read_client_informationin($data) {

            //$condition = "admin_email =" . "'" . $data['admin_email'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "'";
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('admin_email=',$data['admin_email']);
            $this->db->limit(1);
            $query = $this->db->get();
             foreach($query->result_array() as $row)
            {
               
               $existingHashFromDb = $row['admin_password'];
               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
               
               if(password_verify($data['admin_password'], $existingHashFromDb))
               {
                   return true;
               }
               else
               {
                   return false;
               }
            }
           /*
            if ($query->num_rows() == 1) {
            return true;
            } else {
            return false;
            } */
            }
            
            public function update_pass($email,$dasa)
            {
                $this->db->where('admin_email', $email);
                $this->db->update('admin',$dasa); 
            }

             public function update_payments($id,$dasa)
            {
                $this->db->where('id', $id);
                $this->db->update('tbl_payment_request',$dasa); 
            }


             public function update_commission($id,$dasa)
            {
                $this->db->where('commission_id', $id);
                $this->db->update('tbl_commission',$dasa); 
            }

             public function update_order($id,$dasa)
            {
                $this->db->where('order_id', $id);
                $this->db->update('tbl_order',$dasa); 
            }

             public function update_bal($id,$dasa)
            {

                $this->db->where('user_id', $id);
                $this->db->update('account_balance',$dasa); 
            }
            public function update_bal_kes($id,$dasa)
            {
                $this->db->where('user_id', $id);
                $this->db->where('account_type',2);
                $this->db->update('account_balance',$dasa); 
            }
            
            public function update_pass_client($email,$dasa)
            {
                $this->db->where('officer_email', $email);
                $this->db->update('loan_officer',$dasa); 
            }
            
             public function confam($old,$email) {

            //$condition = "admin_email =" . "'" . $data['admin_email'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "'";
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('admin_email=',$email);
            $this->db->limit(1);
            $query = $this->db->get();
             foreach($query->result_array() as $row)
            {
               
               $existingHashFromDb = $row['admin_password'];
               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
               
               if(password_verify($old, $existingHashFromDb))
               {
                   return true;
               }
               else
               {
                   return false;
               }
            }
           /*
            if ($query->num_rows() == 1) {
            return true;
            } else {
            return false;
            } */
            }
            
           
            
             public function confamclient($old,$email) {

            //$condition = "admin_email =" . "'" . $data['admin_email'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "'";
            $this->db->select('*');
            $this->db->from('loan_officer');
            $this->db->where('officer_email=',$email);
            $this->db->limit(1);
            $query = $this->db->get();
             foreach($query->result_array() as $row)
            {
               
               $existingHashFromDb = $row['officer_password'];
               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
               
               if(password_verify($old, $existingHashFromDb))
               {
                   return true;
               }
               else
               {
                   return false;
               }
            }
           /*
            if ($query->num_rows() == 1) {
            return true;
            } else {
            return false;
            } */
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

          public function update_pass_advertiser($id,$dasa)

            {

                $this->db->where('user_id', $id);

                $this->db->update('tbl_user',$dasa); 

            }
            
            public function read_user_information($admin_email) 
            {

                $condition = "user_email =" . "'" . $admin_email . "'";
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where($condition);
                $this->db->where('user_authority',3);
                $this->db->join('admin_roles', 'tbl_user.user_role=admin_roles.role_id','left');

                $this->db->limit(1);
                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                return $query->result();
                } else {
                return false;
                }
            }
            
            public function add_event($data)
            {
                $this->db->insert('event', $data);
            }

              public function insert_coupon($data)
            {
                $this->db->insert('coupon', $data);
            }

            public function add_news($data)
            {
                $this->db->insert('news', $data);
            }
             public function add_work($data)
            {
                $this->db->insert('tbl_subscription_submission', $data);
            }
            
             public function add_message($data)
            {
                $this->db->insert('message', $data);
            }
            
            public function insert_registration($data)
            {
                $this->db->insert('registration_fees', $data);
            }
            
             public function insert_admin($data)
            {
                $this->db->insert('tbl_user', $data);
            }
            
            public function guarantor_details($phone)
            {
                 $this->db->select('*');
                $this->db->from('guarantor');
                $this->db->where('customer_phone=',$phone);
                $query = $this->db->get();
                return $query;
                
            }


            public function coupon_management()
            {
                $this->db->select('*');
                $this->db->from('coupon');
               
                $query = $this->db->get();
                return $query;
                
            }
            
               
            public function receive_money($data)
            {
                $this->db->insert('mpesa_received', $data);
            }
            
            public function deleteofficer($phone)
            {
                $this->db->delete('loan_officer', array('officer_phone' => $phone)); 
            }
            
             public function deleteadmin($email)
            {
                $this->db->delete('admin', array('admin_email' => $email)); 
            }
             public function deleteevent($id)
            {
                $this->db->delete('event', array('event_id' => $id)); 
            }
             public function deleteadminnew($id)
            {
                $this->db->delete('tbl_user', array('user_id' => $id)); 
            }
            public function deletedownload($id)
            {
                $this->db->delete('downloads', array('download_id' => $id)); 
            }
            
             public function deletecareer($id)
            {
                $this->db->delete('career', array('career_id' => $id)); 
            }
            public function deletenews($id)
            {
                $this->db->delete('news', array('news_id' => $id)); 
            }
            
            public function insert_rejected($data)
            {
                $this->db->insert('loan_rejected', $data);
            }
            public function add_download($data)
            {
                $this->db->insert('downloads', $data);
            }
            public function add_career($data)
            {
                $this->db->insert('career', $data);
            }
            
             public function add_mpesa_table($data)
            {
                $this->db->insert('mpesa_transaction', $data);
            }
            
            public function add_dummy($data)
            {
                $this->db->insert('mpesa_received', $data);
            }
            
             public function add_successful($data)
            {
                $this->db->insert('loan', $data);
                $this->db->close();
            }
            
             public function clients($app)
            {
                $this->db->select('*');
                $this->db->from('customer');
                $this->db->where('loan_officer_email', $app);
                $query = $this->db->get();
                
                return $query;
            }
            
            public function get_fees($from,$to)
            {
                $this->db->select('*');
                $this->db->from('customer,registration_fees');
                $this->db->where('customer.customer_phone=registration_fees.registration_phone');
                $this->db->where('registration_date >=', $from);
                $this->db->where('registration_date <=', $to);
                $this->db->order_by('registration_date','DESC');
                $query = $this->db->get();
                
                return $query;
            }
            
            public function get_received()
            {
                $this->db->select('*');
                $this->db->from('event');
                $this->db->order_by('event_id', 'DESC');
              
                $query = $this->db->get();
                
                return $query;
            }
            
           
            
             public function get_downloads()
            {
                $this->db->select('*');
                $this->db->from('downloads');
                $this->db->order_by('download_id', 'DESC');
              
                $query = $this->db->get();
                
                return $query;
            }
            
             public function get_careers()
            {
                $this->db->select('*');
                $this->db->from('career');
                $this->db->order_by('career_id', 'DESC');
              
                $query = $this->db->get();
                
                return $query;
            }
            
             public function all_news()
            {
                $this->db->select('*');
                $this->db->from('news');
                $this->db->order_by('news_id', 'DESC');
              
                $query = $this->db->get();
                
                return $query;
            }
            
            public function sms_list($from,$to)
            {
                $this->db->select('*');
                $this->db->from('message');
               
                $this->db->where('date >=', $from);
                $this->db->where('date <=', $to);
                $this->db->order_by('date','DESC');
                $query = $this->db->get();
                
                return $query;
            }
            
             public function get_max_id($customerid)
            {
                $this->db->select_max('request_id');
                $this->db->from('loan_request,customer');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('customer.loan_status',2);
                $this->db->where('loan_request.customer_id',$customerid);
                $query = $this->db->get();
                
                foreach($query->result_array() as $row)
                 {
               
                       return $row['request_id'];
                       
                 }
            }
            
             public function max_transfer_id($phone)
            {
                $this->db->select_max('received_id');
                $this->db->from('mpesa_received');
                $this->db->where('received_phone=',$phone);
                
                $query = $this->db->get();
                
                foreach($query->result_array() as $row)
                 {
               
                       return $row['received_id'];
                       
                 }
            }
            
            public function transfer_details($maxid)
            {
                $this->db->select('*');
                $this->db->from('mpesa_received');
                $this->db->where('received_id=',$maxid);
                
                $query = $this->db->get();
                
               
               
                return $query;
                       
                
            }
            public function get_max_id_disburse($phone)
            {
                $this->db->select_max('request_id');
                $this->db->from('loan_request,customer');
                $this->db->where('customer.customer_phone=loan_request.mpesa_phone');
                $this->db->where('customer.loan_status',3);
                $this->db->where('loan_request.mpesa_phone',$phone);
                $query = $this->db->get();
                
                foreach($query->result_array() as $row)
                 {
               
                       return $row['request_id'];
                       
                 }
            }
            
            public function get_max_id_complete($phone)
            {
                $this->db->select_max('request_id');
                $this->db->from('loan_request');
                $this->db->where('loan_request.mpesa_phone=',$phone);
                
                $query = $this->db->get();
                
                foreach($query->result_array() as $row)
                 {
               
                       return $row['request_id'];
                       
                 }
            }
            
             public function get_amount($id,$maxid)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('customer.loan_status',2);
                $this->db->where('loan_request.customer_id',$id);
                $this->db->where('request_id',$maxid);

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['request_amount'];
                       
                 }
               
            }
            
             public function get_reference($id,$maxid)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('customer.loan_status',2);
                $this->db->where('loan_request.customer_id',$id);
                $this->db->where('request_id',$maxid);

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['ref_no'];
                       
                 }
               
            }
             public function get_phone($id,$maxid)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('customer.loan_status',2);
                $this->db->where('loan_request.customer_id',$id);
                $this->db->where('request_id',$maxid);

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['customer_phone'];
                       
                 }
               
            }
            public function get_pesa($phone,$maxid)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request');
                $this->db->where('customer.customer_phone=loan_request.mpesa_phone');
                $this->db->where('customer.loan_status',3);
                $this->db->where('loan_request.mpesa_phone',$phone);
                $this->db->where('request_id',$maxid);

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['request_amount'];
                       
                 }
               
            }
            
             public function get_time($phone,$maxid)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request');
                $this->db->where('customer.customer_phone=loan_request.mpesa_phone');
                $this->db->where('customer.loan_status',3);
                $this->db->where('loan_request.mpesa_phone',$phone);
                $this->db->where('request_id',$maxid);

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['product_id'];
                       
                 }
               
            }
            
            public function get_start($phone,$maxid)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request,mpesa_transaction');
                $this->db->where('customer.customer_phone=loan_request.mpesa_phone');
                 $this->db->where('mpesa_code=mpesa_disbursed_code');
                $this->db->where('customer.loan_status',3);
                $this->db->where('loan_request.mpesa_phone',$phone);
                $this->db->where('request_id',$maxid);

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['mpesa_date'];
                       
                 }
               
            }
            
            public function get_fname($phone,$maxid)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request');
                $this->db->where('customer.customer_phone=loan_request.mpesa_phone');
                $this->db->where('customer.loan_status',3);
                $this->db->where('loan_request.mpesa_phone',$phone);
                $this->db->where('request_id',$maxid);

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['customer_fname'];
                       
                 }
               
            }
            
            
            
             public function get_client_phone($id)
            {
                $this->db->select('customer_phone');
                $this->db->from('customer');
                $this->db->where('customer.customer_id_number',$id);
              

                $query = $this->db->get();
                
               // $mat = $query->result_array();
                 foreach($query->result_array() as $row)
                 {
               
                       return $row['customer_phone'];
                       
                 }
               
            }
            
            public function edit_customer($id,$data)
            {
            
               $this->db->update('customer', $data, "customer_id = $id");
               
            }
            public function edit_transfer($id,$data)
            {
            
               $this->db->update('customer', $data, "customer_id = $id");
               
            }
            
             public function edit_guarantor($id,$data)
            {
            
               $this->db->update('guarantor', $data, "guarantor_id = $id");
               
            }
            public function get_customer($id)
            {
                $this->db->select('*');
                $this->db->from('customer');
                $this->db->where('customer.customer_id=',$id);
              

                $query = $this->db->get();
                
                return $query;
               
            }
            
            public function get_guarantor($id)
            {
                $this->db->select('*');
                $this->db->from('guarantor');
                $this->db->where('guarantor_id=',$id);
              

                $query = $this->db->get();
                
                return $query;
               
            }
            public function update_request($id,$maxid)
            {
                $this->db->query("UPDATE loan_request SET status=1 WHERE request_id=$maxid");
               
               
            }
            
              public function update_received($id,$balance)
            {
                $this->db->query("UPDATE mpesa_received SET received_amount=$balance WHERE received_id=$id");
               
               
            }
            
             public function update_approved($id,$maxid)
            {
                $this->db->query("UPDATE loan_request SET approved_status=1 WHERE request_id=$maxid");
               
               
            }
            
             public function disburse_change($phone)
            {
                $this->db->query("UPDATE customer SET loan_status=6 WHERE customer_phone=$phone");
               
               
            }
            
            
            public function clients_active($app)
            {
                $this->db->select('*');
                $this->db->from('customer,loan');
                $this->db->where('customer.loan_status', 3);
                 $this->db->where('loan.customer_id=customer.customer_id_number');
                 $this->db->where('loan_officer_email', $app);
                // $this->db->where("$date_due>$current_date");
                $result = $this->db->get();
                
                //$mat = $this->db->query($result)->result_array();
                
                return $result;
            }
            
            public function get_principal($id)
            {
                $this->db->select('*');
                $this->db->from('loan_request');
                $this->db->where('customer_id', $id);
                 //$this->db->where('loan.customer_id=customer.customer_id_number');
                 //$this->db->where('loan_officer_email', $app);
                // $this->db->where("$date_due>$current_date");
                $query = $this->db->get();
                
                foreach($query->result_array() as $row)
                 {
               
                       return $row['request_amount'];
                       
                 }
                
                //$mat = $this->db->query($result)->result_array();
                
                return $result;
            }
            
            
             public function get_admin_name($email)
            {
                $this->db->select('*');
                $this->db->from('admin');
                $this->db->where('admin_email',$email);
               
                $query = $this->db->get();
                
                return $query;
            }
            public function all_customers()
            {
                $this->db->select('*');
                $this->db->from('customer,location,loan_officer');
                $this->db->where('customer.location_id=location.location_id');
                $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
                $this->db->order_by('added_date','DESC');

                $query = $this->db->get();
                
                return $query;
            }
             public function all_customers_officer($limit,$start)
            {
                $this->db->select('*');
                $this->db->from('customer,location,loan_officer');
                $this->db->where('customer.location_id=location.location_id');
                $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
                $this->db->order_by('added_date','DESC');
                $this->db->limit($limit, $start);

                $query = $this->db->get();
                
                return $query;
            }
            
            
            public function all_guarantors()
            {
                $this->db->select('*');
                $this->db->from('customer,guarantor,loan_officer');
                $this->db->where('guarantor.customer_phone=customer.customer_phone');
                $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
                $this->db->order_by('date_created','DESC');

                $query = $this->db->get();
                
                return $query;
            }
            
          
            
            // all disbursed kimumu
          
            public function regionthreesum($from,$to)
            {
               $this->db->select('sum(mpesa_amount) as regionthreesum');
               $this->db->from(' customer,loan_officer,mpesa_transaction,location,loan_request,product');
               $this->db->where(' customer.customer_phone=mpesa_transaction.mpesa_phone');
               $this->db->where(' mpesa_type=','D');
               $this->db->where('customer.location_id=location.location_id');
               $this->db->where(' mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
               $this->db->where(' loan_request.product_id=product.product_id ');
               $this->db->where(' loan_officer.officer_email=customer.loan_officer_email');
               $this->db->where(' location.location_id=',3 );
               $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
               //$this->db->group_by('ref_no');
               
               $disbursed=$this->db->get();
               
                
                return $disbursed;
            }
            
             public function kimumusum($from,$to)
            {
               $this->db->select('sum(mpesa_amount) as kimumusum');
               $this->db->from(' customer,loan_officer,mpesa_transaction,location,loan_request,product');
               $this->db->where(' customer.customer_phone=mpesa_transaction.mpesa_phone');
               $this->db->where(' mpesa_type=','D');
               $this->db->where('customer.location_id=location.location_id');
               $this->db->where(' mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
               $this->db->where(' loan_request.product_id=product.product_id ');
               $this->db->where(' loan_officer.officer_email=customer.loan_officer_email');
               $this->db->where(' location.location_id=',1 );
               $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
               //$this->db->group_by('ref_no');
               
               $disbursed=$this->db->get();
               
                
                return $disbursed;
            }
            
            
            public function spencersum($from,$to)
            {
               $this->db->select('sum(mpesa_amount) as kimumusum');
               $this->db->from(' customer,loan_officer,mpesa_transaction,location,loan_request,product');
               $this->db->where(' customer.customer_phone=mpesa_transaction.mpesa_phone');
               $this->db->where(' mpesa_type=','D');
               $this->db->where('customer.location_id=location.location_id');
               $this->db->where(' mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
               $this->db->where(' loan_request.product_id=product.product_id ');
               $this->db->where(' loan_officer.officer_email=customer.loan_officer_email');
               $this->db->where(' loan_officer.officer_email=','ngenospencer90@gmail.com' );
               $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
               //$this->db->group_by('ref_no');
               
               $disbursed=$this->db->get();
               
                
                return $disbursed;
            }
            
            
            public function abusum($from,$to)
            {
               $this->db->select('sum(mpesa_amount) as regionthreesum');
               $this->db->from(' customer,loan_officer,mpesa_transaction,location,loan_request,product');
               $this->db->where(' customer.customer_phone=mpesa_transaction.mpesa_phone');
               $this->db->where(' mpesa_type=','D');
               $this->db->where('customer.location_id=location.location_id');
               $this->db->where(' mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
               $this->db->where(' loan_request.product_id=product.product_id ');
               $this->db->where(' loan_officer.officer_email=customer.loan_officer_email');
               $this->db->where(' loan_officer.officer_email=','abrahamkorir85@gmail.com' );
               $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
               //$this->db->group_by('ref_no');
               
               $disbursed=$this->db->get();
               
                
                return $disbursed;
            }
            
            public function adilasum($from,$to)
            {
               $this->db->select('sum(mpesa_amount) as mailisum');
               $this->db->from(' customer,loan_officer,mpesa_transaction,location,loan_request,product');
               $this->db->where(' customer.customer_phone=mpesa_transaction.mpesa_phone');
               $this->db->where(' mpesa_type=','D');
               $this->db->where('customer.location_id=location.location_id');
               $this->db->where(' mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
               $this->db->where(' loan_request.product_id=product.product_id ');
               $this->db->where(' loan_officer.officer_email=customer.loan_officer_email');
               $this->db->where(' loan_officer.officer_email=','adilachelimo@gmail.com' );
               $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
               //$this->db->group_by('ref_no');
               
               $disbursed=$this->db->get();
               
                
                return $disbursed;
            }
             // all disbursed region 3
            public function all_disbursed_three($from, $to)
            {
               $this->db->select('*');
               $this->db->from(' customer,loan_officer,mpesa_transaction,location,loan_request,product');
               $this->db->where(' customer.customer_phone=mpesa_transaction.mpesa_phone');
               $this->db->where(' mpesa_type=','D');
               $this->db->where('customer.location_id=location.location_id');
               $this->db->where(' mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
               $this->db->where(' loan_request.product_id=product.product_id ');
               $this->db->where(' loan_officer.officer_email=customer.loan_officer_email');
               $this->db->where(' location.location_id=',3 );
               $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
               
               $this->db->group_by('ref_no');
               
               $disbursed=$this->db->get();
               
                
                return $disbursed;
            }
            
             public function count_customers()
            {
              $this->db->select("count('customer_id') AS customer_count");
              $this->db->from("customer");
              $this->db->where('customer.loan_status=',6);
              // $this->db->where('customer.loan_status!=',4);
              $query=$this->db->get();
               

               
                
                 
                foreach($query->result_array() as $row)
                 {
               
                       return $row['customer_count'];
                       
                 }
            }
            
            public function count_all_customers()
            {
              $this->db->select("count('customer_id') AS customer_count");
              $this->db->from("customer");
             // $this->db->where('customer.loan_status=',6);
              // $this->db->where('customer.loan_status!=',4);
              $query=$this->db->get();
               

               
                
                 
                foreach($query->result_array() as $row)
                 {
               
                       return $row['customer_count'];
                       
                 }
            }
            
             public function regionthreecount($from,$to)
            {
               $this->db->select('officer_fname,officer_lname,customer.customer_fname,customer.customer_lname,customer_phone,customer_middlename,customer_id_number,location_name,location.location_id,customer.location_id,mpesa_code,mpesa_amount,ref_no,product_name');
               $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product');
               $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
               $this->db->where('mpesa_type=','D');
               $this->db->where(' customer.location_id=location.location_id');
               $this->db->where(' mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
               $this->db->where('loan_request.product_id=product.product_id');
               $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
               $this->db->where(' location.location_id=3 ');
               $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
               $this->db->group_by(' ref_no');
               $disbursed=$this->db->get();
               
                
               return $disbursed->num_rows();
           
                
            }
            
            
             public function truestatus_my($from,$to,$client_email)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,officer_email,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_transaction.mpesa_date >=', $from);
             $this->db->where('mpesa_transaction.mpesa_date <=', $to);
              $this->db->where('officer_email =', $client_email);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            public function truestatus($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_transaction.mpesa_date >=', $from);
             $this->db->where('mpesa_transaction.mpesa_date <=', $to);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            public function truestatus_pag($from,$to,$limit,$start)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_transaction.mpesa_date >=', $from);
             $this->db->where('mpesa_transaction.mpesa_date <=', $to);
              
             $this->db->group_by(' ref_no');
             $this->db->limit($limit, $start);
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
             public function truestatus_count($from,$to)
            {
             $this->db->select("customer_fname, count('customer_id') as customer_count,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ");
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_transaction.mpesa_date >=', $from);
             $this->db->where('mpesa_transaction.mpesa_date <=', $to);
             $this->db->group_by(' ref_no');
               
             $query=$this->db->get();
                
                  
              $namba=$query->num_rows();
              
              return $namba;
                
            }
            
             public function total_rec()
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
            // $this->db->where('mpesa_transaction.mpesa_date >=', $from);
            // $this->db->where('mpesa_transaction.mpesa_date <=', $to);
           //  $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                 
                 foreach($query->result_array() as $row)
              {
               
                       return $row['total'];
                       
               }
            }
            
             public function truestatus_dashboard($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total,mpesa_amount as principal ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_transaction.mpesa_date >=', $from);
             $this->db->where('mpesa_transaction.mpesa_date <=', $to);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
              public function truestatus_principal()
            {
             $this->db->select('sum(mpesa_amount) as principal,customer.customer_phone,mpesa_transaction.mpesa_phone ');
             $this->db->from('mpesa_transaction,customer');
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
             $this->db->where(' customer.loan_status=',6);
            
            // $this->db->where(' completed_status=',0);
            
             //$this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                 foreach($query->result_array() as $row)
              {
               
                       return $row['principal'];
                       
               }
            }
            public function activeexport(){
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $delimiter = ",";
            $newline = "\r\n";
          
            //query
            $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
            // $this->db->where('mpesa_transaction.mpesa_date >=', $from);
            // $this->db->where('mpesa_transaction.mpesa_date <=', $to);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
            
            
            //see now
         
            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download('CSV_Report.csv', $data);
            
    }
            
            public function gettotalreceived($phone)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             $this->db->where('mpesa_received.received_phone=',$phone);
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();
             
             
              foreach($query->result_array() as $row)
              {
               
                       return $row['total'];
                       
               }
            }
            
             public function gettotalexpected($phone)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             $this->db->where('mpesa_received.received_phone=',$phone);
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();
             
             
              foreach($query->result_array() as $row)
              {
               
                       return $row['mpesa_amount'];
                       
               }
            }
            
            
             public function truestatuskev()
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone as phony,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            public function loanbal()
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where(' completed_status=',0);
             $this->db->group_by('customer.location_id');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            
            
            public function regthreebal($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',3);
             $this->db->where(' completed_status=',0);
              $this->db->where('mpesa_date >=', $from);
               $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            public function kimumubal($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',1);
             $this->db->where('completed_status=',0);
             $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            public function mailibal($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',2);
             $this->db->where('completed_status=',0);
             $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
             
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            public function regtatubal($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as receivedtotal ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',3);
             $this->db->where(' completed_status=',0);
              $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
             public function regtatubalcount($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as receivedtotal ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',3);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query->num_rows();
            }
            
             public function kimumtols($from, $to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as receivedtotal ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',1);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
             public function kimumtolscount($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as receivedtotal ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',1);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query->num_rows();
            }
             public function mailitols($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as receivedtotal ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',2);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
             public function mailitolscount($from,$to)
            {
             $this->db->select('customer_fname,loan_request.product_id,location.location_id,location_name,officer_fname,officer_lname,mpesa_code,ref_no,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as receivedtotal ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
             $this->db->where('customer.location_id=',2);
             $this->db->where(' completed_status=',0);
             $this->db->where('mpesa_date >=', $from);
             $this->db->where('mpesa_date <=', $to);
             $this->db->group_by('ref_no');
               
             $query = $this->db->get();

               
                
                return $query->num_rows();
            }
            
            public function paymentschedule($phone)
            {
             $this->db->select('customer_fname,loan_request.product_id,product_name,weeks,disbursed_code,check_status,product.product_id,customer_lname,mpesa_amount,received_date,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product,mpesa_received');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
              $this->db->where('received_phone=mpesa_transaction.mpesa_phone');
             //$this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.disbursed_code=mpesa_transaction.mpesa_code');
             $this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where('check_status=',1);
              $this->db->where('mpesa_transaction.mpesa_phone=',$phone);
             $this->db->where(' completed_status=',0);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            public function statustrue()
            {
             $this->db->select('customer_fname,customer_lname,mpesa_amount,customer_phone,customer_id_number,customer_occupation,mpesa_date,sum(mpesa_received_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product');
             
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
            // $this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             //from here
             //$this->db->where('mpesa_received.received_phone=mpesa_transaction.mpesa_phone');
              //$this->db->where('mpesa_received.received_date>=mpesa_transaction.mpesa_date');
             $this->db->where(' loan_status=',6);
             $this->db->where(' completed_status=',0);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
             public function sum_received()
            {
             $this->db->select('sum(mpesa_amount) as total ');
             $this->db->from('customer,loan_officer,mpesa_transaction,location,loan_request,product');
             $this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');
             $this->db->where('mpesa_type=','D');
             $this->db->where('customer.location_id=location.location_id');
             $this->db->where('mpesa_transaction.mpesa_code=loan_request.mpesa_disbursed_code');
             $this->db->where(' loan_request.product_id=product.product_id');
             $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
             $this->db->where(' loan_status=',6);
             $this->db->where(' completed_status=',0);
             $this->db->group_by(' ref_no');
               
             $query = $this->db->get();

               
                
                return $query;
            }
            
            public function all_loans($from,$to)
            {
                $this->db->select('*');
                $this->db->from('customer,loan_request,product');
                $this->db->where('loan_request.customer_id=customer.customer_id_number');
                //$this->db->where('customer.customer_phone=mpesa_transaction.mpesa_phone');

                //$this->db->where('CUST.mpesa_phone=mpesa_transaction.mpesa_phone');
                $this->db->where('loan_request.product_id=product.product_id');
                $this->db->order_by('requested_date','DESC');
                 //$this->db->where('loan_request.mpesa_phone=mpesa_transaction.mpesa_phone');
                //$this->db->order_by('added_date','DESC');
                $this->db->where('requested_date >=', $from);
                $this->db->where('requested_date <=', $to);
                $query = $this->db->get();
                
                return $query;
            }
            
            public function rejected()
            {
                $this->db->select('*');
                $this->db->from('customer,loan_rejected,loan_officer');
                $this->db->where('loan_rejected.customer_id=customer.customer_id_number');
                $this->db->where('loan_officer.officer_email=customer.loan_officer_email');
                $this->db->where('loan_status', 4);
                 $this->db->order_by('rejected_time', 'DESC');
                $query = $this->db->get();
                
                if($query->num_rows()>0)
                {
                
                    return $query;
                
                }
                else
                {
                    return FALSE;
                }
            }
            public function summary()
            {
                 $sum=$this->db->query("select sum(principal) as summation from loan");
                 return $sum;
            }
            public function active()
            {
                $this->db->select('*');
                $this->db->from('customer,loan');
                $this->db->where('customer.loan_status',6);
                $this->db->where('loan.customer_id=customer.customer_id_number');
                // $this->db->where("$date_due>$current_date");
                $query = $this->db->get();
                
                return $query;
            }
            
            
            
            
            public function approve_process($idnumber)
            {
                
               $this->db->query("UPDATE customer SET loan_status=3 WHERE customer_id_number='$idnumber'");
                $this->db->close();
            }
            
             public function updatecustomer($phone)
            {
                
               $this->db->query("UPDATE customer SET loan_status=1 WHERE customer_phone='$phone'");
               $this->db->close();
            }
            
            public function updateloanrequest($id)
            {
                
               $this->db->query("UPDATE loan_request SET completed_status=1 WHERE request_id='$id'");
               $this->db->close();
            }
            
             public function updateloanrequest_special($id)
            {
                
               $this->db->query("UPDATE loan_request SET completed_status=1,cleared_status=1 WHERE request_id='$id'");
               $this->db->close();
            }
             public function update_mpesacode($max_id,$refno)
            {
                $this->db->query("UPDATE loan_request SET mpesa_disbursed_code='$refno' WHERE request_id='$max_id'");
            }
            
            public function approve_reject($idnumber)
            {
                $this->db->query("UPDATE customer SET loan_status=4 WHERE customer_id_number='$idnumber'");
            }
            
             public function display_approve()
            {
                $this->db->select('*');
                $this->db->from('customer,loan_officer,loan_request,location,loan_status,product');
                $this->db->where('loan_officer_email=officer_email');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('product.product_id=loan_request.product_id');
                $this->db->where('customer.location_id=location.location_id');
                $this->db->where('customer.loan_status=loan_status.loan_id');
                $this->db->where('loan_request.status=', NULL);
                $this->db->where('loan_status', 2);
                $query = $this->db->get();
                
                if($query->num_rows()>0)
                {
                
                    return $query;
                
                }
                else
                {
                    return FALSE;
                }
            }
             public function request_count()
            {
                $this->db->select('*');
                $this->db->from('customer,loan_officer,loan_request,location,loan_status,product');
                $this->db->where('loan_officer_email=officer_email');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('product.product_id=loan_request.product_id');
                $this->db->where('customer.location_id=location.location_id');
                $this->db->where('customer.loan_status=loan_status.loan_id');
                $this->db->where('loan_request.status=', NULL);
                $this->db->where('loan_status', 2);
                $query = $this->db->get();
                
                return $query->num_rows();
               
            }
            public function display_disburse()
            {
                $this->db->select('*');
                $this->db->from('customer,loan_officer,loan_request,location,loan_status,product');
                $this->db->where('loan_officer_email=officer_email');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('product.product_id=loan_request.product_id');

                $this->db->where('customer.location_id=location.location_id');
                $this->db->where('customer.loan_status=loan_status.loan_id');
                $this->db->where('loan_request.approved_status!=',NULL);
                $this->db->where('loan_request.mpesa_disbursed_code=',NULL);

                $this->db->where('loan_status', 3);
                $query = $this->db->get();
                
                if($query->num_rows()>0)
                {
                
                    return $query;
                
                }
                else
                {
                    return FALSE;
                }
            }
            
            public function disburse_count()
            {
                $this->db->select('*');
                $this->db->from('customer,loan_officer,loan_request,location,loan_status,product');
                $this->db->where('loan_officer_email=officer_email');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('product.product_id=loan_request.product_id');

                $this->db->where('customer.location_id=location.location_id');
                $this->db->where('customer.loan_status=loan_status.loan_id');
                $this->db->where('loan_request.approved_status!=',NULL);
                $this->db->where('loan_request.mpesa_disbursed_code=',NULL);

                $this->db->where('loan_status', 3);
                $query = $this->db->get();
                
                return $query->num_rows();
            }
             public function mpesa_statement($phone,$from,$to)
            {
               
               
                $query = $this->db->query("SELECT mpesa_amount AS pesa,mpesa_phone AS phone,mpesa_code AS code,mpesa_date AS dato,mpesa_type FROM mpesa_transaction WHERE mpesa_phone=$phone AND mpesa_date>='$from' AND mpesa_date<='$to' UNION"
                        . " SELECT received_amount  AS pesa,received_phone AS phone,received_transaction_id AS code,received_date AS dato,mpesa_type FROM mpesa_received WHERE received_phone=$phone AND received_transaction_id!='DUMMY' AND received_date>= '$from' AND received_date<='$to'  GROUP BY dato ORDER BY dato ASC");
                
                if($query->num_rows()>0)
                {
                
                    return $query;
                
                }
                else
                {
                    return FALSE;
                }
            }
            
            public function display_awaiting_disburse()
            {
               $this->db->select('*');
                $this->db->from('customer,loan_officer,loan_request,location,loan_status,product');
                $this->db->where('loan_officer_email=officer_email');
                $this->db->where('customer.customer_id_number=loan_request.customer_id');
                $this->db->where('product.product_id=loan_request.product_id');

                $this->db->where('customer.location_id=location.location_id');
                $this->db->where('customer.loan_status=loan_status.loan_id');
                $this->db->where('loan_request.approved_status!=',NULL);
                 $this->db->where('loan_request.completed_status=',0);

                $this->db->where('loan_status', 3);
                $query = $this->db->get();
                
                if($query->num_rows()>0)
                {
                
                    return $query;
                
                }
                else
                {
                    return FALSE;
                }
            }
            
            public function get_offi()
            {
                $query=$this->db->query('SELECT * FROM loan_officer');
                //$this->db->from('loan_officer');
               // $query = $this->db->get();
                return $query;
            }

            public function insert_uploads($data) {

            $this->db->insert('tbl_files', $data);

          

          }
            
           
            
             public function get_officers()
            {
                $query=$this->db->query('SELECT COUNT(customer.loan_officer_email) as count,officer_id,officer_fname,officer_lname,officer_nationalid,officer_phone,officer_email FROM loan_officer LEFT JOIN customer ON customer.loan_officer_email=loan_officer.officer_email GROUP BY loan_officer.officer_email');
                //$this->db->from('loan_officer');
               // $query = $this->db->get();
                return $query;
            }
            
       }