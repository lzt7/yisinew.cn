
<script type="text/javascript">
var $ = jQuery;
<?php

 foreach($rows as $data){	
echo <<<EOF
function slideToggle{$data['nid']}()  
{  
   $("#videolist{$data['nid']}").toggle(200);
	 $("#videolist{$data['nid']}").className = '';
}

EOF;
} 
?>
</script>

  <ul class="course-list media-list">
  <?php   
	$i = 1;
	$css='';
  foreach($rows as $data){  
	if($i%2 == 0){$css = 'even';}else{$css = 'odd';}
  ?>			
    <li class="media <?php print $css ?>">
    	<?php print $data['image_detail'] ?>
      <div class="media-body">
      	<h4 class="media-heading"><?php print $data['title'] ?></h4>
        <p><?php print $data['description'] ?></p>        
        <div class="meta clearfix">
						<div class="category">
							<?php print $data['category'] ?>
						</div>						
						<div class="duration">
							<?php print $data['duration'] ?></div>		
						<div class="version">
							<?php print $data['version'] ?></div>	
						<div class="view">
							<?php print module_invoke('thinkin', 'views_counts', $data['nid']); ?><em>次</em></div>	
						<div class="videolist">
							<?php print $data['serie'] ?>
							</div>	
					</div><!--meta-->
          <div id="videolist<?php print $data['nid'] ?>" style="display:none"><?php print $data['video'] ?></div>
          <div></div>
      </div>
    </li>
  <?php 
	$i++;
	}?>			
  </ul>