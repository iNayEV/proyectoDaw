<?php 
    include("../../sql/connect.php");
    session_start();
    
    $sql="SELECT * FROM users WHERE username = '".$_SESSION["user"]."'";
    $result = mysqli_query($con, $sql);
    $reg = mysqli_fetch_array($result);

    if ($reg["administrator"] != 1) {
        header("location: ../../index.php");
    }

    $sql="SELECT * FROM users";
    $query=mysqli_query($con,$sql);


    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA USER</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/custom.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    </head>
    <body>
        <div class="container mt-5" style="margin-left: 130px;">
                <div class="row"> 
                    
                    <div class="col-md-3">
                        <h1>Ingrese datos</h1>
                            <form action="insertar.php" method="POST">

                                <input type="text" class="form-control mb-3" name="id_user" placeholder="Id user">
                                <input type="text" class="form-control mb-3" name="email" placeholder="Email">
                                <input type="text" class="form-control mb-3" name="firstname" placeholder="Firstname">
                                <input type="text" class="form-control mb-3" name="lastname" placeholder="Lastname">
                                
                                <input type="submit" class="btn btn-primary">
                            </form>
                    </div>

                    <div class="col-md-8">
                        <table class="table" >
                            <thead class="table-success table-striped" >
                                <tr valign="middle">
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Number (Optional)</th>
                                    <th>verify</th>
                                    <th>Administrator</th>
                                    <th>Imagen</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                    <?php
                                        while($row=mysqli_fetch_array($query)){
                                    ?>
                                        <tr valign="middle">
                                            <th><?php echo $row['id_user']?></th>
                                            <th>@<?php echo $row['username'] ?></th>
                                            <th><?php echo $row['email']?></th>
                                            <th><?php echo $row['firstname']?></th>
                                            <th><?php echo $row['lastname']?></th> 
                                            <th><?php echo $row['num'] ?></th>
                                            <th class="text-center">
                                                <?php 
                                                    if($row['verify'] == 1) {
                                                        ?>
                                                        <label>
                                                        <i class="fa-solid fa-circle-check" style="color: skyblue"></i>
                                                        </label>
                                                        <?php
                                                    }else {
                                                        ?>
                                                        <i class="fa-solid fa-circle" style="color: skyblue"></i>
                                                        <?php
                                                    }
                                                ?>
                                            </th>
                                            <th class="text-center">
                                                <?php 
                                                    if($row['administrator'] == 1) {
                                                        ?>
                                                        <label>
                                                        <i class="fa-solid fa-lock-open" style="color: #77c777"></i>
                                                        </label>
                                                        <?php
                                                    }else {
                                                        ?>
                                                        <i class="fa-solid fa-lock" style="color: #dd5454"></i>
                                                        <?php
                                                    }
                                                ?>
                                            </th>
                                            <th><img class="prof-pic prof-pic-crud" src="../../uploads/<?php echo $row['img'] ?>" alt="" width="50rem" style="border-radius: 50%; max-width: 50rem max-height: 50rem"></th>  
                                            <th class="text-center"><a href="actualizar.php?id=<?php echo $row['id_user'] ?>" class=""><i class="fa-solid fa-pen-to-square"></i></a></th>
                                            <th class="text-center"><a href="delete.php?id=<?php echo $row['id_user'] ?>" class=""><i class="fa-solid fa-trash-can"></i></a></th>                                        
                                        </tr>
                                    <?php 
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>  
        </div>
    </body>
</html>