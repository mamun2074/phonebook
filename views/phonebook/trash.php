
<?php

session_start();
if (!empty($_SESSION['error'])) {
    $error=$_SESSION['error'];
    unset($_SESSION['error']);
}

?>


<!doctype html>
<html lang="en">
<head>
    <title>Phone Book list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!--        fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <!--    Main css-->
    <link rel="stylesheet" href="../../css/style.css">

</head>
<body>

<?php

include_once '../../src/Admin/PhoneBook/Crud.php';
$crud = new Crud();
$viewAll = $crud->showAlltrashlist();


//    echo "<pre>";
//    print_r($viewAll);
//    die();

?>


<!--Phone book area-->
<div class="phonebook-area">
    <div class="container">

        <div class="phone-book">
            <?php if (!empty($error)){ echo $error ;} ?>
            <h1>Trash list</h1>
            <?php

            if (!empty($viewAll)) {

                ?>
                <a href="index.php">View All</a>


                <table class="table table-hover">
                    <thead class="thead-dark    ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>


                    <!--                Repeat items-->

                    <?php

                    $row = 0;
                    foreach ($viewAll as $view) {

//                    echo "<pre>";
//                    print_r($view);
//                    die();

                        $row++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row; ?></th>
                            <td><?php echo $view['name']; ?></td>
                            <td><?php echo $view['number']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="trash-resotre.php?id=<?php echo $view['id']; ?>">Restore</a>
                                | <a class="btn btn-danger" href="delete.php?id=<?php echo $view['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>

            <?php } else { ?>
                <a href="index.php">View All</a>

                <?php
            }
            ?>

        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>