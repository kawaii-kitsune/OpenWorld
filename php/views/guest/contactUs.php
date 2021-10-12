<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://drive.google.com/uc?id=1shUIVy_QdEeVXB0C3jFL8I5QKGqKigF" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- BULMA CSS js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script type="text/javascript" src="../../js/bulma.js"></script>
    <!-- <link rel="stylesheet alternate" href="css/light-theme.css" id="light" title="Light"> -->
    <!-- <link rel="stylesheet alternate" href="css/dark-theme.css"  id="dark"  title="Dark"> -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- bootstrap -->
    <title>OpenWorld</title>
</head>

<body>
    <main>
        <?php require '../partials/navbar.php'?>

        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="columns is-12 is-variable ">
                        <div class="column is-two-thirds has-text-left">
                            <h1 class="title is-1">Contact Us</h1>
                            <p class="is-size-4">Communication is the key to a good Ui, so share your opinion to make a
                                better app!</p>
                            <div class="social-media">
                                <a href="https://facebook.com" target="_blank" class="button is-light is-large"><i
                                        class="fab fa-facebook-square" aria-hidden="true"></i></a>
                                <a href="https://instagram.com" target="_blank" class="button is-light is-large"><i
                                        class="fab fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://twitter.com" target="_blank" class="button is-light is-large"><i
                                        class="fab fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="column is-one-third has-text-left">
                            <fieldset class="card columns is-8 is-half" style="margin-top:5%;margin-bottom:10%;">
                                <div class="card-content column">
                                    <legend class="title column">Contact Form</legend>
                                    <hr>
                                    <form name="frmContact column" method="post"
                                        action="../../controller/contactUs.php">
                                        <p>
                                            <label for="Name column" class="subtitle is-3">Name </label>
                                            <input class="input column is-half" type="text" name="txtName" id="txtName">
                                        </p>
                                        <p>
                                            <label for="email column" class="subtitle is-3">Email</label>
                                            <input class="input column is-half" type="text" name="txtEmail"
                                                id="txtEmail">
                                        </p>
                                        <p>
                                            <label for="phone column" class="subtitle is-3">Phone</label>
                                            <input class="input column is-half" type="text" name="txtPhone"
                                                id="txtPhone">
                                        </p>
                                        <p>
                                            <label for="message column" class="subtitle is-3">Message</label>
                                            <textarea class="input column is-full" name="txtMessage" id="txtMessage"
                                                style="height:50%;"></textarea>
                                        </p>
                                        <p>&nbsp;</p>
                                        <p>
                                            <input class="button column is-info" type="submit" name="Submit" id="Submit"
                                                value="Submit">
                                        </p>
                                    </form>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                </div>
        </section>


        <?php require '../partials/footer.php'?>
    </main>
    </script>
    <!-- model-viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>
</body>

</html>