<?php
/**
 * Template part for the main navigation
 *
 * Used to display the main navigation with
 * our custom Walker Class to make sure the
 * navigation is rendered the way Foundation
 * does.
 *
 * @since  required+ Foundation 0.1.0
 */
?>

    <?php do_action('required_before_nav'); ?>
        <nav class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name"><h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></li>
                <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
            </ul>
            <section class="top-bar-section">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'depth' => 0,
                    'items_wrap' => '<ul class="right">%3$s</ul>',
                    'container' => '',
                    'fallback_cb' => 'required_menu_fallback', // workaround to show a message to set up a menu
                    'walker' => new REQ_Foundation_Walker( array(
                        'in_top_bar' => true,
                        'item_type' => 'li'
                    ) ),
                ) );
            ?>
                
            </section>
        </nav>
    <?php do_action('required_after_nav'); ?>