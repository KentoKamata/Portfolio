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
                    </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->contents }}</td>
                        <td>{{ $task->limitDate }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->category }}</td>
                        <td>{{ $task->assignee }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                @endforeach
                </tbody>
        </table>

        <form action="/addtask" method="POST" accept-charset="utf-8">
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
        </form>
    </div>
</div>
@endsection