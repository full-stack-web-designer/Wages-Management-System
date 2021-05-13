 <!-- Start client registration form -->
<form method="POST" id="clientRegForm">
<div class="form-group">
              <i class="fas fa-user"></i>
              <label for="clientname" class="pl-2 font-weight-bold">Name</label>
               <small id="statusMsg1"></small>
              <input type="text" class="form-control" name="clientname" placeholder="Name" autocomplete="off" required="" id="clientname">
        </div>

        <div class="form-group">
        <i class="fas fa-envelope"></i>
              <label for="clientemail" class="pl-2 font-weight-bold">Email</label>
               <small id="statusMsg2"></small>
              <input type="email" class="form-control" name="clientemail" placeholder="Email" autocomplete="off" required="" id="clientemail">
              <small class="form-text">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
        <i class="fas fa-key"></i>
            <label for="clientpass" class="pl-2 font-weight-bold">New Password</label>
             <small id="statusMsg3"></small>
            <input type="password" class="form-control" name="clientpass" placeholder="Password" autocomplete="off" required="" id="clientpass">
</div>
</form>
 <!-- End client registration form -->