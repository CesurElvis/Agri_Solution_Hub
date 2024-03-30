<?php $this->view('header') ?>
<?php $this->view('nav') ?>



<!--EDITING-->
<div class="container" style="margin-top:8rem !important; ">
    <div class="row ">
        <div class="col-md-3 card-cat">
            <?php if(!empty($rows)):?>
            <div class="mb-3" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;background-color:#fff;">
                <div class=" card-body text-center p-2">
                    <div class="fw-bold text-center mt-2 mb-4 text-primary">SELECT CATEGORIES</div>
                    <a href="<?php echo ROOT?>/shop"><div class="btn btn-secodary mb-2">All</div></a>
                    <?php foreach($rows as $category):?>
                    <a href="<?php echo ROOT?>/shop/products/<?php echo esc($category->slug)?>"><div class="btn btn-secodary mb-2" ><?php echo esc($category->category_name) ?? ''?></div></a>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endif;?>
            <?php if(!empty($old_product)):?>
            <div class="card card-categories" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
            <div class="fw-bold text-center text-success mt-2 mb-2">Other Products</div>
                <div class="card-body text-center p-2">
                    <?php foreach($old_product as $pro):?>
                    <div class="btn btn-secodary mb-2"><?php echo esc($pro->product_name) ?? ''?></div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-9">

   
        <?php if(!empty($products)):?>
        <div class="row">
            <div class="text-center fw-bold text-primary">ALL PRODUCTS</div>
            <?php foreach($products as $product):?>
                
            <div class="col-md-4">
                <div class="card xol">
                        <div class="card-body text-start">
                            <img src="<?php echo esc($product->image)?>" alt="" class="img-fluid img-olx">
                            <div class="card-title text-center m-1">
                                <strong><?php echo esc($product->product_name) ?? "unknown"?></strong>

                                <p>
                                    <?php echo substr(trim(esc($product->description)),0,20)."..." ?? 'unknown'?>      
                                </p>
                            </div>
                            <div class="text-center">
                               <div> <strong><?php echo 'Ksh '.esc($product->price) ?? 'Free'?></strong></div>
                              <a  href="<?php echo ROOT?>/add_to_cart/<?php echo esc($product->id)?>"> <div oncliclk="cart.add(<?php echo $product->id ?>)" class="btn btn bg-warning " style="background-color: green !important; color:white;">ADD TO CART</div></a>
                            </div>
                        </div>
                    </div>
            </div>
            <?php endforeach;?>
        </div>
        <?php endif;?>
 
  

        



        </div>
    </div>



 
        <nav aria-label="Page navigation example " class="text-center ">
        <ul class="pagination  ">
             <li class="page-item "><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>


</div>


<!--END editing-->

            <script>
                var cart = {
                    add: function(id)
                    {
                        let obj={};
                        obj.data_type = "add";
                        obj.id = id;
                    
                    },
                }
               // alert(cart.add.obj);
            </script>

<?php $this->view('footer') ?>