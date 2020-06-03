<?php
$data = ['head_title' => $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>
<div class="content is-medium">
    <h3 class="title is-3">Tasks</h3>
    <div class="box">
        <form method="post" action="en/demo/tasks" enctype="application/x-www-form-urlencoded">
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
                <span class="list-item">
                    <?php if ($task['status'] == 1): ?>
                        <del>
                        <?= $this->e($task['name']) ?> -
                        <?= $this->e($task['text']) ?>
                        </del>
                    <?php endif ?>
                    <?php if ($task['status'] != 1): ?>
                        <strong>
                        <?= $this->e($task['name']) ?> -
                        <?= $this->e($task['text']) ?>
                        </strong>
                    <?php endif ?>
                <a href="en/demo/task/<?= $task['id'] ?>/delete"">Delete</a> |
                    <a href="en/demo/task/<?= $task['id'] ?>/done"">Done</a>
            </span>
            <?php endforeach ?>
        </div>
    </div>


</div>

