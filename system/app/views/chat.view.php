<?php $this->view('header') ?>
<?php $this->view('nav') ?>


<section class="container text-danger  mt-5" style="bottom:5px; top:2px; position:fixed !important;">

    <div class="row "  >
        
            <div style=" box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; height: 490px; overflow-y: auto; scrollbar-width: none;"
                class="col-sm-4 mx-1 bg-warning" >
                <!--CRAD-->
                <?php if(!empty($rows)):?>
                <?php foreach($rows as $row):?>
                <div class="card" onclick="displayChat('<?php echo $row->id?>', '<?php echo $row->username ?>')">
                    <div class="card-body d-flex ">
                        <div class="rounded-circle bg-white" style="height:3rem !important; width:3rem !important;">
                            <img src="<?php echo ROOT ?>/assets/img/fruitnull.png" alt="" class="img-fulid rounded-circle"
                                style="object-fit:cover; height:3rem; width:3rem; border:solid lightgreen;">
                        </div>

                        <div class="m-auto"><?php echo esc($row->username)?></div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php else:?>
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-danger">Empty record</div>
                        </div>
                    </div>
                <?php endif;?>

            </div>
        
        <div style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;"
            class="col-sm-7 chatSection p-3" >

            <strong class="chatuser"></strong>

            <div style = "height:430px;" class="card ">
                <div style="height:420px; overflow:auto; scrollbar-width:none;" class="row gy-3 p-2 chat-section">
                
<!-- landing page chat-->

            <div class=" text-center h1 ">
               <span class="text-secondary "> <strong>Chat With Us.</strong></span> 
               <div  style="font-family:cursive;">
                <span class="text-primary">Agri_Solution_Hub</span> 
               <span style="color:#6610f2; "></span>
               </div>
              <!-- <div class="visible-logo">
                <img src="<?kphp echo ROOT ?>/assets/img/fruitnull.png" class="img-fluid" alt="">
               </div>-->
            </div>

                    <!-- <div class="col-sm-6 d-flex">
                        <div class="rounded-circle bg-white mx-1" style="height:3rem !important; width:3rem !important;">
                            <img src="<?php echo ROOT ?>/assets/img/fruitnull.png" alt="" class="img-fulid rounded-circle"
                                style="object-fit:cover; height:3rem; width:3rem; border:solid lightgreen;">
                        </div>

                        
                        <div style=" border-radius:10px;" class=" card-body mb-5 bg-info">
                        <strong class="text-light">jack </strong><br>
                        <span>hellllooo</span>
                        </div>
                    </div>

                    <div class="col-sm-6 d-flex">
                        
                        <div style=" border-radius:10px;" class="mx-1 card-body mt-5 bg-success">
                        
                        <strong class="text-light">jack </strong><br>
                            <span>
                            hello too
                            </span>
                            </div>
                        <div class="rounded-circle bg-white mt-5" style="height:3rem !important; width:3rem !important;">
                        <img src="<?php echo ROOT ?>/assets/img/fruitnull.png" alt="" class="img-fulid rounded-circle"
                            style="object-fit:cover; height:3rem; width:3rem; border:solid lightgreen;">
                        </div>
                    </div> 
                    <div class="col-sm-12 d-flex bg-dark ">
                        
                        <div style=" border-radius:10px; max-width:50%;" class="bg-warning float-right ms-auto card-body mt-5 bg-success">
                        
                        <strong class="text-light">jack </strong><br>
                            <span>
                            hello too
                            </span>
                            </div>
                        <div class="rounded-circle bg-white mt-5" style="height:3rem !important; width:3rem !important;">
                        <img src="<?php echo ROOT ?>/assets/img/fruitnull.png" alt="" class="img-fulid rounded-circle"
                            style="object-fit:cover; height:3rem; width:3rem; border:solid lightgreen;">
                        </div>
                    </div> 
                    <div class="col-sm-12 d-flex bg-dark ">
                        
                        <div style=" border-radius:10px; max-width:50%;" class="bg-warning float-right ms-auto card-body mt-5 bg-success">
                        
                        <strong class="text-light">jack </strong><br>
                            <span>
                            hello too
                            </span>
                            </div>
                        <div class="rounded-circle bg-white mt-5" style="height:3rem !important; width:3rem !important;">
                        <img src="<?php echo ROOT ?>/assets/img/fruitnull.png" alt="" class="img-fulid rounded-circle"
                            style="object-fit:cover; height:3rem; width:3rem; border:solid lightgreen;">
                        </div>
                    </div> 
                    <div class="col-sm-12 d-flex bg-dark ">
                        
                        <div style=" border-radius:10px; max-width:50%;" class="bg-warning float-right ms-auto card-body mt-5 bg-success">
                        
                        <strong class="text-light">jack </strong><br>
                            <span>
                            hello too
                            </span>
                            </div>
                        <div class="rounded-circle bg-white mt-5" style="height:3rem !important; width:3rem !important;">
                        <img src="<?php echo ROOT ?>/assets/img/fruitnull.png" alt="" class="img-fulid rounded-circle"
                            style="object-fit:cover; height:3rem; width:3rem; border:solid lightgreen;">
                        </div>
                    </div>  -->
                </div>

            </div>
            <div class="form-control d-flex">
                <div style="width:90%;"><input type="text" class="form-control message" placeholder="Type your message..."></div>
                <div style="width:10%;"><input type="button"  onclick = "send()" value="send"class="btn btn-info"></div>
            </div>
        </div>
    </div>
