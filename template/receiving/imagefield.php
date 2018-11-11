<?php
$i = $_POST['count'];
    ?>
<br/>
<div class="row">
    <input  type="file"  name="payment-<?php echo $i-1; ?>[]"/>
    <input type="text"  class="form-control" name="" placeholder="Caption"/>
</div>