<?php
session_start();
if ((!isset($_SESSION['username']) && !isset($_SESSION['email'])) || empty($_SESSION['username'])) {
  header('location:signin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Excel Sheet</title>
    <link rel="icon" type="image/x-icon" href="./assets/logo.png">
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css" integrity="sha512-6c4nX2tn5KbzeBJo9Ywpa0Gkt+mzCzJBrE1RB6fmpcsoN+b/w/euwIMuQKNyUoU/nToKN3a8SgNOtPrbW12fug==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link href="./style/style.css" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="./assets/logo.png"
            alt="Logo"
            width="40"
            height="40"
            class="d-inline-block align-text-top"
          />
        </a>
        <div class="container-fluid flex">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <input
                id="fileName"
                type="text"
                style="
                  color: grey !important;
                  border: none !important;
                  font-size: 20px !important;
                  font-weight: medium;
                "
                value="Untitled spreadsheet"
              />
            </li>
          </ul>
          <ul class="navbar-nav tool-navbar">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">File</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Edit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">View</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Insert</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Format</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Tools</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Extensions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Help</a>
            </li>
          </ul>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center">
        <button class="btn " id="download-btn" title="download as csv"> <img width="25px" style="margin-right:16px;background-color:white;" src="./assets/download.png"> </button>
        <button id="savebtn" class="btn btn-outline-success" style="height:40px;padding:6px 24px"><img width="25px" style="margin-right:16px;background-color:white;" src="./assets/save.png">SAVE</button>
        
        <img src="./assets/default-dp.jpg" alt="profile picture"
            width="50" height="50" class="d-inline-block dropdown "
            style=" margin: 10px;">
            <div class="dropdown-content" style="z-index:99">
                <div style="padding-left: 12px;"><p>

                  <?php
                                  echo '<p class="" style="font-size:18px;margin:auto 8px">User : '.$_SESSION["username"].' </p>';

                echo '<p  style="font-size:18px;margin:auto 8px">Email : <span class="usermail">'.$_SESSION["email"].'</span> </p>';
                ?>
                </p></div>
                <div class=" btn btn-success signout-btn" ><h3 style="color: aliceblue;font-size: 18px;
                    font-family: 'Oswald', sans-serif;">Log Out</h2></div>
            </div>
        
        <!-- <div style="padding-left: 12px;">
                    <?php
// echo '<p class="usermail" style="font-size:18px;margin:auto 8px">'.$_SESSION["email"].' </p>';
?>
               </div>   -->
      </div>  
      </div>
        
      </div>
    </nav>
    <hr class="underline" />
    <div style="display: flex;justify-content: center;align-items: center;">
      <div class="grid-cell__class">
        A1
      </div>
      <div class="dropdown" style="margin-right:8px" >
        <button class="btn dropdown-toggle" style="border:1px solid rgb(211, 207, 207);" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="./assets/function.png" style="margin:0 10px;align-items:center" width="30px" height="20px" alt="" srcset="">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        </div>
      </div>
      <input
        type="text"
        class="form-control"
        id="text-input"
        autocomplete="off"
        onkeypress="enterKeyPressed(event)"
      >
    </div>
    <hr class="underline" />
    <div class="grid-sheet">
      <div class="top-left-block"></div>
      <div class="top-row">
        <!-- <div class="grid-col grid-col-top"></div> -->
      </div>
      <div class="left-col">
        <!-- <div class="grid-left-col"></div> -->
      </div>
      <div class="main-sheet">
        <!-- <div class="grid-row">
            <div class="grid-cell"></div>
          </div> -->
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- Bootstrap 4 Autocomplete -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/js/all.min.js" integrity="sha512-3dlGoFoY39YEcetqKPULIqryjeClQkr2KXshhYxFXNZAgRFZElUW9UQmYkmQE1bvB8tssj3uSKDzsj8rA04Meg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

    <script src="./script/script.js"></script>
    
    <!-- <script>
      function enterKeyPressed (event){
    if(event.keyCode == 13){
      console.log("enter key pressed");
    }
    return true;
  }
    </script> -->
  </body>
</html>
