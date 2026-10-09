<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Task</title>
</head>
<body>
    <h1>Create New Task</h1>
    
    <?php if (session()->has('errors')): ?>
        <ul style="color: red;">
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <form action="<?= site_url('tasks/store') ?>" method="post">
        <?= csrf_field() ?>
        <label>Title:</label><br>
        <input type="text" name="title" value="<?= old('title') ?>"><br><br>

        <label>Task Date:</label><br>
        <input type="date" name="task_date" value="<?= old('task_date') ?>"><br><br>

        <button type="submit">Save Task</button>
    </form>
    <br>
    <a href="<?= site_url('tasks') ?>">Back to Tasks</a>
</body>
</html>