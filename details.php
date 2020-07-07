<?php
session_start();
require('templates/database.php'); 


$posts = $db->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id AND p.id=?');
$posts->execute(array($_REQUEST['id']));
?>
<pre>
<?php var_dump($posts); ?>
<pre>
<?php require('templates/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="card mx-auto">
            <div class="card-body">
                <?php if( $post = $posts->fetch()): ?>
                <div class="threadArea">
                    <div class="threadMessages">
                        <img src="./user_profile/<?php echo(htmlspecialchars($post['picture'], ENT_QUOTES)); ?>"  alt="">
                        <p class="memberName"> : <?php echo(htmlspecialchars($post['name'], ENT_QUOTES)); ?> </p>
                        <p class="messageTime">投稿日時: 2020/07/05/20:45</p>
                    </div>  
                    <p class="userMessage col-md-12"><?php echo(htmlspecialchars($post['message'], ENT_QUOTES)); ?></p>
                </div><!-- /threadArea -->
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require('templates/footer.php'); ?>