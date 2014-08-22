<?php
/* @var $this VideosController */
/* @var $model Videos */

$this->breadcrumbs=array(
        'Home' => array('/site/index'),
	'Videos'=>array('index'),
	 $model->name,
);

?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<script type="text/javascript">

var 

videoData = [
{
    'title':'<?php echo $model->name;?>',
    'id':'video-<?php echo $model->id ;?>',
    'videoURL':'http://vimeo.com/<?php echo $model->vimeo_embed_code; ?>',
     
}];


    $.getJSON('http://www.vimeo.com/api/oembed.json?url=' + encodeURIComponent(videoData[0]['videoURL']) + '&api=1&player_id='+ videoData[0]['id'] +'&callback=?', function(data){
    $('#flex-video').html(data.html); //puts an iframe embed from vimeo's json
    $('#flex-video iframe').load(function(){
        player = document.querySelectorAll('iframe')[0];
        $('#flex-video iframe').attr('id', videoData[0]['id']);
        $f(player).addEvent('ready', function(id){
            var url = "//videos/reload";  
            var status = $('.status');
            var vimeoVideo = $f(id);
            var userBalance = $("#balance_div").data('value');
            status.text('ready');   
            $f(player).addEvent('pause', onPause);
            $f(player).addEvent('finish', onFinish);
            
            $f(player).addEvent('playProgress', onPlayProgress);

            // Call the API when a button is pressed
            $('button').bind('click', function() {
                $f(player).api($(this).text().toLowerCase());
            });

            function onPause(id) {
            status.text('paused');
           }

           function onFinish(id) {
            status.text('finished');
            }

          function onPlayProgress(data, id) {
          status.text(data.seconds + 's played');
          if (parseInt(userBalance) < parseInt(data.seconds) ) {

                $(location).attr('href',url);
                 
            }
           }



            //console.log('success');
        });
    });
});
   

</script>


 <!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Watch Video</h3>
            </div>
            <div class="col-sm-8">
               <?php if (isset($this->breadcrumbs)): ?>
                            <?php
                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => false,
                                'tagName' => 'ol',
                                'separator' => '',
                                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
                                'htmlOptions' => array('class' => 'breadcrumb pull-right hidden-xs')
                                
                              
                            ));
                            ?>
                    <!-- breadcrumbs -->
                        <?php endif ?>  
            </div><!--  col-sm-8 -->
          </div> <!-- row -->
        </div> <!-- container -->
      </div> <!-- topic -->

      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="headline first-child text-color">
              <span class="border-color"><?php echo $model->name ;?></span>
            </h2>
           
          </div>
        </div> <!-- / .row -->
        <div class="row">
         <div class = "col-sm-8">
           
            <div id="flex-video">          
            </div>
            <p>Video is <span class="status">loading...</span></p>
<p><button>Play</button> <button>Pause</button></p>
         </div>
         <div id="balance_div" data-value = "<?php echo Yii::app()->session['user_balance'] ?>"></div>
         <div class = "col-sm-4">

           Video Details Here
           <hr>

      
  <div class="media-body">
    <h4 class="media-heading">Media heading</h4>
  </div>
</div>  
    <div id="comments">
  

</div><!-- comments -->

         </div>
        </div>
        
        </div> <!-- / .warpper -->
