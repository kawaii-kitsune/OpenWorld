<?php
$monument_id = intval($_GET['id']);
$image_url='https://isl.ics.forth.gr/archetypo-api-emiiak/get-file/';
$url = 'https://isl.ics.forth.gr/archetypo-api-emiiak/entities';
$collection_name = 'Monument';
$request_url=$url . '/' . $collection_name.'/'.$monument_id;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl);
        curl_close($curl);
        $loc=json_decode($response);
        $mon_name=$loc->{"name"};
        $loc=$loc->{"details"};
        
        foreach($loc as $detail){
            if($detail->{'label'}=="description"){
                $description=$detail->{'values'}[0];
            }
            if($detail->{'label'}=="coordinates"){
                $geo=explode(",", $detail->{'values'}[0]);
            }
            if($detail->{'label'}=="image_file"){
                $images=[];
                foreach($detail->{'values'} as $value){
                    array_push($images,$image_url.$value);
                }
            }
        }
?>
<div class="columns">
        <div class="container">
            <h5 id="off-title"><i class="fas fa-info-circle"></i><?php echo $mon_name; ?> </h5>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>

    </div>
    <div class="columns">
        <model-viewer src="/OpenWorld/test-models/onisimos.glb" alt="A 3D model of an astronaut" ar
            ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls
            id="model-viewer-off">
        </model-viewer>
    </div>
    <div class="columns">
        <p><?php echo $description; ?></p>

    </div>
    <div class="slideshow-container columns">
        <?php foreach($images as $value){ ?>
        <div class="mySlides fade">
            <img src="<?php echo $value ?>" style="width:100%">
        </div>

        <?php } ?>
        <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-angle-double-left"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fas fa-angle-double-right"></i></a>
        <br>

    </div>
