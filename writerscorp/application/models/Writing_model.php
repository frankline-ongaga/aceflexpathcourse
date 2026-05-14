<?php



 class Writing_model extends CI_Model  

       {  

          function __construct()  

          {  

             // Call the Model constructor  

             parent::__construct();  

             

          }  

          

           public function email_exists($email) {

         $this->db->select('cust_email');

          $this->db->from('tbl_customer');

            $this->db->where('cust_email=',$email);

            $query =$this->db->get();

        if ($query->num_rows() == 1) {

            return TRUE;

        } else {

            return FALSE;

        }

    }

             public function get_previous()
            {

               $this->db->select('*');

               $this->db->from('tbl_previous');

              $this->db->order_by('date','DESC');

               $this->db->limit(3);

               $query = $this->db->get();

               return $query;

            }



          

           public function home_high_table()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','1d');

             $query =$this->db->get();

             

             return $query;

           

          }

           public function get_price($deadline,$level)

          {

             

             $this->db->select('price');

             $this->db->from('tbl_pricing');

             $this->db->where('deadline_id=',$deadline);
             $this->db->where('level_id=',$level);

             $query =$this->db->get();

             

             return $query->row()->price;

           

          }

          public function sample_configuration()

          {

              $config = array(
                'field' => 'sample_slug',
                'title' => 'sample_title',
                'table' => 'tbl_sample',
                'id' => 'sample_id',
              );
              $this->load->library('slug', $config);

          }

          public function add_slug($id)

          {

           $this->sample_configuration();

            $$data = array(
              'title' => 'My Test',
            );
            $data['uri'] = $this->slug->create_uri($data);
            $this->db->insert('tbl_sample', $data);

           

          }


           public function edit_slug()

          {
           $id=2;
           $this->sample_configuration();

            $data = array(
              'sample_title' => 'Role of Nurses in Healthcare Delivery',
            );
            $data['sample_slug'] = $this->slug->create_uri($data, $id);
            $this->db->where('sample_id', $id);
            $this->db->update('tbl_sample', $data);

           

          }


            public function deadline()

          {


             $this->db->select('*');

             $this->db->from('tbl_draftdeadline');

             

             $query =$this->db->get();

             

             return $query;


          }


           public function calculation()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_calculation');

             

             $query =$this->db->get();

             

             return $query;

           

          }

            public function home_high()

          {

             $this->db->limit(7);  // P

             $this->db->select('*');

             $this->db->from('tbl_price');

              //$this->db->where('level_deadline=','1d');

             $query =$this->db->get();

             

             return $query;

           

          }

           public function home_high_js()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','1d');

             $query =$this->db->get();

             

             return $query;

           

          }

           public function undergrad_lower_js()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','1d');

             $query =$this->db->get();

             

             return $query;

           

          }



          public function get_customer_id($email)

          {

             

             $this->db->select('*');

             $this->db->from('tbl_customer');

             $this->db->where('cust_email=',$email);

             $query =$this->db->get();

             

              foreach($query->result_array() as $row)

            {



                return $row['cust_id'];

            }

           

          }

           public function undergrad_higher_js()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','1d');

             $query =$this->db->get();

             

             return $query;

           

          }

           public function masters_js()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','1d');

             $query =$this->db->get();

             

             return $query;

           

          }

          public function doctoral_js()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','1d');

             $query =$this->db->get();

             

             return $query;

           

          }

          public function onemonth()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','30d');

             $query =$this->db->get();

             

             return $query;

           

          }

          

           public function  client_name($client_email,$orderid)

             

               {

             

               $this->db->select('*');

               $this->db->from('tbl_customer,tbl_order,tbl_paperformat');

                $this->db->where('cust_email=',$client_email);

                 $this->db->where('cust_email=',$client_email);

                  $this->db->where('order_formatid=format_id');

                 $this->db->where('order_id=',$orderid);

               $query =$this->db->get();

              

      

                 return  $query;

                      

           

            }

          

           public function undergrad_lower_table()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','8h');

             $query =$this->db->get();

             

             return $query;

           

            

           

          }

           public function undergrad_lower()

          {

              $this->db->limit(7);

             $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','8h');

             $query =$this->db->get();

             

             return $query;

           

            

           

          }

          

           public function undergrad_higher_table()

          {

             

              $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','2d');

             $query =$this->db->get();

             

             return $query;

           

          }

           public function undergrad_higher()

          {

              $this->db->limit(7);

              $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','2d');

             $query =$this->db->get();

             

             return $query;

           

          }

          

           public function dropdown()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_essaytype');

             $query =$this->db->get();

             return $query;

           

          }


          public function get_samples()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_sample,tbl_courselevel,tbl_paperformat');

             $this->db->where('tbl_sample.sample_academic_level=tbl_courselevel.level_id');

              $this->db->where('tbl_sample.sample_style=tbl_paperformat.format_id');
               $this->db->where('tbl_sample.status=',0);

             $query =$this->db->get();

             

             return $query;

           

          }

          

          

           public function masters_table()

          {

             

                $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','3d');

             $query =$this->db->get();

             

             return $query;

           

          }

          

          public function masters()

          {

              $this->db->limit(7);

                $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','3d');

             $query =$this->db->get();

             

             return $query;

           

          }

          

           public function doctoral_table()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','5d');

             $query =$this->db->get();

             

             return $query;

           

          }

          public function doctoral()

          {

              $this->db->limit(7);

             $this->db->select('*');

             $this->db->from('tbl_price');

             // $this->db->where('level_deadline=','5d');

             $query =$this->db->get();

             

             return $query;

           

          }

          

          

          public function sevendays()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','7d');

             $query =$this->db->get();

             

             return $query;

           

          }

           public function fourteendays()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_price');

              $this->db->where('level_deadline=','14d');

             $query =$this->db->get();

             

             return $query;

           

          }

          

           public function typeofpaper()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_essaytype');

             $query =$this->db->get();

             return $query;

           

          }

          public function discipline()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_discipline');

             $query =$this->db->get();

             return $query;

           

          }

           public function format()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_paperformat');

             $query =$this->db->get();

             return $query;

           

          }

           public function level()

          {

             

             $this->db->select('*');

             $this->db->from('tbl_courselevel');

             $query =$this->db->get();

             return $query;

           

          }

           public function process_orders($data)

          {

            $this->db->insert('tbl_order', $data);

            $order_id = $this->db->insert_id();

             

             

             return $order_id;

            

          }

           public function customer_details($dara)

          {

            $this->db->insert('tbl_customer', $dara);

             $table_id = $this->db->insert_id();

             

             

             return $table_id;

          }

          

          

          

             public function updateTransaction($data)

             {

                      

                      $custom= $data['item_number']; 

                      $transactionid =$data['txn_id'];

                       $status =$data['status'];

        

                         $gross=$data['payment_amt'];

                      

      

              



                         

                    $query=$this->db->query("SELECT * FROM tbl_order WHERE order_id='$custom'");

                            

                          

                        if ($query->num_rows() > 0)

                        {

                          



                            $this->db->query("UPDATE tbl_order SET order_payeramount='$gross',order_transactionid='$transactionid',order_paymentstatus='$status' WHERE order_id='$custom'");



                                   

                                

                        } 

  

             

             

             

             

             

          }

          

           public function updatepesapal($data)

             {

                      

                      $custom= $data['pesapalMerchantReference']; 

                      $transactionid =$data['pesapalTrackingId'];

                       $status =$data['pesapalNotification'];

        

                         //$gross=$data['payment_amt'];

                      

      

              



                         

                    $query=$this->db->query("SELECT * FROM tbl_order WHERE order_id='$custom'");

                            

                          

                        if ($query->num_rows() > 0)

                        {

                          



                            $this->db->query("UPDATE tbl_order SET order_transactionid='$transactionid',order_paymentstatus='$status' WHERE order_id='$custom'");



                                   

                                

                        } 

  

             

             

             

             

             

          }

          

        

           public function transaction($data,$dara)

          {

          $this->db->trans_start();



        $this->db->query('INSERT INTO tbl_customer VALUES(dara[],field1,field2)');

        $table1_id = $this->db->insert_id();



        $this->db->query('INSERT INTO tbl_order VALUES(id,' . $table1_id . ',field2,field3)');



        $this->db->trans_complete(); 

        

         

          

       } 

       }     