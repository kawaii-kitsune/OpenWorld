<footer class="footer">
    <div class="columns">
        <div class="column">
            <p class="is-size-6">
            <div class="content has-text-centered">© <b id="date"></b> Copyright:
                Εργαστήριο Πολυμέσων, Δικτύων και Επικοινωνιών (MNCLab)
                </p>
            </div>
        </div>
        <div class="column">

            <a href="https://github.com/kawaii-kitsune" target="_blank">
                <strong class="is-size-6"><i class="fab fa-github"></i> kawaii-kitsune</strong></a>

        </div>
    </div>


    <script>
    var d = new Date();
    var n = d.getFullYear();
    document.getElementById('date').innerHTML = n;
    </script>

</footer>