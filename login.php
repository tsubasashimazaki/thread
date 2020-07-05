<?php 
session_start(); //画面を移動しても情報を記録しておく
require('templates/database.php');

if(!empty($_POST)) {
    if ($_POST['email'] !== '' && $_POST['password'] !== '') {
        $loginInfo = $db->prepare('SELECT * FROM members WHERE email=? AND password=?');
        $loginInfo->execute(array(
            $_POST['email'],
            sha1($_POST['password']),
        ));

        $memberInfo = $loginInfo->fetch();

        if ($memberInfo) {
            // $_SESSION['id'] = $memberInfo['id'];
            header('Location: index.php');
            exit();
        }
    }
}
?>

<!-- header読み込み -->
<?php require('templates/header.php'); ?>

<div id="content" class="container">
<h1 class="text-center mt-3 font-weight-bold">ログイン</h1>
    <div id="add_wrapper" class="row">
        <form action="" method="post" enctype="multipart/form-data" class="col-md-8 ml-auto mr-auto">
            <div class="form-group ">
                <label for="inputEmail" class="font-weight-bold">メールアドレス</label>
                <input type="email" class="form-control" id="inputEmail" 
                placeholder="メールアドレスを入力してください" name="email" value="<?php echo(htmlspecialchars($_POST['email'], ENT_QUOTES)); ?>">
                <?php if ($error['email'] === 'blank'): ?>
                    <p class="error">メールアドレスは必須です</p>
                <?php endif; ?>
                <?php if ($error['email'] === 'deplication'): ?>
                    <p class="error">このメールアドレスは既に使用されています</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="font-weight-bold">パスワード</label>
                <input type="password" class="form-control" id="inputPassword" 
                placeholder="パスワードを入力してください" name="password" value="<?php echo(htmlspecialchars($_POST['password'], ENT_QUOTES)); ?>">
                <?php if ($error['password'] === 'blank'): ?>
                    <p class="error">パスワードは必須です</p>
                <?php endif; ?>
                <?php if ($error['password'] === 'length'): ?>
                    <p class="error">パスワードは8文字以上で入力してください</p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary mt-3">ログインする</button>
        </form>
    </div>
</div>

<?php require('templates/footer.php'); ?>
