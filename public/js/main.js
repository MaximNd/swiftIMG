$(document).ready(function() {
	$("span[name='fb-enter']").click(function() {
	    FB.login(function(response) {
	        if (response.authResponse) {
	           	FB.api('/me', function(response) {
              		document.cookie = `full_name=${response.name}; path=/`;
	              	document.cookie = `social_id=${response.id}; path=/`;

	              	location.href = "/cabinet";
	           });
	        } else {
	          	console.log('User cancelled login or did not fully authorize.');
	        }
	    });
	});

  	$("span[name='vk-enter']").click(function() {
	    VK.Auth.login(function(response) {
	        if (response.session) {
	        	document.cookie = `full_name=${response.session.user.first_name} ${response.session.user.last_name}; path=/`;
           		document.cookie = `social_id=${response.session.user.id}; path=/`;

	          	location.href = "/cabinet";
	        } else {
	          	console.log('User cancelled login or did not fully authorize.');
	        }
	    });
	});
});

function sendComment(element) {
	const reg = /^\s+|\s+$/g;

	$name = $(element).find("input[name='name']");
	$email = $(element).find("input[name='email']");
	$message = $(element).find("textarea[name='message']");

	let name = $name.val();
	let email = $email.val();
	let message = $message.val().replace(reg, '').split(' ');

	$name.next().hide();
	$email.next().hide();
	$message.next().hide();

	if (/^[А-ЯІЇ]{1}[а-яА-ЯіІїЇєЄ\-'\s]+[а-яіїє]{1}$/.test(name)) {
		$name.css("border-bottom", "#fff");

		if (/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/.test(email)) {
			$email.css("border-bottom", "#fff");

			if (/^\S[\s\S]+[\S]{1}$/.test(message)) {
				$message.css("border-bottom", "#fff");

				let value = $(element).serialize();

				$.ajax({
					url: "/public/php/send-comment.php",
					type: "POST",
					data: value,
					success: function(data) {
						if (data) {
							location.href = "/";
						} else {

						}
					}
				});
			} else {
				$message.css("border-bottom", "1px solid #a94442");
				$message.after("<p class='small text-danger'>Повідомлення не може бути порожнім</p>");
			}
		} else {
			$email.css("border-bottom", "1px solid #a94442");
			$email.after("<p class='small text-danger'>Введіть валідну email адресу</p>");
		}
	} else {
		$name.css("border-bottom", "1px solid #a94442");
		$name.after("<p class='small text-danger'>Введіть валідне ім'я</p>");
	}
}

function createApp(element) {
	$appName = $(element).find("input[name='app-name']");
	$urlAddress = $(element).find("input[name='url-address']");

	let appName = $appName.val();
	let urlAddress = $urlAddress.val();

	$appName.next().hide();
	$urlAddress.next().hide();

	if (/^[a-zA-Z0-9]+$/.test(appName)) {
		$appName.css("border", "1px solid #ccc");

		if (/^(https?:\/\/){1}([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/.test(urlAddress)) {
			$urlAddress.css("border", "1px solid #ccc");
			
			let value = $(element).serialize();

			$.ajax({
				url: "/public/php/create-app.php",
				type: "POST",
				data: value,
				success: function(data) {
					if (data) {
						location.reload();
					} else {

					}
				}
			});			
		} else {
			$urlAddress.css("border", "1px solid #a94442");
			$urlAddress.after("<p class='small text-danger'>Введіть валідну URL адресу</p>");
		}
	} else {
		$appName.css("border", "1px solid #a94442");
		$appName.after("<p class='small text-danger'>Введіть валідну назву додатку</p>");
	}
}

function updateApp(element) {
	$appName = $(element).find("input[name='app-name']");
	$urlAddress = $(element).find("input[name='url-address']");
	$work = $(element).find("input[name='work']");

	let appId = $(element).attr("data-app-id");
	let appName = $appName.val();
	let urlAddress = $urlAddress.val();
	let work = 0;

	if (/^[a-zA-Z0-9]+$/.test(appName)) {
		$appName.css("border", "1px solid #ccc");

		if (/^(https?:\/\/){1}([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/.test(urlAddress)) {
			$urlAddress.css("border", "1px solid #ccc");

			if ($work.prop("checked")) {
				work = 1;
			}
			
			let value = $(element).serialize();

			$.ajax({
				url: "/public/php/update-app.php",
				type: "POST",
				data: {"app-id" : appId, "app-name" : appName, "url-address" : urlAddress, "work" : work},
				success: function(data) {
					if (data) {
						location.reload();
					} else {

					}
				}
			});
		} else {
			$urlAddress.css("border", "1px solid #a94442");
			$urlAddress.after("<p class='small text-danger'>Введіть валідну URL адресу</p>");
		}
	} else {
		$appName.css("border", "1px solid #a94442");
		$appName.after("<p class='small text-danger'>Введіть валідну назву додатку</p>");
	}
}

function deleteApp(element) {
	let appName = $(element).attr("data-app-name");
	let inputName = $(element).find("input[name='name']").val();

	if (appName === inputName) {
		let appId = $(element).attr("data-app-id");

		$.ajax({
			url: "/public/php/delete-app.php",
			type: "POST",
			data: {"app-id" : appId},
			success: function(data) {
				if (data) {
					location.href = "/cabinet";
				} else {

				}
			}
		});
	} else {
		$(element).find("input[name='name']").css("border", "1px solid #a94442")
	}
}

function showImagePreview(element) {
	let src = $(element).find("img").attr("src");
	let alt = $(element).find("img").attr("atr");
	let date = $(element).find("img").attr("data-date");
	let originalName = $(element).find("img").attr("data-original-name");

	$("#imagePreview").find("img").attr("src", src);
	$("#imagePreview").find(".btn-download").attr("href", src);
	$("#imagePreview").find(".btn-download").attr("download", originalName);
	$("#imagePreview").find(".btn-delete").attr("data-src", src);
	$("#imagePreview").find("img").attr("alt", alt);
	$("#imagePreview").find(".date").text(date);
	$("#imagePreview").find(".original-name").text(originalName);
}

function deleteImages(element) {
	let appId = $(element).attr("data-app-id");
	let src = $(element).attr("data-src");

	$.ajax({
		url: "/public/php/delete-image.php",
		type: "POST",
		data: {"app-id" : appId, src : src},
		success: function(data) {
			location.reload();
		}
	});
}