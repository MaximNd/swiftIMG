<?php 
    $title = "swiftIMG - Онлайн сервіс з обробки зображень";
    include_once($_SERVER['DOCUMENT_ROOT'].'/app/header.php'); 
?>
<header>
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="hidden-xs hidden-sm col-md-4">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                <div class="item active">
                <img src="/public/images/A_2nMUIcMFM.jpg" alt="Image">
                </div>
                <div class="item">
                <img src="/public/images/8Kej5C-wXHI.jpg" alt="Image">
                </div>
                <div class="item">
                <img src="/public/images/8AirNDwMDko.jpg" alt="Image">
                </div>
                <div class="item">
                <img src="/public/images/QMowyrdBbFk.jpg" alt="Image">
                </div>
                </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="intro-text">
                    <span class="name">swiftIMG</span>
                    <hr class="star-light">
                    <span class="skills">Онлайн сервіс з обробки зображень</span>
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="https://swiftimg.herokuapp.com/public/js/swiftIMG.js" download class="btn btn-lg btn-outline">
                                <i class="fa fa-download"></i>&nbsp;Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio -->
<section class="portfolio">
    <div class="container">
        <div class="row">
<div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
<a href="#" class="portfolio-link">
<div class="mask"> 
<h2>Title</h2> 
<p>Content</p> 
</div> 
<img src="/public/images/CvGvzsyX1tA.jpg" class="img-responsive" alt="Cabin">
</a>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
<a href="#" class="portfolio-link">
<div class="mask"> 
<h2>Title</h2> 
<p>Content</p> 
</div> 
<img src="/public/images/IYcz1tAP1Lw.jpg" class="img-responsive" alt="Slice of cake">
</a>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
<a href="#" class="portfolio-link">
<div class="mask"> 
<h2>Title</h2> 
<p>Content</p> 
</div> 
<img src="/public/images/RDDe67vZ8nE.jpg" class="img-responsive" alt="Circus tent">
</a>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
<a href="#" class="portfolio-link">
<div class="mask"> 
<h2>Title</h2> 
<p>Content</p> 
</div> 
<img src="/public/images/Ch9uxuje6Ro.jpg" class="img-responsive" alt="Game controller">
</a>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
<a href="#" class="portfolio-link">
<div class="mask"> 
<h2>Title</h2> 
<p>Content</p> 
</div> 
<img src="/public/images/AUXIuLoU754.jpg" class="img-responsive" alt="Safe">
</a>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 portfolio-item">
<a href="#" class="portfolio-link">
<div class="mask"> 
<h2>Title</h2> 
<p>Content</p> 
</div> 
<img src="/public/images/QMowyrdBbFk.jpg" class="img-responsive" alt="Submarine">
</a>
</div>
</div>
    </div>
</section>

<!-- About Section -->
<section class="about success">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Про нас</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 about-item">
                <img src="/public/images/profile.png" class="img-responsive img-circle" alt="Віталій Мудрий">
                <h3 class="text-center">Віталій Мудрий</h3>
            </div>
            <div class="col-xs-12 col-sm-6 about-item">
                <img src="/public/images/profile.png" class="img-responsive img-circle" alt="Максим Недашківський">
                <h3 class="text-center">Максим Недашківський</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>Привіт. Ми – група студентів факультету інформатики НаУКМА. Одного разу при створенні проекту ми зіткнулися з проблемою неотимізації картинок. Їх було багато і всі вони розміщувалися на сторонніх серверах. Обробка вручну кожної картинки зайняла б багато часу, то ж такий шлях навіть не розглядався. Після декількох годин пошуку, ми зрозуміли, що треба самим писати додаток, який міг би оптимізувати автоматично кожну фотографію на сайті. Під час роботи ми зрозуміли, що можна не тільки зжимати картинки, а й обробляти їх. То ж ми додали деякі фішки, які Ви зможете виконувати зі своїми зображеннями. Отож, насолоджуйтесь нашим продуктом та робіть Ваші картинки надзвичайними.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>Зв'яжіться з нами</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <form onsubmit="sendComment(this); return false;">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="name">Ім'я</label>
                            <input type="text" class="form-control" placeholder="Ім'я" id="name" name="name" autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="Email" id="email" name="email" autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="message">Повідомлення</label>
                            <textarea rows="5" class="form-control" placeholder="Повідомлення" id="message" name="message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/app/footer.php'); ?>