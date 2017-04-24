<?php
	if (isset($_COOKIE["full_name"]) && isset($_COOKIE["social_id"]) && isset($_GET["key"])) {
		include($_SERVER['DOCUMENT_ROOT'].'/app/swiftIMG_site.php');
		$swiftIMG = new swiftIMG_site();
		$user = $swiftIMG->getUser($_COOKIE["full_name"], $_COOKIE["social_id"]);
		
		if ($user) {
			$app = $swiftIMG->getAppByKey($_GET["key"], $user["id"]);

			if ($app) {
				$images = $swiftIMG->getImagesByAppId($app["id"]);
			} else {
				exit(header("Location: /404"));
			}
		} else {
			exit(header("Location: /login"));
		}
	} else {
		exit(header("Location: /404"));
	}

    $title = $app["name"]." | swiftIMG";
    include_once($_SERVER['DOCUMENT_ROOT'].'/app/header.php'); 
?>
<div class="modal fade" id="deleteApp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h4 class="modal-title" id="myModalLabel">Ви впевнені, що хочете видалити цей додаток?</h4>
            </div>
            <div class="modal-body">
            	<form onsubmit="deleteApp(this); return false" data-app-id="<?=$app["id"]; ?>" data-app-name="<?=$app["name"]; ?>">
					<p>Ця дія не може бути скасована. Вона остаточно видалить додаток <strong><?=$app["name"]; ?></strong> та всі зображення, які до нього відносяться</p>
					<p>Будь ласка, введіть ім'я додатку для підтвердження.</p>
					<input type="text" class="form-control" name="name" autocomplete="off">
					<button type="submit" class="btn btn-danger btn-block">Видалити</button>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="imagePreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
            	<div class="image">
					<img src="" alt="">
					<p class="original-name"></p>
					<a href="" class="btn btn-download" download><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Завантажити</a>
					<button class="btn btn-delete" onclick="deleteImages(this)" data-app-id="<?=$app["id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;&nbsp;Видалити</button>
					<p class="date"></p>
            	</div>
            </div>
        </div>
    </div>
</div>
<section class="first">
	<div class="container">
		<ol class="breadcrumb">
	  		<li><a href="/cabinet"><?=$_COOKIE["full_name"]; ?></a></li>
		  	<li class="active"><?=$app["name"]; ?></li>
		</ol>
  		<ul class="nav nav-tabs">
	  		<li class="active"><a data-toggle="tab" href="#my-app-tab">Налаштування</a></li>
		  	<li><a data-toggle="tab" href="#gallery-tab">Галерея</a></li>
		</ul>
	  	<div class="tab-content">
	  		<div id="my-app-tab" class="tab-pane fade in active">
				<div class="panel panel-default">
  					<div class="panel-heading">Налаштування</div>
  					<div class="panel-body">
  						<form onsubmit="updateApp(this); return false" data-app-id="<?=$app["id"]; ?>">
							<div class="form-group">
							    <label for="app-name">Назва додатку</label>
							    <input type="text" class="form-control" id="app-name" name="app-name" placeholder="Назва додатку" autocomplete="off" value="<?=$app["name"]; ?>">
						  	</div>
						  	<div class="form-group">
							    <label for="url-address">URL адреса</label>
							    <input type="text" class="form-control" id="url-address" name="url-address" placeholder="URL адреса" autocomplete="off" value="<?=$app["domain"]; ?>">
						  	</div>
						  	<div class="checkbox">
							 	<label>
							 		<?php if($app["work"] == 1): ?>
							    		<input type="checkbox" name="work" checked>
							    	<?php else: ?>
						    			<input type="checkbox" name="work">
							    	<?php endif; ?>
							    	&nbsp;Активно
							  	</label>	
							</div>
						  	<button type="submit" class="btn btn-info">Зберегти змінни</button>
						</form>
  					</div>
				</div>
				<div class="panel panel-danger">
      				<div class="panel-heading">Небезпечна зона</div>
      				<div class="panel-body">
      					<h4>Видалити цей додаток</h4>
      					<p class="pull-left">Після видалення додатку, Ви не зможете його повернути. Будьте обережними.</p>
      					<a href="#" class="btn btn-danger pull-right" role="button" data-toggle="modal" data-target="#deleteApp">Видалити додаток</a>
      				</div>
    			</div>		    	
		  	</div>
		  	<div id="gallery-tab" class="tab-pane fade">
		    	<?php if ($images): ?>
		    		<div class="row masonry" data-columns>
		    			<?php foreach ($images as $image): ?>
							<div class="image">
								<a href="#" role="button" data-toggle="modal" data-target="#imagePreview" onclick="showImagePreview(this)">
									<img src="/public/users/user-<?=$user["id"]; ?>/app-<?=$app["id"]; ?>/<?=$image["name"]; ?>" alt="<?=$image["original_name"]; ?>" data-date="<?=$image["date"]; ?>" data-original-name="<?=$image["original_name"]; ?>">
								</a>
								<p class="date"><?=$image["date"]; ?></p>
							</div>
						<?php endforeach; ?>
					</div>
		    	<?php else: ?>
					<p>Ви поки що не маєте збережених зображень для цього додатку</p>
		    	<?php endif; ?>
		  	</div>
		</div>
	</div>
</section>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/app/footer.php'); ?>