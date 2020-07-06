<?php 
require('templates/header.php');
require('templates/database.php');
session_start();

if (isset($_SESSION['id'])) { //セッションがセットされていれば
    
    $members = $db->prepare('SELECT * FROM members WHERE id=?');
    $members->execute(array($_SESSION['id']));
    $member = $members->fetch();
}else {
    header('Location:login.php');
    exit();
}
if (!empty($_POST)) {
    if ($_POST['message'] !== '') {
        $message = $db->prepare('INSERT INTO posts SET message=?, member_id=?, created=NOW()');
        $message->execute(array(
            $_POST['message'],
            $_SESSION['id'], //login.phpで取得したログインしてるメンバー
        ));

        header('Location: index.php');
        exit();
    }
}
// threadAreaのmessageループ
// テーブル名 ショートカットキーでエイリアス
$posts = $db->query('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC');

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
              <div class="form-group">
                <label for="inputMessage">メッセージを入力</label>
                <textarea class="form-control" id="inputMessage" rows="3" maxlength="255" name="message"></textarea>
                <div class="postButton"><button type="submit" class="btn btn-primary mt-3">投稿する</button></div>
              </div>
            </form>
        </div>
    </div>
    <div class="threadContent row">
        <div class="col-md-12 ">
            <?php foreach($posts as $post): ?>
            <div class="threadArea">
                <div class="threadMessages">
                    <img src="./img/cat.png"  alt="">
                    <p class="memberName"> : <?php echo(htmlspecialchars($post['name'], ENT_QUOTES)); ?> </p>
                    <p class="messageTime">投稿日時: 2020/07/05/20:45</p>
                    <ul>
                        <a href="#" class="update">編集</a>
                        |
                        <a href="#" class="delete">削除</a>
                    </ul>
                </div>  
                <p class="userMessage col-md-12"><?php echo(htmlspecialchars($post['message'], ENT_QUOTES)); ?></p>
            </div><!-- /threadArea -->
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require('templates/footer.php'); ?>