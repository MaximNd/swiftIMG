<?php 
    $title = "Документація | swiftIMG";
    include_once($_SERVER['DOCUMENT_ROOT'].'/app/header.php'); 
?>
<section class="first">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-10">
				<span id="rotate"></span>
				<h3><span class="text-success">rotate</span>(<span class="text-danger">degree</span> = <span class="text-primary">90</span>)</h3>
				<p>Метод, який повертає зображення на кут заданий параметром <b>degree</b>.</p>
				<ul>
					<li>
						<p><b>degree</b> - кут нахилу. Приймає позитивне або негативне значення. За замовченням має значення 90.</p>
					</li>
				</ul>
				<hr>

				<span id="crop"></span>
				<h3><span class="text-success">crop</span>(<span class="text-danger">width</span> = <span class="text-primary">null</span>, <span class="text-danger">height</span> = <span class="text-primary">null</span>, <span class="text-danger">startX</span> = <span class="text-primary">0</span>, <span class="text-danger">startY</span> = <span class="text-primary">0</span>, <span class="text-danger">isProp</span> = <span class="text-primary">false</span>)</h3>
				<p>Метод, який обрізає зображення.</p>
				<ul>
					<li>
						<p><b>width</b> – ширина вихідного зображення</p>
					</li>
					<li>
						<p><b>height</b> – висота вихідного зображення</p>
					</li>
					<li>
						<p><b>startX</b>, <b>startY</b> – початок координат звідки починати обрізати</p>
					</li>
					<li>
						<p><b>isProp</b> – булева змінна; якщо значення true, то перевіряється чи можна зменшити зображення пропорційно. Якщо так, то викликається метод <a href="#resize">resize</a></p>
					</li>
				</ul>
				<hr>

				<span id="frame"></span>
				<h3><span class="text-success">frame</span>(<span class="text-danger">type</span> = "<span class="text-primary">type-1</span>")</h3>
				<p>Метод, який додає рамку навколо зображення.</p>
				<ul>
					<li>
						<p><b>type</b> – назва рамки</p>
					</li>
				</ul>
				<hr>

				<h3><span class="text-success">insert</span>(<span class="text-danger">image</span>, <span class="text-danger">position</span> = "<span class="text-primary">top-left</span>", <span class="text-danger">offsetX</span> = <span class="text-primary">0</span>, <span class="text-danger">offsetY</span> = <span class="text-primary">0</span>)</h3>
				<p>Накладення зображення image - зображення (як об'єкт, на якому теж можна використовувати методи його класу)</p>
				<ul>
					<li>
						<p><b>position</b> - позиція де має перебувати друге зображення. Приймає такі параметри</p>
						<ul>
							<li>
								<p><b>top-left</b> - </p>
							</li>
							<li>
								<p><b>top</b> - </p>
							</li>
							<li>
								<p><b>top-right</b> - </p>
							</li>
							<li>
								<p><b>left</b> - </p>
							</li>
							<li>
								<p><b>center</b> - </p>
							</li>
							<li>
								<p><b>right</b> - </p>
							</li>
							<li>
								<p><b>bottom-left</b> - </p>
							</li>
							<li>
								<p><b>bottom</b> - </p>
							</li>
							<li>
								<p><b>bottom-right</b> - </p>
							</li>
						</ul>
					</li>
					<li>
						<p><b>offsetX</b>, <b>offsetY</b> – </p>
					</li>
				</ul>
				<hr>

				<h3><span class="text-success">insertMerge</span>(<span class="text-danger">image</span>, <span class="text-danger">opacityValue</span> = <span class="text-primary">100</span>, <span class="text-danger">position</span> = "<span class="text-primary">top-left</span>", <span class="text-danger">offsetX</span> = <span class="text-primary">0</span>, <span class="text-danger">offsetY</span> = <span class="text-primary">0</span>)</h3>
				<p>налагоджує зображення з прозорістю</p>
				<hr>

				<h3>insertGrayscale(image, position = "top-left", offsetX = 0, offsetY = 0) </h3>
				<p>налагоджує зображення і зробити його чорно-білим</p>
				<hr>

				<h3>insertResize(image, sizeArr, position = "top-left", offsetX = 0, offsetY = 0)</h3>
				<p>налагоджує зображення і змінює його розмір</p>
				<hr>

				<h3>insertCrop(image, sizeArr, position = "top-left", offsetX = 0, offsetY = 0)</h3>
				<p>налагоджує зображення і обрізає його</p>
				<hr>

				<h3>text(text, startX = 0, startY = 0</h3>
				<hr>

				<p>налагоджує текст на зображення</p>
				<hr>

				<span id="pixelate"></span>
				<h3><span class="text-success">pixelate</span>(<span class="text-danger">size</span> = <span class="text-primary">1</span>)</h3>
				<p>Метод, який встановлює розмір пікселів.</p>
				<ul>
					<li>
						<p><b>size</b> - . За замовченням має значення 1.</p>
					</li>
				</ul>
				<hr>

				<span id="gamma"></span>
				<h3><span class="text-success">gamma</span>(<span class="text-danger">value</span> = <span class="text-primary">2</span>)</h3>
				<p>Метод, який виконує операцію гамма-корекції на зображенні.</p>
				<ul>
					<li>
						<p><b>value</b> - . За замовченням має значення 1.</p>
					</li>
				</ul>
				<hr>

				<span id="bright"></span>
				<h3><span class="text-success">bright</span>(<span class="text-danger">value</span> = <span class="text-primary">15</span>)</h3>
				<p>Метод, який змінює яскравість зображення</p>
				<ul>
					<li><p><b>value</b> - . За замовченням має значення 15.</p></li>
				</ul>
				<hr>

				<span id="contrast"></span>
				<h3><span class="text-success">contrast</span>(<span class="text-danger">value</span> = <span class="text-primary">20</span>)</h3>
				<p>Метод, який змінює контраст зображення</p>
				<ul>
					<li><p><b>value</b> - . За замовченням має значення 20.</p></li>
				</ul>
				<hr>

				<h3>colorize(red = 10, green = 10, blue = 10)</h3>
				<p>Зміна значення кольору RGB поточного зображення по заданих каналах <b>червоного</b>, <b>зеленого</b> і <b>синього</b></p>
				<hr>

				<span id="makeGrayscale"></span>
				<h3><span class="text-success">makeGrayscale</span>()</h3>
				<p>Метод, який робить зображення чорно-білим.</p>
				<hr>
				
				<span id="invert"></span>
				<h3><span class="text-success">invert</span>()</h3>
				<p>Метод, який змінює усі кольори зображення.</p>
				<hr>

				<span id="mirror"></span>
				<h3><span class="text-success">mirror</span>(<span class="text-danger">value</span> = "<span class="text-primary">h</span>");</h3>
				<p>Метод, який віддзеркалює зображення.</p>
				<ul>
					<li><p><b>value</b> - параметр, який приймає наступні значення:</p></li>
					<ul>
						<li>
							<p><b>h</b> - горизонтальне відображення. Стоїть за замовченням.</p>
						</li>
						<li>
							<p><b>v</b> - вертикальне відображення.</p>
						</li>
					</ul>
				</ul>
				<hr>

				<span id="opacity"></span>
				<h3><span class="text-success">opacity</span>(<span class="text-danger">value</span> = <span class="text-primary">60</span>)</h3>
				<p>Метод, який робить зображення прозорим.</p>
				<ul>
					<li><p><b>value</b> - параметр, який приймає значення від 0 до 100 (0 - повністю невидимий. 100 - повністю бачимо). За замовченням має значення 60.</p></li>
				</ul>
				<hr>

				<span id="resize"></span>
				<h3><span class="text-success">resize</span>(<span class="text-danger">width</span>, <span class="text-danger">height</span> = <span class="text-primary">null</span>)</h3>
				<p>Метод, який змінює розмір зображення.</p>
				<ul>
					<li>
						<p><b>width</b> - ширина вихідного зображення.</p>
					</li>
					<li>
						<p><b>height</b> - висота вихідного зображення. За замовченням має значення null.</p>
					</li>
				</ul>
				<hr>

				<h3>histogramEqualization(type = "grayscale")</h3>
				<p>
					<ul>
						<li>
							type - приймає значення наступні параметри
							<ol>
								<li>
									сolor - користувач вказує що зображення кольорове
								</li>
								<li>
									grayscale - користувач вказує що зображення чорно-біле
								</li>
								<li>
									color-to-grayscale - користувач вказує що зображення кольорове, але треба перетворити в чорно-біле.
								</li>
							</ol>
						</li>
					</ul>
				</p>
				<hr>
				<h3>histogramGraph(type = "grayscale", format = "jpg", quality = 90, coef = 35);</h3>
				<p>
					<ul>
						<li>
							type - приймає значення наступні параметри
							<ol>
								<li>
									сolor - користувач вказує що зображення кольорове
								</li>
								<li>
									grayscale - користувач вказує що зображення чорно-біле
								</li>
								<li>
									color-to-grayscale - користувач вказує що зображення кольорове, але треба перетворити в чорно-біле.
								</li>
							</ol>
						</li>
						<li>format – в якому форматі буде зображення</li>
						<li>quality – в якій якості буде зображення</li>
						<li>coef – коефіцієнт для розміру графіка, краще залишати за замовчуванням</li>
					</ul>
				</p>
				<hr>

				<span id="CannyBorder"></span>
				<h3><span class="text-success">CannyBorder</span>(<span class="text-danger">type</span> = "<span class="text-primary">color</span>", format = "jpg", quality = 90, sigma = 1, sobelK = 1, low = 50, high = 150, size = 2)</h3>
				<p>Метод, який знаходить кордон за методом Канни</p>
					<ul>
						<li><p><b>type</b> - параметр, який приймає наступні значення:</p></li>
							<ul>
								<li>
									<p><b>сolor</b> - користувач вказує що зображення кольорове.</p>
								</li>
								<li>
									<p><b>grayscale</b> - користувач вказує що зображення чорно-біле.</p>
								</li>
							</ul>
						</li>
					</ul>
				</p>
				<hr>

				<h3>SobelBorder(type = "color", k = 1, format = "jpg", quality = 90)</h3>
				<p>
					знаходить кордон по Собеля
					<ul>
						<li>
							type - приймає значення наступні параметри
							<ol>
								<li>
									сolor - користувач вказує що зображення кольорове
								</li>
								<li>
									grayscale - користувач вказує що зображення чорно-біле
								</li>
							</ol>
						</li>
					</ul>
				</p>
				<hr>

				<h3>regionGrowing(T = 10, type = "color")</h3>
				<p>
					збільшує регіони зображення
					<ul>
						<li>
							type - приймає значення наступні параметри
							<ol>
								<li>
									сolor - користувач вказує що зображення кольорове
								</li>
								<li>
									grayscale - користувач вказує що зображення чорно-біле
								</li>
							</ol>
						</li>
					</ul>
				</p>
				<hr>

				<h3>blur(value = 1)</h3>
				<p></p>
				<hr>
				
				<span id="filters"></span>
				<h3>filters(filters = 'blur-makeGrayscale')</h3>
				<p>приймає рядок типу 'opacity- contrast' і застосовує ці стилі.</p>
				<hr>

				<span id="sharpen"></span>
				<h3><span class="text-success">sharpen</span>(<span class="text-danger">value</span> = <span class="text-primary">10</span>)</h3>
				<p>Метод, який збільшує чіткість зображення.</p>
				<ul>
					<li><p><b>value</b> – параметр, який приймає значення від 1 до 100. За замовченням має значення 10.</p></li>
				</ul>
				<hr>

				<span id="outPut"></span>
				<h3><span class="text-success">outPut</span>()</h3>
				<p>Метод, який повертає оброблене зображення.</p>
				<hr>

				<span id="save"></span>
				<h3><span class="text-success">save</span>(<span class="text-danger">path</span>)</h3>
				<p>Метод, який зберігає оброблене зображення в директорії, яка зазначенна в параметрі <b>path</b>.</p>
			</div>
			<div class="hidden-xs hidden-sm col-md-2">
				<ul>
					<li>
						<p><a href="#rotate">rotate</a></p>
					</li>
					<li>
						<p><a href="#crop">crop</a></p>
					</li>
					<li>
						<p><a href="#frame">frame</a></p>
					</li>
					<li>
						<p><a href="#insert">insert</a></p>
					</li>
					<li>
						<p><a href="#pixelate">pixelate</a></p>
					</li>
					<li>
						<p><a href="#gamma">gamma</a></p>
					</li>
					<li>
						<p><a href="#bright">bright</a></p>
					</li>
					<li>
						<p><a href="#contrast">contrast</a></p>
					</li>
					<li>
						<p><a href="#makeGrayscale">makeGrayscale</a></p>
					</li>
					<li>
						<p><a href="#mirror">mirror</a></p>
					</li>
					<li>
						<p><a href="#opacity">opacity</a></p>
					</li>
					<li>
						<p><a href="#resize">resize</a></p>
					</li>














					<li>
						<p><a href="#filters">filters</a></p>
					</li>
					<li>
						<p><a href="#sharpen">sharpen</a></p>
					</li>
					<li>
						<p><a href="#outPut">outPut</a></p>
					</li>
					<li>
						<p><a href="#save">save</a></p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/app/footer.php'); ?>