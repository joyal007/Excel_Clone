<?php
  session_start()
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="icon" type="image/x-icon" href="./assets/logo.png">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link href="./style/sign.css" rel="stylesheet" />
</head>
<body>
    <div class="center-main"> 
    <div class="card ">
        <div class="card-body">
            
            <h5 class="flex-center" style="font-size:32px;background:linear-gradient(90deg, rgba(98, 255, 0, 1) 0%, rgba(98, 255, 0, 1) 8%, rgba(0, 212, 203, 1) 28%, rgba(165, 255, 0, 1) 47%, rgba(244, 67, 54, 1) 70%, rgba(238, 229, 130, 1) 89%);
            -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
            ">Excel</h5>
          <p class="flex-center" style="font-size:24px">Create Account</p>
        
          <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
          <form action="config.php" method="post" onsubmit="return checkPass()" >
          <div class="inputSection">
            <!-- <label for="exampleFormControlIndsadfput1" class="form-label">Email address</label> -->
            <input type="email" name="email" required class="form-control" id="exampleFormControlInput1" placeholder="Email" style="height:56px">
            <div style="height:16px;"></div>
            <input type="text" name="user" required class="form-control" id="exampleFormControlInput2" placeholder="User Name" style="height:56px" >
            <div style="height:16px;"></div>
            <input type="password" name="password1" required class="form-control" id="exampleFormControlInput3" placeholder="Password" style="height:56px">
            <div style="height:16px;"></div>
            <input type="password" name="password2" class="form-control"required required id="exampleFormControlInput4" placeholder="Confirm Password" style="height:56px">
            <?php
             if(isset($_SESSION['message_signup']) && !empty($_SESSION['message'])) {
              echo "<div style='font-size:14px;color:red;padding-top:8px'>".$_SESSION['message']."</div>";
           }
              
            ?>

            <div class="footer">
                <a href="signin.php"><button type="button" class="btn" style="color:rgb(73, 121, 209);padding:0">Already have an account</button></a>
                <button type="submit" name="signup" class="btn btn-primary" style="padding:6px 24px">Sign Up</button>
            </div>
          </div>
          </form>
        </div>
      </div>
      <div class="flex">
        <p>English(United States)</p>
        <div style="display:flex;align-items:center;justify-content:space-around">
            <p>Help</p>
            <p>Privacy</p>
            <p>Terms</p>
        </div>
      </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
</body>
</html>