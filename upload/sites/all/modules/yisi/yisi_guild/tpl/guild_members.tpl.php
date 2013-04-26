<?php
	$i=1;
?>
<div id="articlelist">
<ul class="txtlist">
<?php foreach($rows as $data){
?>
  <li><?php print l('<span class="ranking ranking-'.$i.'">'. $i.'</span><span style="display:inline-block; width:200px;">'.$data['name'].'</span>', 'user/'.$data['uid'], array('html' => true,'attributes' => array('class' => array('lis'),'title' => $data['name'])))?></li>
<?php 
$i++;
}?>
</ul>
</div>