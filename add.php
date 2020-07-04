<!-- header読み込み -->
<?php require('templates/header.php'); ?>

<?php if(name === '') {
    
}
?>

<div id="content" class="container">
<h1 class="text-center mt-3 font-weight-bold">会員登録</h1>
    <div id="add_wrapper" class="row">
        <form action="" method="post" class="col-md-8 ml-auto mr-auto">
        <div class="form-group ">
            <label for="inputName" class="font-weight-bold">ニックネーム</label>
            <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="お好きなニックネームを入力してください" name="name" value="">
        </div>
        <div class="form-group ">
            <label for="inputEmail" class="font-weight-bold">メールアドレス</label>
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="メールアドレスを入力してください">
        </div>
        <div class="form-group">
            <label for="inputPassword" class="font-weight-bold">パスワード</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="パスワードを8文字以上で入力してください">
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">入力内容を確認する</button>
        </form>
    </div>
</div>


<?php require('templates/footer.php'); ?>