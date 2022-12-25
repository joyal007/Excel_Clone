<?php
require_once "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileID = $_POST["fileID"];
    $type  = $_POST['type'];
    if ($type == 'get') {
        $sql = "SELECT *
    FROM sheets
    WHERE sheetid='" . $fileID . "'";
        // echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // echo $row['data'];
            $data = array('message' => 'Fetched Successfully', 'data' => $row["data"]);
            echo json_encode($data);
        } else {
            echo json_encode(array('message' => 'no item found', 'data' => ""));
        }
    } else if ($type == 'post') {
        $data = $_POST['value'];
        $sql = 'select * from sheets where sheetid="'.$fileID.'";';
        $result = $conn->query($sql);
        if($result->num_rows>0){
            // $sql = 'update sheets set data ='.$data.' where sheetid ="'.$fileID.'";';
            $sql = 'delete from sheets where sheetid="'.$fileID.'"';
            echo $sql;
            $conn->query($sql);
        }
 
            $sql = "INSERT INTO sheets (sheetid, data)
VALUES ('".$fileID."', '".$data."');";
echo $sql;
$conn->query($sql);

        }

}
