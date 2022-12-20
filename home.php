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
        <title>Excel Home</title>
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
        <link href="./style.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg" >
<<<<<<< HEAD:home.php

            <div class="top-sec">
=======
            
            <div class="top-sec ">
                <img src="./default-dp.jpg" alt="profile picture"
            width="50" height="50" class="d-inline-block dropdown " 
            style=" margin: 10px;">
            <div class="dropdown-content">
                <div style="padding-left: 12px;"><p>saheenusman@gmail.com</p></div>
                <div class="button"><a href="#" ><h3 style="color: aliceblue;font-size: 22px;
                    font-family: 'Oswald', sans-serif;">Log Out</h2></a></div>
            </div>
                <div class="menu_b" 
                style=" margin-left: 72%;"><p class="cred ">Saheen Usman</p></div>
            
>>>>>>> c1189c5b915daeb041a8fa88d38959dcad85b5ba:home.html
                <div class="menu_b">
                    <h3 class="heading">Excel</h3>
                </div>
                <div class="menu_b">
                    <a href="#">
                        <img src="./logo.png"
                        alt="Logo"
                        width="40"
                        height="40"
                        class="d-inline-block align-text-top"/>
                    </a>
                </div>
                <div class="menu_b">
                    <a class="navbar-brand" href="#">
                        <img src="./menu_icon.png"
                        alt="Logo"
                        width="40"
                        height="40"
                        class="menu_img"
                        />
                    </a>

                </div>
            </div>

        </nav>
        <div id="gray-strip">
            <div id="inside-strip">
                <h4 class="sub-heading">Start a new spreadsheet</h4>
                
                    <div id = "white-rect">
                        <img src="./plus4.png"
                            alt="new spreadsheet"
                            width="85"
                            height="85"
                            class="d-inline-block align-text-top"/>
                    </div>
                

                <h6 class="mini-heading">Blank</h6>
            </div>
        </div>
        <div class="sub-heading-row">
            <h2 class="sub-heading">Created Spreadsheets</h2>
        <!-- <div class="width-spacer"></div> -->
            <h4 class="mini-heading">Last opened</h4>
        </div>
        <div id="created-sheets"></div>
<<<<<<< HEAD:home.php
        <?php
echo $_SESSION["login_userid"];
echo $_SERVER['REQUEST_URI'];    
?>
<script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <script src="./home.js"></script>
=======
        <script>
            var listDiv=document.createElement('div');
            listDiv.className='sub-heading-row'; 
            // document.getElementById("created-sheets").appendChild(listDiv);
            var sheetName=document.createElement('h5');
            sheetName.className='list-item';
            var nameText=document.createTextNode("Quartely Earnings");
            sheetName.appendChild(nameText);
            var sheetDate=document.createElement('h6');
            sheetDate.className='list-item';
            var nameDate=document.createTextNode("15/12/2022");
            sheetDate.appendChild(nameDate);
            listDiv.appendChild(sheetName);
            listDiv.appendChild(sheetDate);
            document.getElementById("created-sheets").appendChild(listDiv);
        </script>

        
        
>>>>>>> c1189c5b915daeb041a8fa88d38959dcad85b5ba:home.html
    </body>
</html>