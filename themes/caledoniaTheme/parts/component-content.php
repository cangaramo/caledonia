<?php 
    $title = $values['title'];
    $copy = $values['copy'];
    $button_label = $values['button_label'];
    $download_file = $values['download_file'];
?>
<div class="container my-5">
    <div class="row content">  
        <div class="col-md-4">
            <h1 class="mb-5"><?php echo $title ?></h1>
            <?php if ($download_file): ?>
                <a class="link" target="_blank" href="<?php echo $download_file?>"><?php echo $button_label ?></a>
            <?php endif ?>
        </div>
        <div class="col-md-8">
            <hr>
            <?php echo $copy ?>
        </div>
    </div>
</div>