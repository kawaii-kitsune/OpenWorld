<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/OpenWorld">
            <img src="https://drive.google.com/uc?id=1VZYSJUNICG-G7pOhDztorcNAd6Sm2zbL">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">


            <a class="navbar-item">
                Documentation
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    More
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item is-align-items-center" href="/OpenWorld/php/views/about.php">
                        <i class="fas fa-info-circle mr-2"></i> About
                    </a>
                    <a class="navbar-item is-align-items-center" href="/OpenWorld/php/views/contactUs.php">
                        <i class="fas fa-file-signature mr-2"></i> Contact
                    </a>
                    <hr class="navbar-divider is-warning">
                    <a class="navbar-item is-align-items-center">
                        <i class="fas fa-bug mr-2"></i> Report an issue
                    </a>
                </div>
            </div>
            <div class=" navbar-item is-align-self-center mx-2">

                <div class="columns">
                    <div class="column">
                        <label class="radio column">
                        <b class="theme-icon"><i class="fas fa-sun mx-1 is-active" id="sun"></i></b>
                    </label>
                    </div>
                    <div class="column">
                        <label class="radio column">
                        <b class="theme-icon"><i class="fas fa-moon mx-1" id="moon"></i></b>
                    </label>
                    </div>
                    
                </div>

            </div>


        </div>
        <?php 
// Check if the user is already logged in, if yes make logout button appear
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    ?>
        <div class="navbar-end">
            <div class="navbar-item">
                <h6 class="is-size-6 mx-4">
                    <?php 
              echo $_SESSION["username"]
            ?>:
                </h6>
                <div class="buttons">
                    <a class="button is-warning is-rounded is-hovered" href="/OpenWorld/php/controller/logout.php">
                        Log out
                    </a>
                </div>
            </div>
        </div>
        <?php
}
else{
  ?>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="/OpenWorld/php/views/register.php">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
            </div>
        </div>
        <?php 
}
?>

    </div>
</nav>