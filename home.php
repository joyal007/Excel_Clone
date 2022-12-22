<?php
require_once "db.php";
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


            <div class="top-sec ">
                <img src="./default-dp.jpg" alt="profile picture"
            width="50" height="50" class="d-inline-block dropdown "
            style=" margin: 10px;">
            <div class="dropdown-content">
                <div style="padding-left: 12px;"><p>
                    <?php
echo $_SESSION["email"]
?>
                </p></div>
                <div class=" signout-btn btn btn-success" ><h3 style="color: aliceblue;font-size: 22px;
                    font-family: 'Oswald', sans-serif;">Log Out</h2></div>
            </div>
                <div class="menu_b"
                style=" margin-left: 72%;"><p class="cred "><?php
echo $_SESSION["username"]
?></p></div>


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
            <h2 class="sub-heading">Saved  Spreadsheets</h2>
        <!-- <div class="width-spacer"></div> -->
            <h4 class="mini-heading" style="margin-right:56px">Last opened</h4>
        </div>
        <div class="created-sheets">
        <?php
// echo $_SESSION["username"];
// echo $_SESSION["email"];


    $sql = "select * from sheets where JSON_VALUE(data,'$.usermail') ='" . $_SESSION['email'] . "'";
    // echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // print_r($row);
            
            // print_r($val['sheetid']) ;
            $val = json_decode($row["data"], true);
            // print_r($val);
            // echo $val["fileId"];
            echo "<a style='text-decoration:none;color: rgb(168, 161, 161);cursor:pointer' href='http://localhost/webprogramming--project/index.php?filename=" . $val["fileId"] . "'><div style='display:flex;align-items:center;justify-content:space-between;margin-top:16px'><div style='display:flex'><img src='./logo.png' width='35px' style='margin-right:56px'/><p style='font-size:18px;margin:auto 0'>" . $val["fileName"] . "</p></div><div style='display:flex'><p style='font-size:18px;margin:auto 0'>".date("d-M-Y",( (int)$val['time'])/1000)."</p><img style='margin-left:32px' height='24px' src='./dot.png'/></div></div></a><hr>  ";
        }
    } else {
        echo "<div style='display:flex;align-items:center;justify-content:center;color:grey;font-size:18px'>No saved files found</div>";
    }

?>
</div>



    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <script src="./home.js"></script>
    
    </body>
</html>