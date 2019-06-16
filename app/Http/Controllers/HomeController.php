<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexq()

    {
        $client = new Client([
            'base_uri' => 'http://102.133.161.163',
        ]);
        $response = $client->post('/RevenueSure/api/Parking/GetDashboardData', [
            'form_params' => [],
        ]);
        $data['clamp_list'] = json_decode((string) $response->getBody());
        return view('welcomey')->with($data);
    }
}
