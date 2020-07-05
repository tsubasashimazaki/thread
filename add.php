<?php 
if (!empty($_POST)) { //$_POSTがemptyでなければvalidationを返す、ボタンが押されたかの判別は$_POSTに値が入っているかで判断
    // input validation
    if ($_POST['name'] === '') { 
        $error['name'] = 'blank'; 
    } 
    if ($_POST['email'] === '') {
        $error['email'] = 'blank';
    }
    if ($_POST['password'] === '') {
        $error['password'] = 'blank';
    }
    if (strlen($_POST['password']) <= 8) {
        $error['password'] = 'length';
    }
    if (empty($error)){
        header('Location: confilm.php');//上記errorがなければ確認画面(confilm.php)
        exit(); // add.phpから脱出
    }
}

?>

<!-- header読み込み -->
<?php require('templates/header.php'); ?>

<div id="content" class="container">
<h1 class="text-center mt-3 font-weight-bold">会員登録</h1>
    <div id="add_wrapper" class="row">
        <form action="" method="post" class="col-md-8 ml-auto mr-auto">
        <div class="form-group ">
            <label for="inputName" class="font-weight-bold">ニックネーム</label>
            <input type="text" class="form-control" id="inputName" 
            placeholder="お好きなニックネームを入力してください" name="name" value="<?php echo(htmlspecialchars($_POST['name'], ENT_QUOTES));?>">
            <?php if($error['name'] === 'blank'): ?>
                <p class="error">ニックネームは必須です</p>
            <?php endif; ?>
        </div>
        <div class="form-group ">
            <label for="inputEmail" class="font-weight-bold">メールアドレス</label>
            <input type="email" class="form-control" id="inputEmail" 
            placeholder="メールアドレスを入力してください" name="email" value="<?php echo(htmlspecialchars($_POST['email'], ENT_QUOTES)); ?>">
            <?php if ($error['email'] === 'blank'): ?>
                <p class="error">メールアドレスは必須です</p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="font-weight-bold">パスワード</label>
            <input type="password" class="form-control" id="inputPassword" 
            placeholder="パスワードを8文字以上で入力してください" name="password" value="<?php echo(htmlspecialchars($_POST['password'], ENT_QUOTES)); ?>">
            <?php if ($error['password'] === 'blank'): ?>
                <p class="error">パスワードは必須です</p>
            <?php endif; ?>
            <?php if ($error['password'] === 'length'): ?>
                <p class="error">パスワードは8文字以上で入力してください</p>
            <?php endif; ?>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">入力内容を確認する</button>
        </form>
    </div>
</div>

<?php require('templates/footer.php'); ?>