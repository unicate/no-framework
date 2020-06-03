<?php
$data = ['head_title' => $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>
<div class="content is-medium">
    <h3 class="title is-3">Tasks</h3>
    <div class="box">
        <form method="post" enctype="application/x-www-form-urlencoded">
            <div class="field">
                <p class="control">
                    <input class="input" name="name" type="text" placeholder="Task" required>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <input class="input" name="text" type="text" placeholder="Description" required>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-success" type="submit">
                        Add
                    </button>
                </p>
            </div>
        </form>
    </div>

    <p></p>
    <div class="box">
        <div class="list is-hoverable">
            <?php foreach ($tasks as $task): ?>
                <a class="list-item">
                    <?= $this->e($task['name']) ?> -
                    <?= $this->e($task['text']) ?>
                </a>
            <?php endforeach ?>
        </div>
    </div>


</div>

