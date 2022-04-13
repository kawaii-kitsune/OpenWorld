
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
        <script>
            loadModel(<?php echo $geo[1]; ?>, <?php echo $geo[0] ?>, '/OpenWorld/test-models/onisimos.glb', '<?php echo $mon_name ?>');
            loadMarker(<?php echo $geo[1]; ?>, <?php echo $geo[0] ?>, '#', '<?php echo $monument_id?>', '<?php echo $mon_name ?>');
        </script>
        <?php 
    }
   
    
}
?>