<?php
 ob_start();
 session_start();
 
 //include('connection.php');

 $error = false;

 if ( isset($_POST['submit']) ) {
  
  // clean user inputs to prevent sql injections
  $fName = trim($_POST['fName']);
  $fName = strip_tags($fName);
  $fName = htmlspecialchars($fName);
  
 $Token = bin2hex(openssl_random_pseudo_bytes(10));
  
  // basic fname validation
  if (empty($fName)) {
   $error = true;
   $fnameError = "Please enter your first name.";
  } else if (strlen($fName) < 3) {
   $error = true;
   $fNameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fName)) {
   $error = true;
   $fNameError = "Name must contain alphabets and space.";
  }
     
      
    
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO user_info(user_id, first_name,  token, date_added) VALUES(Null,'$fName', '$Token', CURRENT_TIMESTAMP)";
      
       $res = mysqli_query( $conn, $query);
   
   if ($res) {
        $_SESSION['u_first'] = $row['first_name'];
   header("Location:index_1.php");
   
   
    }
       
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
       
            //something went wrong
            //echo "Error:" . $query . "<br>" . mysqli_error($conn);
   } 
    
  }
  
  
 
?>


       
      <?php

session_start();
 //include('connection.php');

 $error = false;

 if ( isset($_POST['btn_subscribe']) ) {
  
  // clean user inputs to prevent sql injections
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
     
    //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $error =  "<p style='color: red; text-align:center; font-size:20px; font-family:   font-family: 'PlayfairDisplay-Regular';'>Please enter valid email Address</p>";

  } else {
   // check email exist or not
   $query = "SELECT * FROM subscribe_new WHERE email='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
        //$emailError = "Provided Email is already in use.";
    $error =  "<p style='color: red; text-align:center; font-size:20px; font-family:   font-family: 'PlayfairDisplay-Regular';'>Provided Email is already in use</p>";

}else{ 
   $sql = "INSERT INTO subscribe_new (user_id, email, date_added)VALUES (NULL, '$email', CURRENT_TIMESTAMP)";
        
        $run_query = mysqli_query($conn, $sql);
        if($run_query){
        $error =  "<p style='color: green; text-align:center; font-size:20px; font-family:   font-family: 'PlayfairDisplay-Regular';'><b style='font-style: italic;'>Thank You</b> for subscribing.</p>";

    unset($email);
   
        
    }else{
            
            //something went wrong
           // echo "Error:" . $sql . "<br>" . mysqli_error($con);
        }
   }
   
  } 
 }
     ?>

               
              

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Free Online Cooking Training|Abuja|Auma's Foods Supplies</title>
      <meta name="description" content="We offer free online training videos on how to prepare nigerian dishes, continental dishes, pastries, icecream, cosmetics. Receive free daily cooking videos on your whatsapp ">
      <meta name="keywords" content="food, food recipes, food training videos, whatsapp training videos, cake recipes, chicken recipes,cooking, cosmetics">
     
      
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <script src="bootstrap/js/bootstrap.min.js"></script>
      
       <!-- Bootstrap -->
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
<link rel="stylesheet" type="text/css" href="styles_1.css">

      
  </head>
  <body>
         
     <div class="cover">
       <img src="image/Auma-logo-1s120edit.png"  class=" img-responsive center-block img-static" style="margin-top:30px;">
         
      <div class="cover-text">
      
        <h4><strong>A</strong>uma Foods &amp; Supplies LTD</h4>
          <p>Presents</p>
         
          <h1> <strong> <strong style="color:wheat; font-family: 'Cinzel Decorative Black';">F</strong>ree Online Training on various Foods &amp; Snacks</strong> </h1>
          <p>Featuring:</p>
         <h3>EXQUISITE DISHES  <strong style="color:#cc0f10; font-size:30px;">|</strong> PASTRIES <strong style="color:#cc0f10; font-size:30px;">|</strong>  ICECREAMS &amp; DRINKS <strong style="color:#cc0f10; font-size:30px;">|</strong> COSMETICS &amp; OILS</h3>
          <h5>Absolutely <strong style="color:#cc0f10;font-size:25px; ">Free</strong> On <img src="image/whatsapp-logo.png" height="20px" width="20px" style="margin-left:0.3em; margin-bottom:0.2em;"><small style="color:#189d0e;">whatsapp</small></h5>
          
          <center>
            
               <form  method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
                              <div class="form-group">
                                    
                                    <div class="button dropdown">
                            <select name="food" class="form-control" id="colorselector"  >
												<option disabled selected value="<?php echo $parkage ?>" style=" text-align:center; text-decoration:underline;" >SELECT YOUR   INTEREST</option><br/>
                                                <option value="red">Exquisite dishes &amp; Pastries</option>
                                                <option value="red">Cosmetics &amp; Special Oils</option> 
												 <option value="red">Icecream</option>
                                            </select>
                            </div>
                               </div>
          
          <div class="output">
                                   <div id="red" class="colors "> 
                                       
                                <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-md-8 col-sm-8">
                   
                    <div class="output_cover">
                        <div class="panel-heading">
                           <i class="glyphicon glyphicon-info-sign"></i> Please Fill this Form
                        </div>
                       
                        <div class="panel-body">
                            <div class="row">
                               
						<div class="col-sm-2"></div>
                            <div class="col-sm-8">
							  <div class="form-group">
                                            <label> <i class="glyphicon glyphicon-user"></i>  First Name</label>
                                            <input name="fName" class="form-control" type="text" value="<?php echo $fName ?>"required>
                                           <span style="text-align:center; color:red;"><?php echo $fNameError; ?></span> 
                               </div>
                                    </div>
                                    
                                
                                
                        </div>
                            <button type="submit" name="submit" class="btn btn-lg center-block">submit</button> 
                    </div>
                        
                        
                </div>
                    </div>
                </div>
                               </div>
                   </div>
                   
                   
         
         
         </form>
          </center>
          
         </div>  
                        
         </div>
    
      <div class="container-fluid" id="training">
        <div class="row" >
           
          <div class="col-sm-10 " id="training1">
              <h1>  <strong style="color:#f0a009; font-family: 'Cinzel Decorative Black';">A</strong>uma Foods </h1>
              <h2><strong>Free</strong>  training On <img src="image/whatsapp-logo.png" height="25px" width="25px" style="margin-left:0.3em; margin-bottom:0.2em;">Whatsapp</h2>
            </div>
            </div>
            <div class="row" >
            <div class="col-md-3 col-sm-3" id="training2">
            <h1>EXQUISITE DISHES</h1>
                
            <ul>
            <li>Coconut Rice</li>
            <li>Curry chicken sauce</li>
            
                
                </ul>
                
            </div>
                
            <div class="col-md-3 col-sm-3" id="training2">
            <h1>PASTRIES</h1>
                
            <ul>
            <li>Sweet fried bread</li>
            <li>Pound Cake</li>
            <li>Meat pie</li>
            <li>Coconut meat pie</li>
            <li>Puff Puff</li>
            <li>Doughnut</li>
            <li>Chin chin</li>
            <li>Egg roll</li>    
                </ul>
                
            </div>
                
                 <div class="col-md-3 col-sm-3" id="training2">
            <h1>ICE CREAMS</h1>
                
            <ul>
            <li>Mango Icecream</li>
            <li>Milo Icecream</li>
            <li>Banana Icecream</li>
            
            
                </ul>
                
            </div> 
                
             <div class="col-md-3 col-sm-3" id="training2">
            <h1>COSMETICS</h1>
                
            <ul>
            <li>Alovera moisturising cream</li>
            <li>Cream to stop and prevent sagging breast</li>
            
                </ul>
                
            </div>
                
               
          </div>
         
           <cite class="pull-right">&amp; Many More</cite><br>
         <div class="border pull-right" ></div><br><br>
          
          </div> 
       
       
         
        
  <div  id="gallary" >
      
      <div class="row">
      <div class="col-sm-3">
          <img src="image/pie2.jpg" width=112% height=30%>
          </div>
          
          
          
          <div class="col-sm-3">
          <img src="image/pound_cake2.jpg" width=130% height=40%>
          </div>
           <div class="col-sm-3">
          <img src="image/coconutrice-and-chicken2.jpg" width=130% height=40%>
          </div>
         
           <div class="col-sm-3">
          <img src="image/icream2.jpg" width=109%>
          </div>
          
           
      </div>
      
      
      
      </div>
        <section style="background: #322d2d;">
        <div class="container" id="About"> 
      <div class="row">
          
          
        <div class="col-sm-4">
        
           
            <div style="margin-top:65px;">
               
              <span class="logo_2">  <img src="image/Auma-logo-1s70.png"> <strong style="color:wheat; font-family: 'Cinzel Decorative Black'; font-size:20px;">A</strong>uma Foods  </span><br><br>  
  <a href="www.aumafoodsandsuppliesltd.com"><span class="glyphicon glyphicon-globe" style=" color:#f0a009"></span>   aumafoodsandsuppliesltd.com</a><br><br>
  
