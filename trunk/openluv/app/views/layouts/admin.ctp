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
	<?php echo $scripts_for_layout; ?>
</head>

<body>
	<div class="main_wrapper">
		<div class="content">
			<div id="left_column">
				<img src="/img/logo2.png" />
				<?php echo $this->element('navigation'); ?>
				<?php echo $this->element('user_menu'); ?>
				<?php echo $this->element('twitter'); ?>
			</div>
			<div id="center_column">
				<?php $session->flash(); ?>
				<?php echo $content_for_layout; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<?php echo $this->element('session_debug'); ?>
</body>
</html>