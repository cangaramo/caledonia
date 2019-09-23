<?php 
$menu_name = 'footer'; 
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<footer>

    <div class="container py-4 py-lg-5">

        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center footer-menu">
            <?php foreach ($menuitems as $index=> $menuitem):
                $title = $menuitem->title;
                $url = $menuitem->url;
                $id = $menuitem->ID; 
                $target = $menuitem->target;
                ?>

                <a href="<?php echo $url ?>" target="<?php echo $target ?>" class="mx-3 py-1"><?php echo $title ?></a>

                <?php if ($index == 3 ): ?>
                    <img class="mx-3 d-none d-lg-block" src="<?php echo get_bloginfo('template_directory'); ?>/resources/caledonia.svg" alt="Logo">
                <?php endif; ?>

            <?php endforeach ?>
        </div>

        <div class="mt-5 d-flex flex-column flex-lg-row justify-content-center align-items-center footer-menu">
            <p class="mx-4">Tel: <a href="tel:+44 20 7802 8080">+44 20 7802 8080</a></p>
            <p class="mx-4">Email: <a href="mailto:enquiries@caledonia.com">enquiries@caledonia.com</a></p>
            <p class="mx-4">© 2019 Caledonia Investments plc.</p>
        </div>

        <div class="mt-4 d-flex flex-column flex-lg-row justify-content-center align-items-center footer-menu">
            <a href="/privacy-policy" class="mx-4">Privacy Policy</a>
            <a href="/terms-and-conditions" class="mx-4">Terms and conditions</a>
        </div>

    </div>

</footer>

<?php require('parts/part-modal_video.php'); ?>
<?php require('parts/part-modal_file_video.php'); ?>
<?php require('parts/part-modal_team.php'); ?>

<?php wp_footer(); ?>

<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Count up -->
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>

<!-- D3 -->
<script src="https://d3js.org/d3.v3.min.js"> </script>

<!-- Vimeo -->
<script src="https://player.vimeo.com/api/player.js"></script>

<!-- Main js -->
<script src="<?php echo get_bloginfo('template_directory'); ?>/js/main.js"></script>

<!-- Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ06-isKwMWAWW1EBy2nvVm7I2Xijc384&callback=initMap"async defer></script>


</body>
</html>
