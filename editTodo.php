<?php



header("Access-Control-Allow-Origin: http://localhost:3001");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");

include('./connection.php');

if (!isset($_POST[' id']) && isset($_POST[' todo'])) {
    $response = ['success' => false, 'message' => 'ID and Todo is required'];
} else {
    $id = $_POST['id'];
    $todo = $_POST['todo'];


    $query = "UPDATE todos set todo='$todo' where id='$id'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $response = ['success' => true, 'message' => 'Todo updated successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Something went wrong while updating the updating the todo'];
    }
}
echo json_encode($response);
