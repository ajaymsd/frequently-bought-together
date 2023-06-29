<?php

namespace FBTP\App;
class Route{
    function hook(){
      $addMenu= new Controllers\AddMenu();
      $view=new Controllers\View();

      //Admin Side
      add_filter('woocommerce_product_data_tabs',[$addMenu,'addFbtTab']);
      add_action('woocommerce_product_data_panels',[$addMenu,'addContentForTab']);
      add_action( 'woocommerce_admin_process_product_object',[$addMenu,'saveFbtProducts']);

      //View Side
      add_action('woocommerce_after_single_product',[$view,'showFbt']);
      add_action('wp_loaded',[$view,'addFbtToCart']);
      
    }
}