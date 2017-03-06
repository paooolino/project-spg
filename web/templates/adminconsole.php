<!doctype html>
<html>
<head>
	<title>Admin API console</title>
	<style>
		*{margin:0;padding:0;}
		html, body {height:100%;}
		#wrapper{padding:10px;}
		#header{height: 40px;}
		#commandline input{width:100%;}
		#console{border:1px solid #ccc;background-color:#efefef;height:300px;}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			Commands 
			<select>
				<option value="">- select -</option>
				<option
					data-command="getNodeBySlug"
					data-params="slug"
				>Get node by slug</option>
				<option
					data-command="addPlayer"
					data-params="name surname country"
				>Add player</option>
				<option
					data-command="addTeam"
					data-params="teamname country"
				>Add team</option>
			</select>
		</div>
		<div id="commandline">
			<input /><button id="issue">send</button>
		</div>
		<div id="console">
		</div>
	</div>
	<script src="<?php echo $base_url; ?>bower_components/jquery/dist/jquery.min.js"></script>
	<script>
		$('select').on('change', function() {
			var $option = $(this).find('option:selected');
			var command = $option.data('command');
			var params = $option.data('params');
			$('#commandline input').val(command + ' ' + params);
		});
		$('#issue').on('click', function() {
			issue_command($('#commandline input').val());
		});
		function issue_command(s) {
			$.ajax({
				url: '<?php echo $base_url; ?>API/endpoint.php',
				data: {
					command: s
				},
				type: 'post',
				success: function(response) {
					$('#console').html(response);
				}
			});
		}
	</script>
</body>
</html>