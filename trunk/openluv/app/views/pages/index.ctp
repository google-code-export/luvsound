	<div class="item_wrapper featured_single">
		<h2><a href="<?php echo $single['Single']['url']; ?>"><?php echo $single['Single']['name']; ?></a> by <a href="/artists/#artist<?php echo $single['Artist']['id']; ?>" style="color:#8D44C9;background:none;"><?php echo $single['Artist']['name']; ?></a></h2>
		<p><strong><?php echo $single['Single']['luv_id']; ?></strong> The Single of the Week</p>
		<?php echo $this->element('mp3player', array('url'=>$single['Single']['url'], 'description'=>$single['Single']['description'])); ?>
	</div>
	
	<div class="item_wrapper featured_video">
		<h2><a href=""><?php echo $video['Video']['title']; ?></a>
		<br/>by <?php echo $video['Video']['author']; ?></h2>
		<p><strong><?php echo $video['Video']['luv_id']; ?></strong> Featured Video</p>
		<object width="420" height="320">
			<param name="allowfullscreen" value="true" />
			<param name="allowscriptaccess" value="always" />
			<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $video['Video']['vimeo_id']; ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" />
			<embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $video['Video']['vimeo_id']; ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="420" height="320">
			</embed>
		</object>
		<p><?php echo $video['Video']['description']; ?></p>
	</div>
</div>
<div id="center_column">
	<div class="item_wrapper featured_release">
		<div style="background-image: url('<?php echo $release['Release']['cover']; ?>');">
			&nbsp;
		</div>
		<h2><a href="/releases/view/<?php echo $release['Release']['luv_id']; ?>">&nbsp;<?php echo $release['Release']['name']; ?>&nbsp;</a>&nbsp;<?php echo $release['Release']['luv_id']; ?>&nbsp;</h2>
		<h3>by <?php echo $release['Artist']['name']; ?></h3>
		<?php echo $release['Release']['description']; ?>
	</div>