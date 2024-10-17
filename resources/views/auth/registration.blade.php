<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 10px;
        }

        .register-container {
            background-color: white;
            padding: 40px;
            border-radius: 13px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%; 
            text-align: center;
        }

        .register-container img {
            width: 110px; 
            margin-bottom: 10px; 
        }

        h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .form-item {
            margin-bottom: 20px;
            position: relative;
            width: 100%;
        }

        .form-item input {
            width: 100%;
            padding: 14px; 
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            background-color: #f9f9f9; /
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
            transition: all 0.3s ease-in-out;
        }

        .form-item input:hover {
            background-color: #fff; 
            border-color: #ddd; 
        }

        .form-item input:focus {
            outline: none;
            border-color: #f57c00; 
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); 
            background-color: #fff; 
        }

        .register-button {
            width: 106%; 
            background-color: #f57c00;
            border: none;
            padding: 12px;
            color: white;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #33caff;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .login-link a {
            color: #f79e1b;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .register-container {
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .form-item input {
                padding: 10px;
                font-size: 14px;
            }

            .register-button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="register-container">
    <a href="{{ route('home') }}"> <!-- Make the logo clickable -->
        <img src="{{ asset('images/Login/imginscr.png') }}" alt="Logo"> <!-- Logo Image -->
    </a>
    <h1>Inscription</h1>
    <form action="{{ route('register.custom') }}" method="POST">
        @csrf
        <div class="form-item">
            <input type="text" name="name" placeholder="Nom" required>
        </div>
        <div class="form-item">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-item">
            <input type="password" name="password" placeholder="Mot de passe" required>
        </div>
        <div class="form-item">
            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
        </div>
        <button type="submit" class="register-button">S'inscrire</button>
        <div class="login-link">
            <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Connexion</a></p>
        </div>
    </form>
</div>

</body>
</html>
