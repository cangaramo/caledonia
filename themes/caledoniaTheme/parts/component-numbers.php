<?php 
    $numbers = $values['numbers'];
?>

<div class="container numbers my-4 my-lg-5">

    <div class="row">

        <?php foreach ($numbers as $number): ?>

            <div class="col-md-6 col-lg-4 px-lg-1 my-1">
                <div class="small-numbers w-100 number small-number px-5 py-4">
                    <hr>
                    <span><?php echo $number['symbol'] ?></span><span class="counter"><?php echo $number['number'] ?></span><span><?php echo $number['value'] ?></span>
                    <p class="description"><?php echo $number['description'] ?></p>
                </div>
            </div>

        <?php endforeach ?>

    </div>

</div>

