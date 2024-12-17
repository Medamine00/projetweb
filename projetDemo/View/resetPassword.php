<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../config.php';
    $pdo = config::getConnexion();

    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    if (empty($token) || empty($newPassword)) {
        header('Location: resetPassword.php?error=missing_data');
        exit();
    }

    try {
        // Validate token
        $stmt = $pdo->prepare("
            SELECT id FROM user WHERE reset_token = :token AND token_expiry > NOW()
        ");
        $stmt->execute(['token' => $token]);
        $user = $stmt->fetch();

        if ($user) {
            // Update the password
            $hashedPassword = $newPassword; // Note: Use password_hash() for security
            $updateStmt = $pdo->prepare("
                UPDATE user SET password = :password, reset_token = NULL, token_expiry = NULL WHERE reset_token = :token
            ");
            $updateStmt->execute([
                'password' => $hashedPassword,
                'token' => $token
            ]);
                // Log the password reset action
            $this->addHistory($user['id'], 'Password reset');
            header('Location: ../View/login.php?success=password_reset');
            exit();
        } else {
            header('Location: resetPassword.php?error=invalid_or_expired_token');
            exit();
        }
    } catch (Exception $e) {
        error_log('Reset Password Error: ' . $e->getMessage());
        header('Location: resetPassword.php?error=server_error');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialiser le mot de passe</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #333a59, #181d38);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        /* Container */
        .container {
            width: 360px;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .container:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        /* Form */
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
            width: 100%;
        }

        label {
            font-weight: bold;
            color: #666;
            text-align: left;
            font-size: 0.9rem;
        }

        input[type="password"] {
            padding: 0.8rem;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 1rem;
            width: 100%;
            transition: box-shadow 0.3s ease;
        }

        input[type="password"]:focus {
            border-color: #333a59;
            box-shadow: 0 0 8px rgba(51, 58, 89, 0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 0.8rem;
            background-color: #181d38;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #333a59;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Réinitialiser le mot de passe</h1>
    <form action="resetPassword.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
        <label for="new_password">Nouveau mot de passe :</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Réinitialiser</button>
    </form>
</div>
</body>
</html>
