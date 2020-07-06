<?php 
require('templates/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form>
              <div class="form-group">
                <label for="inputMessage">メッセージを入力</label>
                <textarea class="form-control" id="inputMessage" rows="3"></textarea>
                <div class="postButton"><button type="submit" class="btn btn-primary mt-3">投稿する</button></div>
              </div>
            </form>
        </div>
    </div>
    <div class="threadContent row">
        <div class="col-md-12 ">
            <div class="threadArea">
                <div class="threadMessages">
                    <img src="./img/cat.png"  alt="">
                    <p class="memberName"> : くるみ </p>
                    <p class="messageTime">2020/07/05/20:45</p>
                </div>  
                <p class="userMessage col-md-11">こんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわすこんにちわす</p>
            </div><!-- /threadArea[roop] -->
        </div>
    </div>
</div>

<?php require('templates/footer.php'); ?>