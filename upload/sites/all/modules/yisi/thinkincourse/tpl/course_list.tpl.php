
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
  <ul class="course-list popular-videos">
  <?php   
	$i = 1;
	$css='';
  foreach($rows as $data){  
	if($i%2 == 0){$css = 'even';}else{$css = 'odd';}
  ?>			
    <li class="basic <?php print $css ?>">
      <div class="details">
        <div class="cols-meta">
          <div class="col-duration">
          	<?php print $data['duration'] ?>
          </div>
          <div class="col-category">
          	<?php print $data['category'] ?>
          </div>
          
						<div class="videolist">
							<?php print $data['serie'] ?>
						</div>	
        </div>
        
        <div class="col-title">
        	<?php print $data['title'] ?>
        </div> 
          <div id="videolist<?php print $data['nid'] ?>" style="display:none"><?php print $data['video'] ?></div>     
      </div>
    </li>
  <?php 
	$i++;
	}?>			
  </ul>