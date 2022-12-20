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

            <div class="top-sec">
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
        <h2 class="sub-heading">Created Spreadsheets</h2>
        <div id="created-sheets"></div>
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
    </body>
</html>