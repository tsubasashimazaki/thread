<?php require('templates/header.php'); ?>

<div id="content" class="container">
<h1 class="text-center mt-3">会員登録</h1>
    <div id="add_wrapper" class="row">
        <form class="col-md-8 ml-auto mr-auto">
        <div class="form-group ">
            <label for="inputName">ニックネーム</label>
            <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="ニックネームを入力してください">
        </div>
        <div class="form-group ">
            <label for="inputEmail">メールアドレス</label>
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="メールアドレスを入力してください">
        </div>
        <div class="form-group">
            <label for="inputPassword">パスワード</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="パスワードを入力してください">
        </div>
        
        <button type="submit" class="btn btn-primary">入力内容を確認する</button>
        </form>
    </div>
</div>


<?php require('templates/footer.php'); ?>