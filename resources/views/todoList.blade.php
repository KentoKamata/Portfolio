@extends('common.layout')
@section('phpTodo')
<?php

try {
    $pdo = createPDOInstance();
    // userテーブル取得
    $resultUserTB = getAllList($pdo, 'user');
    // todoテーブル取得
    $resultTodoTB = getAllList($pdo, 'todo');
} catch (PDOExeption $e) {
    echo $e->getMessage();
    exit;
}

function getAllList($pdo, $tableName)
{
    $prepareTable = $pdo->prepare('SELECT * FROM ' . $tableName);
    $prepareTable->execute();
    return $prepareTable->fetchAll();
}

function createPDOInstance()
{
    return new PDO(
        "mysql:dbname=kkamata_db;host=183.181.79.207;charset=utf8",
        "kkamata_user",
        "forute00",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
}
function addRecord($pdo, $table, $postData)
{
    echo 'postData';
    echo $postData;
    $insertSql = "INSERT INTO " . $table . "(name,sex,age,job,hoby) VALUES('" . $postData['userRecodeName'] . "','" . $postData['userRecodeSex'] . "','" . $postData['userRecodeAge'] . "','" . $postData['userRecodeJob'] . "','" . $postData['userRecodeHoby'] . "')";
    $insertSql = $pdo->prepare($insertSql);
    $insertSql->execute();
}

function deleteRecordById($pdo, $table, $id)
{
    $deleteSql = "DELETE FROM " . $table . " WHERE id = " . $id;
    $deleteSql = $pdo->prepare($deleteSql);
    $deleteSql->execute();
}

function updateRecordById($pdo, $table, $id)
{
    $updateSql = "UPDATE " . $table . " SET name='テスト',sex=1,age=22,job='芸能人',hoby='スノボー' WHERE id = " . $id;
    $updateSql = $pdo->prepare($updateSql);
    $updateSql->execute();
}

function hello()
{
    echo "hallo!!";
}

header('Content-Type: text/html; charset=utf-8');

?>
@endsection

@section('main')
        <!-- ジャンボトロン -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
            </div><!-- /.container -->
        </div><!-- /.jumbotron -->
        <div class='container'>
        <table class="table">
        <h1>UserTable</h1>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>性別</th>
                        <th>年齢</th>
                        <th>仕事</th>
                        <th>趣味</th>
                        <th>削除</th>
                        <th>変更</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
function hello2()
{
    echo "Hello";
}
foreach ($resultUserTB as $key => $record) {

    echo '<form action="" method="post">
                                    <tr>
                                    　<td>' . $record['id'] . '</td>
                                    　<td>' . $record['name'] . '</td>
                                    　<td>' . $record['sex'] . '</td>
                                    　<td>' . $record['age'] . '</td>
                                    　<td>' . $record['job'] . '</td>
                                    　<td>' . $record['hoby'] . '</td>


                                    <td><button type="submit" id="button-addon2" class="btn btn-outline-secondary" name="delete' . $record['id'] . '">削除</button></td>
                                    <td><button type="submit" id="button-addon2" class="btn btn-outline-secondary" name="update' . $record['id'] . '">変更</button></td>
                                    <td><button type="button" id="button-addon2" class="btn btn-outline-secondary" onclick="document.write(\'<?php hello2() ?>\');">謎ボタン</button></td>
                                  </form>
                                　</tr>';
    if (isset($_POST['delete' . $record['id']])) {
        // echo "<td>$record['id'].削除ボタンが押下されました</td>";
        deleteRecordById($pdo, 'user', $record['id']);
    } else if (isset($_POST['update' . $record['id']])) {
        // echo "<td>$record['id'] 変更ボタンが押下されました</td>";
        updateRecordById($pdo, 'user', $record['id']);
    }
}
?>
                </tbody>
        </table>

        <!-- レコード追加フォーム -->
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="名前を入力" name='userRecodeName'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="性別を入力" name='userRecodeSex'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="年齢を入力" name='userRecodeAge'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="仕事を入力" name='userRecodeJob'>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="趣味を入力" name='userRecodeHoby'>
            </div>
            <div class="input-group-append">
                <button type="submit" id="button-addon2" class="btn btn-outline-secondary" name="addNewUser">ユーザー追加
                <?php

if (isset($_POST['addNewUser'])) {
    addRecord($pdo, 'user', $_POST);
}

?>
                </button>
            </div>
        </form>

        <table class="table">
            <caption>ToDoリスト</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>LIMIT DATE</th>
                        <th>PRIORITY</th>
                        <th>CATEGORY</th>
                        <th>ASSIGN</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php
foreach ($resultTodoTB as $key => $record) {
    echo '<tr><td>' . $record['id'] . '</td><td>' . $record['name'] . '</td><td>' . $record['limit date'] . '</td><td>' . $record['priority'] . '</td><td>' . $record['category'] . '</td><td>' . $record['assign'] . '</td></tr>';
}
?>
                </tbody>
        </table>
        </div>
@endsection