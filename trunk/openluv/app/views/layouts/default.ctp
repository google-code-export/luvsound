<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title_for_layout; ?></title> 
	<link rel="stylesheet" type="text/css" href="/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/css/global.css" />
	<link rel="stylesheet" type="text/css" href="/css/navigation.css" />
	<?php if ( Configure::read('debug') > 0 ) : ?>
	<link rel="stylesheet" type="text/css" href="/css/debug.css" />
	<?php endif; ?>
	<?php if($session->read('Auth.User.group_id')==1) : ?>
		<link rel="stylesheet" type="text/css" href="/css/admin.css" />
	<?php endif; ?>
	<link href="/css/jquery.tweet.css" media="all" rel="stylesheet" type="text/css"/>
    <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js" type="text/javascript"></script>
    <script language="javascript" src="/js/jquery.tweet.js" type="text/javascript"></script>
	<script language="javascript" src="/js/jquery.tweet.luvsound.js" type="text/javascript"></script>
	<script src="/mint/?js" type="text/javascript"></script>
	<?php echo $scripts_for_layout; ?>
</head>

<body>
	<div class="main_wrapper">
		<div class="content">
			<div id="left_column">
				<img src="/img/luvlogo_color.png" />
				<?php echo $this->element('navigation'); ?>
				<?php echo $this->element('user_menu'); ?>
				<?php $session->flash(); ?>
				<?php echo $this->element('twitter'); ?>
				<?php echo $content_for_layout; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<?php echo $this->element('session_debug'); ?>
	
	<style type='text/css'>@import url('http://s3.amazonaws.com/getsatisfaction.com/feedback/feedback.css');</style>
	<script src='http://s3.amazonaws.com/getsatisfaction.com/feedback/feedback.js' type='text/javascript'></script>
	<script type="text/javascript" charset="utf-8">
	  var tab_options = {}
	  tab_options.placement = "right";  // left, right, bottom, hidden
	  tab_options.color = "#222"; // hex (#FF0000) or color (red)
	  GSFN.feedback('http://getsatisfaction.com/luvsound/feedback/topics/new?display=overlay&style=idea', tab_options);
	</script>
</body>
</html>