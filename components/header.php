<?php
session_start();
?>

<header class="header">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #007bff;
            padding: 15px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            color: white;
            font-size: 24px;
            margin: 0;
        }

        .header .btn-container {
            display: flex;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            background: white;
            color: #007bff;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 6px;
            transition: 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: #0056b3;
            color: white;
        }
    </style>

    <h1>GetTicket</h1>
    <div class="btn-container">
        <a href="javascript:history.back()" class="btn">⬅ Back</a>

        <?php if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] !== 2) : ?>
            <a href="../form/sign_up.php" class="btn">🔑 Login</a>
        <?php endif; ?>

        <?php if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] === 2) : ?>
            <a href="../form/logout.php" class="btn">🚪 Logout</a>
        <?php endif; ?>
    </div>
</header>