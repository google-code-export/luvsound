<div class="mp3_player">
	<span>
		<p>
		<object type="application/x-shockwave-flash" data="/swf/musicplayer.swf?&song_url=<?php echo $url; ?>&" width="17" height="17">
			<param name="movie" value="/swf/musicplayer.swf?&song_url=<?php echo $url; ?>&" />
			<img src="noflash.gif" width="17" height="17" alt="" />
		</object>
		</p>
		<p style="width:350px;"><a href="<?php echo $url; ?>"><?php echo $description; ?></a></p>
		<div class="clear"></div>
	</span>
</div>