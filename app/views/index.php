<?php
$data = [];
$this->layout('templates/master', $data);
?>
<div>
    <h1><?= $this->tlt('index.title') ?></h1>
    <p><?= $this->e($text) ?></p>
    <ul>
        <li><a href="login">Login</a> / <a href="logout">Logout</a></li>
        <li><a href="info">Info</a></li>
        <li><a href="param/some-param">Param</a></li>
        <li><a href="api">API (json)</a></li>
        <li><a href="api/info">API/Info (json)</a></li>
    </ul>
</div>
