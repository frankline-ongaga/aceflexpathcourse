<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    function __construct() {

        $this->tableName = 'tbl_user';
        $this->primaryKey = 'user_id';

    }

     public function send_mail($to,$subject,$message)
  {

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
      $this->email->to($to); 

      $this->email->subject($subject);
      $this->email->message($message);  

      // Set to, from, message, etc.

      //$this->load->library('encrypt');

      $result = $this->email->send();



    }


   


   public function current_time()
  {

     date_default_timezone_set('Africa/Nairobi'); 
     return date("Y-m-d H:i:s");

  }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        if(!empty($userData)){



            
           
            //check whether user data already exists in database with same oauth info
            $this->db->select($this->primaryKey);
            $this->db->from($this->tableName);
            $this->db->where(array('user_login_type'=>$userData['user_login_type'], 'user_oauth_uid'=>$userData['user_oauth_uid'],'user_authority'=>$userData['user_authority']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0){

                 

                $prevResult = $prevQuery->row_array();

                 
                  
                  $aggy['user_fname']=$userData['user_fname'];
                  $aggy['user_id']=$prevResult['user_id'];
                  $aggy['user_email']=$userData['user_email'];
                  $aggy['user_login_type']=3;

                 //  $this->log_user_activity($aggy);
                
                //update user data
                $userData['user_modified'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('user_id' => $prevResult['user_id']));
                
                //get user ID
                $userID = $prevResult['user_id'];
            }else{
                //insert user data
               



                $userData['user_added']  = date("Y-m-d H:i:s");
                //$userData['user_change'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert($this->tableName, $userData);
                
                //get user ID
                $userID = $this->db->insert_id();

                $this->db->select('user_fname,user_email');
                $this->db->from('tbl_user');
                $this->db->where('user_id',$userID);
                $query = $this->db->get();
                foreach($query->result_array() as $row)
                 {
                    $fname=$row['user_fname'];
                    $email=$row['user_email'];
                    $subject="#Welcome to 99 Content";
                    $message="Hi $fname, welcome to 99 Content. Start purchasing quality papaers.<br>
                   
                    <br>
                    Kind regards. <br>
                    99 Content Team.

                     ";


                   $this->send_mail($email,$subject,$message);
                     
                 }


            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
}

?>