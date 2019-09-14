<?php

 session_start();
 
 include('connection.php');

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
   $query = "SELECT *  FROM subscribe_new WHERE email='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
        //$emailError = "Provided Email is already in use.";
    $error =  "<p style='color: red; text-align:center; font-size:20px; font-family:   font-family: 'PlayfairDisplay-Regular';'>Provided Email is already in use</p>";

}else{ 
   $sql = "INSERT INTO subscribe_new (user_id, email, date_added)VALUES (NULL, '$email', CURRENT_TIMESTAMP)";
        
        $run_query = mysqli_query($conn,$sql);
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
      
      <div class="cover-text">
        
         <img src="image/Auma-logo-1s120edit.png"  class="center-block img-responsive" style=" margin-top: 10px;">
         
        <h4><strong>A</strong>uma Foods &amp; Supplies LTD</h4>
           <p> <strong style="color:#cc0f10;font-size:25px; ">Free</strong> Online Training on <img src="image/whatsapp-logo.png" height="20px" width="20px" style="margin-left:0.3em; margin-bottom:0.2em;"><strong style="color:#189d0e;">whatsapp</strong></p>
         
          
          <div class="container">
          <div class="output_cover">
          <center>
            
              <?php
          session_start();
          include 'connection.php';
         
   $uid = $row["id"];
    //$uid = $_SESSION["uid"];
    $sql = "SELECT * FROM user_info ORDER BY user_id DESC LIMIT 1";
    $run_query = mysqli_query($conn,$sql);
   $count = mysqli_num_rows($run_query);
    if($count > 0){
        $no = 1;
        $total_amt =0 ;
        while($row = mysqli_fetch_array($run_query)){
            $_SESSION['id'] = $row["user_id"];
            $_SESSION['first_name'] = $row["first_name"];
            $_SESSION['last_name'] = $row["last_name"];
            
             echo "
            
    <h1><strong>Congratulations </strong> ".$_SESSION['first_name']."</h1>
    
    
   
    ";
            }
    }
    
          ?> 
              <p>Two Steps left to Get Started</p>
             <span> <b> STEP 1:</b>  Click the green<img src="image/whatsapp-logo.png" height="20px" width="20px" style="margin-left:0.3em; margin-bottom:0.2em;"><strong style="color:#189d0e;">whatsapp</strong> button below and send the message to 20 people or groups on WhatsApp to gain access to the <strong style="color:#cc0f10;font-size:25px; ">Free</strong> Training </span><br/><br/>
              
              <span><b> STEP 2:</b> <strong style="color:#cc0f10">Come back</strong> here, click the red <q>Join Free Training</q> button below to join today's FREE training</span>
              
            <br/><br/> 
              
              <a href="https://api.whatsapp.com/send?text=*LESS%20THAN%208%20DAYS%20TO%20GO!!!**%0A
            *%0ADon't%20be%20left%20out,%20we%20just%20started%20our%20*BATCH%202%20FREE%20ONLINE%20TRAINING*%20where%20You%20will%20be%20trained%20for%20free%20on%20a%20varied%20range%20of%20Recipes%20for%20Food%20Preparation%20and%20Processing%20and%20other%20Entrepreneurial%20Skills.%20Courses%20include%20*Coconut%20meat%20pies,%20Sweet%20fried%20bread,%20Ice%20cream,%20Donuts,%20Meat%20pies,%20Smoothies,%20Cakes*%20and%20many%20more. 
*Click%20the%20link%20Below👇to%20GET%20STARTED!!!*%0A


aumafoodsandsuppliesltd.com*%0A*%0AKindly%20broadcast%20to%20all%20your%20contacts.%20The%20more%20the%20merrier!" target="_blank" role="button" class=" btn-lg" id="btn_1"> <img src="image/whatsapp-logo.png" height="20px" width="20px">Whatsapp</a><br/><br/><br/>
              <a href="https://chat.whatsapp.com/CQcPz68z3K3Er9f8M2gUhd" role="button" class=" btn-lg">Join Free training</a>
            <br><br><br> 
             
          </center>
           </div>
      </div>
         
          
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
            <div class=" col-md-3 col-sm-3" id="training2">
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
            <li>Donut</li>
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
       
       
         
        
  <div  id="gallary">
      
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
  
<p><span class="glyphicon glyphicon-map-marker"  style=" color:#f0a009"></span> Sunnyvale Homes, Abuja</p> <br>
       <p style="font-family: 'Cinzel Decorative Black';"><span class="glyphicon glyphicon-phone" style="color:#f0a009"></span> 08033521285</p>
           
                
                
                
              
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
    $('#' + $(this).val()).fadeIn();
  });
});
// [forked from](http://jsfiddle.net/FvMYz/)
// [show-hide-based-on-select-option-jquery)(http://stackoverflow.com/questions/2975521/show-hide-div-based-on-select-option-jquery/2975565#2975565)            
</script>  
   
   <script type="text/javascript">
      
      
      $('.next-button').click(function(){
          $('.nav-tabs > .active').next('li').find('a').trigger('click');
          
          
      });
        $('.previous-button').click(function(){
          $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        });
          
      </script>
      
      

      
    </body>
</html>
