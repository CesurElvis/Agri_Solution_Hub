<?php

class Contact extends Controller
{
    public function index()
    {
        $data = [];
     $data['title'] = 'Contact Us';
     
     if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['subject']) )
     {
       
        //SEND EMAIL
        $name = trim($_POST['name'])." :AgriTech-Online-Shop";
        $from=trim($_POST['email']);
        $to = "jackmutiso37@gmail.com" ;
        $subject = "AgriTech-Online-Shop ". trim($_POST['subject']);
        $message= trim($_POST['message']);
        if (!(filter_var($to, FILTER_VALIDATE_EMAIL) && filter_var($from, FILTER_VALIDATE_EMAIL))) 
        {
        		$data['errors']= "Email address inputs invalid";
        		 //die();
        } 
        
        $header = "From: " .  $name . " <" . $from . ">\r\nMIME-Version: 1.0\r\nContent-type: text/html\r\n";
        
        
        $retval = mail($to,$subject,$message,$header);
        
            if ($retval) 
            {
    		    $data['message'] = " Your message has been sent. Thank you!";
    		    //redirect('contact');
    		   
    	    }
    	    else 
    	    {
    		   $data['errors'] = "Email did not send. Error: " . $retval;
    	    }
        }
    
         

     
     
   
     
       $this->view('contact',$data);
    }

}