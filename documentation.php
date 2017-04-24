<?php 
    $title = "Документація | swiftIMG";
    include_once($_SERVER['DOCUMENT_ROOT'].'/app/header.php'); 
?>
<section class="first">
	<div class="container">
		<a href="#rotate"></a>
		<h3><span class="text-success">rotate</span>(<span class="text-danger">degree</span> = <span class="text-primary">90</span>)</h3>
		<p>Метод, який повертає зображення на кут заданий параметром <b>degree</b>.</p>
		<ul>
			<li>
				<p><b>degree</b> - кут нахилу. Приймає позитивне або негативне значення. За замовченням має значення 90.</p>
			</li>
		</ul>
		<hr>

		<a href="#crop"></a>
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


		<h3><span class="text-success">frame</span>(<span class="text-danger">type</span> = "<span class="text-primary">type-1</span>")</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<ul>
			<li>
				<p>type – назва рамки</p>
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
		<h3>pixelate(size = 1)</h3>
		<p>встановлює розмір пікселів</p>
		<hr>
		<h3>gamma(value = 2)</h3>
		<p>Виконує операцію гамма-корекції на поточному зображенні</p>
		<hr>

		<a href="#bright"></a>
		<h3><span class="text-success">bright</span>(<span class="text-danger">value</span> = <span class="text-primary">15</span>)</h3>
		<p>Метод, який змінює яскравість зображення</p>
		<hr>

		<h3>contrast(value = 20)</h3>
		<p>змінює контраст зображення</p>
		<hr>
		<h3>colorize(red = 10, green = 10, blue = 10)</h3>
		<p>Зміна значення кольору RGB поточного зображення по заданих каналах <b>червоного</b>, <b>зеленого</b> і <b>синього</b></p>
		<hr>

		<a href="#makeGrayscale"></a>
		<h3><span class="text-success">makeGrayscale</span>()</h3>
		<p>Метод, який робить зображення чорно-білим.</p>
		<hr>
		
		<a href="#invert"></a>
		<h3><span class="text-success">invert</span>()</h3>
		<p>Метод, який змінює усі кольори зображення.</p>
		<hr>

		<a href="#mirror"></a>
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

		<a href="#opacity"></a>
		<h3><span class="text-success">opacity</span>(<span class="text-danger">value</span> = <span class="text-primary">60</span>)</h3>
		<p>Метод, який робить зображення прозорим.</p>
		<ul>
			<li><p><b>value</b> - параметр, який приймає значення від 0 до 100 (0 - повністю невидимий. 100 - повністю бачимо). За замовченням має значення 60.</p></li>
		</ul>
		<hr>

		<h3>resize(width, heigh = null)</h3>
		<p>

		</p>
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

		<a href="#CannyBorder"></a>
		<h3><span class="text-success">CannyBorder</span>(<span class="text-danger">type</span> = "<span class="text-primary">color</span>", format = "jpg", quality = 90, sigma = 1, sobelK = 1, low = 50, high = 150, size = 2)</h3>
		<p>
			Знаходить кордон за методом Канни
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
		<p>
		</p>
		<hr>


		<h3>filters(filters = 'blur-makeGrayscale')</h3>
		<p>приймає рядок типу 'opacity- contrast' і застосовує ці стилі.</p>
		<hr>

		<a href="#sharpen"></a>
		<h3><span class="text-success">sharpen</span>(<span class="text-danger">value</span> = <span class="text-primary">10</span>)</h3>
		<p>Метод, який збільшує чіткість зображення.</p>
		<ul>
			<li><p><b>value</b> – параметр, який приймає значення від 1 до 100. За замовченням має значення 10.</p></li>
		</ul>
		<hr>

		<a href="#outPut"></a>
		<h3><span class="text-success">outPut</span>()</h3>
		<p>Метод, який повертає оброблене зображення.</p>
		<hr>

		<a href="#save"></a>
		<h3><span class="text-success">save</span>(<span class="text-danger">path</span>)</h3>
		<p>Метод, який зберігає оброблене зображення в директорії, яка зазначення в параметрі <b>path</b>.</p>
	</div>
</section>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/app/footer.php'); ?>