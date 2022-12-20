<?php
require_once "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileID = $_POST["fileID"];
    $type = $_POST['type'];
    if ($type == 'get') {
        $sql = "SELECT *fileName
    FROM sheets
    WHERE JSON_VALUE(data, '$.fileID')='" . $fileID . "'";
        // echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // echo $row['data'];
            $data = array('message' => 'Logined Successfully', 'data' => $row["data"]);
            echo json_encode($data);
        } else {
            echo json_encode(array('message' => 'Failed to Login', 'data' => ""));
        }
    } else if ($type == 'post') {

    }

}
