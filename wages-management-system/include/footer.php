<!-- start footer -->



<footer class="container-fluid bg-dark text-center fixed-bottom p-2">
  <small class="text-white">Copyright &copy; 2020 || Designed By My Team || <a href="#" data-toggle="modal" data-target="#adminLogin" style="text-decoration: none;">Admin Login</a></small>
</footer>

<!-- End footer  -->

<!-- Start Client Registration Model -->
<!-- Modal -->
<div class="modal fade" id="ClientReg" tabindex="-1" role="dialog" aria-labelledby="ClientRegLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ClientRegLabel">Client Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
    
         <!-- Start Client registration form -->
       <?php include('clientRegistration.php'); ?>
        <!-- End Client registration form -->

      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" id="signup" class="btn btn-primary" onclick="addclient()">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   
    </div>
  </div>
</div>

<!-- End Client Registration Model -->


<!-- Start Client Login Model -->
<!-- Modal -->
<div class="modal fade" id="ClientLogin" tabindex="-1" role="dialog" aria-labelledby="ClientLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ClientLoginLabel">Client Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="clientLoginForm">
      <div class="modal-body">
    
        <div class="form-group">
        <i class="fas fa-envelope"></i>
              <label for="clientLogemail" class="pl-2 font-weight-bold">Email</label>
              <input type="email" class="form-control" name="clientLogemail" placeholder="Email" autocomplete="off" required="" id="clientLogemail">
        </div>

        <div class="form-group">
        <i class="fas fa-key"></i>
            <label for="clientLogpass" class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" name="clientLogpass" placeholder="Password" autocomplete="off" required="" id="clientLogpass">
        </div>

      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="button" class="btn btn-primary" id="clientLoginBtn" onclick="checkClientLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- End client Login Model -->

<!-- Start admin Login Model -->
<!-- Modal -->
<div class="modal fade" id="adminLogin" tabindex="-1" role="dialog" aria-labelledby="adminLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="adminLoginForm">
      <div class="modal-body">
    
        <div class="form-group">
        <i class="fas fa-envelope"></i>
              <label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
              <input type="email" class="form-control" name="adminLogemail" placeholder="Email" autocomplete="off" required="" id="adminLogemail">
        </div>

        <div class="form-group">
        <i class="fas fa-key"></i>
            <label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" name="adminLogpass" placeholder="Password" autocomplete="off" required="" id="adminLogpass">
        </div>

      </div>
      <div class="modal-footer">
        <small id="adminLogMsg"></small>
        <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- End admin Login Model -->


<!-- Jquery and Bootstrap Javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/proper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font Awesome Js -->
<script src="js/all.min.js"></script>

<!-- client Ajex call Js -->
<script src="js/ajaxrequest.js"></script>

<!-- Contactus Ajex call Js -->
<script src="js/contactUsrequest.js"></script>

<!-- admin Ajex call Js -->
<script src="js/adminajexrequest.js"></script>

<!-- Jquery pluning Js -->
<script src="js/owl.carousel.min.js"></script>

<!-- Scroll to top pluning file Js -->
<script src="js/jquery.scrollUp.min.js"></script>
<script type="text/javascript">
  $(function () {
    $.scrollUp({
      scrollImg: true
    });
});
</script>
<script type="text/javascript">
 $(document).ready(function(){
   $('.owl-carousel').owlCarousel({

});
 });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
  });
  
</script>
</body>
</html>