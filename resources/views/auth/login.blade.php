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
            flex-wrap: wrap;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 13px;
            overflow: hidden;
            max-width: 1200px;
            width: 100%;
            justify-content: space-between;
        }

        .login-form-section {
            padding: 40px;
            flex: 1 1 400px;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-form-section h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-item {
            margin-bottom: 20px;
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .form-item input {
            width: 100%;
            padding: 12px 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-item i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
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
            transition: background-color 0.3s ease;
            max-width: 400px;
        }

        .login-button:hover {
            background-color: black;
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
            flex: 1 1 600px;
            min-width: 300px;
            background-image: url('assets/user/images/reg_bg_02.PNG'); /* Change this to the correct path */
            background-size: cover;
            background-position: center;
            display: block;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                align-items: center;
            }

            .login-form-section, .promo-section {
                width: 100%;
                padding: 20px;
            }

            .login-form-section h1 {
                font-size: 1.5rem;
            }

            .promo-section {
                height: 200px; /* Set a fixed height for the promo image on smaller screens */
                background-size: cover;
                background-position: center;
            }
        }

        @media (max-width: 480px) {
            .login-form-section {
                padding: 10px;
            }

            .form-item input {
                padding: 10px 35px;
                font-size: 14px;
            }

            .login-button {
                font-size: 16px;
            }

            .promo-section {
                height: 200px; /* Maintain height for smaller screens */
            }
        }

        @media (min-width: 769px) {
            .promo-section {
                height: auto; /* Adjust the height dynamically for larger screens */
            }
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
        <!-- Promo section with background image -->
    </div>
</div>

</body>
</html>
