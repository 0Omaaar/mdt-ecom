<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réponse à votre message</title>
</head>
<body>
    <h1>Bonjour {{ $contact->name }},</h1>

    <p>Merci de nous avoir contacté à propos de <strong>{{ $contact->subject }}</strong>.</p>

    <p><strong>Votre message :</strong></p>
    <p>{{ $contact->message }}</p>

    <p>Nous avons bien pris en compte votre message et nous nous engageons à y répondre dans les plus brefs délais.</p>

    @if ($response)
        <p><strong>Notre réponse :</strong></p>
        <p>{{ $response }}</p>
    @endif

    <p>Si vous avez d'autres questions, n'hésitez pas à répondre directement à cet e-mail.</p>

    <p>Merci encore pour votre confiance, et à très bientôt !</p>

    <p>Cordialement,<br>L'équipe de <b>MOBIDIGITECH</b></p>
</body>
</html>
