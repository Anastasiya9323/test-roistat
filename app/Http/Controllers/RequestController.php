<?php
namespace App\Http\Controllers;

use App\Http\Requests\RequestRequest;
use App\Http\Services\RequestService;

class RequestController extends Controller
{
    public function index()
    {
        return view('request');
    }

    public function sendRequest(RequestRequest $request, RequestService $service)
    {
        return view('request', ['result' => $service->sendRequest()]);
    }
}
