
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../others/styles.css">
</head>
<body>
    <h2>Login</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" ><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" ><br><br>

    <button type="submit" name="login">Login</button>
</form>


<form action="../View/catalogue.php" method="get">
    <button type="submit">Admin Access</button>
</form>
</body>
</html>
