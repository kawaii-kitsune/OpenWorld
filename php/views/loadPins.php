
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
loadModel(<?php echo $row['x']; ?>, <?php echo $row['y']?>, '<?php echo $row['GLTF']?>', '<?php echo $row['id']?>');
loadMarker(<?php echo $row['x']; ?>, <?php echo $row['y']?>, '<?php echo $row['GLTF']?>', '<?php echo $row['id']?>', '<?php echo $row['fldName']?>');
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