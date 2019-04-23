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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url('public_html/assets/css/style.css'); ?>">
	</head>
	<body>
		<div class="container rubberBand animated">
			<div class="row">
				<div class="col-md-12">
					<form class="form-box" method="POST" autocomplete="off">
						<h4 class="text-center">Wyślij wiadomość</h4>
						<hr>
						<div class="form-group">
							<input class="form-control" type="text" name="user" placeholder="Nazwa użytkownika..." required>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="message" placeholder="Wiadomość..." required>
						</div>
						<button class="btn btn-primary" type="submit">Wyślij wiadomość</button>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 class="text-center">Wiadomości:</h4>
					<hr>
					<div class="list">
						<ul>
						<?php foreach ($messages as $m) { ?>
							<li>
								<p><?php echo $m['user'].": ".$m['message']; ?></p>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>