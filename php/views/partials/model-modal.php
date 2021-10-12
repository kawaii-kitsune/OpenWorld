<div class="modal" id="modal-model">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <form name="frmContact" id="form-modal" column" method="post" action="php/controller/insertPin.php">

                    <div class="columns">
                        <label id="locName" for="Name column" class="subtitle column is-full is-centered">Name your Location </label>
                    </div>

                    <hr>

                    <div class="columns">
                        <label for="GLTF column" class="subtitle is-3">gltf (URL) </label>
                        <input class="input column " type="text" name="GLTF" id="GLTF">
                    </div>

                    <div class="columns">
                        <input class="button column is-info" type="submit" name="Submit" id="Submit" value="Submit">
                    </div>

                </form>
            </div>
            <button id='modal-close-2' class="modal-close is-large" aria-label="close"></button>
        </div>
    </div>

</div>