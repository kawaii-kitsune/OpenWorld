<?php
$q = intval($_GET['id']);

$con = mysqli_connect('localhost','root','','db_contact');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"connect");
$sql="SELECT * FROM images WHERE id = '".$q."'";
$sql2="SELECT * FROM pinscoord WHERE id = '".$q."'";
$resultImages = mysqli_query($con,$sql);
$resultInfo = mysqli_query($con,$sql2);
?>
<div class="columns">
    <?php while($row = mysqli_fetch_array($resultInfo)){ ?>
    
        <div class="container">
            <h5 id="off-title"><i class="fas fa-info-circle"></i><?php echo $row['fldName'] ?> </h5>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>

    </div>
    <div class="columns">
        <model-viewer src="<?php echo $row['GLTF'] ?>" alt="A 3D model of an astronaut" ar
            ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls
            id="model-viewer-off">
        </model-viewer>
    </div>
    <div class="columns">
        <p><?php echo $row['info'] ?></p>

    </div>

    <?php } ?>
    <div class="slideshow-container columns">
        <?php while($row = mysqli_fetch_array($resultImages)){ ?>
        <div class="mySlides fade">
            <img src="<?php echo $row['URL'] ?>" style="width:100%">
        </div>

        <?php } ?>
        <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-angle-double-left"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fas fa-angle-double-right"></i></a>
        <br>

    </div>
 <?php   mysqli_close($con);
?>