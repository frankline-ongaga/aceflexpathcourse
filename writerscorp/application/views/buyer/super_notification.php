<?php include 'header.php'; ?>       
        <div class="page light">
            <div class="content-wrapper animatedParent animateOnce">
                <div class="container">
                  <div class="row">
                  <div class="col-md-3">
                    <section class="p-t-20">
                        <?php include 'buyer_menu.php' ?>
                      </section>
                  </div>
                  <div class="col-md-9" style="background: white; margin-top: 20px;">

                 
                    <section class="p-t-20">
                    <div class="row">
                       <div class="col-md-12">
                       <h3><?php if(isset($notification_title)){ echo $notification_title;  } ?></h3>

                       <div class="alert alert-info">
                          <?php if(isset($notification_message)){ echo $notification_message;  } ?>
                       </div>
                       <a href="<?php if(isset($notification_url)){ echo $notification_url;  } ?>">
                          <button class="btn btn-success"><?php if(isset($notification)){ echo $notification;  } ?> </button>

                      </a>
                          
                     </div>
                    </div>
                   </section>
                 </div> <!-- end of tab-->
                 </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>       