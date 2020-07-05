<?php 
session_start();
require('templates/header.php');

if (!isset($_SESSION['join'])) { //直接confilmがリクエストされたら->前の画面からセッションで情報が入ってなければ
    header('Location: top.php'); //トップ画面に戻す
}
?>


<div id="content" class="container">
<h1 class="text-center mt-3 font-weight-bold">登録確認画面</h1>
    <div id="add_wrapper" class="row">
        <form action="" method="post" class="col-md-8 ml-auto mr-auto">
        <input type="hidden" name="action" value="submit" />

        <div class="form-group ">
            <label for="inputName" class="font-weight-bold">ニックネーム</label>
            <p><?php echo(htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES)); ?></p>
        </div>
        <div class="form-group ">
            <label for="inputEmail" class="font-weight-bold">メールアドレス</label>
            <p><?php echo(htmlspecialchars($_SESSION['join']['email'])); ?></p>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="font-weight-bold">パスワード</label>(パスワードは表示されません)
            <p>********</p>
        </div>

        <button type="submit" class="btn btn-success mt-3"><a href="add.php?action=historyBack" class="historyBack">一つ前の画面に戻る</a></button>
        <button type="submit" class="btn btn-primary mt-3">こちらの内容で確認する</button>
        </form>
    </div>
</div>

<?php require('templates/footer.php'); ?>


