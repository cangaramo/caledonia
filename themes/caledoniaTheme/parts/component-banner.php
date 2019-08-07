<?php 
    $image = $values['image'];
?>

<?php if ($image): ?>

    <div class="banner">
        <div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $image ?>)"></div>
    </div>

<?php else: ?>

    <div class="empty-banner"></div>

<?php endif; ?>