<!DOCTYPE html>
<html lang=uk>
    <head>
        <meta charset=UTF-8>
        <meta http-equiv=reply-to content="vmudrij0508@gmail.com"/>
        <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1"/>
        <meta name=viewport content="width=device-width, initial-scale=1.0">
        <title><?=$title; ?></title>
        <meta property=og:type content=article />
        <meta property=og:description content=""/>
        <meta property=og:image content=""/>
        <meta property=og:url content=""/>
        <meta property=og:site_name content="swiftIMG"/>
        <meta name=twitter:card content="summary"/>
        <meta name=twitter:url content=""/>
        <meta property=og:title content="'.$title.'" />
        <meta itemprop=image content=""/>
        <meta itemprop=name content="swiftIMG"/>
        <meta itemprop=description content=""/>
        <meta itemprop=image content=""/>
        <meta name=description content=""/>
        <meta name=keywords content=""/>
        <meta name=author content="Віталій Мудрий, Максим Недашківський">
        <meta name=robots content="all"/>
        <meta name=application-name content="swiftIMG"/>
        <meta name=publisher content=""/>
        <meta name=distribution content="global"/>
        <meta name=revisit-after content="1 days"/>
        <meta name=google-site-verification content=""/>
        <meta name=referrer content="always"/>
        <meta name=apple-mobile-web-app-capable content=yes />
        <meta name=apple-mobile-web-app-status-bar-style content="black-translucent"/>
        <link href=/public/css/bootstrap.min.css rel="stylesheet"/>
        <link href=/public/css/font-awesome.min.css rel="stylesheet"/>
        <link href="/public/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="" type="image/x-icon"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class=sr-only>Toggle navigation</span>
                        <span class=icon-bar></span>
                        <span class=icon-bar></span>
                        <span class=icon-bar></span>
                    </button>
                    <a class="navbar-brand" href="/">swiftIMG</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/documentation"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Документація</a>
                        </li>
                        <?php if (isset($_COOKIE["full_name"]) && isset($_COOKIE["social_id"])): ?>
                            <li class="dropdown">
                                <a href=# class=dropdown-toggle data-toggle=dropdown role=button aria-haspopup=true aria-expanded=false><?=$_COOKIE["full_name"]; ?></a>
                                    <ul class=dropdown-menu>
                                        <li><a href=/cabinet><i class="fa fa-briefcase" aria-hidden=true></i>&nbsp;Мій кабінет</a></li>
                                        <li><a href=/exit><i class="fa fa-power-off" aria-hidden=true></i>&nbsp;Вийти</a></li>
                                    </ul>
                            </li>
                        <?php else: ?>
                            <li class="page-scroll">
                                <a href="#" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Увійти</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Увійти за допомогою</h4>
                    </div>
                    <div class="modal-body">
                        <div class=social-icons>
                            <span name=fb-enter title="Увійти за допомогою Facebook">
                                <i class="fa fa-facebook-official" aria-hidden=true></i>
                            </span>
                            <span name=vk-enter title="Увійти за допомогою VK">
                                <i class="fa fa-vk" aria-hidden=true></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>