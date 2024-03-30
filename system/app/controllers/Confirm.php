<?php

class Confirm extends Controller
{
    public function index()
    {
 

        
        header("Content-Type: application/json");

        $response = [
            "ResultCode" => 0, 
            "ResultDesc" => "Confirmation Received Successfully"
        ];
 
        // DATA
        
        $mpesaResponse = file_get_contents('php://input');
 
        // log the response
        $logFile = time()."M_PESAConfirmationResponse.txt";
 
        // write to file
        $log = fopen($logFile, "a");
        fwrite($log, $mpesaResponse);
        fclose($log);
 
        echo json_encode($response);
     
        $res = json_decode($mpesaResponse);
       // show($res);die;
      
         $db= new Db();
      
        $sql = "SELECT * FROM orders ORDER BY ID DESC LIMIT 1";
        $s = $db->query($sql);
 
      if(is_array($s))
      {
        foreach($s as $row)
         {
             
             $id =  $row->order_id;
        }
      }

       
        if($res->Body->stkCallback->ResultCode == '1032'){
            
         
            
            $arr = array();
            
            $arr['status'] = 'canceled';
            $arr['order_id']= $id;
            $sql = "UPDATE payments SET status = :status WHERE order_id = :order_id";
            $db->query($sql, $arr);
            
   
        }else{
             $arr = array();
             
            $arr['status'] = 'success';
            $arr['order_id']= $id;
           
           
            
            $sql = "UPDATE payments SET 
            status = :status WHERE order_id = :order_id";
            $db->query($sql, $arr);
        
           
        }
       
    }
}
