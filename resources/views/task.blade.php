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
    </div>
</div>
@endsection