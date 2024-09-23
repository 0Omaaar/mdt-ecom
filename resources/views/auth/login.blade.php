<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            display: flex;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            max-width:1000px;
            width: 140%;
        }

        .login-form-section {
            padding: 80px;
            width: 40%;
        }

        .login-form-section h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-item {
            margin-bottom: 20px;
            position: relative;
        }

        .form-item input {
            width: 75%;
            padding: 10px 40px 10px 40px; /* Adjust padding for icon */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-item i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa; /* Icon color */
        }

        .login-button {
            width: 100%;
            background-color: #0063d1;
            border: none;
            padding: 12px;
            color: white;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #777;
        }

        .register-link a {
            color: #0063d1;
            text-decoration: none;
            font-weight: bold;
        }

        .promo-section {
            width: 60%;
            background-image: url('assets/user/images/reg_bg_02.PNG');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-form-section">
        <h1>Login</h1>
        <form action="{{ route('login.custom') }}" method="POST">
            @csrf
            <div class="form-item">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-item">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register-user') }}">Register</a></p>
            </div>
        </form>
    </div>
    <div class="promo-section">
        <!-- Right section showing promotional content (background image) -->
    </div>
</div>

</body>
</html>
