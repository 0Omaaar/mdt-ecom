<!DOCTYPE html>
<html>
<head>
    <title>Réponse à votre avis</title>
</head>
<body>
    <h1>Bonjour {{ $review->name }},</h1>

    <p>Merci d'avoir pris le temps de nous envoyer votre avis concernant notre produit <strong>{{ $review->product->name }}</strong>.</p>

    <p><strong>Votre avis :</strong></p>
    <p><strong>Objet :</strong> {{ $review->subject }}</p>
    <p><strong>Message :</strong> {{ $review->message }}</p>

    <p>Nous avons bien pris en compte votre retour, et nous ferons de notre mieux pour améliorer notre service en fonction de vos remarques.</p>

    @if ($response)
        <p>{{ $response }}</p>
    @endif

    <p>Si vous avez d'autres questions ou suggestions, n'hésitez pas à nous répondre directement à cet email.</p>

    <p>Merci encore pour votre confiance et votre soutien.</p>

    <p>Cordialement,<br>L'équipe de <b>MOBIDIGITECH</b></p>
</body>
</html>
