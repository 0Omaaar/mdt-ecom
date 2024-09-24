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
            flex-wrap: wrap;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            max-width: 1200px;
            width: 100%;
        }

        .register-form-section {
            padding: 40px;
            flex: 1 1 400px;
            min-width: 300px;
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
            width: 105%;
            background-color: #0063d1;
            border: none;
            padding: 12px;
            color: white;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .register-button:hover {
            background-color: black; /* Change color on hover */
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
            flex: 1 1 600px;
            min-width: 300px;
            background-image: url('assets/user/images/reg_bg_01.PNG');
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }

            .register-form-section, .promo-section {
                width: 100%;
            }

            .register-button {
                font-size: 16px;
            }
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
            </div>
            <div class="form-item">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-item">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-item">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="register-button">Register</button>
            <div class="login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
    <div class="promo-section">
        <!-- Promotional content can go here -->
    </div>
</div>

</body>
</html>
