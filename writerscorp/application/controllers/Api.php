<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {


    function __construct(){
        
        parent::__construct();
        ini_set('memory_limit', '-1');
       $this->load->helper(array('form','url', 'json_output_helper'));
        $this->load->database();

        $this->load->library('form_validation');
        $this->load->library('session');
       
        //sandbox apikey 8242d272b975387900956673362a0d421219be18c4baeaa272dc26e5f4527ebf
        // To allow for big files upload
        ini_set('upload_max_filesize','0M');
        ini_set('post_max_size','0M');


    }
    
     public function get_categories_content()
    {
      
       $categoryid=$this->uri->segment(3);
       if($categoryid==1)
       {
         //news
         $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=6";
         $title="Getting Started";
       }
        if($categoryid==2)
       {
         //entertainment
         $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=8";
         $title="Using the Education through Listening facilitation approach";
       }
        if($categoryid==3)
       {
         //sport
         $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=10";
         $title="How to use this SGC tool";
       
       }
        if($categoryid==4)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=15";
         $title="Introduction to Motherhood";
       }
       if($categoryid==5)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=21";
         $title="Signs of Pregnancy";
       }
       if($categoryid==6)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=27";
         $title="Where and when to get ANC check up?";
       }
        if($categoryid==7)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=35";
         $title="Birth Plan";
       }
       if($categoryid==8)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=44";
         $title="Danger Signs";
       }
        if($categoryid==9)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=48";
         $title="Risks of not delivering in Hospital";
       }
        if($categoryid==10)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=51";
         $title="Breast Feeding";
       }
        if($categoryid==11)
       {
         //business
           $currenturl="http://safe.writers-corp.net/wp-json/wp/v2/posts/?include=55";
         $title="Care of Mother and Baby after Delivery";
       }
        $jazz=array();
        $url="$currenturl";
        $ch = curl_init();
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);               
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt( $ch, CURLOPT_CAINFO, $url );
        // Execute
        $resul=curl_exec($ch);
        $data=json_decode($resul,true);
        $jazz[0]['title']=$title;
        $jazz[0]['content']=$data[0]['content']['rendered'];
       


      
         
     
        
      
          $status_array= array("fetch_status" =>"0");

          $complete=array_values($jazz);
          $error=array_values($status_array);
        
         json_output($complete, $error, JSON_UNESCAPED_SLASHES);
       
       
        
     
    }
}