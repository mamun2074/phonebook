<?php

session_start();
if (!empty($_SESSION['error'])) {
    $error = $_SESSION['error'];
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
$viewAll = $crud->showAll();


//    echo "<pre>";
//    print_r($viewAll);
//    die();

?>


<!--Phone book area-->
<div class="phonebook-area">
    <div class="container">

        <div class="phone-book">
            <?php if (!empty($error)) {
                echo $error;
            } ?>
            <h1>Phone Book list</h1>
            <?php

            if (!empty($viewAll)) {

                ?>
                <a href="create.php">Add New</a>
                <a href="trash.php.">View Trash list</a>
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
                                <button id="viewBtn" value="<?php echo $view['id']; ?>" type="button" class="btn btn-primary modal-id" data-toggle="modal"
                                        data-target="#exampleModal">
                                    View
                                </button>

                                | <a class="btn btn-success" href="edit.php?id=<?php echo $view['id']; ?>">Edit</a>
                                | <a class="btn btn-warning"
                                     href="trash-store.php?id=<?php echo $view['id']; ?>">Trash</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <!--Modal view -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mahmud's Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="ccc" class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>


                    </tbody>
                </table>

            <?php } else { ?>
                <a href="create.php">Add New</a>
                <a href="trash.php.">View Trash list</a>
                <?php
            }
            ?>

        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>




<script>
    $(document).ready(function () {
        $('.modal-id').click(function () {

        var id=$(this).val();
//        console.log(id);

            // AJAX request

            $.ajax({
                url: 'single.php',
                type: 'post',
                data: {userid: id},
                dataType: 'json',

                success: function (response) {

                    var name=response['name'];
                    var number=response['number'];

                    var add="Name  : "+ name +"<br>"+ " Number :" + number;
                    $('.modal-title').html(name+"'s Information");

                    $('.modal-body').html(add);



                }
            });


        });
    });
</script>


</body>
</html>