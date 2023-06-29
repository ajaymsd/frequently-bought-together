<?php 
global $post;
if(isset($fbt_products_data)){
    $product_ids=$fbt_products_data;   //Checking if the data is present which have been sent from controller
}
  if(!empty($product_ids)){     //Condition Check -> Checking Whether there is FBT Products
?>

<section class="frequently_bought_together">

   <h2 >Frequently Bought Together</h2>
   <?php 
   $mainProduct=array($post->ID);
   $fbtProductIds=array_merge($product_ids,$mainProduct);
   $fbtCombinedPrice=0;
   ?>
   
    <ul class="products column-3" style="display:flex">
    <?php
      foreach($fbtProductIds as $fbtProductId){
        $product=wc_get_product($fbtProductId);   //Getting Each Product
        $productImgId=$product->get_image_id();   
        $productImgUrl= wp_get_attachment_image_url($productImgId,'full');  //Getting Product image based on image id
        $fbtCombinedPrice +=$product->get_price();    //Getting product price
    ?>
        <li class="product type-product post-44 status-publish first instock product_cat-hoodies has-post-thumbnail taxable shipping-taxable purchasable product-type-simple">
           <img src="<?php echo $productImgUrl ?>" />
           <h4><?php echo $product->get_name(); ?></h4>
           <h3><?php echo wc_price($product->get_price()); ?></h3>
        </li>
    <?php } // foreach ends ?>    

     </ul>

   <div style="margin-left:80%;">
    <h5>Total Price</h6>
    <h2><?php echo wc_price($fbtCombinedPrice) ;?></h5>
    <form method="post">
      <input type="hidden" value="<?php echo $post->ID ?>" name="product_id" />
      <input type="submit" name="add_to_cart" value="Add-To-Cart" class="button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart"/>
    </form>
   </div>
  
   
</section>

<?php } //Condtion Check Ends ?>