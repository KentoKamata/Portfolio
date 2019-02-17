@extends('common.layout')
@section('main')
    <!-- ジャンボトロン -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-5">Freelancer</h3>
            <h1 class="display-2">Kento Kamata</h1>
            <!-- <h3>PortFolioSite</h3> -->
            <!-- <p class="lead">これは親要素の全ての横方向の空白一杯に広がるように設定変更されたジャンボトロンです。</p> -->
        </div><!-- /.container -->
    </div><!-- /.jumbotron -->

    <!-- マーケティングメッセージングとフィーチャー
    ================================================== -->
    <!-- 残りのページを別のコンテナで囲んで、すべてのコンテンツを中央に配置 -->
    <div class="container marketing">
        <!-- カルーセルの下にある3列のテキスト -->
        <div class="row">
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle relative" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid slice">
                    <title>Profile-img</title>
                    <rect fill="#777" width="100%" height="100%" />
                </svg>
                <h2 class="absolute">
                    <a href="#title_profile" class="text-light">Profile</a>
                </h2>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid slice">
                    <title>works-img</title>
                    <rect fill="#777" width="100%" height="100%" />
                </svg>
                <h2 class="absolute">
                    <a href="#title_works" class="text-light">Works</a>
                </h2>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid slice">
                    <title>contact-img</title>
                    <rect fill="#777" width="100%" height="100%" />
                </svg>
                <h2 class="absolute">
                    <a href="#title_contact" class="text-light">Contact</a>
                </h2>
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->
        <!-- フィーチャーを開始 -->
        <hr class="featurette-divider">
        <h1 id="title_profile">Profile</h1>
        <div class="row featurette">
            <div class="col-md">
                <h2 class="featurette-heading">Kento Kamata とは？</h2>
                <p class="lead">職業：フリーランスエンジニア
                    <br>生年月日：1993年5月10日
                    <br>年齢：25歳
                    <br>出身：青森県
                </p>
                <p>社会人になり最初に入社したのは青森県の工業高校を卒業後上京し、足立区の工場でした。
                    <br>教えてもらうより自分で見て、考えて仕事のやり方を勉強している時期でした。
                    <br>その後パソコンを使用した仕事をしたいと考え事務職に就き、2年ほど経験をしたのち
                    <br>未経験の分野でしたが、友人の紹介でエンジニアに転向しました。
                    <br>プログラミングにはもともと興味はありましたが、実務経験がなく転職も難しいだろうと思い
                    <br>踏み出すことができなかったのですが、現在の仕事を続けていった先にキャリアアップしていくことは
                    <br>可能だろうか？と考えたときに、もっと技術を磨いていくこと、今後プログラミングの需要が高まってくると
                    <br>話を聞き、思い切って転職してみようと思ったのが、エンジニアになったきっかけでした。
                    <br>まだまだ転向して1年もたっていませんが、友人に指導してもらいながらこのポートフォリオサイトも
                    <br>無事作成することができ、エンジニアになってから初めての成果物を作ることができました。
                    <br>このサイトを作っているときにプログラミングの面白さを強く実感しています。
                    <br>今後はWEBエンジニアの経験をより積んで、
                    <li>一緒に仕事をする人</li>
                    <li>仕事を紹介してくれた人</li>
                    <li>自分自身</li>
                    <br>がWin-Win-Winの関係になれるよう人間関係もスキルも磨いて精進していきます。
                </p>
            </div>
        </div>

        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md order-md-2">
                <h2 class="featurette-heading" id="title_works">works</h2>
                <p class="lead">to be continued</p>
            </div>
        </div>

        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading" id="title_contact">contact</h2>
                <p class="lead">TEL：090-2027-9611</p>
                <p class="lead">MAIL：pakucchi0510@gmail.com</p>
            </div>
        </div>
        <div>#####################################</div>
        <div id="test"></div><!-- /.container -->
        <div>#####################################</div>
        <hr class="featurette-divider">
        <!-- /フィーチャーを終了 -->

    </div><!-- /.container -->
@endsection

@section('myJs')
<script src="js/my.js"></script>
@endsection