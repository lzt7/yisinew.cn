
<div class="row-fluid">
  <ul class="thumbnails popular-videos">
  <?php 
  
  foreach($rows as $data){
  
  ?>			
    <li class="span3">
      <?php print $data['type'] ?>
      <?php print $data['image'] ?>
      <h4><?php print $data['title'] ?></h4>
      <p><?php print $data['category'] ?> | <?php print $data['duration'] ?></p>
    </li>
  <?php 
  
  }?>			
  </ul>
</div>