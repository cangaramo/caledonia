<?php 
    $title = $values['title'];
    $copy = $values['copy'];
?>
<div class="container my-5">
    <div class="row px-lg-5 content">  
        <div class="col-md-4">
            <h1><?php echo $title ?></h1>
        </div>
        <div class="col-md-8">
            <hr>
            <?php echo $copy ?>
        </div>
    </div>
</div>