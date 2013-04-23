<div class="pricing-help" style="font-size:18px;">
<p>马上注册即可访问所有<span style="color:green; font-weight:bold; "><?php print module_invoke('thinkincourse', 'video_count');?></span>个视频。</p>
<p>现在注册，享有<span style="color:green; font-weight:bold; font-size:24px; ">8</span>折优惠。</p>
</div>
  <ul class="thumbnails popular-videos">
  <?php 
  
  foreach($rows as $data){
  
  ?>			
    <li class="span4 plan">
      <?php print $data['content']?>
    </li>
  <?php 
  
  }?>			
  </ul>
  
 