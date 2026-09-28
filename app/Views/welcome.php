<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks for Today</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; color: #333; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        nav a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome - Today's Tasks</h1>
        <nav>
            <a href="/">Today</a>
            <a href="/tasks">All Tasks</a>
            <a href="/profile">Profile</a>
            <a href="/about">About</a>
        </nav>
        <hr>
        <h2>Tasks Due Today</h2>
        <?php if (!empty($tasks)): ?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No tasks scheduled for today. Take a break!</p>
        <?php endif; ?>
    </div>
</body>
</html>