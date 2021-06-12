<div class="col-md-4 mb-3">
    <?php
    if (isset($_SESSION["darkTheme"]) && $_SESSION["darkTheme"]==1){
        $boxClass = "bg-dark";
        $fontColor = "text-white-50";
    }else{
        $boxClass = "bg-light shadow";
        $fontColor = "text-dark";
    }
    ?>

        <div class="<?php echo $boxClass; ?> shadow-black px-3 py-2 border-radius-10px">
            <div class="d-flex">
                <a href="device-details.php?id=<?php echo $row['deviceID']; ?>" style="width: 95%;text-decoration: none;" class="d-flex auto_color_txt">
                    <div class="w-15">
                        <i class="fas fa-desktop <?php echo $fontColor; ?> fa-2x mt-3"></i>
                    </div>
                    <div class="w-80">
                        <span class="font-size-larger"><?php echo $row["device_name"]; ?></span>
                        <p class="d-flex m-0 mt-1">
                            <span>MAC</span>
                            <span class="ml-2 <?php echo $fontColor; ?>"><?php echo $row["mac"]; ?></span>
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="mt-2 d-flex">
                                <span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-danger mt-1 mr-1"></span>
                                <span>Offline</span>
                                <span style="height: 15px; width: 15px; border-radius: 20px; display: block;" class="bg-success mt-1 ml-2 mr-1"></span>
                                <span>No Alarms</span>
                            </div>
                            <?php
                            if($_SESSION['is_admin']){
                            ?>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </a>
                <div class="w-5 d-flex align-items-end">
                    <div>
                        <button onclick="del_device_function(<?php echo $row["deviceID"]; ?>)" class="btn btn-circle text-danger"
                                data-toggle="modal" data-target="#deleteDevice">
                            <i class="fas fa-trash-alt fa-2x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</div>