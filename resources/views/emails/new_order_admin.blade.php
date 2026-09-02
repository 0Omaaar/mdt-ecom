<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Commande N° #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333333;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            border: 1px solid #e2e8f0;
        }
        .header {
            background-color: #1a365d;
            color: #ffffff;
            padding: 25px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .content {
            padding: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #1a365d;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 8px;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .info-grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .info-grid td {
            padding: 6px 0;
            font-size: 14px;
        }
        .info-grid td.label {
            font-weight: bold;
            color: #4a5568;
            width: 35%;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        .items-table th, .items-table td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }
        .items-table th {
            background-color: #f7fafc;
            color: #2d3748;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .badge-particulier {
            background-color: #ebf8ff;
            color: #2b6cb0;
        }
        .badge-societe {
            background-color: #fefcbf;
            color: #744210;
        }
        .footer {
            background-color: #f7fafc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 13px;
            color: #718096;
        }
        .btn-action {
            display: inline-block;
            padding: 12px 24px;
            background-color: #2b6cb0;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Nouvelle Commande Reçue !</h1>
            <p>Commande N° #{{ $order->id }} &bull; {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : now()->format('d/m/Y H:i') }}</p>
        </div>

        <div class="content">
            <div class="section-title">Informations Client</div>
            <table class="info-grid">
                <tr>
                    <td class="label">Type de Client :</td>
                    <td>
                        @if($order->client_type === 'societe')
                            <span class="badge badge-societe">Société</span>
                        @else
                            <span class="badge badge-particulier">Particulier</span>
                        @endif
                    </td>
                </tr>
                @if($order->client_type === 'societe')
                <tr>
                    <td class="label">Raison Sociale :</td>
                    <td><strong>{{ $order->company_name }}</strong></td>
                </tr>
                <tr>
                    <td class="label">ICE :</td>
                    <td><strong>{{ $order->ice }}</strong></td>
                </tr>
                @endif
                <tr>
                    <td class="label">Nom complet :</td>
                    <td>{{ $order->prenom }} {{ $order->nom }}</td>
                </tr>
                <tr>
                    <td class="label">Téléphone :</td>
                    <td><a href="tel:{{ $order->phone }}">{{ $order->phone }}</a></td>
                </tr>
                <tr>
                    <td class="label">E-mail :</td>
                    <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                </tr>
                <tr>
                    <td class="label">Adresse de livraison :</td>
                    <td>{{ $order->adresse }}, {{ $order->ville }}</td>
                </tr>
                @if($order->note)
                <tr>
                    <td class="label">Note de commande :</td>
                    <td><em>{{ $order->note }}</em></td>
                </tr>
                @endif
            </table>

            <div class="section-title">Détails de la Commande</div>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix Unit.</th>
                        <th>Qté</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product ? $item->product->name : 'Produit #'.$item->product_id }}</td>
                        <td>{{ number_format($item->price, 2) }} DH</td>
                        <td>{{ $item->quantity }}</td>
                        <td class="text-right">{{ number_format($item->price * $item->quantity, 2) }} DH</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="info-grid">
                <tr>
                    <td class="label">Méthode de livraison :</td>
                    <td>
                        @if($order->shipping_method == 'transport')
                            Frais de transport (50 DH)
                        @elseif($order->shipping_method == 'gratuite')
                            Livraison Gratuite
                        @else
                            Ramassage local
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="label">Méthode de paiement :</td>
                    <td>{{ strtoupper($order->payment_method ?? 'Paiement à la livraison') }}</td>
                </tr>
                <tr>
                    <td class="label" style="font-size: 16px;">Montant Total :</td>
                    <td style="font-size: 18px; font-weight: bold; color: #2b6cb0;">{{ number_format($order->total_price, 2) }} DHS</td>
                </tr>
            </table>

            <div style="text-align: center; margin-top: 25px;">
                <a href="{{ url('/admin/orders/' . $order->id) }}" class="btn-action">Voir la commande sur le Dashboard Admin</a>
            </div>
        </div>

        <div class="footer">
            <p>Cet email a été envoyé automatiquement par votre système e-commerce MOBIDIGITECH.</p>
        </div>
    </div>
</body>
</html>
