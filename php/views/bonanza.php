<?php 
$name_not_url=$_GET['modelId'];
$name=rawurlencode($_GET['modelId']);

$url = 'https://isl.ics.forth.gr/archetypo-api-emiiak/entities';
$collection_name = 'Object';
$tag_names='&tag_names=IdentityOfObject/IsEquipmentOf/DatabaseMonument';
$tag_data='?tag_data='.$name;
$tags='&tags_exact_match=false';
$request_url = $url .'/'.$collection_name.$tag_data.$tag_names.$tags;
$curl = curl_init($request_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($curl);

$res=json_decode($response);
// echo $request_url;
?>
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
<style>
    .img-zoom-container {
  position: relative;
}

.img-zoom-lens {
  position: absolute;
  border: 3px solid #d4d4d4;
  /*set the size of the lens:*/
  
  width: 40px;
  height: 40px;
}

.img-zoom-result {
  border: 1px solid #d4d4d4;
  /*set the size of the result div:*/
  width: 250px;
  height: 250px;
  position: fixed;
    bottom: 0;
    right: 0;
    margin:5%;
}
.flBtnCntr {
    display: inline-flex;
    position: relative;
}

.flBtnBox {
    outline: 0;
    border: 0;
    border-radius: 50%;
    background-color: #2978d3;
    color: #fff;
    cursor: pointer
}

.flBtnBox.big {
    /* background-color: #2978d3; */
    font-size: 30px;
    height: 60px;
    width: 60px;
}

.flBtnBox.small {
    animation: showBtn 150ms cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    transform: scale(0);
    /* background-color: #363636; */
    margin: 0 5px;
    font-size: 20px;
    height: 50px;
    width: 50px;
}

.flBtnBox.small:nth-child(2) {
    animation-delay: 150ms
}

.flBtnBox.small:nth-child(3) {
    animation-delay: 300ms
}

@keyframes showBtn {
    0% {
        transform: scale(0)
    }

    100% {
        transform: scale(1)
    }
}

.flBtnBox.big:hover {
    box-shadow: 0 0 10px rgba(41, 120, 211, 0.4)
}

.flBtnBox.small:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3)
}

.flBtns {
    position: absolute;
    left: 100%;
    display: none;
    padding: 0 5px;
    justify-content: center;
    align-items: center;
}

.flBtnCntr:hover .flBtns {
    display: inline-flex
}
</style>

<body>
    <main>
        <?php require 'partials/navbar.php'?>

        <section class="hero is-half ">
            <div class="hero-body">
                <h1 class="title">Relics of this monument</h1>
            </div>
        </section>
        <section class="section ">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-9">
                    <div class="tile">
                        <div class="tile is-parent" id="viewer-tile">

                            <article class="tile is-child box">
                                <p class="title">Monument</p>
                                <div class="content" style="height:100%;">
                                    <div class="mb-2">
                                        <div class="flBtnCntr">
                                            <button class="flBtnBox big button is-link"><i class="fas fa-eye"></i></button>
                                            <div class="flBtns">
                                                <button class="flBtnBox small button is-warning"><i
                                                        class="fas fa-vr-cardboard"></i></button>
                                                <button class="flBtnBox small button is-warning " slot="ar-button"><i class="fas fa-cube"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <model-viewer style="height:700px;"
                                        alt="Neil Armstrong's Spacesuit from the Smithsonian Digitization Programs Office and National Air and Space Museum"
                                        src="/OpenWorld/test-models/onisimos.glb" ar
                                        ar-modes="webxr scene-viewer quick-look"
                                        poster="shared-assets/models/NeilArmstrong.webp" seamless-poster
                                        shadow-intensity="1" camera-controls></model-viewer>

                                </div>


                            </article>
                        </div>
                        <div class="tile is-8 is-vertical">
                            <div class="tile">
                                <div class="tile is-parent">
                                    <article class="tile is-child box">
                                        <p class="title"><?php echo $name_not_url ?></p>
                                        <p class="subtitle">things we found there</p>
                                        <ul>
                                        <div class="overflow-scroll">
                                        <?php
