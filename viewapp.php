<?php
//include external php file
include'getnavigation.php';
include'restrict.php';
include'getviewapp.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	
 <Title>Applicant Info</Title>
 
 
 <?php
  //include head php file
 include'_head.php';
 ?>

 
</head>

<body>

  <!-- _navigation -->
  <?php 
     include '_navigation.php';
  ?>


  <div class="container">
    
    <!-- echo $_GET['id'] is for displaying all the selected value with selected id only-->
    
    <input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>"/>
    
    <a href='index.php' class='btn btn-link'>Back to all jobs</a>
    
    <div class="row">	
      <div class="col-md-8">
        
        <div class="app-name">
         <h1> 
          <span class ="app-name">Name: <?php echo $appinfo['aname']; ?> </span> 
        </h1>
      </div>
      
      
      <h3>
       <span class="app-age">Age: <?php echo $appinfo['age']; ?> </span>
     </h3>
     
     

     <h2>
       <span class="app-status">Status: <?php echo $appinfo['status']; ?> </span>
     </h2>

     
     <hr>
     
     <div class="app-email">
      Email: <?php echo $appinfo['email']; ?>
    </div>

     <div class="app-contact">
      Contact No. : <?php echo $appinfo['contact']; ?>
    </div>
    
    <div class="app-exp">
      Have Work Experience: <?php echo $appinfo['experience']; ?>
    </div>	
    

    <div class="app-exp-detail">
      Details About Work Experience: <?php echo $appinfo['exp_details']; ?>
    </div>

<?php
  //include scripts php file
  include'_scripts.php';
  include'_footer.php';
?>

  </div>

</body>



</html>