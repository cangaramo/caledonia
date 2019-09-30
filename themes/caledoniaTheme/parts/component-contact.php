<?php 
    $address = $values['address'];
    $tel = $values['tel'];
    $fax = $values['fax'];
    $general = $values['general'];
    $team = $values['team'];
?>

<div class="container contact my-5">
    <h1>Contact</h1>

    <div class="content my-4">
        <hr>
        <div class="row mt-3">  
            <div class="col-lg-3">
                <p class="title">Caledonia Private Capital</p>
                <div><?php echo $address ?></div>
            </div>
            <div class="col-lg-3 mb-3">
                <p class="m-0"><span class="title">Tel:</span><a href="tel:<?php echo $tel?>"><span><?php echo $tel ?></span></a></p>
                <p class="m-0"><span class="title">Fax:</span><a href="tel:<?php echo $fax?>"><span><?php echo $fax ?></span></a></p>
            </div>
            <div class="col-lg-4">
                <p class="m-0"><span class="title">General: </span><a href="mailto:<?php echo $general ?>"><span><?php echo $general ?></span></a></p>
                <div class="d-flex mt-3">
                    <div class="social mr-3 linkedin"><a href="https://www.linkedin.com/company/caledonia-private-capital" target="_blank"><i class="fab fa-linkedin-in"></i></a></div>
                    <div class="social twitter"><a href="https://twitter.com/caledonia_pc" target="_blank"><i class="fab fa-twitter"></i></a></div>
                </div>
                <!-- <p class="m-0"><span class="title">Team: </span><a href="mailto<?php echo $team ?>"><span><?php echo $team ?></span></a></p> -->
            </div>

        </div>
    </div>

</div>

<div id="map" style="height:450px"></div>
