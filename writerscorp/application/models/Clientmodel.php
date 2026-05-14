<?php

 class Clientmodel extends CI_Model  
       {  
          
     
          function __construct()  
          {  
             // Call the Model constructor  
             parent::__construct();  
             
          }  
          
             public function  client_id($client_email)
             
               {
             
	             $this->db->select('cust_id,cust_email');
	             $this->db->from('tbl_customer');
	              $this->db->where('cust_email=',$client_email);
	             $query =$this->db->get();
	            foreach($query->result_array() AS $row) 
			{
			    $custid = $row['cust_id'];
			  
				             return  $custid ;
                        }
           
            }
            
             public function  client_name($client_email,$orderid)
             
               {
             
	             $this->db->select('*');
	             $this->db->from('tbl_customer,tbl_order,tbl_paperformat');
	              $this->db->where('cust_email=',$client_email);
	               $this->db->where('order_formatid=format_id');
	               $this->db->where('order_id=',$orderid);
	             $query =$this->db->get();
	            
			
	               return  $query;
                      
           
            }

            public function  edit_profile($id,$arr)
            {
               $this->db->where('cust_id=',$id);
               $this->db->update('tbl_customer',$arr);
               return $arr;


            }

            public function checkpasswordclient($data) {
            //$condition = "username =" . "'" . $datum['username'] . "' AND " . "password =" . "'" . $datum['password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_customer');
            $this->db->where('cust_id=',$data['user_id']);
            // $this->db->where('username=',$data['username']);
            $this->db->limit(1);
            
            $query = $this->db->get();
            
            foreach($query->result_array() as $row)
            {
               
              
               //$isPasswordCorrect = password_verify($data['admin_password'], $existingHashFromDb); 
               
               if($row['cust_pass']==$data['password'])
               {
                   return true;
               }
               else
               {
                   return false;
               }
            }

           
         }

            public function update_pass_client($id,$dasa)
            {
                $this->db->where('cust_id', $id);
                $this->db->update('tbl_customer',$dasa); 
            }

             public function  client_phone($client_email)
             
               {
             
	             $this->db->select('cust_phone,cust_email');
	             $this->db->from('tbl_customer');
	              $this->db->where('cust_email=',$client_email);
	             $query =$this->db->get();
	            
			foreach($query->result_array() AS $row) 
			{
			    $custphone = $row['cust_phone'];
			  
				             return  $custphone ;
                        }
           
            }
            
            public function process_orders($data)
          {
            $this->db->insert('tbl_order', $data);
            $order_id = $this->db->insert_id();
             
             
             return $order_id;
            
          }
         
          
           public function get_orders()
          {
             
             $this->db->select('*');
             $this->db->from('tbl_order');
             $query =$this->db->get();
             return $query;
           
          }
          
            public function   get_profile($client_email)
            {
            
                $this->db->select('*');
                $this->db->from('tbl_customer');
                 $this->db->where('cust_email=',$client_email);
                $query =$this->db->get();
                return $query;
            
            
            }
          
              public function  get_myorders($client_email)
          {
             
             $this->db->select('*');
             $this->db->from('tbl_customer,tbl_order,tbl_courselevel,tbl_discipline,tbl_essaytype');
               $this->db->where('order_custid=cust_id');
               $this->db->where('level_id=order_levelid');
               $this->db->where('order_disciplineid=discipline_id');
               $this->db->where('order_essaytypeid=essaytype_id');
              $this->db->where('cust_email=',$client_email);
               $this->db->order_by('posted_date',"desc");
             $query =$this->db->get();
             return $query;
           
          }                 
          
          public function login($data) {

            $condition = "cust_email =" . "'" . $data['client_email'] . "' AND " . "cust_pass =" . "'" . $data['client_password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_customer');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return true;
            } else {
            return false;
            }
            }
            
            public function read_user_information($client_email) 
            {

                $condition = "cust_email =" . "'" . $client_email . "'";
                $this->db->select('*');
                $this->db->from('tbl_customer');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                return $query->result();
                } else {
                return false;
                }
            }
          
          
         /* 
           public function transaction($data,$dara)
          {
          $this->db->trans_start();

        $this->db->query('INSERT INTO tbl_customer VALUES(dara[],field1,field2)');
        $table1_id = $this->db->insert_id();

        $this->db->query('INSERT INTO tbl_order VALUES(id,' . $table1_id . ',field2,field3)');

        $this->db->trans_complete(); 
        
          } */
          
       }      