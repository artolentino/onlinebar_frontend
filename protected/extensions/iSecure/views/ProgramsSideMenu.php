<?php
   $sql="SELECT * FROM categories ORDER BY code ASC";// SQL Query
   $command = Yii::app()->db->createCommand($sql);
   $rows = $command->queryAll();
   $rowCount=$command->execute();


 ?>

 <ul class="nav nav-pills nav-stacked">
            
             <?php if($this->ProgramID == 0) { ?>
             <li class="active" ><?php echo CHtml::link('All',array('index'),array('class' => 'bg-hover-color')); ?></li> 
             <?php } else { ?>  
              <li><?php echo CHtml::link('All',array('index'),array('class' => 'bg-hover-color')); ?></li>      
             <?php } ?>   
                
                  <?php for($i=0; $i<$rowCount; $i++) {?>
                  <?php  $row=$rows[$i];?>
                     
                      <?php if(isset($this->ProgramID)) { ?>
                          <?php if($this->ProgramID == $row['id']) { ?>
                            <li class="active"><?php echo CHtml::link(CHtml::encode($row['code']),array('index','id'=>$row['id']),array('class' => 'bg-hover-color' )) ?></li>
                          <?php } else {?>
                              <li><?php echo CHtml::link(CHtml::encode($row['code']),array('index','id'=>$row['id']),array('class' => 'bg-hover-color' )) ?></li>
                       
                      <?php 
                        } 

                       } }
                       ?>
                         
            </ul>
   
   
    
   
	 