<?php
   $sql="SELECT * FROM attorneys ORDER BY first_name ASC";// SQL Query
   $command = Yii::app()->db->createCommand($sql);
   $rows = $command->queryAll();
   $rowCount=$command->execute();
   
 ?>

   
   <ul class="dropdown-menu">
              <li><?php echo CHtml::link('Meet Them All!',array('/Lecturers'),array('class' => 'bg-hover-color' )) ?></li>

              <?php for($i=0; $i<$rowCount; $i++) {?>
	          <?php  $row=$rows[$i];?>
                
                  <li><?php echo CHtml::link('Atty. ' . $row['first_name']. ' ' . $row['last_name'] ,array('/Lecturers/view','id'=>$row['id']),array('class' => 'bg-hover-color' )); ?></li>
                 
                 <?php } ?>
   </ul>
    