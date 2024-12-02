@extends('base')

@section('content')
    <div class="container">
        <h1>Available Brands</h1>
        <div class="row">
            @if (!empty($brands))
                @foreach ($brands as $brand)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $brand['name'] }}</h5>
                                <a href="{{ route('giftcards.denoms', $brand['id']) }}" class="btn btn-primary">View
                                    Denominations</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No brands available at the moment.</p>
            @endif
        </div>
    </div>
@endsection
