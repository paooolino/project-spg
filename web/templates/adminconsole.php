<!doctype html>
<html>
<head>
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
			<input />
		</div>
		<div id="console">
		</div>
	</div>
	<script>
		
	</script>
</body>
</html>