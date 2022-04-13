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
        <?php require '../partials/navbar.php'?>   
            <main>
                <section class="hero">
                    <div class="hero-body">
                        <div class="container has-text-centered">
                            <p class="title">
                                Advanced Search
                            </p>
                            <p class="subtitle">
                                fill the fields to fnd eveything you want
                            </p>
                        </div>
                    </div>
                    <div class="hero-foot">
                        <nav class="tabs is-boxed is-fullwidth">
                            <div class="container">
                                <ul>
                                    <li class="is-active">
                                        <a>Objects</a>
                                    </li>
                                    <li>
                                        <a>Monuments</a>
                                    </li>
                                    <li>
                                        <a>Archive</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="container my-3">
                            <div class="columns">
                                <div class="column">
                                    <div class="columns">
                                        <div class="field">
                                            <label class="label">Numeric Code</label>
                                            <div class="control">
                                                <input name='code_number'class="input" type="text" placeholder="010203">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="field">
                                            <label class="label">Relic ID</label>
                                            <div class="control">
                                                <input name='relic_id'class="input" type="text" placeholder="01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="field">
                                            <label class="label">Relic Name</label>
                                            <div class="control">
                                                <input name='monument_location' class="input" type="text" placeholder="Δισκοπότηρο">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="field">
                                        <label class="label">Category/ Type</label>
                                            <p class="control has-icons-left">
                                                <span class="select">
                                                    <select name="relic_type" id="relic_type">
                                                        <option value="">--- Choose a color ---</option>
                                                        <option value="Εικόνα">Εικόνα</option>
                                                        <option value="Βιβλίο">Βιβλίο</option>
                                                        <option value="Μνημείο">Μνημείο</option>
                                                    </select>
                                                </span>
                                                <span class="icon is-small is-left">
                                                <i class="fas fa-globe"></i>
                                                </span>
                                            </p>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                    <div class="columns">
                                        <div class="field">
                                            <label class="label">Numeric Code</label>
                                            <div class="control">
                                                <input name='code_number'class="input" type="text" placeholder="010203">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="field">
                                            <label class="label">Relic ID</label>
                                            <div class="control">
                                                <input name='relic_id'class="input" type="text" placeholder="01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="field">
                                            <label class="label">Relic Name</label>
                                            <div class="control">
                                                <input name='monument_location' class="input" type="text" placeholder="Δισκοπότηρο">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="field">
                                        <label class="label">Category/ Type</label>
                                            <p class="control has-icons-left">
                                                <span class="select">
                                                    <select name="relic_type" id="relic_type">
                                                        <option value="">--- Choose a color ---</option>
                                                        <option value="Εικόνα">Εικόνα</option>
                                                        <option value="Βιβλίο">Βιβλίο</option>
                                                        <option value="Μνημείο">Μνημείο</option>
                                                    </select>
                                                </span>
                                                <span class="icon is-small is-left">
                                                <i class="fas fa-globe"></i>
                                                </span>
                                            </p>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </main>
        <?php require '../partials/footer.php'?>    
    </body>
</html>