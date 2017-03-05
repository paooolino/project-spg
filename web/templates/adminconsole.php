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
				<option
					data-command="get_node_by_slug"
					data-params="slug"
				>Get node by slug</option>
				<option
					data-command="add_player"
					data-params="name surname country"
				>Add player</option>
			</select>
		</div>
		<div id="commandline">
			<input id="#commandline" /><button id="issue">send</button>
		</div>
		<div id="console">
		</div>
	</div>
	<script src="<?php echo $base_url; ?>bower_components/jquery/dist/jquery.min.js"></script>
	<script>
		$('#issue').on('click', function() {
			issue_command($('#commandline').val());
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