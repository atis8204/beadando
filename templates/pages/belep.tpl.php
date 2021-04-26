<?php if(isset($row)) { ?>
    <?php if(!$row) { ?>
        <h4>A bejelentkezés nem sikerült!</h4>
        <a href="?oldal=belepes" ><strong>PRÓBÁLJA ÚJRA!</strong></a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
