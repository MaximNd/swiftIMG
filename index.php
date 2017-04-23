<!DOCTYPE HTML>
<html lang=uk>
    <head>
        <meta charset=UTF-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1"/>
        <meta name=viewport content="width=device-width, initial-scale=1.0">
        <title>swiftIMG | Головна</title>
        <link href=public/css/bootstrap.min.css rel="stylesheet"/>
        <link href=public/css/font-awesome.min.css rel="stylesheet"/>
        <link href=public/less/style.less rel="stylesheet/less"/>
        <script src=public/js/less.js></script>
    </head>
    <body>
        <!-- <header class="navbar navbar-fixed-top">
            <div class=container-fluid>
                <div class=navbar-header>
                    <button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target=#navbar aria-expanded=false aria-controls=navbar>
                    <span class=sr-only>Toggle navigation</span>
                    <span class=icon-bar></span>
                    <span class=icon-bar></span>
                    <span class=icon-bar></span>
                    </button>
                    <a class=navbar-brand href=/>swiftIMG</a>
                </div>
                <div id=navbar class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href=/news><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Документація</a></li>
                    </ul>
                </div>
            </div>
        </header> -->

        <!-- <img id="img" src="/images/img.jpg"> -->
        

        <script src=public/js/jquery.js></script>
        <script src=public/js/swiftIMG.js></script>
        
        <script>
        
            $.ajax({
                url: 'app/API.php',
                type: 'POST',
                data: {param: "hello"},
                success: function(data) {
                    //$("body").append("<img src=" + data + ">");
                    $("body").append(data);
                }
            });
            

        </script>
    </body>
</html>

