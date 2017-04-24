<?php 
	if (isset($_COOKIE["full_name"]) && isset($_COOKIE["social_id"])) {
		include($_SERVER['DOCUMENT_ROOT'].'/app/swiftIMG_site.php');
		$swiftIMG = new swiftIMG_site();
		$user = $swiftIMG->getUser($_COOKIE["full_name"], $_COOKIE["social_id"]);

		if ($user) {
			$apps = $swiftIMG->getApps($user["id"]);
		} else {
			exit(header("Location: /login"));
		}
	} else {
		exit(header("Location: /login"));
	}

    $title = "Мій кабінет | swiftIMG";
    include_once($_SERVER['DOCUMENT_ROOT'].'/app/header.php'); 
?>
<div class="modal fade" id="createApp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h4 class="modal-title" id="myModalLabel">Створити додаток</h4>
            </div>
            <div class="modal-body">
                <form onsubmit="createApp(this); return false">
				  	<div class="form-group">
					    <label for="app-name">Назва додатку</label>
					    <input type="text" class="form-control" id="app-name" name="app-name" placeholder="Назва додатку" autocomplete="off" title="Назва додатку">
				  	</div>
				  	<div class="form-group">
					    <label for="url-address">URL адреса</label>
					    <input type="text" class="form-control" id="url-address" name="url-address" placeholder="URL адреса" autocomplete="off" title="URL адреса">
				  	</div>
				  	<button type="submit" class="btn btn-success btn-block">Створити додаток</button>
				</form>
            </div>
        </div>
    </div>
</div>
<section class="first">
	<div class="container">
		<div class="panel panel-default">
		  	<div class="panel-heading">
		  		<div class="row">
		  			<div class="col-xs-12 col-sm-6">
		  				<p class="pull-left">Мої додатки</p>
		  			</div>
		  			<div class="col-xs-12 col-sm-6">
		  				<a href="#" class="btn btn-success pull-right" role="button" data-toggle="modal" data-target="#createApp">Створити додаток</a>
		  			</div>
		  		</div>
		  	</div>
		</div>
    	<?php if ($apps): ?>
			<table class="table">
				<tr>
					<th>Назва</th>
					<th>Статус</th>
					<th>Ключ</th>
					<th></th>
				</tr>
				<?php foreach ($apps as $item): ?>
					<tr>
						<td><?=$item["name"]; ?></td>
						<?php if ($item["work"]): ?>
							<td><span class="text-success">Увімкнено</span></td>
						<?php else: ?>
							<td><span class="text-danger">Вимкнено</span></td>
						<?php endif; ?>
						<td><?=$item["key"]; ?></td>
						<td><a href="app/key=<?=$item["key"]; ?>" class="btn btn-info">Керування</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php else: ?>
			<p>Ви поки що не маєте додатків</p>
		<?php endif; ?>
	</div>
</section>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/app/footer.php'); ?>