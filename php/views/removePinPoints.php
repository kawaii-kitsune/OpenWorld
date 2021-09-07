<?php
$sql = "SELECT * FROM pinscoord";
if ($conn->query($sql)){
    $i=0;
    $RESULT_SET=$conn->query($sql);

    if($RESULT_SET->num_rows>0){
        while($row=$RESULT_SET->fetch_assoc()){
            if($row['available']==1){ ?>
<li class='pinPointTile-list-item my-1'>
    <div class="box">

        <div class="container m-2">
            <div class="col-4 pinPointTile pinPointTile-<?php echo  $row['id'];?> m-2">
                
                    <div class="columns  is-align-items-center">
                        <div class="column is-three-quarters">
                            <p class=""><?php echo  $row['fldName'];?> </p>
                        </div>
                        <div class="column is-one-quarter">
                            <span class="button is-link is-inverted is-hovered"
                                onclick="goTo(<?php echo  $row['x'];?>,<?php echo  $row['y'];?>)"><i
                                    class="fas fa-thumbtack"></i></span>
                        </div>
                        
                    </div>
                    <div class="columns">
                        <a href="php/controller/removePinPoints.php?pinId=<?php echo  $row['id']; ?>">
                            <button class="button is-danger is-outlined pinPointTile-button my-2"
                                id="<?php echo  $row['id'];?>" value="<?php echo  $row['id'];?>">
                                <span class="is-size-7"> Remove Location </span>
                                <span class="icon is-small">
                                    <i class="fas fa-times"></i>
                                </span>
                            </button>
                        </a>
                    </div>
                


            </div>
        </div>
    </div>
</li>
<?php } else{ ?>
<li class='pinPointTile-list-item my-1'>
    <div class="box">
        <div class="container m-2">
            <div class="col-4 pinPointTile pinPointTile-<?php echo  $row['id'];?> m-2">
                <p class='has-text-grey-light'><?php echo  $row['fldName'];?> </p>
                <a href="php/controller/remakePin.php?pinId=<?php echo  $row['id']; ?>">
                    <button class="button is-info is-outlined pinPointTile-button my-2" id="<?php echo  $row['id'];?>"
                        value="<?php echo  $row['id'];?>">
                        <span class="is-size-7">Reload Location</span>
                        <span class="icon is-small">
                            <i class="fas fa-times"></i>
                        </span>
                    </button>
                </a>
            </div>
        </div>
    </div>


</li>
<?php }
            $i=$i+1;
        }
    
    }

}
else{
echo "Error: ". $sql ."
". $conn->error;
}

?>