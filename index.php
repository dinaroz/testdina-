<!DOCTYPE html>
<html>

<head>
    <title>test</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/test.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php session_start();?>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form id="form-id" method="POST" action="php/test.php" onsubmit="return validate()">
                    <input name="lm_form" type="hidden" value="18682">
                    <input name="lm_key" type="hidden" value="a5eb61f91d">
                    <input name="lm_redirect" type="hidden" value="http://localhost/test-leadform/php/test.php">
                    <input name="lm_source" type="hidden" value="http://localhost/test-leadform/index.php">
                    <div class="form-group">
                        <label for="name"><i class="fa fa-user"></i> name:</label>
                        <input type="text" class="form-control" id="name_of_user" name="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="fname"><i class="fa fa-user-circle-o" ></i> fname:</label>
                        <input type="text" class="form-control" id="fname_of_user" name="fname" placeholder="fname">
                    </div>
                    <div class="form-group">
                        <label for="fname"><i class="fa fa-mobile-phone" style="font-size:24px"></i> phone:</label>
                        <input type="text" class="form-control" id="phone_of_user" name="phone" placeholder="phone">
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope-o"></i> email:</label>
                        <input type="email" class="form-control" id="email_of_user" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="age"><i class="fa fa-child" style="font-size:24px"></i> age:</label>
                        <input type="number" class="form-control" id="age_of_user" name="age" placeholder="age">
                    </div>
                     <button type="submit" class="btn btn-primary" name="submit_form">Submit</button>
                     </br> </br> 
                    <div id="error_para" class="alert alert-danger" role="alert">
                        <?php
                            if(isset($_SESSION['err'])&&!empty(($_SESSION['err']))) {
                        ?>
                        <script>
                            var alert = document.getElementById("error_para");
                            alert.style.visibility = "visible";
                        </script>
                        <?php
                            echo $_SESSION["err"];
                            session_destroy(); };
                        ?>
                    </div>
                    <div id ="succees_para" class="alert alert-primary" role="alert">
                             <?php
                            if(isset($_SESSION['succees'])&&!empty(($_SESSION['succees']))) {
                        ?>
                        <script>
                            var alert = document.getElementById("succees_para");
                            alert.style.visibility = "visible";
                        </script>
                        <?php
                            echo $_SESSION["succees"];
                            session_destroy(); };
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>   
    <footer> &#169; All right receved to Dina Rozenberg.</footer>
</body>

</html>