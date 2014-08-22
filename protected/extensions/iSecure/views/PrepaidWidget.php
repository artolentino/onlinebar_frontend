<?php
   $sql = "SELECT\n".
" shop_products.product_id,\n".
" shop_products.category_id,\n".
" shop_products.`status`,\n".
" shop_products.tax_id,\n".
" shop_products.title,\n".
" shop_products.description,\n".
" shop_products.keywords,\n".
" shop_products.price,\n".
" shop_products.specifications,\n".
" shop_image.filename as product_image\n".
"FROM\n".
" shop_products\n".
"INNER JOIN shop_image ON shop_image.product_id = shop_products.product_id\n".
"WHERE\n".
" shop_products.category_id = 2";

   //$sql="SELECT * FROM shop_products WHERE category_id = 2 ORDER BY title ASC";// SQL Query
   $command = Yii::app()->db->createCommand($sql);
   $rows = $command->queryAll();
   $rowCount=$command->execute();
   
 ?>

 
 <?php for($i=0; $i<$rowCount; $i++) {?>
                <?php  $row=$rows[$i];?>

       <?php 
          $folder = Shop::module()->productImagesFolder;

            if(!$row['filename'] = '') {
                  $path = Yii::app()->baseUrl. '/' . $folder . '/' . $row['product_image'];
                        }else{
                  $path = Shop::register('no-pic.jpg');
                }
         ?>  

       <div class="col-sm-3">
         <div class="panel panel-success">
           <div class="panel-heading text-center"><h4><?php echo $row['title'] ?></h4></div>
              <div class="panel-body">  
              <?php 
                echo CHtml::image($path, 'DORE',array('width'=>'172px','title'=>'image title here')); 
                echo '<br>' ;      
              ?>
                 <?php echo $row['description'] ?><br>
            <?php echo CHtml::link(Shop::t('Show Product'), array('/shop/products/view', 'id' => $row['product_id']), array('class' =>'btn btn-color btn-block')); ?>
            
           </div>
         </div>
       </div>

   <?php } ?>     
   
