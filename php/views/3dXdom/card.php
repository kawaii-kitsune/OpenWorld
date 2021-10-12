<!-- controls-card -->
<div id="control-card" class="card m-2  w-25 d-xs-none d-sm-none d-md-block"
    style="position: absolute; bottom: 0; left: 0;z-index:101;">
    <div class="card-head mt-2 container">
        <div class="row">
            <div class="container col-8">
                <h5>VR control picker <span><i class="fas fa-vr-cardboard"></i></span> </h5>

            </div>
            <div class="container col-4">
                <h6 id='controller-hoverable'>Controller <small><i class="far fa-question-circle"></i></small>
                </h6>
            </div>
        </div>


    </div>
    <div class="card-body mt-0">
        <div class="row my-2">

            <div class="container col-12">
                <div class="row ">

                    <div class="container col-6 ">
                        <div class="row">
                            <div class="container col-12 my-2">
                                <h6><i class="fas fa-hand-paper" style="transform: scaleX(-1);"></i> Left
                                    Hand</h6>
                            </div>


                        </div>
                        <div class="row">
                            <div class="container col-12">
                                <div class="form-check">
                                    <input class="form-check-input hand-left" type="radio" name="left-hand"
                                        id="left-hand-1">
                                    <label class="form-check-label" for="left-hand-1">
                                        Hand Mode
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input tele-left" type="radio" name="left-hand"
                                        id="left-hand-2" checked>
                                    <label class="form-check-label" for="left-hand-2">
                                        Teleport
                                    </label>
                                </div>
                                <?php // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    ?>
                                <div class="form-check">
                                    <input class="form-check-input tele-left" type="radio" name="left-hand"
                                        id="left-hand-3" disabled>
                                    <label class="form-check-label" for="left-hand-3">
                                        Laser <strong><small class="badge bg-success">BETA</small></strong>
                                    </label>
                                </div>

                                <?php
}else{ ?>
                                <div class="form-check">
                                    <input class="form-check-input tele-left" type="radio" name="left-hand"
                                        id="left-hand-3">
                                    <label class="form-check-label" for="left-hand-3">
                                        Laser <strong><small class="badge bg-success">BETA</small></strong>
                                    </label>
                                </div>

                                <?php }?>
                            </div>
                            <div class="row left-opions-teleport-container" id="left-opions-teleport-container">
                                <label for="TeleportOptions text-align-left">Teleport Options</label>
                                <select class="form-control w-75" id="TeleportOptionsLeft">
                                    <option class="option-left" id="option-left-trigger" value="Trigger">Trigger
                                    </option>
                                    <option class="option-left" id="option-left-trackpad" value="Trackpad">
                                        Trackpad
                                    </option>
                                    <option class="option-left" id="option-left-menu" value="Menu" disabled>Menu
                                    </option>
                                    <option class="option-left" id="option-left-grip" value="Grip">Grip</option>
                                </select>
                            </div>
                            <div class="row left-opions-hand-container hand-container" id="left-opions-hand-container">
                                <label for="handOptions text-align-left">Hand Options</label>
                                <select class="form-control w-75" id="handOptionsLeft">
                                    <option class="option-left" id="option-left-lowpoly" value="lowPoly">lowPoly
                                    </option>
                                    <option class="option-left" id="option-left-toon" value="toon">toon</option>
                                    <option class="option-left" id="option-left-highpoly" value="highPoly">
                                        highPoly
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="container col-6 ">
                        <div class="row">
                            <div class="row w-100">
                                <div class="container col-12 my-2">
                                    <h6><i class="fas fa-hand-paper"></i> Right Hand</h6>
                                </div>

                            </div>
                            <div class="container col-12"></div>
                            <div class="form-check">
                                <input class="form-check-input hand-right" type="radio" name="right-hand"
                                    id="right-hand-1">
                                <label class="form-check-label" for="right-hand-1">
                                    Hand Mode
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input tele-right" type="radio" name="right-hand"
                                    id="right-hand-2" checked>
                                <label class="form-check-label" for="right-hand-2">
                                    Teleport
                                </label>
                            </div>
                            <?php // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    ?>
                            <div class="form-check">
                                <input class="form-check-input tele-right" type="radio" name="right-hand"
                                    id="right-hand-3" disabled>
                                <label class="form-check-label" for="right-hand-3">
                                    Laser <strong><small class="badge bg-success">BETA</small></strong>
                                </label>
                            </div>

                            <?php
}else{ ?>
                            <div class="form-check">
                                <input class="form-check-input tele-right" type="radio" name="right-hand"
                                    id="right-hand-3">
                                <label class="form-check-label" for="right-hand-3">
                                    Laser <strong><small class="badge bg-success">BETA</small></strong>
                                </label>
                            </div>

                            <?php }?>

                        </div>
                        <div class="row right-opions-teleport-container" id="right-opions-teleport-container">
                            <label for="TeleportOptions text-align-right">Teleport Options</label>
                            <select class="form-control w-75" id="TeleportOptionsRight">
                                <option class="option-right" id="option-right-trigger" value="Trigger">Trigger
                                </option>
                                <option class="option-right" id="option-right-trackpad" value="Trackpad">
                                    Trackpad
                                </option>
                                <option class="option-right" id="option-right-menu" value="Menu" disabled>Menu
                                </option>
                                <option class="option-right" id="option-right-grip" value="Grip">Grip</option>
                            </select>
                        </div>
                        <div class="row right-opions-hand-container hand-container" id="right-opions-hand-container">
                            <label for="handOptions text-align-right">Hand Options</label>
                            <select class="form-control w-75" id="handOptionsright">
                                <option class="option-right" id="option-right-lowpoly" value="lowPoly">lowPoly
                                </option>
                                <option class="option-right" id="option-right-toon" value="toon">toon</option>
                                <option class="option-right" id="option-right-highpoly" value="highPoly">
                                    highPoly
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class=" my-2 w-100">
        <div class="row my-2">
            <div class="row">
                <div class="container col-12">
                    <h5>Desktop controls <span><i class="fas fa-desktop"></i></i></span> </h5>

                </div>
            </div>
            <div class="container col-6">
                <div class="row">
                    <h6>Keyboard <span><i class="fas fa-keyboard"></i></span></h6>
                </div>

                <div class="row">
                    <h6><span><i class="fas fa-chevron-circle-up"></i></span> or <strong>W</strong>
                        :Forward
                    </h6>
                </div>
                <div class="row">
                    <h6><span><i class="fas fa-chevron-circle-down"></i></span> or
                        <strong>S</strong>
                        :Backward
                    </h6>
                </div>
                <div class="row">
                    <h6><span><i class="fas fa-chevron-circle-left"></i></span> or
                        <strong>A</strong> :Left
                    </h6>
                </div>
                <div class="row">
                    <h6><span><i class="fas fa-chevron-circle-right"></i></span> or
                        <strong>D</strong>
                        :Right
                    </h6>
                </div>

            </div>
            <div class="cotainer col-6">
                <div class="row">
                    <div class="col-12">
                        <h6> Mouse <i class="fas fa-mouse-pointer"></i></h6>
                    </div>
                </div>

                <div class="row">
                    <h6><strong>T</strong> :Enter/Exit FPS Camera</h6>

                </div>
                <div class="row my-1">
                    <h6 class="text-muted">Take a Shot</h6>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a class="text-light btn btn-warning " href="#" id="screenshot"><i
                                class="fas fa-camera mx-2"></i></a>
                    </div>

                </div>
                <div class="row my-1">
                    <h6 class="text-muted">or press <strong>M</strong> </h6>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

<!--  -->