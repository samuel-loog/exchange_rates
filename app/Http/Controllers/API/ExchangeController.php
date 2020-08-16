<?php

namespace App\Http\Controllers\API;

use App\Exchange;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExchangeCollection;
use Illuminate\Support\Facades\Http;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xml = Http::get('http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d/m/Y'));

        $xmlObject = simplexml_load_string($xml);

        $json = json_encode($xmlObject);
        $array = json_decode($json,TRUE);

        $date = date('Y-m-d H:i:s');

        foreach ($array['Valute'] as $item) {
            $exchange = new Exchange();
            $exchange->currency = $item['CharCode'];
            $exchange->rate = (float)$item['Value'];
            $exchange->date = $date;
            $exchange->save();
        }

        return new ExchangeCollection(Exchange::all()->where('date', '=', $date));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        return new ExchangeCollection(Exchange::all()->sortByDesc('date'));
    }
}
