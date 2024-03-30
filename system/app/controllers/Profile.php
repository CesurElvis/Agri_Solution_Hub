
<?php

class Profile extends Controller
{
    public function index()
    {
         if(!Auth::logged_in())
              {
                redirect('login');die;
              }

        if(!Auth::logged_in())
        {
            redirect('login');die;
        }
        $user_id = '';
        if(isset($_SESSION['USER_INFO']->id))
        {
            $user_id = $_SESSION['USER_INFO']->id;
        }
        $order = new Order();
        
        $orders = $order->getOrders_by_users($user_id );
  
        if(is_array($orders))
        {
            foreach($orders as $key => $row) {
              
               $details = $order->getOrders_details($row->order_id);
               $total = array_column($details,'total');
               $grand_total = array_sum($total);

               $orders[$key]->details = $details;
               $orders[$key]->grand_total = $grand_total ;
            }
        }

 
        $data['orders'] = $orders;
        $data['title'] = 'Profile';
       $this->view('profile',$data);
    }

}