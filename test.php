<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
            $url = "https://swiftimg.herokuapp.com";

			// Validate url
			if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
			    echo("$url is a valid URL");
			} else {
			    echo("$url is not a valid URL");
			}
			?>
        ?>
        <script>
        	console.log(location.protocol + "//" + location.hostname);
        </script>
</body>
</html>