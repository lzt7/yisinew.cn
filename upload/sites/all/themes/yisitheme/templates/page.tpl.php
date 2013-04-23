





  <header id="header" role="banner" class="clearfix">

	<div class="header-inner">

    <?php if ($logo): ?>

      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>

    <?php endif; ?>

 <div id="navigation">

      <?php if ($main_menu): ?>

        <nav id="main-menu" role="navigation">

          <?php

          print theme('links__system_main_menu', array(

            'links' => $main_menu,

            'attributes' => array(

              'class' => array('links', 'inline', 'clearfix'),

            ),

            'heading' => array(

              'text' => t('Main menu'),

              'level' => 'h2',

              'class' => array('element-invisible'),

            ),

          )); ?>

        </nav>

      <?php endif; ?>

      <?php print render($page['navigation']); ?>

    </div><!-- /#navigation -->

  	<?php print render($page['header_top']); ?> 

 <?php if ($user->uid) : ?>

        <ul id="user_info">

        <li class="t-sub">

        <a href="/account" charset="has-sub"><?php print $user->name; ?><span class="W_arr_d"><em class="b1"></em><em class="b2"></em><em class="b3"></em></span></a>

				<?php print theme('links__system_secondary_menu', array(

        'links' => $secondary_menu,

        'attributes' => array(

        'id' => 'secondary-menu',

        'class' => array('links', 'inline', 'clearfix'),

        ),

        )); ?>

      	</li>

        </ul>

        <?php else : ?>

        <div class="user_info">

        <?php

					$block = block_load('block', '5');

					$signup = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));

					print $signup;

				?>

        </div>

        <?php endif; ?>







    <?php if ($site_name || $site_slogan): ?>



      <hgroup id="name-and-slogan">



        <?php if ($site_name): ?>



          <h1 id="site-name">



            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>



          </h1>



        <?php endif; ?>







        <?php if ($site_slogan): ?>



          <h2 id="site-slogan"><?php print $site_slogan; ?></h2>



        <?php endif; ?>



      </hgroup><!-- /#name-and-slogan -->



    <?php endif; ?>







    <?php if ($secondary_menu): ?>



      <nav id="secondary-menu" role="navigation" style="display:none;">



        <?php print theme('links__system_secondary_menu', array(



          'links' => $secondary_menu,



          'attributes' => array(



            'class' => array('links', 'inline', 'clearfix'),



          ),



          'heading' => array(



            'text' => $secondary_menu_heading,



            'level' => 'h2',



            'class' => array('element-invisible'),



          ),



        )); ?>



      </nav>



    <?php endif; ?>







    <?php print render($page['header']); ?>



    



    </div>



</header>

<div id="pitch">

	<div class="page-wrapper">

<div class="full full-pitch group">

	<h1 class="compact">

		<strong>请选择公会。</strong>

		 意思网为您提供专业、迅捷、一站式、全球化服务！

		<a href="/user" class="form-sub tagline-action">开启您的财富之路&gt;&gt;</a>

	</h1>

</div>

</div>



<?php print $breadcrumb; ?>







  <div id="main">



    <div id="content" class="column" role="main">



      <?php print render($page['highlighted']); ?>



      



      <a id="main-content"></a>



      <?php print render($title_prefix); ?>



      <?php if ($title): ?>



        <h1 class="title" id="page-title"><?php print $title; ?></h1>



      <?php endif; ?>



      <?php print render($title_suffix); ?>



      <?php print $messages; ?>



      <?php if($is_admin){ print render($tabs); }?>



      <?php print render($page['help']); ?>



      <?php if ($action_links): ?>



        <ul class="action-links"><?php print render($action_links); ?></ul>



      <?php endif; ?>

			<?php if(strpos($_SERVER["REQUEST_URI"],'brokers')){ ?>      

  <table class="sticky-enable tableheader-processed sticky-table">

  	<thead>

    	<tr><th>公司商标</th><th>交易商名称</th><th>最大杠杠</th><th>迷你账号</th><th>管理</th></tr>

    </thead>

    <tbody>

        <?php print render($page['content']); ?>

    </tbody>

  </table>

      <?php }elseif(strpos($_SERVER["REQUEST_URI"],'downloads')){?>
      <ul class="excerpt pgz">
      <?php print render($page['content']); ?>
      </ul>
      <?php }else{?>

        <?php print render($page['content']); ?>

      <?php }?>

      <?php print $feed_icons; ?>



    </div><!-- /#content -->



   





    <?php



      // Render the sidebars to see if there's anything in them.



      $sidebar_first  = render($page['sidebar_first']);



      $sidebar_second = render($page['sidebar_second']);



    ?>







    <?php if ($sidebar_first || $sidebar_second): ?>



      <aside class="sidebars">



        <?php print $sidebar_first; ?>



        <?php print $sidebar_second; ?>



      </aside><!-- /.sidebars -->



    <?php endif; ?>





	

  </div><!-- /#main -->





  <?php print render($page['friend_link']); ?>

  <?php print render($page['footer']); ?>















<?php print render($page['bottom']); ?>

