<?php if ( Configure::read('debug') > 0 ) : ?>
	<div class="debug session">
		<div>
			<h3>Session</h3>
			<pre><?php print_r($_SESSION); ?></pre>
		</div>
	
		<div>
			<h3>Cookie</h3>
			<pre><?php print_r($_COOKIE); ?></pre>
		</div>

		<div>
			<h3>Server</h3>
			<pre><?php print_r($_SERVER); ?></pre>
		</div>
	</div>
<?php endif; ?>