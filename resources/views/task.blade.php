@extends('common.layout')
@section('main')
<!-- ジャンボトロン -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <!-- todo -->
            <div class="col-lg-4">
                <h2>TODO</h2>
                @foreach($todos as $todo)
                <div class="card bg-light">
                    <div class="card-header">{{ $todo->id }}：{{ $todo->title }}
                            <div class="float-right">
                                @if ($todo->priority === '0')
                                    <span class="badge badge-pill badge-info">low</span>
                                @elseif ($todo->priority === '1')
                                    <span class="badge badge-pill badge-warning">middle</span>
                                @else
                                    <span class="badge badge-pill badge-danger">high</span>
                                @endif
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body px-2 py-3">
                        <p class="card-text">
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
                        </p><!-- /.card-text -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
                @endforeach
            </div>
            <!-- processing -->
            <div class="col-lg-4">
                <h2>PROCESSING</h2>
                @foreach($processes as $process)
                <div class="card bg-light">
                    <div class="card-header">{{ $process->id }}：{{ $process->title }}
                        <div class="float-right">
                            @if ($process->priority === '0')
                                <span class="badge badge-pill badge-info">low</span>
                            @elseif ($process->priority === '1')
                                <span class="badge badge-pill badge-warning">middle</span>
                            @else
                                <span class="badge badge-pill badge-danger">high</span>
                            @endif
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body px-2 py-3">
                        <p class="card-text">
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
                        </p><!-- /.card-text -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
                @endforeach
            </div>
            <!-- done -->
            <div class="col-lg-4">
                <h2>DONE</h2>
                @foreach($dones as $done)
                <div class="card bg-light">
                    <div class="card-header">{{ $done->id }}：{{ $done->title }}
                        <div class="float-right">
                            @if ($done->priority === '0')
                                <span class="badge badge-pill badge-info">low</span>
                            @elseif ($done->priority === '1')
                                <span class="badge badge-pill badge-warning">middle</span>
                            @else
                                <span class="badge badge-pill badge-danger">high</span>
                            @endif
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body px-2 py-3">
                        <p class="card-text">
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
                        </p><!-- /.card-text -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
                @endforeach
            </div>
        </div><!-- /.row -->
        <form action="/task/add" method="POST" accept-charset="utf-8">
            {!! csrf_field() !!}
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="タスクを入力" name='title'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="コンテンツを入力" name='content'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="期限を入力" name='limitDate'>
                </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="優先度を入力" name='priority'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="カテゴリーを入力" name='category'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="任命者を入力" name='assignee'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="ステータスを入力" name='status'>
            </div>
            <div class="input-group-append">
                <button type="submit" id="button-addon2" class="btn btn-outline-secondary">タスク追加</button>
            </div>
        </form><!-- /task/add -->
    </div><!-- /.container -->
</div><!-- /.ジャンボトロン -->
@endsection