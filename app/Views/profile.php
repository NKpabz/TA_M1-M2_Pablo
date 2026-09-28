<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; color: #333; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        nav a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold; }
        .profile-card { margin-top: 20px; background: #f9f9f9; padding: 20px; border-radius: 6px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <nav>
            <a href="/">Today</a>
            <a href="/tasks">All Tasks</a>
            <a href="/profile">Profile</a>
            <a href="/about">About</a>
        </nav>
        <hr>
        <div class="profile-card">
            <?php if (!empty($user)): ?>
                <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
                <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
                <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
                <p><strong>Member Since:</strong> <?= esc($user['created_at']) ?></p>
            <?php else: ?>
                <p>No user record found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>