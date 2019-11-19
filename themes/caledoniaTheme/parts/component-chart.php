<?php 
    $sectors = $values['sectors'];
    $title = $values['title'];
    $middle_value = $values['middle_value'];
    $middle_description = $values['middle_description'];

    $percentages = array();
    $labels = array();

    foreach ($sectors as $sector) {
        array_push($percentages, $sector['percentage']);
        array_push($labels, $sector['name']);
    }
    $json_percs = json_encode($percentages);
?>


<div class="container chart-container my-5">

    <div class="row content">  

        <div class="col-md-4"></div>

        <div class="col-md-8">

            <h4 class="sector"><?php echo $title ?></h4>

            <div class="d-flex flex-column flex-lg-row">

                <div class="position-relative">

                    <div id="chart" data-percentages='<?php echo $json_percs ?>'></div>

                    <div class="chart-inside">
                        <div class="h-100 d-flex justify-content-center align-items-center text-center">
                            <div>
                                <p class="num"><?php echo $middle_value ?></p>
                                <p class="description"><?php echo $middle_description ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="info">
                    <div class="line">
                        <div class="color-key" style="background:#00205c"></div>
                        <div class="percentage"><span><?php echo $percentages[0]?>%</span></div>
                        <span><?php echo $labels[0]?></span>
                    </div>
                    <div class="line">
                        <div class="color-key" style="background:#7a7a7b"></div>
                        <div class="percentage"><span><?php echo $percentages[1]?>%</span></div>
                        <span><?php echo $labels[1]?></span>
                    </div>
                    <div class="line">
                        <div class="color-key" style="background:#9dc41a"></div>
                        <div class="percentage"><span><?php echo $percentages[2]?>%</span></div>
                        <span><?php echo $labels[2]?></span>
                    </div>
                    <div class="line">
                        <div class="color-key" style="background:#7184af"></div>
                        <div class="percentage"><span><?php echo $percentages[3]?>%</span></div>
                        <span><?php echo $labels[3]?></span>
                    </div>
                    <div class="line">
                        <div class="color-key" style="background:#853479"></div>
                        <div class="percentage"><span><?php echo $percentages[4]?>%</span></div>
                        <span><?php echo $labels[4]?></span>
                    </div>
                    <div class="line">
                        <div class="color-key" style="background:#009fe3"></div>
                        <div class="percentage"><span><?php echo $percentages[5]?>%</span></div>
                        <span><?php echo $labels[5]?></span>
                    <div class="line">
                    </div>
                        <div class="color-key" style="background:#611445"></div>
                        <div class="percentage"><span><?php echo $percentages[6]?>%</span></div>
                        <span><?php echo $labels[6]?></span>
                    </div>
                    <div class="line">
                        <div class="color-key" style="background:#d3d3d3"></div>
                        <div class="percentage"><span><?php echo $percentages[7]?>%</span></div>
                        <span><?php echo $labels[7]?></span>
                    </div>
                <div>

            </div>

        </div>

    </div>

</div>