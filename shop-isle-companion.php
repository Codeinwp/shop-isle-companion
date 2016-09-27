<?php
/*
Plugin Name: Shop Isle Companion
Plugin URI: https://github.com/Codeinwp/shop-isle-companion
Description: Add About Template.
Version: 1.0.0
Author: Themeisle
Author URI: http://themeisle.com
Text Domain: shop-isle-companion
Domain Path: /languages
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! function_exists( 'add_action' ) ) {
    die();
}

require plugin_dir_path( __FILE__ ) . 'customizer.php';

/**
 * Add page template for about us.
 */

//add_filter( 'page_template', 'shopisle_about_us_page_template' );
//function shopisle_about_us_page_template( $page_template )
//{
//    if ( is_page( 'my-custom-page-slug' ) ) {
//        $page_template = dirname( __FILE__ ) . '/custom-page-template.php';
//    }
//    return $page_template;
//}

/**
 * Class ShopIslePageTemplater
 */


function shop_isle_slider_addon() {
    /**
     * *****    SLIDER   *******
     *
     */


    echo '<section id="home" class="home-section home-parallax home-fade home-full-height">';

    $shop_isle_slider = get_theme_mod( 'shop_isle_slider',json_encode( array( array( 'image_url' => get_template_directory_uri() . '/assets/images/slide1.jpg', 'link' => '#', 'text' => __( 'ShopIsle','shop-isle' ), 'subtext' => __( 'WooCommerce Theme','shop-isle' ), 'label' => __( 'FIND OUT MORE','shop-isle' ) ), array( 'image_url' => get_template_directory_uri() . '/assets/images/slide2.jpg', 'link' => '#', 'text' => __( 'ShopIsle','shop-isle' ), 'subtext' => __( 'Hight quality store','shop-isle' ), 'label' => __( 'FIND OUT MORE','shop-isle' ) ), array( 'image_url' => get_template_directory_uri() . '/assets/images/slide3.jpg', 'link' => '#', 'text' => __( 'ShopIsle','shop-isle' ), 'subtext' => __( 'Responsive Theme','shop-isle' ), 'label' => __( 'FIND OUT MORE','shop-isle' ) ) ) ) );

    if ( ! empty( $shop_isle_slider ) ) {

        $shop_isle_slider_decoded = json_decode( $shop_isle_slider );

        if ( ! empty( $shop_isle_slider_decoded ) ) {

            echo '<div class="hero-slider">';

            echo '<ul class="slides">';

            foreach ( $shop_isle_slider_decoded as $shop_isle_slide ) {

                if ( ! empty( $shop_isle_slide->image_url ) ) {

                    if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
                        $shop_isle_slider_image_url = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide image', $shop_isle_slide->image_url );
                        echo '<li class="bg-dark-30 bg-dark" style="background-image:url(' . esc_url( $shop_isle_slider_image_url ) . ')">';
                    } else {
                        echo '<li class="bg-dark-30 bg-dark" style="background-image:url(' . esc_url( $shop_isle_slide->image_url ) . ')">';
                    }

                    echo '<div class="hs-caption">';
                    echo '<div class="caption-content">';

                    if ( ! empty( $shop_isle_slide->text ) ) {
                        if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
                            $shop_isle_slider_text = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide text', $shop_isle_slide->text );
                            echo '<div class="hs-title-size-4 font-alt mb-30">' . $shop_isle_slider_text . '</div>';
                        } else {
                            echo '<div class="hs-title-size-4 font-alt mb-30">' . $shop_isle_slide->text . '</div>';
                        }
                    }

                    if ( ! empty( $shop_isle_slide->subtext ) ) {
                        if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
                            $shop_isle_slider_subtext = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide subtext', $shop_isle_slide->subtext );
                            echo '<div class="hs-title-size-1 font-alt mb-40">' . $shop_isle_slider_subtext . '</div>';
                        } else {
                            echo '<div class="hs-title-size-1 font-alt mb-40">' . $shop_isle_slide->subtext . '</div>';
                        }
                    }

                    if ( ! empty( $shop_isle_slide->link ) && ! empty( $shop_isle_slide->label ) ) {
                        if ( function_exists( 'icl_t' ) && ! empty( $shop_isle_slide->id ) ) {
                            $shop_isle_slider_link  = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide button link', $shop_isle_slide->link );
                            $shop_isle_slider_label = icl_t( 'Slide ' . $shop_isle_slide->id, 'Slide button label', $shop_isle_slide->label );
                            echo '<a href="' . esc_url( $shop_isle_slider_link ) . '" class="section-scroll btn btn-border-w btn-round">' . $shop_isle_slider_label . '</a>';
                        } else {
                            echo '<a href="' . esc_url( $shop_isle_slide->link ) . '" class="section-scroll btn btn-border-w btn-round">' . $shop_isle_slide->label . '</a>';
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';

                }
            }

            echo '</ul>';

            echo '</div>';

        }
    }

    echo '</section >';

}
?>