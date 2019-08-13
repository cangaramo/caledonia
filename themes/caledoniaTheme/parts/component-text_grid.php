<?php 
$text_grid = $values['text_grid'];
?>

<div class="container text-grid my-5">
    <div class="row">
        <?php foreach ($text_grid as $text) : ?>
            <div class="col-md-6 col-lg-4 px-2" >
                <div class="box p-4 mb-3">
                    <hr>
                    <p><?php echo $text['text'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>