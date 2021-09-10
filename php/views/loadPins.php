
<?php 
require 'php/controller/connDB.php'; 
$sql = "SELECT * FROM pinscoord";
if ($conn->query($sql)){
    $i=0;
    $RESULT_SET=$conn->query($sql);

    if($RESULT_SET->num_rows>0){
        while($row=$RESULT_SET->fetch_assoc()){
           if($row['available']==1){ ?>
<script>
var marker = L.marker([<?php echo $row['x']; ?>, <?php echo $row['y']; ?>]).addTo(map);
marker.bindPopup(
    '<div class="colums is-centered">'+
    '<div class="column model-viewer">'+
    '<model-viewer src="test-models/naos.glb" alt="A 3D model of an astronaut" ar ' +
    'ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls id="model-viewer-<?php echo  $row['id']; ?>"> '+
    
    '</model-viewer>'+
    '</div>'+
    '<div class="column">'+
    '<span class="is-size-6"><?php echo  $row['fldName']; ?></span>'+
    '</div>'+
    '<div class="column is-centered">'+
    '<a href="/OpenWorld/php/views/3dXdom/model-view.php" target="_blank" class="is-centered" rel="noopener noreferrer">'+
    '<button class="button is-link is-centered" value="<?php echo  $row['id']; ?>">Navigate</button>'+
    '</a>'+
    
    '<button class="button is-outlined mx-2 model-info-button" onclick="openNav()"'+
    'value="<?php echo  $row['id']; ?>"><i class="fas fa-question mx-2"></i> info</button>'+
    
    '</div>'+
    '</div>'
    );
    
</script>
<?php }
            $i=$i+1;
        }
    
    }
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
?>
