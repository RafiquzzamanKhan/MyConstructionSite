<?php
//=============================================================
// Breadcrumb Options
//=============================================================



if ( ! function_exists( 'dashy_breadcrumb_action' ) ) :
    function dashy_breadcrumb_action() { 

      dashy_breadcrumb_trail();
         
       
    }
endif;


add_action( 'dashy_breadcrumb_options', 'dashy_breadcrumb_action' );