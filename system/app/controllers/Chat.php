<?php


class Chat extends Controller{

    public function index()
    {
        if(!Auth::logged_in())
        {
            redirect('login');die;
        }

        $data = [];
        $refresh = true;
        $msg = "";
        $user_id = Auth::getId();
        $users = new User();
        $message = new Message();
        $sql = "select * from user where id != :id";

        $rows = $users->query($sql, ['id'=>$user_id]);

        if(is_array($rows))
        {
            $data['rows'] = $rows;
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == 'view')
        {
            $receiver = $_POST['recipient_id'] ?? "";
            $sql = "select * from user where id = :id limit 1";
            $result = $users->query($sql, ['id'=>$receiver]);
            if(is_array($result))
            {
                $sender = Auth::getID();
                $receiver = $receiver;
                $sql = "select * from messages where (sender = '$sender' &&  receiver = '$receiver' && deleted_sender = 0) || (receiver = '$sender' && sender = '$receiver' && deleted_receiver = 0)";
                $result2 = $message->query($sql);
                if(is_array($result2))
                {
                    foreach($result2 as $data)
                    {
                        $id = $data->sender;
                        $sql2 = "select * from user where id = :id limit 1";
                        $myuser = $users->query($sql2, ['id'=>$id]);
                        if($sender == $data->receiver)
                        {
                            $msg  .= message_left($data, $myuser);
                        }
                        else{
                            $msg .= message_right($data, $myuser);
                        }
                       // show($myuser);die;

                    }
                    
                }

                echo $msg;
                //show($result2);
                die;
            }
            

                
        //     $receiver = $_POST['recipient_id'] ?? "";
        //     $sender =Auth::getId();
        //     $sql = "select * from messages where (receiver = :receiver && sender = :sender) || (receiver = :sender && sender = :receiver) ";
        //     $result = $message->query($sql, ['receiver'=>$receiver, 'sender'=>$sender]);
        //     $msgg = '';
        //     if(is_array($result))
        //     {
        //         foreach($result as $mess)
        //         {
                    
        //             $msgid =  $mess->msg_id ;
        //             $sql = "select * from messages where msg_id = :msg_id order by id desc";
        //             $res = $message->where(['msg_id'=>$msgid]);
        //             if(is_array($res))
        //             {
        //                 $res = array_reverse($res);

        //                 foreach($res as $data)
        //                 {
                            
        //                     $myuser = $users->where(['id'=>$data->sender]);
        //                     if($sender == $data->sender)
        //                     {
                             
        //                         $msgg .= "";
        //                     }
        //                     else{
        //                         $msgg .="";
        //                     }
        //                 }
        //             }
                 
                    
        //         }
        //     }
        //   //show($result);

        //   echo $msgg;
        //    die;
            
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == 'send')
        {

            
            
            $receiver = $_POST['recipient_id'];
            $sender =Auth::getId();
            $arr['message'] = $_POST['message'];
            $arr['sender'] = $sender;
            $arr['receiver'] = $receiver;
            $arr['date'] = date('Y:m:d H:s:i');
            $msgID = generateRandomString(10);
            $arr['msg_id'] = $msgID;


            $sql = "select msg_id from messages where (receiver = :receiver && sender = :sender) || (receiver = :sender && sender = :receiver) order by msg_id limit 1";
            $respo = $message->query($sql,['receiver'=>$receiver, 'sender'=>$sender]);
            
            if(is_array($respo))
            {
               
                foreach($respo as $row)
                {
                    $arr['msg_id'] = $row->msg_id;
                    $msgID  = $row->msg_id;
                    
                }
            }
           
            $message->insert($arr);
            $sql33 = "select * from messages where msg_id = :msg_id && deleted_sender = 0 && deleted_receiver = 0 order by id desc";
            $read = $message->query($sql33,['msg_id' =>$msgID]);
            if(is_array($read))
            {
                
                $read = array_reverse($read);
                    foreach($read as $data)
                    {
                        $id = $data->sender;
                        $sql2 = "select * from user where id = :id limit 1";
                        $myuser = $users->query($sql2, ['id'=>$id]);
                        if($sender == $data->receiver)
                        {
                            $msg  .= message_left($data, $myuser);
                        }
                        else{
                            $msg .= message_right($data, $myuser);
                        }
                       // show($myuser);die;

                    }
                    

                echo $msg;
                //show($result2);
                die;

            }
       
           
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == 'delete')
        {
            $row_id = $_POST['row_id'];


            $sql = "select * from messages where id = :id limit 1";
            $result = $message->query($sql, ['id'=>$row_id]);
            if(is_array($result))
            {
                $sender = Auth::getID();
                $row = $result[0];
                if($sender == $row->receiver)
                {
                    $sql = "update messages set deleted_receiver = 1 where id = :id limit 1";
                    $message->query($sql, ['id'=>$row->id]);
                }
                if($sender == $row->sender)
                {
                    $sql = "update messages set deleted_sender = 1 where id = :id limit 1";
                    $message->query($sql, ['id'=>$row->id]);
                }
            }
           die;
        }


       

        return $this->view("chat", $data);
    }
}