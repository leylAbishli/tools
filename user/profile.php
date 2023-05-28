<?php require_once('../config.php'); ?>
<?php require "../includes/header.php"; ?>

<section>
<div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="<?php echo base_url . $_SESSION['userdata']['avatar'] ?>" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                    <h5 class="mt-2 mb-0"><?php echo $_SESSION['userdata']['firstname'] ;?></h5>
                    <h5 class="mt-2 mb-0"><?php echo $_SESSION['userdata']['lastname'] ;?></h5>
                    </div>
                    <span>UI/UX Designer</span>
                    
             
                    
                     <ul class="social-list">
                     <i class="fa-brands fa-facebook"></i>
                     <i class="fa-brands fa-instagram"></i>
                     <i class="fa-brands fa-linkedin-in"></i>
                    </ul>
                    
                    <div class="buttons">
                        
                        <button class="btn btn-outline-primary px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-3">Contact</button>
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
</section>


<?php require "../includes/footer.php"; ?>