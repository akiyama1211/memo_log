<form action="create.php" method="POST">
  <h4 class="mt-4">新規メモの登録</h4>
  <?php if(count($errors) > 0):?>
    <ul class="pl-4">
      <?php foreach($errors as $error):?>
        <li class="text-danger"><?php echo $error ?></li>
      <?php endforeach?>
    </ul>
  <?php endif?>
  <div class="form-group">
    <label for="title" class="form-">タイトル</label>
    <input class="form-control" type="text" name="title" id="title" value="<?php echo $memo['title'] ?>">
  </div>
  <div class="form-group">
    <p class="mb-1">状態</p>
    <div>
      <div class="form-check form-check-inline">
        <input type="radio" id="status1" name="status" value="完了" class="form-check-input" <?php echo $memo['status'] === '完了'?'checked':''?>>
        <label class="form-check-label" for="status1">完了</label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" id="status2" name="status" value="未完了" class="form-check-input" <?php echo $memo['status'] === '未完了'?'checked':''?>>
        <label for="status2" class="form-check-label">未完了</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="priority">重要度</label>
    <input type="number" id="priority" name="priority" class="form-control" value="<?php echo $memo['priority'] ?>">
  </div>
  <div class="form-group">
    <label for="content">内容</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo $memo['content'] ?></textarea>
  </div>
  <input type="submit" value="登録する" class="btn btn-primary mt-4">
</form>