$sum_images=[];
if($res->{"entities"}!=NULL){
    foreach($res->{"entities"} as $entity){
    
        $monument_id=$entity->{"id"};
        $image_url='https://isl.ics.forth.gr/archetypo-api-emiiak/get-file/';
        $request_url=$url . '/' . $collection_name.'/'.$monument_id;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl);
        curl_close($curl);
        $loc=json_decode($response);
        $mon_name=$loc->{"name"};
        $loc=$loc->{"details"};
        
        foreach($loc as $detail){
            if($detail->{'label'}=="code_number"){
                    $code=$detail->{'values'};
                }
            if($detail->{'label'}=="image_file"){
                    $images=[];
                    foreach($detail->{'values'} as $value){
                        array_push($images,$image_url.$value);
                        array_push($sum_images,$value);
                    }
            }
        }
        ?>
                      <li class="my-1">
                          <style>
                              .img__description {
                                    position: absolute;
                                    border-radius:10%;
                                    top: 0;
                                    bottom: 0;
                                    left: 0;
                                    right: 0;
                                    background: rgba(255,255,255,0.5);
                                    color: black;
                                    visibility: hidden;
                                    opacity: 0;

                                    /* transition effect. not necessary */
                                    transition: opacity .2s, visibility .2s;
                                    }
                                    figure:hover .img__description {
                                    visibility: visible;
                                    opacity: 1;
                                    cursor: pointer;
                                    }
                          </style>
                                                <div class="box">
                                                    <div class="columns">
                                                        <h5 >
                                                            <?php echo $mon_name ?>
                                                        </h5>
                                                    </div>
                                                    <div class="columns">
                                                        <div class="column">
                                                            <figure class="image is-square" onclick="clickHandlerFigure(this)">
                                                                <img class="is-rounded" src="<?php echo $images[0] ?>">
                                                                <p class="img__description is-align-self-center" >View Image <i class="fas fa-eye"></i></p>
                                                            </figure>
                                                        </div>
                                                        <div class="column">
                                                            <p><?php echo implode($code); ?></p>
                                                        </div>
                                                        <div class="column">

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>  
                                        <?php
                                    }
                                }
                                else{
                                    echo "No Relics Where found";
                                    ?>
                <aside>
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-template">
                            <h1>
                                Oops!</h1>
                            <h2>
                                There are no relics for <strong><?php echo $name_not_url; ?></strong></h2>
                            <div class="error-details">
                                We will find them eventually
                            </div>
                            <div class="error-actions">
                                <a href="/OpenWorld/" class="button mx-2 is-link"><span class="glyphicon glyphicon-home"></span>
                                    Take Me Home </a><a href="/OpenWorld/" class="button mx-2"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            </aside>
                <?php
            }
            ?>
             </div>
                                        </ul>
                                    </article>
                                </div>

                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child box">
                                    <div class="tabs">
                                        <ul>
                                            <li class="is-active file-panel-button"><a>Pictures</a></li>
                                            <li class="file-panel-button"><a>Music</a></li>
                                            <li class="file-panel-button"><a>Videos</a></li>
                                            <li class="file-panel-button"><a>Documents</a></li>
                                        </ul>
                                    </div>
                                    <div class="overflow-scroll" >
                                    <?php
                                    if($res->{"entities"}!=NULL){
                                    foreach($sum_images as $value){?>
                                    <a class="panel-block has-text-left has-text-weight-light is-size-7">
                                        <span class="panel-icon">
                                            <i class="fas fa-image" aria-hidden="true"></i>
                                        </span>
                                        <?php echo $value; ?>
                                    </a>
                                    <?php 
                                    } 
                                }
                                else{
                                        echo "NOTHING TO SHOW";
                                    }?>
                                    </div>
                                </article>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require './partials/footer.php'?>
    </main>
    <script>
        var elements = document.getElementsByClassName("file-panel-button");

        var myFunction = function() {
            for (var i = 0; i < elements.length; i++) {
                elements[i].classList.remove('is-active');
            }
            this.classList.add('is-active');
            alert(this.innerText);
        };

        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', myFunction, false);
        }
        function clickHandlerFigure(elem){
            var pic_src=elem.children[0].src;
            var img = new Image();
            img.src =pic_src;
            img.id="myimage"
            document.getElementById('modal-picture').innerHTML='';
            document.getElementById('modal-picture').appendChild(img);
            document.getElementById('modal').classList.add('is-active');
            imageZoom("myimage", "myresult");
        }
        
        function close_modal(){
            document.getElementById('modal').classList.remove('is-active');   
        }
        function imageZoom(imgID, resultID) {
            var img, lens, result, cx, cy;
            img = document.getElementById(imgID);
            result = document.getElementById(resultID);
            /*create lens:*/
            lens = document.createElement("DIV");
            lens.setAttribute("class", "img-zoom-lens");
            /*insert lens:*/
            img.parentElement.insertBefore(lens, img);
            /*calculate the ratio between result DIV and lens:*/
            cx = result.offsetWidth / lens.offsetWidth;
            cy = result.offsetHeight / lens.offsetHeight;
            /*set background properties for the result DIV:*/
            result.style.backgroundImage = "url('" + img.src + "')";
            result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
            /*execute a function when someone moves the cursor over the image, or the lens:*/
            lens.addEventListener("mousemove", moveLens);
            img.addEventListener("mousemove", moveLens);
            /*and also for touch screens:*/
            lens.addEventListener("touchmove", moveLens);
            img.addEventListener("touchmove", moveLens);
            function moveLens(e) {
                var pos, x, y;
                /*prevent any other actions that may occur when moving over the image:*/
                e.preventDefault();
                /*get the cursor's x and y positions:*/
                pos = getCursorPos(e);
                /*calculate the position of the lens:*/
                x = pos.x - (lens.offsetWidth / 2);
                y = pos.y - (lens.offsetHeight / 2);
                /*prevent the lens from being positioned outside the image:*/
                if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
                if (x < 0) {x = 0;}
                if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
                if (y < 0) {y = 0;}
                /*set the position of the lens:*/
                lens.style.left = x + "px";
                lens.style.top = y + "px";
                /*display what the lens "sees":*/
                result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
            }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
    </script>
    <div class="modal" id="modal">
    <div class="modal-background" onclick="close_modal()"></div>
        <div class="card">
            <div class="card-content">
                <div id="modal-picture" class="img-zoom-container">
                
                </div>
                
            <button id='modal-close' class="modal-close is-large" aria-label="close" onclick="close_modal()"> </button>
        </div>
        <div id="myresult" class="img-zoom-result"></div>
    </div>
    
</div>
    <!-- model-viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <!-- <script type="text/javascript" src="../../js/main.js"></script> -->
</body>

</html>