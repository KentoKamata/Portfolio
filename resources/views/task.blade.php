@extends('adminlte::page')
@section('content')
<!-- ジャンボトロン -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <!-- 切り替えボタンの設定 -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Task追加
        </button>
        <div class="row">
            <!-- モーダルの設定 -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Task追加</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <form role="form" action="/task/add" method="POST" accept-charset="utf-8">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name='title' placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <input type="text" class="form-control" name='content' placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>limit</label>
                                        <input type="text" class="form-control" name='limitDate' placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>priority</label>
                                        <select class="form-control" name='priority'>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>category</label>
                                        <input type="text" class="form-control" name='category' placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>assign</label>
                                        <input type="text" class="form-control" name='assignee' placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>status</label>
                                        <select class="form-control" name='status'>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-body -->
                        <div class="modal-footer">
                            <form action="/task/add" method="POST" accept-charset="utf-8">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="submit" id="button-addon2" class="btn btn-primary">タスク追加</button>
                            </form>
                        </div><!-- /.modal-footer -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <div class="row">
            <!-- todo -->
            <div class="col-lg-4">
                <div class="box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            TODO
                        </h4>
                        <div class="row">
                            @foreach($todos as $todo)
                            <div class="col-lg-6">
                                <div class="box box-danger collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">{{ $todo->id }}：{{ $todo->title }}</h3>
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
                                        <p>期限:{{ $todo->limitDate }}</p>
                                        <p>カテゴリ:{{ $todo->category }}</p>
                                        <p>アサイン:{{ $todo->assignee }}</p>
                                        <p class="mb-0">
                                            <form action="/task/delete" method="GET" name="deleteForm" accept-charset="utf-8">
                                                <button type="submit" id="button-addon2" class="btn btn-primary btn-sm">削除</button>
                                                <input type="hidden" name = 'deleteId' value = '{{ $todo->id }}'>
                                            </form>
                                            <form action="/task/edit" method="GET" name="editForm" accept-charset="utf-8">
                                                <button type="submit" id="button-addon2" class="btn btn-primary btn-sm">編集</button>
                                                <input type="hidden" name = 'editId' value = '{{ $todo->id }}'>
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
                <div class="box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            PROCESSING
                        </h4>
                        <div class="row">
                            @foreach($processes as $process)
                            <div class="col-lg-6">
                                <div class="box box-warning collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">{{ $process->id }}：{{ $process->title }}</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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
                                        <p>期限:{{ $process->limitDate }}</p>
                                        <p>カテゴリ:{{ $process->category }}</p>
                                        <p>アサイン:{{ $process->assignee }}</p>
                                        <p class="mb-0">
                                            <form action="/task/delete" method="GET" name="deleteForm" accept-charset="utf-8">
                                                <button type="submit" id="button-addon2" class="btn btn-primary btn-sm">削除</button>
                                                <input type="hidden" name = 'deleteId' value = '{{ $process->id }}'>
                                            </form>
                                            <form action="/task/edit" method="GET" name="editForm" accept-charset="utf-8">
                                                <button type="submit" id="button-addon2" class="btn btn-primary btn-sm">編集</button>
                                                <input type="hidden" name = 'editId' value = '{{ $process->id }}'>
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
                <div class="box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            DONES
                        </h4>
                        <div class="row">
                            @foreach($dones as $done)
                            <div class="col-lg-6">
                                <div class="box box-primary collapsed-box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">{{ $done->id }}：{{ $done->title }}</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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
                                        <p>期限:{{ $done->limitDate }}</p>
                                        <p>カテゴリ:{{ $done->category }}</p>
                                        <p>アサイン:{{ $done->assignee }}</p>
                                        <p class="mb-0">
                                            <form action="/task/delete" method="GET" name="deleteForm" accept-charset="utf-8">
                                                <button type="submit" id="button-addon2" class="btn btn-primary btn-sm">削除</button>
                                                <input type="hidden" name = 'deleteId' value = '{{ $done->id }}'>
                                            </form>
                                            <form action="/task/edit" method="GET" name="editForm" accept-charset="utf-8">
                                                <button type="submit" id="button-addon2" class="btn btn-primary btn-sm">編集</button>
                                                <input type="hidden" name = 'editId' value = '{{ $done->id }}'>
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
    </div><!-- /.container -->
</div><!-- /.ジャンボトロン -->
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop