<?php

include "config.php";

    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $priority = $_POST["priority"];
        $due_date = $_POST["due_date"];

        $sql ="INSERT INTO tasks (title, description, priority, due_date) VALUES ('$title', '$description', '$priority', '$due_date')";
        $result = mysqli_query($con, $sql);
    
        if($result){
            header("Location: view_task.php?msg=New record created successfully");

        } 
        else{
            echo "Failed: " . mysqli_error($conn);
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
    </nav> -->
    
    <div class="px-5 py-5 my-5 position-relative text-center">
        <h1 class="display-5 fw-bold text-body-emphasis">Create Task</h1>
    <div class="col-lg-7 mx-auto">

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:40vw; min-width:400px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Activity 1">
                    </div>
                </div>

                <div class="form-group">
			        <label for="">Description</label>
			        <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
				    <?php echo isset($description) ? $description : '' ?>
			        </textarea>
		        </div>
        
                <div class="form-group">
			        <label for="">Priority</label>
			        <select name="priority" id="status" class="custom-select custom-select-sm">
				    <option value="Low" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Low</option>
				    <option value="Medium" <?php echo isset($status) && $status == 2 ? 'selected' : '' ?>>Medium</option>
				    <option value="High" <?php echo isset($status) && $status == 3 ? 'selected' : '' ?>>High</option>
			        </select>
		        </div>

                <div class="form-group">
						<label for=""> Due Date</label>
						<input type="date" class="form-control form-control-sm" name="due_date" value="<?php echo isset($date) ? date("Y-m-d",strtotime($date)) : '' ?>" required>
				</div>

                <button type="submit" class="btn btn-success" name="submit">Create Task</button>
                <a href="view_task.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>



<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>