@extends('adminlte::page')
@section('content')
  <!-- 主なマーケティングメッセージまたは呼び出しのためのメインジャンボトロン -->
<body style="padding-top:0">
  <main role="main">
    <div class="jumbotron jumbotron-fluid"  style="background-color:#FFFFFF;background-image: url('{{ asset('img/orange.jpg') }}')">
      <div class="container">
            <h3 class="display-5">Freelancer</h3>
            <h1 class="display-2">Kento Kamata</h1>
        <p>これは、シンプルなマーケティングや情報提供のためのテンプレート。ジャンボトロンと呼ばれる大きな吹き出しと3つのコンテンツをサポートしている。よりユニークなものを作成するための出発点として使用する。</p>
      </div>
    </div>
    <div class="container">
      <!-- 列の例 -->
      <div class="row">
        <div class="col-md-4">
          <h2>Profeel</h2>
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
        </div><!-- /.col-md-4 -->
        <div class="col-md-4">
          <h2>Task</h2>
          <p>タスクの追加、削除、変更をすることができるページです。</p>
        </div><!-- /.col-md-4 -->
        <div class="col-md-4">
          <h2>Calendar</h2>
          <p>登録されたタスクをカレンダー表示しているページです。</p>
        </div><!-- /.col-md-4 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </main>
  <footer class="container"></footer>
</body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
@stop