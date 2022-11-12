<div class="my-4 d-flex">
  <h3><a href="new.php" class="btn btn-primary mr-4">新規メモを作成する</a></h3>
  <h3><a href="new.php" class="btn btn-success mr-4">メモを編集する</a></h3>
  <h3><a href="new.php" class="btn btn-danger mr-4">メモを削除する</a></h3>
</div>
<h4>メモ一覧</h4>
<main>
  <?php if(!count($memos)):?>
    <p>登録データはありません</p>
  <?php else:?>
    <?php foreach($memos as $memo):?>
      <section class="card shadow-sm mb-4">
        <div class="card-body">
          <h4 class="card-title"><?php echo escape($memo['title']) ?></h4>
          <p><?php echo escape($memo['status']) ?></p>
          <p><?php echo escape($memo['priority']) ?></p>
          <p><?php echo nl2br(escape($memo['contents'])) ?></p>
        </div>
      </section>
    <?php endforeach?>
  <?php endif?>
</main>
