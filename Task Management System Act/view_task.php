
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
    <div class="px-6 py-6 my-7 position-relative text-center">
        <h1 class="display-5 fw-bold text-body-emphasis">List of tasks</h1>
    <div class="col-lg-7 mx-auto">
    
    <div class="container">
        <?php
        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

        }
        ?>

        <a href="create_task.php"class="btn btn-primary mb-3">Create New</a>
        <a href="index.php"class="btn btn-primary mb-3">Back</a>

        <!-- </a>
            <a href="index.php">
                <button type="button" class="btn btn-secondary mb-4">Back</button>
        </a>
    </div> -->

    
    <table class="table able-dark table-hover text-center">
        <thead class ="table-primary">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
            <th scope="col">Due date</th>
            <th scope="col">Action</th>


            </tr>
        </thead>
        <tbody>
            <?php
            include "config.php";
                $sql = "SELECT * FROM tasks";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                 ?>
                    
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['description']?></td>
            <td><?php echo $row['priority']?></td>
            <td><?php echo $row['due_date']?></td>
            <td>
                <a href="edit_task.php? id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete_task.php? id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>

            </td>
        </tr>
        <?php
    }
    ?>

        </tbody>
        </table>


<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>