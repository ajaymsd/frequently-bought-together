<?php

namespace FBTP\App\Controllers;

class View
{
   function showFbt(){
     global $post;
     $fbt_products_data=get_post_meta($post->ID,'_fbt_products_ids',true);
     if(file_exists(FBTP_PLUGIN_PATH.'/App/Views/FbtView.php')){
        wc_get_template('',array('fbt_products_data'=>$fbt_products_data),'',FBTP_PLUGIN_PATH.'/App/Views/FbtView.php');
      }
   }


   function addFbtToCart(){
     if(isset($_POST['add_to_cart'])){
        $productId=$_POST['product_id'];
        $fbt_products_data=get_post_meta($productId,'_fbt_products_ids',true);
        array_unshift($fbt_products_data,$productId);
        foreach($fbt_products_data as $fbtProduct){
            WC()->cart->add_to_cart( $fbtProduct );
        }
        $this->printSuccessNotice();
    }
   }

   
   function printSuccessNotice(){
      wc_add_notice( "Products Added to the Cart Successfully",'success');
   }
}