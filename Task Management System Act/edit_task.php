<?php
include "config.php";
$id = $_GET["id"]; 
if(isset($_POST["submit"])){

    $title = $_POST["title"];
    $description = $_POST["description"];
    $priority = $_POST["priority"];
    $due_date = $_POST["due_date"];


    $sql = "UPDATE tasks SET title ='$title', description ='$description', priority = '$priority', due_date = '$due_date' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if($result){
        header("Location: view_task.php?msg=Task updated successfully");
        exit(); 
    } else {
        echo "Failed: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD Activity</title>
</head>
<body>
    <!-- <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: aqua;">
        TASK MANAGEMENT SYSTEM PHP CRUD
    </nav>
     -->
    <div class="px-5 py-5 my-5 position-relative text-center">
        <h1 class="display-5 fw-bold text-body-emphasis">Edite Task Information</h1>
    <div class="col-lg-7 mx-auto">

        <?php
        $id = $_GET["id"];
        $sql = "SELECT * FROM tasks WHERE id = $id LIMIT 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:40vw; min-width:400px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title']?>">
                    </div>
                </div>

                <div class="form-group">
    <label for="">Description</label>
    <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
        <?php echo isset($row['description']) ? $row['description'] : '' ?>
    </textarea>
</div>

<div class="form-group">
    <label for="">Priority</label>
    <select name="priority" id="status" class="custom-select custom-select-sm">
        <option value="Low" <?php echo isset($row['priority']) && $row['priority'] == 'Low' ? 'selected' : '' ?>>Low</option>
        <option value="Medium" <?php echo isset($row['priority']) && $row['priority'] == 'Medium' ? 'selected' : '' ?>>Medium</option>
        <option value="High" <?php echo isset($row['priority']) && $row['priority'] == 'High' ? 'selected' : '' ?>>High</option>
    </select>
</div>

<div class="form-group">
    <label for=""> Due Date</label>
    <input type="date" class="form-control form-control-sm" name="due_date" value="<?php echo isset($row['due_date']) ? $row['due_date'] : '' ?>" required>
</div>

<button type="submit" class="btn btn-success" name="submit">Update Task</button>

                <a href="view_task.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>



<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>