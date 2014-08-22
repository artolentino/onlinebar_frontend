<?php
   $sql="SELECT * FROM shop_category ORDER BY title ASC";// SQL Query
   $command = Yii::app()->db->createCommand($sql);
   $rows = $command->queryAll();
   $rowCount=$command->execute();


 ?>

 <ul class="nav nav-pills nav-stacked">
            
             <?php if($this->CategoryID == 0) { ?>
             <li class="active" ><?php echo CHtml::link('All',array('index'),array('class' => 'bg-hover-color')); ?></li> 
             <?php } else { ?>  
              <li><?php echo CHtml::link('All',array('index'),array('class' => 'bg-hover-color')); ?></li>      
             <?php } ?>   
                
                  <?php for($i=0; $i<$rowCount; $i++) {?>
                  <?php  $row=$rows[$i];?>
                     
                      <?php if(isset($this->CategoryID)) { ?>
                          <?php if($this->CategoryID == $row['category_id']) { ?>
                            <li class="active"><?php echo CHtml::link(CHtml::encode($row['title']),array('index','id'=>$row['category_id']),array('class' => 'bg-hover-color' )) ?></li>
                          <?php } else {?>
                              <li><?php echo CHtml::link(CHtml::encode($row['title']),array('index','id'=>$row['category_id']),array('class' => 'bg-hover-color' )) ?></li>
                       
                      <?php 
                        } 

                       } }
                       ?>
                         
            </ul>
   
   
    
   
	 