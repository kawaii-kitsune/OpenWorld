<?php 
// Check if the user is already logged in, if yes make logout button appear
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-divider@0.2.0/dist/css/bulma-divider.min.css"
    integrity="sha256-rFnzhAMFs9eETsAfAAvhzFLWW8SCqUpBjCboDB6ITtg=" crossorigin="anonymous">
<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">


    <div class="navbar-brand">
        <a class="navbar-item" href="/OpenWorld">
            <img src="/OpenWorld/assets/openWorldLine.png">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">


            <a class="navbar-item" href="/OpenWorld/php/views/documentation/documentation.php">
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
                    <div class="is-divider" data-content="OR"></div>
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-divider@0.2.0/dist/css/bulma-divider.min.css"
            integrity="sha256-rFnzhAMFs9eETsAfAAvhzFLWW8SCqUpBjCboDB6ITtg=" crossorigin="anonymous">
        <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">


            <div class="navbar-brand">
                <a class="navbar-item" href="/OpenWorld">
                    <img src="/OpenWorld/assets/openWorldLine.png">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">


                    <a class="navbar-item" href="/OpenWorld/php/views/documentation/documentation.php">
                        Documentation
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            More
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item is-align-items-center" href="/OpenWorld/php/views/guest/about.php">
                                <i class="fas fa-info-circle mr-2"></i> About
                            </a>
                            <a class="navbar-item is-align-items-center"
                                href="/OpenWorld/php/views/guest/contactUs.php">
                                <i class="fas fa-file-signature mr-2"></i> Contact
                            </a>
                            <div class="is-divider" data-content="OR"></div>
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
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" href="/OpenWorld/php/views/login.php">
                            <i class="fas fa-user-shield mx-2"></i><strong>Admin</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <?php 
}
?>

            </div>
        </nav>