<?php

namespace FBTP\App\Controllers;

class AddMenu
{
   
      function addFbtTab($default_tabs){
         $default_tabs['custom_tab']=array(
            'label'=>__('Frequently Bought Together','text_domain'),
            'target'=>'addFbtPage',
            'priority'=>60,
            'class'=>array('show_if_simple')
         );
         return $default_tabs;
       }

       function addContentForTab(){      
          if(file_exists(FBTP_PLUGIN_PATH.'/App/Views/TabView.php')){
            wc_get_template('',[], '', FBTP_PLUGIN_PATH.'/App/Views/TabView.php');
          }else{
            die('Page Not Found');
          }
       }

       function saveFbtProducts(){    //Function to get the product ids 
        global $post;
          if(isset($_POST['fbt_product_ids'])){
            $data=$_POST['fbt_product_ids'];
            update_post_meta($post->ID,'_fbt_products_ids',$data);
          }else{
            delete_post_meta($post->ID,'_fbt_products_ids');
          }
       }
}
