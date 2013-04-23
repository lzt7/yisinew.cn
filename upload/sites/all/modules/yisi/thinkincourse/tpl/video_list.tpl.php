
<ul class="video-ul">
<?php   
$i = 1;
$css='';
foreach($rows as $data){  
if($i%2 == 0){$css = 'even';}else{$css = 'odd';}
?>			
  <li class="basic-video <?php print $css ?> <?php print $data['css'] ?>">    
        <div class="cols-meta">
          <div class="col-duration">
          	<?php print $data['duration'] ?>
          </div>
        </div>    
      <div class="col-title">
        <?php print l($data['title'], 'node/'.$data['nid']);?><?php print $data['type'] ?>
      </div>
  </li>
<?php 
$i++;
}?>			
</ul>