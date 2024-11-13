<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle annonce de produit</title>
    <style>
        body,
        table,
        td,
        a {
            margin: 0;
            padding: 0;
            text-size-adjust: none;
            font-family: Arial, sans-serif;
        }

        table {
            border-spacing: 0;
            width: 100%;
        }

        td {
            padding: 10px;
        }

        .email-wrapper {
            width: 100%;
            background-color: #f4f4f4;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            border-radius: 8px 8px 0 0;
        }

        .email-footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #888888;
        }

        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .email-button {
            background-color: #28a745;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            display: block;
            width: 80%;
            margin: 20px 0;
            margin-left: 10px;
        }

        .product-info {
            margin-bottom: 20px;
        }

        .product-info img {
            max-width: 100%;
            height: auto;
        }

        .product-info .product-name {
            font-size: 20px;
            font-weight: bold;
            color: #333333;
        }

        .product-info .product-description {
            font-size: 14px;
            color: #666666;
        }

        .product-info .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <h1>Nouvelle alerte produit !</h1>
                <p>Découvrez notre dernière nouveauté dans la boutique</p>
            </div>

            <div class="email-body">
                <div class="product-info">
                    <img src="{{ $productImage }}" alt="Image du produit">
                    <p class="product-name">{{ $productName }}</p>
                    <p class="product-description">{!! html_entity_decode($productDescription) !!}</p>
                    <p class="product-price">Prix : {{ $productPrice }}</p>
                </div>

                <p>{{ $messageContent }}</p>

                <a href="{{ $productUrl }}" class="email-button">Acheter maintenant</a>
            </div>

            <div class="email-footer">
                <p>Vous recevez cet email car vous êtes abonné à notre newsletter.</p>
                <p>&copy; {{ date('Y') }} <b>Mobidigitech</b>. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</body>

</html>
