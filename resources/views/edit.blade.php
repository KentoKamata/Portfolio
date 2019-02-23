@extends('common.layout')
@section('main')
<!-- ジャンボトロン -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <table class="table">        
            <caption>Taskリスト</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CONTENTS</th>
                        <th>LIMITDATE</th>
                        <th>PRIORITY</th>
                        <th>CATEGORY</th>
                        <th>ASSIGNEE</th>
                        <th>STATUS</th>
                        <th>DELETE</th>
                        <th>EDIT</th>
                    </tr>
                </thead>
        </table>
        <form action="/task/update" method="GET" accept-charset="utf-8">
            {!! csrf_field() !!}
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="ID" name='id' value='{{ $task->id }}'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="タスクを入力" name='title' value='{{ $task->title }}'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="コンテンツを入力" name='content' value='{{ $task->contents }}'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="期限を入力" name='limitDate' value='{{ $task->limitDate }}'>
                   </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="優先度を入力" name='priority' value='{{ $task->priority }}'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="カテゴリーを入力" name='category' value='{{ $task->category }}'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="任命者を入力" name='assignee' value='{{ $task->assignee }}'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="ステータスを入力" name='status' value='{{ $task->status }}'>
            </div>
            <div class="input-group-append">
                <button type="submit" id="button-addon2" class="btn btn-outline-secondary">タスク変更</button>
            </div>
        </form>
    </div>
</div>
@endsection