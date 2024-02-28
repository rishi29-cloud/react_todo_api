<?php



header("Access-Control-Allow-Origin: http://localhost:3001");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");

include('./connection.php');
if (!isset($_POST['todo'])) {
    $response = ['success' => false, 'message' => 'Todo is required'];
} else {
    $todo = $_POST['todo'];
    $query = "INSERT into todos (todo) values ('$todo')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $response = ['success' => true, 'message' => 'Todo added successfully'];
    } else {
        $response = ['success ' => false, 'message' => 'Something went wrong while adding the todo'];
    }
}
echo json_encode($response);
