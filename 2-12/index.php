<form action="result.php" method="post">
  お名前：<input type="text" name="name">
  <br>
  ご希望商品：<input type="radio" name="award" value="A賞">A賞
              <input type="radio" name="award" value="B賞">B賞
              <input type="radio" name="award" value="C賞">C賞
  <br>
  個数：<select name="count" >
          <?php for($i=1; $i<=10; $i++){ ?>
            <option value="<?php echo $i?>"><?php echo $i ?></option>
          <?php } ?>
          ?>
        </select>
  <br>
  <input type="submit" value="申込">
</form>