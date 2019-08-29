<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title(); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">

    <?php wp_head();?>

</head>

<body>

<header class="w-100">

    <!-- Top bar -->
    <div class="top-nav d-none d-lg-block">
        <div class="container ">
            <div class="d-flex justify-content-end">
                <div><a class="open-search"><img src="<?php echo get_bloginfo('template_directory'); ?>/resources/search.svg">Search</a></div>
                <div class="position-relative">
                    <!--<div class="show-tooltip"><a href="https://www.caledonia.com/"><img src="<?php echo get_bloginfo('template_directory'); ?>/resources/world.svg">Caledonia.com</a></div>
                    <div class="tooltip-info">Click here to visit our parent company Caledonia Investments plc.</div>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile bar -->
    <div class="d-block d-lg-none py-3">
        <div class="container">
            <div class="d-flex">

                <!-- Open menu -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>	
                </button>

                <!-- Logo -->
                <div class="w-100 d-flex justify-content-center">
                    <a class="text-center" href="<?php echo home_url(); ?>"><img height="40" src="<?php echo get_bloginfo('template_directory'); ?>/resources/caledonia.svg" alt="Logo"></a>
                </div>

                <!-- Center logo -->
                <div style="width:40px"></div>

            </div>
        </div>
    </div>

    <div class="container">

        <nav class="navbar navbar-expand-lg">

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100 d-flex justify-content-center align-items-lg-center align-items-left">

                    <?php 
                    $menu_name = 'primary'; 
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

                    foreach ($menuitems as $index=> $menuitem):

                        $parent = $menuitem->menu_item_parent;
                        $title = $menuitem->title;
                        $url = $menuitem->url;
                        $id = $menuitem->ID;

                        $current_title = get_the_title();
                        if ($current_title == $title) {
                            $class= "active";
                        }
                        else {
                            $class = "";
                        }

                        $parent = $menuitem->menu_item_parent; 
                        if ($parent == 0 ): 

                            $dropdown = false;
                            foreach ($menuitems as $menusubitem):
                                $parentsubitem = $menusubitem->menu_item_parent;
                                if ($parentsubitem == $id ):
                                    $dropdown = true;
                                endif; 
                            endforeach; 

                            /* Dropdown item */
                            if ($dropdown): ?>

                            <div class="dropdown">

                                <!-- Mobile -->
                                <a href="<?php echo $url ?>" class="nav-item nav-link mobile-toggle dropdown-toggle <?php echo $class ?> d-inline-block d-lg-none w-100" id="dropdownMenuButton" ><span><?php echo $title ?></span></a>

                                <div class="d-block d-lg-none">
                                    <?php foreach ($menuitems as $menusubitem):
                                            $parentsubitem = $menusubitem->menu_item_parent;
                                            $titlesubitem = $menusubitem->title;
                                            $urlsubitem = $menusubitem->url;
                                            $idsubitem = $menusubitem->object_id;
                                                        
                                            if ($parentsubitem == $id ): ?>   
                                                <a class="nav-item nav-link sublink" href="<?php echo $urlsubitem?>"><?php echo $titlesubitem;?></a>
                                            <?php endif; 
                                    endforeach; ?>
                                </div>

                                <!-- Desktop -->
                                <a href="<?php echo $url ?>" class="nav-item nav-link dropdown-toggle <?php echo $class ?> d-none d-lg-block" id="dropdownMenuButton" ><?php echo $title ?></a>

                               <!-- Dropdown -->
                                <div class="dropdown-menu m-0" aria-labelledby="dropdownMenuLink">

                                    <?php foreach ($menuitems as $menusubitem):
                                        $parentsubitem = $menusubitem->menu_item_parent;
                                        $titlesubitem = $menusubitem->title;
                                        $urlsubitem = $menusubitem->url;
                                        $idsubitem = $menusubitem->object_id;
                                                    
                                        if ($parentsubitem == $id ): ?>   
                                            <div><a class="dropdown-item" href="<?php echo $urlsubitem?>"><?php echo $titlesubitem;?></a></div>
                                        <?php endif; 
                                    endforeach; ?>
                                </div>

                            </div>

                            <!-- Normal item -->
                            <?php else: ?>
                                <a class="nav-item nav-link <?php echo $class ?>" href="<?php echo $url?>"><span><?php echo $title ?></span></a>
                            <?php endif; ?>
                        
                        <?php endif; ?>

                        <?php if ($index == 3 ): ?>
                            <a class="d-none d-lg-block" href="<?php echo home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/resources/caledonia.svg" alt="Logo"></a>
                        <?php endif; ?>

                         
                    <?php endforeach ?>
                    
                    <!-- Extra mobile links -->
                    <a class="d-block d-lg-none nav-item nav-link open-search" href="#">Search</a>
                    <a class="d-block d-lg-none nav-item nav-link" href="#">Caledonia.com</a>

                </div>
            </div>

        </nav>

    </div>
</header>


<?php require 'parts/part-search.php';

    
    


