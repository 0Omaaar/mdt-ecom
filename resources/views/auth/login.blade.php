<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue chez Mobidigitech</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 10px; /* Added padding for small screens */
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 13px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 120%; /* Make it responsive */
            text-align: center;
        }

        .login-container img {
            width: 110px;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            font-size: 14px;
            color: #777;
            margin-bottom: 30px;
        }

        .form-item {
            position: relative;
            margin-bottom: 20px;
        }

        .form-item input {
            width: 100%; /* Make input fields responsive */
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-item input:focus {
            outline: none;
            border-color: #f57c00;
        }

        .continue-button {
            width: 107%;
            background-color: #f57c00;
            border: none;
            padding: 12px;
            color: white;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .continue-button:hover {
            background-color: #33caff;
        }

        .terms {
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }

        .terms a,
        .register-link a {
            color: #f79e1b; /* Same color for both links */
            text-decoration: none;
        }

        .register-link {
            margin-top: 15px; /* Added spacing for clarity */
            font-size: 14px; /* Increased font size for visibility */
        }
    </style>
</head>
<body>

<div class="login-container">
    <img src="{{ asset('images/Login/imgs.png') }}" alt="login">

    <h1>Bienvenue chez Mobidigitech</h1>
    <p>Saisissez votre adresse e-mail et mot de passe pour vous connecter à Mobidigitech.</p>
    
    <form action="{{ route('login.custom') }}" method="POST">
        @csrf
        <div class="form-item">
            <input type="email" name="email" placeholder="Adresse email*" required>
        </div>
        <div class="form-item">
            <input type="password" name="password" placeholder="Mot de passe*" required>
        </div>
        <button type="submit" class="continue-button">Continuer</button>
        
        <div class="register-link">
            <p>Vous n'avez pas de compte ? <a href="{{ route('register-user') }}">Inscrivez-vous</a></p>
        </div>
    </form>

    <div class="terms">
        En continuant, vous acceptez les <a href="#">termes et conditions</a> de Mobidigitech.
    </div>
</div>

</body>
</html>
