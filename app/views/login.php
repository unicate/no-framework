<?php
$data = [];
$this->layout('templates/master', $data);
?>
<div>
    <h1><?= $this->e($title) ?></h1>
    <p><?= $this->e($text) ?></p>
</div>
