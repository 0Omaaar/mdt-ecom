@extends('base')
@section('content')
    <div class="container">
        <h1>Denominations</h1>
        <div class="row">
            @if (!empty($denoms))
                @foreach ($denoms as $denom)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $denom['value'] }} {{ $denom['currency'] }}</h5>
                                <form action="{{ route('giftcards.reserve') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="denomId" value="{{ $denom['id'] }}">
                                    <input type="hidden" name="brandId" value="{{ $denom['brandId'] }}">
                                    <input type="hidden" name="userId" value="{{ auth()->id() }}">
                                    <button type="submit" class="btn btn-success">Reserve Card</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No denominations available for this brand.</p>
            @endif
        </div>
    </div>
@endsection
