<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <link rel =" shortcut icon"  type = "image/png"
    href="images/logo_title.png" >
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css">
    <script src="https://unpkg.com/js-image-zoom@0.4.1/js-image-zoom.js" type="application/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <?php

@include 'config.php';
if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']); 
//   $user_type = $_POST['user_type'];

  $select = "SELECT* FROM user_form WHERE email = '$email' && password= '$pass' ";
  $result = mysqli_query($conn, $select);
  if(mysqli_num_rows($result)> 0){
    $error[] = 'user aleady exist!';
  }else{
    if($pass != $cpass){
        $error[] = 'password not matched!';
    }else{
       $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
       mysqli_query($conn, $insert);
       header('location: login_form.php');
    }
  }
};
?>

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo'<span class = "error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name = "name" require placeholder="Enter your name">
            <input type="email" name = "email" require placeholder="Enter your email">
            <input type="password" name = "password" require placeholder="Enter your password">
            <input type="password" name = "cpassword" require placeholder="Confirm your password">
            <input type="submit" name = ""submit value="register now" class = "form-btn"> 
            <p>Already have an account? <a href="../components/login_form.php">login</a></p>
        </form>
    </div>
</body>
</html>