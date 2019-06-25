<?php
namespace App\Http\Controllers;

use App\Charts\City;
use App\Charts\ParkingFinance;
use App\Charts\Payment;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function index(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetDashboardData';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'user_type' =>  'MANAGEMENT',
        ];
        $header =$send_token;
        $data['dashboard']=json_decode($this->to_curl($url, $data, $header));


        $onstreet = $data['dashboard']->daily_parking_revenue;
        $offstreet = $data['dashboard']->off_street_total_revenue;
        $fleetfix = $data['dashboard']->fleet_fix_revenue;
        $seasonal = $data['dashboard']->seasonal_total_revenue;

        //$sanken = $data['dashboard']->country_bus_revenue;
       // $highcourt =  $data['dashboard']->high_court_revenue;

        $chart= new City;
        $chart->labels([ 'On Street', 'Off-Street','Fleet Fix','Seasonal']);

        $dataset = $chart->dataset('Revenue', 'line', [$onstreet, $offstreet,$fleetfix,
            $seasonal]);
        $dataset->backgroundColor(collect(['#AB7DF6','#31C786',  '#0271D8','#DE0000']));
        $dataset->color(collect(['#AB7DF6','#31C786',  '#0271D8','#DE0000']));




       //dd($data);
        return view('welcome')->with('dashboard', ['dashboard' => $data['dashboard'], 'chart' => $chart]);
        //return view('welcome')->with($data);
    }
    public function compliant()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');

        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $date2 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "PAID",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>"string",
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data1['compliant']=json_decode($this->to_curl($url, $data, $header));
        $data['compliant']=$data1['compliant']->response_data;
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data['compliant']);

        if (empty( $data['compliant']->paginatedList)){
            return view('compliant.compliant')->with($data);
            //return redirect()->route('dashboard');
        }else{
            return view('compliant.compliant')->with($data);
        }

    }
    public function noncompliant()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';


        $user_token=Session::get('resource');
        //dd($user_token);
        $date2 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "CLAMP",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>"string",
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data1['noncompliant']=json_decode($this->to_curl($url, $data, $header));
        $data['noncompliant']=$data1['noncompliant']->response_data;
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data['unpaid']);

        if (empty( $data['noncompliant'])){
            return view('noncompliant.noncompliant')->with($data);
            //return Redirect::back();
        }else{
            return view('noncompliant.noncompliant')->with($data);
        }

    }
    public function clamped(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $date2 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "CLAMPED",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>"string",
            "date_to"=> "string"
        ];
        $header =$send_token;
        $data1['clamped']=json_decode($this->to_curl($url, $data, $header));
        $data['clamped']=$data1['clamped']->response_data;
        //echo '<pre>'; print_r($data ) ; exit;

        //dd($data['clamped']);

        if (empty( $data['clamped']->paginatedList)){
            return view('clamped.clamped')->with($data);
           // return redirect()->route('dashboard');
        }else{
            return view('clamped.clamped')->with($data);
        }

    }
    public function tounclamp()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $date2 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "UNCLAMP",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>"string",
            "date_to"=> "string"

        ];

        $header =$send_token;
        $data1['tounclamp']=json_decode($this->to_curl($url, $data, $header));
        $data['tounclamp']=$data1['tounclamp']->response_data;
        //echo '<pre>'; print_r($data ) ; exit;

        //dd($data['tounclamp']);

        if (empty( $data['tounclamp']->paginatedList)){
            return view('tounclamp.tounclamp')->with($data);
            //return redirect()->route('dashboard');
        }else{
            return view('tounclamp.tounclamp')->with($data);
        }

    }
    public function unclamped()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $date2 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "UNCLAMPED",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>"string",
            "date_to"=> "string"

        ];

        $header =$send_token;
        $data1['unclamped']=json_decode($this->to_curl($url, $data, $header));
        $data['unclamped']=$data1['unclamped']->response_data;
        //echo '<pre>'; print_r($data ) ; exit;

        //dd($data['unclamped']);

        if (empty( $data['unclamped']->paginatedList)){
            return view('unclamped.unclamped')->with($data);
//            return redirect()->route('dashboard');
        }else{
            return view('unclamped.unclamped')->with($data);
        }

    }
    public function seasonal(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetSeasonalParking';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "duration_code"=> "HOURLY",
            "page"=> 0,
            "date_from"=>"string",
            "date_to"=> "string"
        ];

        //dd($data);
        $header =$send_token;
        $this->data1['seasonalhourly']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        $this->data['seasonalhourly']=$this->data1['seasonalhourly']->response_data;
        //dd($this->data['seasonalhourly']);

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetSeasonalParking';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "duration_code"=> "MONTHLY",
            "page"=> 0,
            "date_from"=> "string",
            "date_to"=> "string"
        ];
        // dd($data);
        $header =$send_token;
        $this->data1['seasonalmonthly']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        $this->data['seasonalmonthly']=$this->data1['seasonalmonthly']->response_data;
        //dd($this->data['seasonalmonthly']);


        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetSeasonalParking';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "duration_code"=> "3 MONTHS",
            "page"=> 0,
            "date_from"=> "string",
            "date_to"=> "string"
        ];
        // dd($data);

        $header =$send_token;
        $this->data1['seasonalmonthly3']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        $this->data['seasonalmonthly3']=$this->data1['seasonalmonthly3']->response_data;
        //dd($this->data['seasonalmonthly3']);


        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetSeasonalParking';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "duration_code"=> "6 MONTHS",
            "page"=> 0,
            "date_from"=> "string",
            "date_to"=> "string"
        ];
        $header =$send_token;
        $this->data1['seasonalmonthly6']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        $this->data['seasonalmonthly6']=$this->data1['seasonalmonthly6']->response_data;
        //dd($this->data['seasonalmonthly6']);

        //dd($this->data['seasonalmonthly6']);

        //dd($data);
        if (empty($this->data)){
            return view('seasonal.seasonal')->with($this->data);
            //return redirect()->back();
        }else{
            if (!empty($this->data)){
                return view('seasonal.seasonal')->with($this->data);
            }
        }

    }
    public function offstreet()
    {
//dd($page_id);
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $date2 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "PAID",
            "street"=> "",
            "keyword"=>"",
            "page"=> 0,
            "duration_code_filter"=> "HOURLY",
            "date_from"=>"string",
            "date_to"=> "string"
        ];
        $header =$send_token;
        $data1['offstreet']=json_decode($this->to_curl($url, $data, $header));
        $data['offstreet']=$data1['offstreet']->response_data;
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data['offstreet']);

        if (empty( $data['offstreet']->paginatedList)){
            return view('offstreet.offstreet')->with($data);
        }else{
            if (!empty($data['offstreet']->paginatedList)){
                return view('offstreet.offstreet')->with($data);
            }
        }
    }
    public function queries(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetDetailedParkingEnforcementQueries';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        $date1=date("m/d/Y");
        //dd($date1);
        //$fromDate=$request->post("fromDate");
        //dd($fromDate);
        //$toDate= $request->post('toDate');
        $data = [
            "subcounty"=> "ALL",
            "zone"=> "ALL",
            "page"=> 0,
            "attendant"=> 0,
            "street"=> "ALL",
            'date_from' =>"ALL",
            'date_to' =>  "ALL",
        ];
        $header =$send_token;
        // dd($data);
        $this->data['queries']=json_decode($this->to_curl($url, $data, $header));
        //dd($this->data);
        $this->data1['queries']= $this->data['queries']->response_data;
        //echo '<pre>'; print_r($this->data1['detailsCollections'] ) ; exit;

        //dd($this->data1['queries']);
        //return $request->all();
        return view('queries.queries')->with($this->data1);
    }
    public function collections(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetCollection';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "page_data_filter" => "STREETS"
        ];
        $header =$send_token;
        $this->data['collectstreets']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($this->data['collectstreets']->response_data->collection_list) ; exit;
        //dd($this->data['collectstreets']);

        $this->data1['cStreets']= $this->data['collectstreets']->response_data;
        //dd($this->data1['cStreets']);


        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetCollection';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "page_data_filter" => "ZONES"
        ];
        $header =$send_token;
        $this->data['collectzones']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['collectzones']);

        $this->data1['cZones']= $this->data['collectzones']->response_data;
        // dd($this->data1['cZones']->collection_list[0]->par2);

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetCollection';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "page_data_filter" => "VEHICLECATEGORIES"
        ];
        $header =$send_token;
        $this->data['collectCars']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['collectCars']);

        $this->data1['cVehicles']= $this->data['collectCars']->response_data;
        //dd($this->data1['cVehicles']);

        return view('collections.collections')->with($this->data1);
    }
    public function byagent(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "HOURS"
        ];
        $header =$send_token;
        $this->data['hourly']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        // dd($this->data);

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "ZONES"
        ];
        $header =$send_token;
        $this->data['zones']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['zones']);


        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "STREETS"
        ];
        $header =$send_token;
        $this->data['streets']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['streets']);

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "DAYS"
        ];
        $header =$send_token;
        $this->data['days']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['days']);

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "AGENTS"
        ];
        $header =$send_token;
        $this->data['agents']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['agents']);


        return view('agent.agent')->with($this->data);
    }
    public function view($id){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $business_id = $id;

        //dd($business_id);
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "HOURS",
            "specific_data_filter"=>$business_id
        ];

        //dd($data);
        $header =$send_token;

        $this->data['moreHourly']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
       // dd($this->data);
        return view('agent.hourly')->with($this->data);
    }
    public function viewday($id){

        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $business_id = $id;
        //dd($business_id);
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "DAYS",
            "specific_data_filter"=>$business_id
        ];

        //dd($data);
        $header =$send_token;

        $this->data['moreDays']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data);
        return view('agent.days')->with($this->data);
    }
    public function viewzone($id){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $business_id = $id;
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "ZONES",
            "specific_data_filter"=>$business_id
        ];

        //dd($data);
        $header =$send_token;

        $this->data['moreZones']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data);
        return view('agent.zones')->with($this->data);
    }
    public function viewstreet($id){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $business_id = $id;

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingEnforcementQueries';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter"=> "STREETS",
            "specific_data_filter"=>$business_id
        ];

        //dd($data);
        $header =$send_token;

        $this->data['moreStreets']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data);
        return view('agent.streets')->with($this->data);
    }
    public function logs(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $date2 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "UNIQUEVEHICLES",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>"string",
            "date_to"=> "string"

        ];

        //dd($data);
        $header =$send_token;
        $data1['unique']=json_decode($this->to_curl($url, $data, $header));
        $data['unique']=$data1['unique']->response_data;
        //echo '<pre>'; print_r($data ) ; exit;
        dd($data['unique']);

        if (empty( $data['unique'])){
            return view('logs.logs')->with($data);
        }else{
            if (!empty($data['unique'])){
                return view('logs.logs')->with($data);
            }

        }

    }
    public function plate($id){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $Re_No = $id;
        //dd($Re_No);
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetCarProfile';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "vehicle_registration_no" =>$Re_No
        ];

        //dd($data);
        $header =$send_token;

        $this->data['plate']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data);

        return view('logs.history')->with($this->data);
    }
    public function waiver(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "WAIVER",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>"string",
            "date_to"=> "string"
        ];
        $header =$send_token;
        $this->data['waiver']=json_decode($this->to_curl($url, $data, $header));
        $this->data1['cWaiver']= $this->data['waiver']->response_data;
        //dd($this->data1['cWaiver']);



        if (empty($this->data1['cWaiver'])){
            return view('waiver.waiver')->with($this->data1);
        }else{
            if (!empty($this->data1['cWaiver'])){
                return view('waiver.waiver')->with($this->data1);
            }
        }


    }
    public function remark($id,$description){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $regNo = $id;
        $desc = $description;

        return view('waiver.approve' ,compact('regNo','desc'));
    }
    public function postwaiver(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/WaiverVehicle';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        $registration_number= $request->post('registration_number');
        $unclamping_reason=$request->post("unclamping_reason");
        $approval_decision=$request->post("approval_decision");
        //dd($send_token);
        $data = [
            'registration_number'=>$registration_number,
            'unclamping_reason'=>$unclamping_reason,
            "approval_decision"=>$approval_decision
        ];
        //dd($data);
        $header =$send_token;
        $data['data']=json_decode($this->to_curl($url,$data,$header));

        //dd($data['data']->status_code);

        if ($data['data']->status_code ==200){
            return redirect()->route('waiver')->with('success');
            }else{
            return redirect()->route('waiver')->with('success');
        }

    }
    public function to_curl($url, $data, $header)
    {
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' .$header,
            'Content-Length: ' . strlen(json_encode($data))
        );

        //dd($headers);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $output = curl_exec($ch);

        //dd($output);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        /*if($httpcode != 200)
            {
            $this->session->set_flashdata( "error", "An error has ocurred . Try again" );
            redirect('land');
            }
        */
        curl_close($ch);
        return $output;
    }
}
