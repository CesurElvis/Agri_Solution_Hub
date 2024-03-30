
<?php

class Ajax_cart extends Controller
{
    public function index()
    {
        
    }
    public function edit_qty($data='')
    {
        $obj = json_decode($data);

     
        $qty = esc($obj->qty);
        $id = esc($obj->id);
     
        if(isset($_SESSION['CART'])) 
        {
            foreach($_SESSION['CART'] as $key => $item)
            {
                if($item['id'] ==  $id)
                {
                    if( $_SESSION['CART'][$key]['qty'] >=2)
                    {
                        $_SESSION['CART'][$key]['qty'] = (int)$qty;
                    }
                    else{
                         $_SESSION['CART'][$key]['qty']=1;
                    }
                    
                    break;
                }
            
            }
        }

        $obj->data_type = "edit_qty";
        echo json_encode($obj);
    }
    public function remove($data='')
    {
        $obj = json_decode($data);

     
        $id = esc($obj->id);

        if(isset($_SESSION['CART']))
        {
            foreach($_SESSION['CART'] as $key => $item)
            {
                if($item['id'] == $id)
                {
                    unset($_SESSION['CART'][$key]);
                    $_SESSION['CART'] = array_values($_SESSION['CART']);
                    break;
                }
                
            }

        }


        $obj->data_type = "remove";
        echo json_encode($obj);
    }
}