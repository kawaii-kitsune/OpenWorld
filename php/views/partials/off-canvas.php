<style>
.mySlides {
    display: none
}

img {
    object-fit: cover;
    vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
}

/* Next & previous buttons */
.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}


/* The dots/bullets/indicators */
.dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active,
.dot:hover {
    background-color: #717171;
}

/* Fading animation */
.fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
}

@-webkit-keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

@keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {

    .prev,
    .next,
    .text {
        font-size: 11px
    }
}

.sidenav {
    flex-wrap: wrap;
    align-content: center;
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #ffffff;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav div {
    flex-wrap: wrap;
    align-content: center;
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 14px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }

    .sidenav a {
        font-size: 18px;
    }
}
</style>
<div id="mySidenav" class="sidenav">
    <div id="offcanvasCont" class="container">
        <div class="columns">
            <div class="container">
                <h5 id="off-title"><i class="fas fa-info-circle"></i> Όνομα Μνημείου</h5>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            </div>

        </div>
        <div class="columns">
            <model-viewer src="/OpenWorld/test-models/naos.glb" alt="A 3D model of an astronaut" ar
                ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls
                id="model-viewer-off">
            </model-viewer>
        </div>
        <div class="columns">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

        </div>


        <div class="slideshow-container columns">

            <div class="mySlides fade">
                <img src="https://picsum.photos/id/237/600/300" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="https://picsum.photos/id/237/600/300" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="https://picsum.photos/id/237/600/300" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-angle-double-left"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fas fa-angle-double-right"></i></a>
            <br>

        </div>



    </div>
</div>


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}
</script>

</div>

