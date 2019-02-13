<?php
namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class QuoteController extends Controller {

    public function postQuote(Request $request){
        $user = JWTAuth::parseToken()->toUser();
        $quote = new Quote();
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote' => $quote, 'user' => $user], 201);
    }

    public function getQuotes(){
        $quotes = Quote::all();
        $response = [
            'quotes' => $quotes
        ];
        return response()->json($response, 200);
    }

    public function putQuote(Request $request, Quote $quote){
        if(!$quote){
            return response()->json(['message' => 'Document not found'], 404);
        }
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote' => $quote], 200);
    }

    public function deleteQuote(Quote $quote){
        try {
            $quote->delete();
            return response()->json(['message' => $quote], 200);
        }
        catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], 200);
        }
    }
}