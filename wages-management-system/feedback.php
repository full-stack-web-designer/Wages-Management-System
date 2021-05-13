<title>Wages | Client feedbacks</title>

<!-- include header and Navigation -->
<?php
 include('dbconnection.php');
    include('./include/header.php');
?>
<!-- End include header and Navigation -->

<style type="text/css">
  /* Feedback Client Start */

.box{
    text-align: center;
    width: 300px;
    height: 450px;
    margin-left: 50px;
    border:1px solid rgba(0,0,0,0.2);
    box-shadow: 0 5px 10px 0 rgba(0,0,0,0.3);
    border-radius: 2px;
    transition: 0.3s ease;
}

.box:hover{
    background: #16c9f6;
}

.box:hover p{
    color: white;
}

.box img{
   
     width: 50px;
     height: 250px;
    border-radius: 50%;
   padding: 40px;
}

.box h1{
    font-size: 18px;
    font-weight: 700;
    color: #000;
    margin-bottom: 10px;
}

.box h2{
    font-size: 13px;
    font-weight: 400;
    color: #666666;
    margin-bottom: 20px;
}
/* Feedback Client End */

</style>


<!-- start ContactUs page banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="img/feedback-background.jpg" alt="ContactUs" style="height:400px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div>
<!-- End ContactUs page banner -->

	<div class="container mt-5 mb-5">
 
       <div class="owl-carousel owl-theme">
             <?php 

            $sql1 = "SELECT * FROM client JOIN feedback ON client.c_id = feedback.c_id";
            $result1 = $conn->query($sql1);
             if($result1->num_rows > 0){

              while($row1 = $result1->fetch_assoc()){
                $c_img = str_replace('..', '.', $row1['c_img']);
            
            ?>
          <div class="item">
            
         
              <div class="col-lg-4 col-md-4 col-12">
                <div class="box">
                  <img src="<?php echo $c_img; ?>">
                  <p class="m-4"><?php echo $row1['f_content']; ?></p>
                  <h1><?php echo $row1['c_name']; ?></h1>
                  <h2><?php echo $row1['c_occ']; ?></h2>
                </div>
              </div>
             
        	</div>
        <?php }} ?> 
          </div>
         
     </div>



<!-- start footer and Login or Registration Model -->

<?php
  include('./include/footer.php');
?>

<!-- End footer -->