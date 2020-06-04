<?php
$data = ['head_title' => $this->tlt('login.head.title')];
$this->layout('templates/master', $data);
?>

<div class="content is-medium">
    <h3 class="title is-3">Tasks</h3>
    <div class="box">
        <div class="columns">
            <div class="column is-one-third">
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
            <div class="column">
                <div class="table-container">
                    <table class="table is-narrow is-striped is-bordered">
                        <!-- Your table content -->
                        <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td>
                                <?php if ($task['status'] == 1): ?><del><?php endif ?>
                                <?= $this->e($task['name']) ?> -
                                <?= $this->e($task['text']) ?>
                                <?php if ($task['status'] == 1): ?></del><?php endif ?>
                            </td>
                            <td>
                                <div class="is-pulled-right">
                                <form class="control is-inline" method="post"
                                      action="en/demo/task/<?= $task['id'] ?>/done"
                                      enctype="application/x-www-form-urlencoded">
                                    <button class="button is-success is-small" type="submit">Done</button>
                                </form>
                                <form class="control is-inline" method="post"
                                      action="en/demo/task/<?= $task['id'] ?>/delete"
                                      enctype="application/x-www-form-urlencoded">
                                    <button class="button is-success  is-danger is-small" type="submit">Delete</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>

            </div>
        </div>

    </div>


</div>

