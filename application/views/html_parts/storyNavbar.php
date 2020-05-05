<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
	<div class="container-fluid">
		<div>
			<p class="small text-white" style="margin-bottom: 0;">
				<?= (isset($subtitle))? $subtitle:"Add Your Story Detail"; ?>
			</p>
			<span class="h4 text-white" id="story-title">Untitled Story</span>
		</div>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="btn btn-grey" id="cancel">
					<span class="span-bold">Cancel</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="btn btn-orange" id="next">
					<span class="span-bold">Next</span>
				</a>
			</li>
		</ul>
	</div>
</nav>

<script type="text/javascript">
	$('#cancel').click(function(){
		window.history.back()
	})
</script>