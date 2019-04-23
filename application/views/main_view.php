<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	if (isset($_POST['user']) && !empty($_POST['user'])) {
		if (isset($_POST['message']) && !empty($_POST['message'])) {
			$user = $_POST['user'];
			$message = $_POST['message'];

			$this->chat->insert($user, $message);
		}
	}

	$messages = $this->chat->messages();
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Chat</title>
	</head>
	<body>
		<form method="post">
			<input type="text" name="user" required>
			<textarea name="message"></textarea>
			<input type="submit" value="Send">
		</form>

		<ol>
			<?php foreach ($messages as $m) { ?>
				<li>
					<p><?php echo $m['user'].": ".$m['message']; ?></p>
				</li>
			<?php } ?>
		</ol>
	</body>
</html>