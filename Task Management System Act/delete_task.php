<?php
include "config.php";

$id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id = $id";
$result = mysqli_query($con, $sql);

if($result){
    header("Location: view_task.php?msg=Task Deleted successfully");
} 
else{
    echo "Failed: " . mysqli_error($conn);
}

?>