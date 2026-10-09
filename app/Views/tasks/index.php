<?php
/**
 * @var array $tasks
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
</head>
<body>
    <nav>
        <a href="<?= site_url('/') ?>">Welcome</a> |
        <a href="<?= site_url('tasks') ?>">Task List</a> |
        <a href="<?= site_url('profile') ?>">Profile</a> |
        <a href="<?= site_url('about') ?>">About</a>
    </nav>
    <hr>
    <h1>Task List</h1>
    <a href="<?= site_url('tasks/new') ?>">Create New Task</a><br><br>
    
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Task Title</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc($task['task_date']) ?></td>
                        <td>
                            <a href="<?= site_url('tasks/edit/' . $task['id']) ?>">Edit</a> | 
                            <a href="<?= site_url('tasks/delete/' . $task['id']) ?>" onclick="return confirm('Archive this task?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No tasks found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>