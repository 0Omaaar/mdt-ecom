@extends('base')

@section('content')
    <div class="container">
        <h1>Card Details</h1>
        @if (!empty($details))
            <table class="table">
                <tr>
                    <th>Card Number:</th>
                    <td>{{ $details['cardNumber'] }}</td>
                </tr>
                <tr>
                    <th>PIN:</th>
                    <td>{{ $details['pin'] }}</td>
                </tr>
                <tr>
                    <th>Value:</th>
                    <td>{{ $details['value'] }} {{ $details['currency'] }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>{{ $details['status'] }}</td>
                </tr>
            </table>
        @else
            <p>Card details not available.</p>
        @endif
    </div>
@endsection
