<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once '../controller/connDB.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: ../../index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="/OpenWorld/assets/favico.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script type="text/javascript" src="/OpenWorld/js/bulma.js"></script>
    <link rel="stylesheet" href="/OpenWorld/css/style.css">

    <title>OpenWorld</title>
</head>

<body>
    <main>
        <?php require '../views/partials/navbar.php'?>
        <?php require '../views/partials/hero.php'?>
        <div class="container my-4">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="card">
                        <div class="card-image ">
                            <figure class="image is-4by3 box">
                                <img src="/OpenWorld/assets/tile.png" alt="Placeholder image">
                                <a href="/OpenWorld/php/guest.php"><button class="button is-normal button box"
                                        style="bottom: 30%;"> <b>
                                            Enter <i class="fas fa-user-friends"></i>
                                        </b> </button></a>

                            </figure>

                        </div>
                    </div>
                </div>
                <div class="column is-3 ">
                    <div class="wrapper box">
                        <h2 class="is-size-2 is-centered">Login</h2>
                        <p class="is-size-7 is-centered">Please fill in your credentials to login.</p>

                        <?php 
        if(!empty($login_err)){
            echo '<span class="tag is-danger">' . $login_err . '</span>';
        }        
        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label class="is-size-4">Username</label>
                                <input type="text" name="username"
                                    class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> input is-info"
                                    value="<?php echo $username; ?>">
                                <span class="invalid-feedback tag  is-white my-1"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label class="is-size-4">Password</label>
                                <input type="password" name="password"
                                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?> input is-info">
                                <span class="invalid-feedback tag is-white my-1"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group my-1">
                                <input type="submit" class="button is-primary" value="Login">
                            </div>
                            <p class="is-size-6">Don't have an account? <a href="register.php">Sign up now</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php require '../views/partials/footer.php'?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/OpenWorld/js/dark-theme.js"></script>
    </main>

</body>

</html>