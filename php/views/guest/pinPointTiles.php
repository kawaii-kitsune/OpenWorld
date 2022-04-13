<?php
$url = 'https://isl.ics.forth.gr/archetypo-api-emiiak/entities';
$collection_name = 'Monument';
$request_url = $url . '/' . $collection_name;
$curl = curl_init($request_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($curl);
curl_close($curl);

$res=json_decode($response);
foreach($res->{"entities"} as $entity){
    
    $monument_id=$entity->{"id"};
    if($monument_id!='2'){
        $request_url=$url . '/' . $collection_name.'/'.$monument_id;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl);
        curl_close($curl);
        $loc=json_decode($response);
        $mon_name=$loc->{"name"};
        $loc=$loc->{"details"};
        foreach($loc as $detail){
            if($detail->{'label'}=="coordinates"){
                $geo=explode(",", $detail->{'values'}[0]);
            }
        }
        ?>
                <li class='pinPointTile-list-item my-1'>
                    <div class="box">

                        <div class="container m-2">
                            <div class="col-4 pinPointTile pinPointTile-<?php echo  $monument_id; ?> m-2">

                                <div class="columns  is-align-items-center">
                                    <div class="column is-three-quarters">
                                        <p class=""><?php echo  $mon_name; ?> </p>
                                    </div>
                                    <div class="column is-one-quarter">
                                        <span class="button is-link is-inverted is-hovered" onclick="goTo(<?php echo  $geo[1]; ?>,<?php echo  $geo[0]; ?>)"><i class="fas fa-thumbtack"></i></span>
                                    </div>

                                </div>
                                <div class="columns is-centered">
                                    <a href="/OpenWorld/php/views/3dXdom/model-view.php?modelId=<?php echo  $monument_id; ?>" target="_blank" class="is-centered" rel="noopener noreferrer">
                                        <button class="button is-link is-centered" value="<?php echo  $monument_id; ?>">Navigate</button>
                                    </a>
<a  ><button class="button is-outlined mx-2 model-info-button" onclick="openNav(this)" value="<?php echo  $monument_id; ?>"><i class="fas fa-question mx-2"></i> info</button></a>
                                    

                                    <a href="/OpenWorld/php/views/bonanza.php?modelId=<?php echo  $mon_name; ?>" target="_blank" class="is-centered" rel="noopener noreferrer">
                                        <button class="button is-warning is-centered" value="<?php echo  $monument_id; ?>">Relics</button>
                                    </a>
                                </div>
                                
                                


                            </div>
                        </div>
                    </div>
                </li>
<?php }

}

?>