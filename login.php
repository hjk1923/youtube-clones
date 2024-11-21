<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/upload.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="loginuser.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Log In</button>
        </form>
        <p>Don't have an account? <a href="signup.html">Sign up here</a></p>
    </div>
</body>

</html>
