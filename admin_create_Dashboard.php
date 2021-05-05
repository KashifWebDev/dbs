<?php
require 'app/main.php';
session_start();
$_SESSION['currentPath'] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
<!-- Navigation -->
<?php require 'app/nav.include.php'; ?>

<!-- Page Content -->
<div class="container">
    <h3 class="font-roboto my-3">Create New Dashboard</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills pillsCustomBorder shadow bg-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard Information</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Units</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Graphs</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Device Management</a>
            </div>
        </div>
        <div class="col-md-9">
            <form action="">
                <div class="tab-content" id="v-pills-tabContent">
                    <!--Dashboard Information Tab-->
                    <div class="tab-pane fade show active bg-white shadow p-3" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="form-group">
                            <label>Dashboard Name</label>
                            <input type="text" class="form-control" placeholder="New Dashboard" name="dashboardName">
                        </div>
                    </div>

                    <!--Dashboard Units Tab-->
                    <div class="tab-pane fade bg-white shadow p-3" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3 font-weight-bold">Temperature</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="temperature_unit" value="f" checked>
                                <label class="form-check-label" >°F</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="temperature_unit" value="c">
                                <label class="form-check-label" >°C</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Torque</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="torque_unit" value="ft-lbs" checked>
                                <label class="form-check-label" >ft-lbs</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="torque_unit" value="nm">
                                <label class="form-check-label" >Nm</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Pressure</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pressure_unit" value="bar">
                                <label class="form-check-label" >Bar</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="pressure_unit" value="psi" checked>
                                <label class="form-check-label">psi</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="pressure_unit" value="pa">
                                <label class="form-check-label">Pa</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Distance</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="distance_unit"  value="mm">
                                <label class="form-check-label">mm</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="distance_unit"  value="in" checked>
                                <label class="form-check-label">in</label>
                            </div>
                        </div>
                        <div class="form-group row text-dark">
                            <label for="inputEmail3" class="col-form-label col-3  font-weight-bold">Time</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="time_format"  value="12" checked>
                                <label class="form-check-label">12 Hours</label>
                            </div>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="time_format" value="24">
                                <label class="form-check-label">24 Hours</label>
                            </div>
                        </div>
                    </div>

                    <!--Horizontal Lines Tab-->
                    <div class="tab-pane fade bg-white shadow p-3" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h2 id="navHeading" class="font-roboto">Horizontal Lines</h2>
                        <hr>
                        <form>
                            <div id="element1" class="form-group row">
                                <label for="inputPassword" class="mx-2 ml-3 col-form-label">Line Name</label>
                                <div>
                                    <input type="text" class="form-control" id="inputPassword" placeholder="Alarm" name="graphLineName1">
                                </div>
                                <label for="inputPassword" class="mx-2 col-form-label">Line Value:</label>
                                <div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="27000" name="graphLineName2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">ft-lbs</span>
                                        </div>
                                    </div>
                                </div>
                                <i class="fas fa-trash-alt text-danger font-size-xLarger ml-4 mt-2" id="removeElememnt1"></i>
                            </div>
                            <div id="element2" class="form-group row">
                                <label for="inputPassword" class="mx-2 ml-3 col-form-label">Line Name</label>
                                <div>
                                    <input type="text" class="form-control" id="inputPassword" placeholder="Alarm" name="graphLineName1">
                                </div>
                                <label for="inputPassword" class="mx-2 col-form-label">Line Value:</label>
                                <div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="27000" name="graphLineName2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">ft-lbs</span>
                                        </div>
                                    </div>
                                </div>
                                <i class="fas fa-trash-alt text-danger font-size-xLarger ml-4 mt-2"></i>
                            </div>

                            <button class="btn btn-primary ml-1" type="button">
                                <i class="fas fa-plus"></i>
                            </button>
                            <script>

                            </script>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4</div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>


</body>

</html>
