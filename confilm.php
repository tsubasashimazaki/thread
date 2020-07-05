<?php 
session_start();
require('templates/database.php');

if (!isset($_SESSION['add'])) { //直接confilmがリクエストされたら->前の画面からセッションで情報が入ってなければ
    header('Location: top.php'); //トップ画面に戻す
}
if (!empty($_POST)) { //送信ボタンを押したかの判断

    $statement = $db->prepare('INSERT INTO members SET name=?, email=?, password=?, picture=?, created=NOW()');
    $statement->execute(array(
        $_SESSION['add']['name'],
        $_SESSION['add']['email'],
        sha1($_SESSION['add']['password']),
        $_SESSION['add']['image']
    ));
    unset($_SESSION['add']);//unset() は指定した変数を破棄,データベースの登録が終わったら重複を防ぐ為にunset()

    header('Location: complete.php');
    exit();
}


?>

<?php require('templates/header.php'); ?>
<div id="content" class="container">
<h1 class="text-center mt-3 font-weight-bold">登録確認画面</h1>
    <div id="add_wrapper" class="row">
        <form action="" method="post" class="col-md-8 ml-auto mr-auto">
        <input type="hidden" name="action" value="submit" />

        <div class="form-group ">
            <label for="inputName" class="font-weight-bold">ニックネーム</label>
            <p><?php echo(htmlspecialchars($_SESSION['add']['name'], ENT_QUOTES)); ?></p>
        </div>
        <div class="form-group ">
            <label for="inputEmail" class="font-weight-bold">メールアドレス</label>
            <p><?php echo(htmlspecialchars($_SESSION['add']['email'])); ?></p>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="font-weight-bold">パスワード</label>(パスワードは表示されません)
            <p>********</p>
        </div>
        <div class="form-group">
                <label for="formControlFile" class="font-weight-bold">プロフィール画像</label>
            <img src="./user_profile/<?php echo(htmlspecialchars($_SESSION['add']['image'], ENT_QUOTES)); ?>" alt="">                
            </div>

        <button type="submit" class="btn btn-success mt-3"><a href="add.php?action=historyBack" class="historyBack">一つ前の画面に戻る</a></button>
        <button type="submit" class="btn btn-primary mt-3">こちらの内容で登録する</button>
        </form>
    </div>
</div>

<?php require('templates/footer.php'); ?>


