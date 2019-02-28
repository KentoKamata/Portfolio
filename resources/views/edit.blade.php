@extends('adminlte::page')
@section('title', 'editpage')
@section('content')
<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">EDIT TASK</h3>
    </div>
    <form role="form" action="/task/update" method="GET" accept-charset="utf-8">
        <div class="box-body">
            <label>ID：{{ $task->id }}</label>
            <input type="hidden" name='id' value='{{ $task->id }}'>
            <div class="form-group">
                <label>Title</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name='title' value='{{ $task->title }}' placeholder="タイトル入力">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label>Content</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name='content' value='{{ $task->contents }}' placeholder="コンテンツ入力">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label>Limit</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name='limitDate' value='{{ $task->limitDate }}' placeholder="期限を入力">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label>priority</label>
                <select class="form-control" name='priority'>
                    <option value=0>Low</option>
                    <option value=1>Middle</option>
                    <option value=2>High</option>
                </select>
            </div><!-- /.form group -->
            <div class="form-group">
                <label>Category</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name='category' value='{{ $task->category }}' placeholder="カテゴリーを入力">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label>Asign</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name='assignee' value='{{ $task->assignee }}' placeholder="アサインを入力">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label>status</label>
                <select class="form-control" name='status'>
                    <option value=0>Todo</option>
                    <option value=1>Processing</option>
                    <option value=2>Done</option>
                </select>
            </div><!-- /.form group --> 
        </div><!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">変更</button>
        </div>
    </form>
</div><!-- /.box -->
@stop