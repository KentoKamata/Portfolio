@yield('phpTodo')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KK PortFolioSite</title>
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" >
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a href="http://kkamata-engineer.com/" class="navbar-brand">PortFolio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar" aria-controls="Navbar"
                aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://kkamata-engineer.com/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://kkamata-engineer.com/tasklist">ToDo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main role="main">
    @yield('main')
    </main>
    <footer class="container">
        <div class="icon_list">
            <a href="https://twitter.com/" class="twitter_icon" target="_blank" title="twitter">
                <i class="fab fa-twitter fa-fw fa-5x tw-color"></i>
            </a>
            <a href="https://www.facebook.com/" class="facebook_icon" target="_blank" title="facebook">
                <i class="fab fa-facebook fa-fw fa-5x fb-color"></i>
            </a>
            <a href="https://mail.google.com/mail/u/0/#inbox" class="gmail_icon" target="_blank" title="gmail">
                <i class="far fa-envelope fa-fw fa-5x gm-color"></i>
            </a>
        </div>
    </footer>
    @yield('myJs')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP"
        crossorigin="anonymous"></script>
</body>

</html>
