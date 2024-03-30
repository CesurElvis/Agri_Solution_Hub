<?php $this->view('header') ?>
<?php $this->view('nav') ?>

<style>
    .order-details {
        color: #6e93ce;
        background-color: #eee;
        width: 100%;
        position: absolute;
        left: 0px;
       
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        z-index: 200 !important;

    }

    .hide {
        display: none;
    }
</style>
<div class="container px-5 " style="margin-top:8rem; margin-bottom:8rem;">

    <div class="row gy-5">
        <!--PROFILE DATA-->
        <div class="col-md-5">

            <?php if(!empty($_SESSION['USER_INFO'])):?>
            <div class="card p-3 mb-4 text-center"
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                <div class="text-center  mx-auto">
                    <div>MY ACCOUNT</div>
                    <div class="rounded-circle bg-white" style="height:3rem !important; width:3rem !important;">
                        <img src="<?php echo ROOT ?>/assets/img/fruitnull.png" alt=""
                            class="img-fulid rounded-circle"
                            style="object-fit:cover; height:3rem; width:3rem; border:solid lightgreen;">
                    </div>
                </div>
                <div class="d-flex ">
                    <div class="text-start">
                        <div>NAME:<span class="text-primary"><?php echo "  ". esc(Auth::getUsername()) ?? '' ?></span></div>
                        <div>Email:<span class="text-primary"><?php echo "  ".esc(Auth::getEmail()) ?? ''?></span></div>
                        <div>Member Since</div>
                        <div><?php echo esc(Auth::getDate()) ?? ''?></div>
                        <div class="bi bi-pen text-primary p-2 mt-3">Edit</div>
                    </div>
                    <div class="ms-auto">
                        <div>Post Product</div>
                        <div><a href="<?php echo ROOT ?>/dashboard/products"><i class="bi bi-upload"></i></a></div>
                    </div>
                </div>

            </div>

        </div>
        <?php endif; ?>
        <!--END PROFILE DATA-->
        <div class="col-md-12">

            <?php if(is_array($orders)):?>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Order no:</th>
                            <th>Order Date</th>
                            <th>delivery Address</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>...</th>

                        </tr>
                    </thead>
                    <tbody onclick="show(event)" style="height:20rem;">
                        <?php foreach($orders as $order): ?>
                        <tr style="position:relative;">
                            <td><?php echo $order->order_id?></td>
                            <td><?php echo date("jS m Y h:i a",strtotime($order->date))?></td>
                            <td><?php echo $order->delivery_address?></td>
                            <td><?php echo $order->phone?></td>
                            <td><?php echo $order->state?></td>
                            <td><?php echo "Ksh ". number_format($order->total,2)?></td>
                            <td><?php echo is_paid($order) ?? ""?></td>
                            <td>
                                <i class="bi  bi-arrow-down "></i>
                                <div class="js-details order-details hide   ">
                                    <div style="float:right !important; cursor:pointer;"><i
                                            class="bi bi-x-lg text-primary h-3"></i></div>
                                    <?php if(is_array($order->details) && isset($order->details)):?>
                                        <div><?php echo "ORDER #". $order->id?></div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order No</th>
                                                <th>Qty</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        

                                            <tbody>
                                                <?php foreach($order->details as $detail): ?>
                                                <tr class="bg-light">
                                                    
                                                    <td><?php echo esc($detail->order_id)?></td>
                                                    <td><?php echo esc($detail->qty)?></td>
                                                    <td><?php echo esc($detail->description)?></td>
                                                    <td><?php echo "Ksh ". number_format($detail->total,2)?></td>
                                                    
                                                </tr>
                                                <?php endforeach;?>
   
                                                    <div  >Grand Total: <?php echo  "Ksh ". number_format($order->grand_total,2)?></div>
                                               
                                            </tbody>


                                        


                                    </table>
                                    <?php else:?>
                                    <div>no order details</div>
                                    <?php endif;?>

                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>

                </table>
            </div>
            <?php else:?>
            <div class="text-center">This user has no orders yet</div>
            <?php endif;?>
        </div>
    </div>
</div>

<script>
    function show(e) {
        var row = e.target.parentNode;

        if (row.tagName != "TR") {
            row = row.parentNode;
        }
        var details = row.querySelector(".js-details");
        var all = e.currentTarget.querySelectorAll('.js-details');
        for (let i = 0; i < all.length; i++) {
            if (all[i] != details) {
                all[i].classList.add("hide");
            }


        }
        if (details.classList.contains('hide')) {
            details.classList.remove("hide");
        } else {
            details.classList.add("hide");
        }

    }
</script>


<?php $this->view('footer') ?>