<p><span class="glyphicon glyphicon-map-marker"  style=" color:#f0a009"></span>  Sunnyvale Homes, Abuja</p> <br>
       <p style="font-family: 'Cinzel Decorative Black';"><span class="glyphicon glyphicon-phone" style="color:#f0a009"></span>  08033521285</p>
           
                
                
                
              
            </div>
          </div>
         
          
          <div class="col-sm-4" style="margin-top:70px;">
          <h3>Services</h3><br><br>
              <li><a href="#">Catering Services</a></li><br>
              <li> <a href="#">Food Processing</a></li><br>
              <li><a href="#">Edible Party Supplies</a></li><br>
               <li><a href="#">Food Packaging</a></li><br>
              
          </div>
          
           
          <div class="col-sm-4" style="margin-top:70px;">
      
              
              <div class="single">
		
            <h3>Signup for newsletter</h3>
         
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
             
	<div class="input-group">
        
         <input type="email" class="form-control" placeholder="Enter your email" name="email">
         <span class="input-group-btn">
            
         <button class="btn btn-theme" type="submit" name="btn_subscribe">Subscribe</button>
         </span>
        
         
          </div>
              <span><?php echo $error; ?></span>
        </form>   
	</div>
              
              
          </div>
         
        </div>
        </div>
        <div class="container">
            
         <footer>
            <hr>
             <div class="row">
                
                 <div class="col-sm-6">
           <p> <strong>A</strong>uma Foods &amp; Supplies LTD  &mdash; <em>website Designed by <small>KMC</small></em></p>
                 </div>
                <div class="col-sm-6">  
            <span>Terms &amp; Conditions | Privacy Policy | Site Map</span>
             </div>
             </div>
            
            </footer>
            </div>
   
      </section>
      
       
      
    
      <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      
      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
       <script>

       
       $(function() {
  $('#colorselector').change(function(){
    $('.colors').hide();
    $('#' + $(this).val()).fadeIn(2000);
  });
});
// [forked from](http://jsfiddle.net/FvMYz/)
// [show-hide-based-on-select-option-jquery)(http://stackoverflow.com/questions/2975521/show-hide-div-based-on-select-option-jquery/2975565#2975565)            
</script>  
   
   

      
    </body>
</html>
