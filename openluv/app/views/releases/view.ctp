<?php if($session->read('Auth.User.group_id')==1) : ?>
<div class="item_wrapper">
	<?php echo $button->link('Edit This Release', '/releases/edit/'.$release['Release']['id']); ?>
</div>
<?php endif; ?>

<div class="item_wrapper release_description">
	<h3>About <?php echo $release['Release']['name']; ?></h3>
	<?php echo $release['Release']['description']; ?>
</div>
<div class="item_wrapper release_bio">
	<h3>About <?php echo $release['Artist']['name']; ?></h3>
	<?php echo $release['Artist']['bio']; ?>
</div>
</div>
<div id="center_column">
<div id="release_cover" style="background-image: url('<?php echo $release['Release']['cover']; ?>');">
	<span>
		<div class="item_wrapper release_banner">
			<h1><?php echo $release['Release']['name']; ?></h1>&nbsp;
			<h2><?php echo $release['Artist']['name']; ?></h2>
		</div>
	</span>
</div>
<div class="item_wrapper release_download">
	<?php echo $button->link('Download This Release', $release['Release']['download']); ?>
</div>

<?php if($release['Item']) : ?>
<div class="item_wrapper release_purchase">
	<div class="purchase_cover">
		<img src="<?php echo $release['Item']['url']; ?>" />
		<?php echo $release['Item']['paypal_button']; ?>
	</div>
	<div class="purchase_description">
		<h2><?php echo $release['Item']['name']; ?></h2>
		<p><?php echo $release['Item']['description']; ?></p>
	</div>
	<div class="clear"></div>
</div>
<?php endif; ?>

<?php if(!empty($photos)) : ?>
<div class="item_wrapper release_artwork">
		<h3>Artwork</h3>
		<?php foreach ($photos as $photo) : ?>
			<a href="<?php echo $photo['Photo']['link']; ?>">
				<img src="<?php echo $photo['Photo']['src']; ?>" />
			</a>
		<?php endforeach; ?>
</div>
<?php endif; ?>

<div class="item_wrapper release_tracklist">
	<h3>Tracklist</h3>
	<?php echo $release['Release']['tracks']; ?>
</div>
