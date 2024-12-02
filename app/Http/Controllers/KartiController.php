<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KartiController extends Controller
{
    protected $baseUrl;
    protected $auth;

    public function __construct()
    {
        $this->baseUrl = env('KARTI_API_URL');
        $this->auth = base64_encode(env('KARTI_BASIC_AUTH'));
    }

    public function getBrands()
    {
        $brands = $this->brands();
        return view('user.giftcards.brands', compact('brands'));
    }

    public function getDenoms($brandId)
    {
        $denoms = $this->denoms($brandId);
        return view('user.giftcards.denoms', compact('denoms'));
    }

    public function reserveCard(Request $request)
    {
        $reserveResponse = $this->storeCard(
            $request->denomId,
            $request->brandId,
            $request->userId
        );

        if ($reserveResponse['reserveStatus'] === 'Card Reserved Successfully.') {
            return redirect()->route('giftcards.details', $reserveResponse['reserveId']);
        }

        return redirect()->back()->withErrors('Failed to reserve card.');
    }

    public function getCardDetails($reserveId)
    {
        $details = $this->cardDetails($reserveId);
        return view('user.giftcards.details', compact('details'));
    }




    //service logic

    public function request($method, $endpoint, $params = [])
    {
        $url = $this->baseUrl . $endpoint;
        if ($method === 'get') {
            $url .= '?' . http_build_query($params);
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $this->auth,
                'Content-Type' => 'application/json',
            ])->get($url);
        } else {
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $this->auth,
                'Content-Type' => 'application/json',
            ])->post($url, $params);
        }

        if ($response->failed()) {
            throw new \Exception('API request failed: ' . $response->body());
        }

        return $response;
    }

    public function brands()
    {
        $response = $this->request('get', '/BrandList_test/EN', [
            'opId' => env('KARTI_OP_ID')
        ]);

        return $response->json();
    }

    public function denoms($brandId)
    {
        $queryParams = [
            'lang' => 'EN',
            'brandId' => $brandId,
            'opId' => env('KARTI_OP_ID'),
        ];
        $response = $this->request('get', '/DenomList_test', $queryParams);

        return $response->json();
    }

    public function storeCard($denomId, $brandId, $userId)
    {
        $transactionId = (string) \Illuminate\Support\Str::uuid();
        $response = $this->request('post', '/cardReserve_test', [
            'denomId' => $denomId,
            'brandId' => $brandId,
            'opId' => env('KARTI_OP_ID'),
            'partnerTransactionId' => env('KARTI_PARTNER_ID'),
            'transactionId' => $transactionId,
        ]);

        return $response->json();
    }

    public function cardDetails($reserveId)
    {
        $transactionId = (string) \Illuminate\Support\Str::uuid();
        $response = $this->request('post', '/CardDetails_test/en', [
            'opId' => env('KARTI_OP_ID'),
            'reserveID' => $reserveId,
            'partnerTransactionId' => $transactionId,
        ]);

        return $response->json();
    }
}
