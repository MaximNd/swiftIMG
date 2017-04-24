<?php
	if (isset($_COOKIE["full_name"]) && isset($_COOKIE["social_id"])) {
		exit(header("Location: /cabinet"));
	}

	$title = "Авторизація | swiftIMG";
    include_once($_SERVER['DOCUMENT_ROOT'].'/app/header.php'); 
?>

<section class="first">
	<div class="container">
		<h1>Авторизація користувача</h1>
		<div class="social-icons">
			<span name="fb-enter" title="Увійти за допомогою Facebook">
				<i class="fa fa-facebook-official" aria-hidden="true"></i>
			</span>
			<span name="vk-enter" title="Увійти за допомогою VK">
				<i class="fa fa-vk" aria-hidden="true"></i>
			</span>
		</div>
	</div>
</section>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/app/footer.php'); ?>