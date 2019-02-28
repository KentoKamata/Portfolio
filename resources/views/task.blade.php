@extends('adminlte::page')
@section('title', 'Tasks')
@section('content')
<body style="padding-top:0">
<head>
    <meta charset="utf-8" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>TaskCalendar</title>
</head>
<section class="content-header">
    <h1>TaskPage</h1>
</section>
<!-- ジャンボトロン -->
<div class="jumbotron jumbotron-fluid"  style="background-color:#FFFFFF;background-image: url('{{ asset('img/digital.jpg') }}')">
    <div class="container">
        <!-- 切り替えボタンの設定 -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Task追加</button>
        <div class="row">
            <!-- モーダルの設定 -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModal">Task追加</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" action="/task/add" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="box-body">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name='title' placeholder="タイトルを入力">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <input type="text" class="form-control" name='content' placeholder="コンテンツを入力">
                                    </div>
                                    <div class="form-group">
                                        <label>limit</label>
                                        <input type="date" class="form-control" name='limitDate' placeholder="期限を入力">
                                    </div>
                                    <div class="form-group">
                                        <label>priority</label>
                                        <select class="form-control" name='priority'>
                                            <option value=0>Low</option>
                                            <option value=1>Middle</option>
                                            <option value=2>High</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>category</label>
                                        <input type="text" class="form-control" name='category' placeholder="カテゴリーを入力">
                                    </div>
                                    <div class="form-group">
                                        <label>assign</label>
                                        <input type="text" class="form-control" name='assignee' placeholder="担当者を入力">
                                    </div>
                                    <div class="form-group">
                                        <label>status</label>
                                        <select class="form-control" name='status'>
                                            <option value=0>Todo</option>
                                            <option value=1>Processing</option>
                                            <option value=2>Done</option>
                                        </select>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <button type="submit" id="button-addon2" class="btn btn-primary">タスク追加</button>
                            </div><!-- /.modal-footer -->
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.row -->
        <div class="row">
            <!-- todo -->
            <div class="col-lg-4">
                <div class="box-solid" style="background-color:#E6E6E6;">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            TODO
                        </h4>
                        <div class="row">
                            @foreach($todos as $todo)
                            <div class="col-lg-6">
                                <div class="box box-danger collapsed-box">
                                    <div class="box-header with-border">
                                        <h5 style="overflow: hidden">{{ $todo->title }}</h5>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div><!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body" style="display: none;">
                                        @if ($todo->priority === '0')
                                            <span class="badge badge-pill badge-info">low</span>
                                        @elseif ($todo->priority === '1')
                                            <span class="badge badge-pill badge-warning">middle</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">high</span>
                                        @endif
                                        <h5>期限<br>{{ $todo->limitDate }}</h5>
                                        <h5>カテゴリ<br>{{ $todo->category }}</h5>
                                        <h5>担当者<br>{{ $todo->assignee }}</h5>
                                        <p class="mb-0">
                                        <form method="GET">
                                        {{ csrf_field() }}
                                            <button type="button" id="button-addon2" class="btn btn-primary btn-sm" onclick="submitAction('/task/delete','{{ $todo->id }}')">削除</button>
                                            <button type="button" id="button-addon2" class="btn btn-primary btn-sm" onclick="submitAction('/task/edit','{{ $todo->id }}')">編集</button>
                                            <input type="hidden" name = 'targetId' value = '{{ $todo->id }}'>
                                        </form>
                                        </p><!-- /.mb-0 -->
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col-lg-6 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box-solid -->
            </div><!-- /.col-lg-4 -->
            <!-- processing -->
            <div class="col-lg-4">
                <div class="box-solid" style="background-color:#E6E6E6;">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            PROCESSING
                        </h4>
                        <div class="row">
                            @foreach($processes as $process)
                            <div class="col-lg-6">
                                <div class="box box-warning collapsed-box">
                                    <div class="box-header with-border">
                                        <h5 style="overflow: hidden">{{ $process->title }}</h5>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body" style="display: none;">
                                        @if ($process->priority === '0')
                                            <span class="badge badge-pill badge-info">low</span>
                                        @elseif ($process->priority === '1')
                                            <span class="badge badge-pill badge-warning">middle</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">high</span>
                                        @endif
                                        <h5>期限<br>{{ $process->limitDate }}</h5>
                                        <h5>カテゴリ<br>{{ $process->category }}</h5>
                                        <h5>担当者<br>{{ $process->assignee }}</h5>
                                        <p class="mb-0">
                                        <form method="GET">
                                            {{ csrf_field() }}
                                            <button type="button" id="button-addon2" class="btn btn-primary btn-sm" onclick="submitAction('/task/delete','{{ $process->id }}')">削除</button>
                                            <button type="button" id="button-addon2" class="btn btn-primary btn-sm" onclick="submitAction('/task/edit','{{ $process->id }}')">編集</button>
                                            <input type="hidden" name = 'targetId' value = '{{ $process->id }}'>
                                        </form>
                                        </p><!-- /.mb-0 -->
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col-lg-6 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box-solid -->
            </div><!-- /.col-lg-4 -->
            <!-- done -->
            <div class="col-lg-4">
                <div class="box-solid" style="background-color:#E6E6E6;">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            DONES
                        </h4>
                        <div class="row">
                            @foreach($dones as $done)
                            <div class="col-lg-6">
                                <div class="box box-success collapsed-box">
                                    <div class="box-header with-border">
                                        <h5 style="overflow: hidden">{{ $done->title }}</h5>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body" style="display: none;">
                                        @if ($done->priority === '0')
                                            <span class="badge badge-pill badge-info">low</span>
                                        @elseif ($done->priority === '1')
                                            <span class="badge badge-pill badge-warning">middle</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">high</span>
                                        @endif
                                        <h5>期限<br>{{ $done->limitDate }}</h5>
                                        <h5>カテゴリ<br>{{ $done->category }}</h5>
                                        <h5>担当者<br>{{ $done->assignee }}</h5>
                                        <p class="mb-0">
                                        <form method="GET">
                                            {{ csrf_field() }}
                                            <button type="button" id="button-addon2" class="btn btn-primary btn-sm" onclick="submitAction('/task/delete','{{ $done->id }}')">削除</button>
                                            <button type="button" id="button-addon2" class="btn btn-primary btn-sm" onclick="submitAction('/task/edit','{{ $done->id }}')">編集</button>
                                        </form>
                                        </p><!-- /.mb-0 -->
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col-lg-6 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box-solid -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.ジャンボトロン -->
</body>
<script>
function submitAction(url,id) {
    $('form').attr('action', url);
    $('form').append($('<input>',{type:'hidden',name:'targetId',value:id}));
    $('form').attr('value',id).submit();
}
</script>
@stop