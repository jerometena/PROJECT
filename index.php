<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
</head>
<body>
    <?php include "process.php" ?>
        <div class="row mt-3 justify-content-center">
            <div class="row col-4">
                <?php
                if(isset($_SESSION['message'])){
                    echo '<div class="alert alert-' .$_SESSION['msg_type'].' alert-dismissible fade show" role="alert">' . $_SESSION['message'] . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['message']);
                    }
                    unset($_SESSION['message']);
                ?>
                
        </div>
        <div class="row mt-3 justify-content-md-center">
            <div class="col-4">
                <form action="process.php" method="POST">
                    <div class="form-group mb-2">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" id="usr" name="name" value="<?= $name ?>">
                    </div>
                    <div class="form-group my-2">
                        <label for="contact">Contact number:</label>
                        <input type="text" class="form-control" placeholder="Enter contact number" id="contact" name="contactnumber" value="<?= $contact ?>">
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="<?= $email ?>"> 
                    </div>
                    <input type="hidden" name="id" value="<?= $id ?>">

                    <?php 
                        if(isset($_GET['upd'])){
                            echo '<input type="submit" value="Modify" class="btn btn-primary " name="update">&nbsp';
                            echo '<a href="index.php"><button type="button" class="btn btn-secondary ">Back</button></a>';
                        } else {
                            echo '<button type="submit" class="btn btn-primary " name="submit">Submit</button>';
                        }
                    ?>
                </form>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-8">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <td>Name</td>
                            <td>Contact number</td>
                            <td>Email address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM info";
                        $result = mysqli_query($conn, $sql);
                        $rowcount = mysqli_num_rows($result);
                        if ($rowcount > 0 ){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<tr class='text-center align-middle'>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['contactnumber'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>
                                            <a href='index.php?upd=" . $row['id'] ."' class='btn btn-info btn-sm'>Update</a>
                                            <a href='process.php?del=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                        </td>";
                                echo "</tr>";
                            }    
                        } else {
                            echo "<tr class='text-center'>";
                                echo "<td colspan='4'>No data found</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-2">
                    <p>Added paragraph!</p>
            </div>
        </div>
        
    </div>
    
</body>
</html>