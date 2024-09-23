<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

        .register-container {
            display: flex;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }

        .register-form-section {
            padding: 40px;
            width: 40%;
        }

        .register-form-section h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-item {
            margin-bottom: 20px;
        }

        .form-item input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .register-button {
            width: 100%;
            background-color: #0063d1;
            border: none;
            padding: 12px;
            color: white;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #777;
        }

        .login-link a {
            color: #0063d1;
            text-decoration: none;
            font-weight: bold;
        }

        .promo-section {
            width: 60%;
            background-image: url('assets/user/images/reg_bg_01.PNG'); /* Example image URL */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="register-form-section">
        <h1>Register</h1>
        <form action="{{ route('register.custom') }}" method="POST">
            @csrf
            <div class="form-item">
                <input type="text" name="name" placeholder="Name" required>
                <label for="name"><i class="fas fa-user"></i></label>
            </div>
            <div class="form-item">
                <input type="email" name="email" placeholder="Email" required>
                <label for="email"><i class="fas fa-envelope"></i></label>
            </div>
            <div class="form-item">
                <input type="password" name="password" placeholder="Password" required>
                <label for="password"><i class="fas fa-lock"></i></label>
            </div>
            <div class="form-item">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <label for="password_confirmation"><i class="fas fa-lock"></i></label>
            </div>
            <button type="submit" class="register-button">Register</button>
            <div class="login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
    <div class="promo-section">
        <!-- Right section showing promotional content (background image) -->
    </div>
</div>

</body>
</html>
