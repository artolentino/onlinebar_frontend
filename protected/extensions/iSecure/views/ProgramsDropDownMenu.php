<?php
   $sql="SELECT * FROM categories ORDER BY code ASC";// SQL Query
   $command = Yii::app()->db->createCommand($sql);
   $rows = $command->queryAll();
   $rowCount=$command->execute();
   
 ?>
   
   <ul class="dropdown-menu">
              <li><?php echo CHtml::link('All Programs',array('/Videos'),array('class' => 'bg-hover-color' )) ?></li>

              <?php for($i=0; $i<$rowCount; $i++) {?>
	          <?php  $row=$rows[$i];?>
                
                  <li><?php echo CHtml::link($row['code'],array('/Videos/index','id'=>$row['id']),array('class' => 'bg-hover-color' )); ?></li>
                 
                 <?php } ?>
   </ul>
    
   
	 