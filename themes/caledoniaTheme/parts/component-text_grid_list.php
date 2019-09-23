<?php 
$text_grid = $values['text_grid'];
?>

<div class="container mb-5" style="margin-top:-30px">
    <div class="row content">  

        <div class="col-md-4"></div>

        <div class="col-md-8">
            
            <div class="">

                <?php foreach ($text_grid as $text) : ?>
               
                    <div class="text-grid-list">
                        <hr>
                        <p><?php echo $text['text'] ?></p>
                    </div>
                   
                <?php endforeach ?>
               
            </div>

        </div>
    </div>
</div>