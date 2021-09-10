<div class="modal" id="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <form name="frmContact column" method="post" action="php/controller/insertPin.php">

                    <div class="columns">
                        <label for="Name column" class="subtitle column is-full is-centered">Name your Location </label>
                    </div>
                    <div class="columns">
                        <input class="input column is-full" type="text" name="txtName" id="txtName">
                    </div>

                    <hr>

                    <div class="columns">
                        <label for="x column" class="subtitle is-3">xAxis (Long) </label>
                        <input class="input column " type="text" name="txtΧ" id="txtΧ">
                    </div>


                    <div class="columns">
                        <label for="y column" class="subtitle is-3">yAxis (Lat) </label>
                        <input class="input column " type="text" name="txtY" id="txtY">
                    </div>
                    <div class="columns">
                        <input class="button column is-info" type="submit" name="Submit" id="Submit" value="Submit">
                    </div>

                </form>
            </div>
            <button id='modal-close' class="modal-close is-large" aria-label="close"></button>
        </div>
    </div>

</div>