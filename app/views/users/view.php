<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #1a1a1a; background: linear-gradient(135deg, #ffffff, #f8f8f8); }
        .bg-decor { position: fixed; inset: 0; z-index: -1; pointer-events: none; background:
            radial-gradient(600px 600px at 0% 0%, rgba(0,0,0,.08), transparent 60%),
            radial-gradient(600px 600px at 100% 0%, rgba(0,0,0,.06), transparent 60%),
            radial-gradient(600px 600px at 0% 100%, rgba(0,0,0,.04), transparent 60%),
            radial-gradient(600px 600px at 100% 100%, rgba(0,0,0,.06), transparent 60%);
            animation: floatBg 16s ease-in-out infinite alternate; }
        .container { max-width: 920px; margin: 40px auto; padding: 0 16px; }
        .card { background: #ffffff; border: 2px solid #e0e0e0; border-radius: 14px; box-shadow: 0 10px 30px rgba(0,0,0,.12), 0 4px 12px rgba(0,0,0,.08); overflow: hidden; transform: translateY(8px); opacity: 0; animation: cardIn .6s ease-out forwards; }
        .card-header { display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; border-bottom: 2px solid #e0e0e0; background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%); }
        .title { margin: 0; font-size: 22px; letter-spacing: .2px; color: #000000; font-weight: 700; }
        .actions { display: flex; gap: 8px; }
        .table-wrapper { overflow-x: auto; animation: fadeIn .6s ease .15s both; background: #ffffff; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border-bottom: 1px solid #e0e0e0; padding: 14px 16px; text-align: left; }
        th { background: linear-gradient(135deg, #f5f5f5 0%, #f0f0f0 100%); font-weight: 600; color: #333333; }
        tr { transition: background .2s ease; }
        tr:hover td { background: #f9f9f9; }
        .btn { display: inline-block; padding: 10px 14px; text-decoration: none; border-radius: 10px; border: 2px solid transparent; font-size: 14px; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,.15); transition: transform .08s ease, box-shadow .2s ease, background-color .2s ease; cursor: pointer; }
        .btn:active { transform: translateY(1px); box-shadow: 0 0 0 rgba(0,0,0,0); }
        .btn-primary { background: linear-gradient(135deg, #000000 0%, #333333 100%); color: white; border-color: #000000; }
        .btn-primary:hover { background: linear-gradient(135deg, #333333 0%, #555555 100%); border-color: #333333; }
        .btn-edit { background: linear-gradient(135deg, #333333 0%, #555555 100%); color: white; border-color: #333333; }
        .btn-edit:hover { background: linear-gradient(135deg, #555555 0%, #777777 100%); border-color: #555555; }
        .btn-delete { background: linear-gradient(135deg, #666666 0%, #888888 100%); color: white; border-color: #666666; }
        .btn-delete:hover { background: linear-gradient(135deg, #888888 0%, #aaaaaa 100%); border-color: #888888; }
        .empty { padding: 24px; text-align: center; color: #333333; font-style: italic; }
        .action-buttons { display: flex; gap: 8px; align-items: center; }
        .delete-form { display: inline; }

        @keyframes cardIn { to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes floatBg { 0% { background-position: 0% 0%, 100% 0%, 0% 100%, 100% 100%; } 100% { background-position: 10% 5%, 90% 10%, 5% 90%, 95% 95%; } }
    </style>
</head>
<body>
    <div class="bg-decor"></div>
    <div class="container">
    <div class="card">
    <div class="card-header">
        <h1 class="title">Users</h1>
        <div class="actions">
            <a href="<?= site_url('users/create') ?>" class="btn btn-primary">Create User</a>
        </div>
    </div>
    <div class="table-wrapper">
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($users)): ?>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <div class="action-buttons">
                        <a href="<?= site_url('users/update/' . $user['id']) ?>" class="btn btn-edit">Edit</a>
                        
                        <!-- Navigate to delete confirmation page -->
                        <a href="<?= site_url('users/delete/' . $user['id']) ?>" class="btn btn-delete">Delete</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="empty">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>
    </div>
    </div>
    </div>
</body>
</html>