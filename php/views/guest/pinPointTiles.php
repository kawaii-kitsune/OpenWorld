<?php
$sql = "SELECT * FROM pinscoord";
if ($conn->query($sql)) {
    $i = 0;
    $RESULT_SET = $conn->query($sql);

    if ($RESULT_SET->num_rows > 0) {
        while ($row = $RESULT_SET->fetch_assoc()) {
            if ($row['available'] == 1) { ?>
                <li class='pinPointTile-list-item my-1'>
                    <div class="box">

                        <div class="container m-2">
                            <div class="col-4 pinPointTile pinPointTile-<?php echo  $row['id']; ?> m-2">

                                <div class="columns  is-align-items-center">
                                    <div class="column is-three-quarters">
                                        <p class=""><?php echo  $row['fldName']; ?> </p>
                                    </div>
                                    <div class="column is-one-quarter">
                                        <span class="button is-link is-inverted is-hovered" onclick="goTo(<?php echo  $row['x']; ?>,<?php echo  $row['y']; ?>)"><i class="fas fa-thumbtack"></i></span>
                                    </div>

                                </div>
                                <div class="columns is-centered">
                                    <a href="/OpenWorld/php/views/3dXdom/model-view.php?modelId=<?php echo  $row['id']; ?>" target="_blank" class="is-centered" rel="noopener noreferrer">
                                        <button class="button is-link is-centered" value="<?php echo  $row['id']; ?>">Navigate</button>
                                    </a>

                                    <button class="button is-outlined mx-2 model-info-button" onclick="openNav(this)" value="<?php echo  $row['id']; ?>"><i class="fas fa-question mx-2"></i> info</button>

                                </div>
                                


                            </div>
                        </div>
                    </div>
                </li>
<?php }
            $i = $i + 1;
        }
    }
} else {
    echo "Error: " . $sql . "
" . $conn->error;
}

?>