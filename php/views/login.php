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
<?php require '../partials/head.php'?>

<body>
    <main>
        <?php require '../partials/navbar.php'?>
        <?php require '../partials/hero.php'?>
        <div class="container">
            <div class="columns is-centered">
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
        
        <?php require '../partials/footer.php'?>
    </main>
    <?php require '../partials/scripts.php'?>

</body>

</html>