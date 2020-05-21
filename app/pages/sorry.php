<?php
$data = [];
$this->layout('templates/master', $data);
?>
<div>
    <h1>Sorry...</h1>
    <p>404</p>
    <?php
    print_r(error_get_last());
    ?>
</div>
