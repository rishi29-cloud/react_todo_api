<?php



header("Access-Control-Allow-Origin: http://localhost:3001");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");

include('./connection.php');

if (!isset($_POST['id'])) {
    $response = ['success' => false, 'message' => 'ID is required'];
} else {
    $id = $_POST['id'];



    $query = "DELETE from todos where id='$id'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $response = ['success' => true, 'message' => 'Todo deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Something went wrong while deleting the todo'];
    }
}
echo json_encode($response);