</section>
<?php //$this->view('footer') ?>

<script>


var chatSection =document.querySelector(".chat-section");
setTimeout(function(){
  
  chatSection.scrollTo(0, chatSection.scrollHeight);
},0);



    let recipient_id = "";
    function displayChat(user_id, username)
    {

        
        recipient_id = user_id;
        var chatSection = document.querySelector(".chatuser");
        chatSection.innerHTML = username;
        var obj = {};
        obj['recipient_id'] = user_id;
        obj['action'] = 'view';

        
        send_data(obj);
    }
    function delmsg(e)
    {
        console.log(e);
        var id = e.target.getAttribute("id");
        console.log(id);
        sendDelete(id);
    }
    function sendDelete(id)
    {
      
        var obj = {};
    
        obj['row_id'] = id;
        obj['action'] = 'delete';

        var xml = new XMLHttpRequest();
        var form = new FormData();
        for (key in obj) {
            form.append(key, obj[key]);
        }
        xml.addEventListener('readystatechange', function () {

            if (xml.readyState == 4) {
                if (xml.status == 200) {

                var chatSection =document.querySelector(".chat-section");
                setTimeout(function(){
                chatSection.scrollTo(0, chatSection.scrollHeight);
                },0);
                    //console.log(xml.responseText)
                    
              
                    //window.location.reload();

                }

            }
        });
        xml.open('post', '<?php echo ROOT?>/chat', true);
        xml.send(form);
        
    
    }
    function send()
    {
        
        var msg = document.querySelector(".message").value;

        var obj = {};
        if(msg.length < 1)
        {
            return;
        }
        obj['message'] = msg;
        obj['recipient_id'] = recipient_id;
        obj['action'] = 'send';
        
        send_data(obj);
    }


    function send_data(obj) {
        var xml = new XMLHttpRequest();
        var form = new FormData();
        for (key in obj) {
            form.append(key, obj[key]);
        }
        xml.addEventListener('readystatechange', function () {

            if (xml.readyState == 4) {
                if (xml.status == 200) {
                    //handle_result(xml.responseText)
                    document.querySelector(".chat-section").innerHTML = xml.responseText ;
                    //console.log(xml.responseText)
                    var chatSection =document.querySelector(".chat-section");
                setTimeout(function(){
                
                chatSection.scrollTo(0, chatSection.scrollHeight);
                },0);
                    //window.location.reload();

                }

            }
        });
        xml.open('post', '<?php echo ROOT?>/chat', true);
        xml.send(form);
    }

    function handle_result(result)
    {
        result = JSON.parse(result);
        result.forEach(user => {
            console.log("Username:", user.username);
    console.log("Email:", user.email);
    
    // var chatSection = document.querySelector(".chatuser");
    // chatSection.innerHTML = user.username;
    });
    }


</script>