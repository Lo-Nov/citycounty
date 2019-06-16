<?php
namespace App\Http\Controllers;

use App\Charts\ParkingFinance;
use App\Charts\Payment;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDashboardData';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'user_type' =>  'MANAGEMENT',
        ];
        $header =$send_token;
        $data['clamp_list']=json_decode($this->to_curl($url, $data, $header));
        //dd($data);
        $paid = $data['clamp_list']->paid;
        $unpaid = $data['clamp_list']->unpaid;
        $clamped = $data['clamp_list']->total_clumped;
        $queried = $data['clamp_list']->total_queries;

        $paid_but_not_querried = $data['clamp_list']->paid_but_not_querried;
        $unclamped= $data['clamp_list']->total_Vehicles_to_be_unclumped;
        $total=$paid+$paid_but_not_querried;

        $chart = new Payment;
        $chart->labels([ 'Queried Cars', 'Total Paid','To clamp Cars','Clamped Cars',
            'To unclamp Cars']);

        $dataset = $chart->dataset('Operation count', 'polarArea', [$queried, $total,$unpaid,
            $clamped,  $unclamped]);

        $dataset->backgroundColor(collect(['#AB7DF6','#31C786',  '#0271D8','#DE0000','#F6C242']));
        $dataset->color(collect(['#AB7DF6','#31C786',  '#0271D8','#DE0000','#F6C242']));
//dd($data);
        return view('welcome')->with('clamp_list', ['clamp_list' => $data['clamp_list'], 'chart' => $chart]);
    }

    public function agent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDashboardData';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'user_type' =>  'Loman',
        ];
        $header =$send_token;
        $data['clamp_list']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        return view('agent')->with($data);
    }

    public function queried()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDetailedParkingEnforcementQueries';
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
            "attendant"=> 0,
            "street"=> "ALL",
            'date_from' =>$date1,
            'date_to' =>  "ALL",
        ];
        $header =$send_token;
        //dd($data);
        $this->data['qRange']=json_decode($this->to_curl($url, $data, $header));

        $this->data1['queried']= $this->data['qRange']->response_data;
        // dd($this->data1['cZones']->collection_list[0]->par2);
        //dd($this->data1['queried']);

        //return $request->all();
        return view('queried.queried')->with($this->data1);
    }
    public function queriedAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDetailedParkingEnforcementQueries';
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
            "attendant"=> 0,
            "street"=> "ALL",
            'date_from' =>$date1,
            'date_to' =>  "ALL",
        ];
        $header =$send_token;
        //dd($data);
        $this->data['attendantRange']=json_decode($this->to_curl($url, $data, $header));

        $this->data1['queriedAgent']= $this->data['attendantRange']->response_data;
        // dd($this->data1['cZones']->collection_list[0]->par2);
        //dd($this->data1['queriedAgent']);

        return view('queried.queriedAgent')->with($this->data1);
    }
    public function paidAgent()
    {


        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$date2,
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data['paidAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
       // dd($data);

        if ($data['paidAgent']->status_code == 200){
            return view('paid.paidAgent')->with($data);
        }else{
            return view('errors.paidAgent')->with($data);
        }
    }
    public function paid()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$date2,
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data['paid']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);

        if ($data['paid']->status_code == 200){
            return view('paid.paid')->with($data);
        }else{
            return view('errors.alertpaid')->with($data);
        }



    }

    public function unpaid()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $date3 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "CLAMP",
            "street"=> "",
            "keyword"=>"",
            "date_from"=>$date3,
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data['unpaid']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        if ($data['unpaid']->status_code == 200){
            return view('unpaid.unpaid')->with($data);
        }else{
            return view('errors.alertclamp')->with($data);
        }


    }
    public function unpaidAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "Loman",
            "enforce_type" => "clamp"
        ];
        $header =$send_token;
        $data['unpaidAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);

        if ($data['unpaidAgent']->status_code == 200) {
            return view('unpaid.unpaidAgent')->with($data);
        } elseif ($data['unpaidAgent']->status_code == 404) {
            return view('errors.agenttoclamp')->with($data);
        }
    }

    public function clamped()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $date3 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "CLAMPED",
            "street"=> "",
            "keyword"=>"",
            "date_from"=>$date3,
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data['clamped']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);


        if ($data['clamped']->status_code == 200){
            return view('clamped.clamped')->with($data);
        }else{
            return view('errors.clampedE')->with($data);
        }

    }
    public function clampedAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "Loman",
            "enforce_type" => "clamped"
        ];
        $header =$send_token;
        $data['clampedAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        if ($data['clampedAgent']->status_code == 200) {
            return view('clamped.clampedAgent')->with($data);
        } elseif ($data['clampedAgent']->status_code == 404) {
            return view('errors.agentclamped')->with($data);
        }
    }

    public function unclamped()
    {

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $date3 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "UNCLAMPED",
            "street"=> "",
            "keyword"=>"",
            "date_from"=>$date3,
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data['unclamped']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);


        if ($data['unclamped']->status_code == 200){
            return view('unclamped.unclamped')->with($data);
        }else{
            return view('errors.unclampedE')->with($data);
        }

    }
    public function unclampedAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "Loman",
            "enforce_type" => "unclamped"
        ];
        $header =$send_token;
        $data['unclampedAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        // dd($data);

        if ($data['unclampedAgent']->status_code == 200) {
            return view('unclamped.unclampedAgent')->with($data);
        } elseif ($data['unclampedAgent']->status_code == 404) {
            return view('Agenterrors.unclampAlert')->with($data);
        }
    }

    public function due_unclamped()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $date3 = date("m/d/Y");
        //dd($date2);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "UNCLAMP",
            "street"=> "",
            "keyword"=>"",
            "date_from"=>$date3,
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data['due_unclamped']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
       //dd($data);


        if ($data['due_unclamped']->status_code == 200){
            return view('dueUnclamp.due_unclamp')->with($data);
        }else{
            return view('errors.unclampE')->with($data);
        }

    }
    public function unclampAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "Loman",
            "enforce_type" => "unclamp"
        ];
        $header =$send_token;
        $data['unclampAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);

        if ($data['unclampAgent']->status_code == 200) {
            return view('dueUnclamp.unclampAgent')->with($data);
        } elseif ($data['unclampAgent']->status_code == 404) {
            return view('errors.agentunclamp')->with($data);
        }
    }
    public function towed()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDashboardData';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
        ];
        $header =$send_token;
        $data['towed']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        return view('towed.towed')->with($data);
    }
    public function towedAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "enforce_type" => "towed"
        ];
        $header =$send_token;
        $data['towedAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        if ($data['towedAgent']->status_code == 200) {
            return view('towed.towedAgent')->with($data);
        } elseif ($data['towedAgent']->status_code == 404) {
            return view('errors.agenttowed')->with($data);
        }
    }

    public function dueuntowing()
    {
        $client = new Client();
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $data = array(
            'user_type' =>  'MANAGEMENT',
            "enforce_type" => "untow"
        );
        //echo '<pre>'; print_r($data) ;
        $data['dueuntowing']=json_decode($this->to_curl($url, $data));
        //echo '<pre>'; print_r($dueuntowing ) ; exit;
        //dd($data);
        return view('towed.dueTowing')->with($data);
    }
    public function untowed()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDashboardData';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
        ];
        $header =$send_token;
        $data['untowed']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        return view('towed.untowed')->with($data);
    }
    public function untowedAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
            "enforce_type" => "untowed"
        ];
        $header =$send_token;
        $data['untowedAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        if ($data['untowedAgent']->status_code == 200) {
            return view('towed.untowedAgent')->with($data);
        } elseif ($data['untowedAgent']->status_code == 404) {
            return view('errors.agentuntowed')->with($data);
        }
    }

    public function seasonalAgent()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetSeasonalParking';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "Loman",
        ];
        $header =$send_token;
        $data['seasonalAgent']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        if ($data['seasonalAgent']->status_code == 200) {
            return view('seasonal.seasonalAgent')->with($data);
        } elseif ($data['seasonalAgent']->status_code == 404) {
            return view('Agenterrors.seasonalAlert')->with($data);
        }
    }
    public function seasonal()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetSeasonalParking';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
        ];
        $header =$send_token;
        $data['seasonal']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        return view('seasonal.seasonal')->with($data);
    }

    public function finance()
    {
        $url =  'http://www.revenuesure.co.ke:8086/api/General/GetDashboardMonthlyAnalysis';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'key' =>  '1-5200',
            'fiscal_year'=>'20172018'
        ];
        $header =$send_token;
        $data['Finance']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
       //  $dd= $data['Finance']->status_code;
           // dd($dd);
        //labels
        //datasets
        $jan = $data['Finance']->response_data[0]->January;
        $feb = $data['Finance']->response_data[0]->February;
        $march = $data['Finance']->response_data[0]->March;
        $aprl = $data['Finance']->response_data[0]->April;
        $may = $data['Finance']->response_data[0]->May;
        $june = $data['Finance']->response_data[0]->June;
        $july = $data['Finance']->response_data[0]->July;
        $aug = $data['Finance']->response_data[0]->August;
        $sep = $data['Finance']->response_data[0]->September;
        $oct = $data['Finance']->response_data[0]->October;
        $nov = $data['Finance']->response_data[0]->November;
        $dec = $data['Finance']->response_data[0]->December;
        //dd($feb);
        $chart = new ParkingFinance;
        $chart->labels([ 'Jan', 'Feb', 'March','April','May','June','July', 'August', 'Sep', 'Oct','Nov','Dec']);
        $dataset = $chart->dataset('', 'bar', [$jan, $feb, $march,$aprl,$may,$june,$july,$aug,$sep,$oct,$nov,$dec]);
        $dataset->backgroundColor(collect(['#3ae374','#3ae374', '#3ae374','#3ae374','#3ae374','#3ae374','#3ae374','#3ae374','#3ae374','#3ae374','#3ae374','#3ae374']));
//        $dataset->color(collect(['#7d5fff','#32ff7e', '#ff4d4d','#ff4d4d']));
        //dd($chart);
        return view('finance.Parkingfinance')->with('Finance', ['Finance' => $data['Finance'], 'chart' => $chart]);
    }


    public function hourrange(Request $request){
        //return $request->all();
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            'user_type'=>"MANAGEMENT",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];
        $header =$send_token;
        $data['clamp_list']=json_decode($this->to_curl($url, $data, $header));
        //dd($data);
    }

    public function daterange(Request $request)

    {

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDashboardData';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            'user_type'=>"MANAGEMENT",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];
        $header =$send_token;
        $data['clamp_list']=json_decode($this->to_curl($url, $data, $header));
        //dd($data);
        $paid = $data['clamp_list']->paid;
        $unpaid = $data['clamp_list']->unpaid;
        $clamped = $data['clamp_list']->total_clumped;
        $queried = $data['clamp_list']->total_queries;

        $paid_but_not_querried = $data['clamp_list']->paid_but_not_querried;
        $unclamped= $data['clamp_list']->total_Vehicles_to_be_unclumped;
        $total=$paid+$paid_but_not_querried;

        $chart = new Payment;
        $chart->labels([ 'Queried Cars', 'Total Paid','To clamp Cars','Clamped Cars',
            'To unclamp Cars']);

        $dataset = $chart->dataset('Operation count', 'pie', [$queried, $total,$unpaid,
            $clamped,  $unclamped]);

        $dataset->backgroundColor(collect(['#AB7DF6','#31C786',  '#0271D8','#DE0000','#F6C242']));
        $dataset->color(collect(['#AB7DF6','#31C786',  '#0271D8','#DE0000','#F6C242']));
//dd($data);
        return view('welcome')->with('clamp_list', ['clamp_list' => $data['clamp_list'], 'chart' => $chart]);

    }
    //admattendants
    public function admattendants(){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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


        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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


        return view('attendants.admattendant')->with($this->data);
    }
    //attendants
    public function attendants(){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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
       // dd($data);

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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


        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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


        return view('attendants.attendant')->with($this->data);
    }

    //collections

    public function collections(){

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetCollection';
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


        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetCollection';
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

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetCollection';
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
        //dd($this->data['collectzones']['']);

        $this->data1['cVehicles']= $this->data['collectCars']->response_data;
         //dd($this->data1['cVehicles']);

        return view('collection.collections')->with($this->data1);
    }

    public function remark($id,$description)
    {
        $regNo = $id;
        $desc = $description;

        return view('waiver.approvewaiver' ,compact('regNo','desc'));
    }

    public function postWeiver(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/WaiverVehicle';
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
            return Redirect::to('/waiver')->with('message' , 'Updated updated successfully');
        }else{
            Toastr::success('An Error occurred,please try again', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('success');
        }

    }

    public function all(){

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$date2,
            "date_to"=> "string"
        ];
        $header =$send_token;
        $this->data1['paid']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data1['paid']->response_data);

        if (empty($this->data1['paid']->response_data) ){
            return view('alerts.paid')->with($this->data1);
        }else{
            $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
            $user_token=Session::get('resource');
            //dd($user_token);
            $date3 = date("m/d/Y");
            //dd($date2);
            $send_token = $user_token[0]['token'];
            //dd($send_token);
            $data = [
                "enforce_type"=> "CLAMP",
                "street"=> "",
                "keyword"=>"",
                "date_from"=>$date3,
                "date_to"=> "string"
            ];
            $header =$send_token;
            $this->data1['unpaid']=json_decode($this->to_curl($url, $data, $header));
            //dd($this->data1['unpaid']);

            if (empty($this->data1['unpaid']->response_data)){
                return view('alerts.unpaid')->with($this->data1);
            }else{
                $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
                $user_token=Session::get('resource');
                //dd($user_token);
                $date3 = date("m/d/Y");
                //dd($date2);
                $send_token = $user_token[0]['token'];
                //dd($send_token);
                $data = [
                    "enforce_type"=> "CLAMPED",
                    "street"=> "",
                    "keyword"=>"",
                    "date_from"=>$date3,
                    "date_to"=> "string"
                ];
                $header =$send_token;
                $this->data1['clamped']=json_decode($this->to_curl($url, $data, $header));
                //echo '<pre>'; print_r($data ) ; exit;
                //dd($this->data1['clamped']);

                if (empty($this->data1['clamped']->response_data)){
                    return view('alerts.clamped')->with($this->data1);
                }else{
                    $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
                    $user_token=Session::get('resource');
                    //dd($user_token);
                    $date3 = date("m/d/Y");
                    //dd($date2);
                    $send_token = $user_token[0]['token'];
                    //dd($send_token);
                    $data = [
                        "enforce_type"=> "UNCLAMP",
                        "street"=> "",
                        "keyword"=>"",
                        "date_from"=>$date3,
                        "date_to"=> "string"

                    ];
                    $header =$send_token;
                    $this->data1['due_unclamped']=json_decode($this->to_curl($url, $data, $header));
                    //dd($this->data1['due_unclamped']);

                    if (empty($this->data1['due_unclamped']->response_data)){
                        return view('alerts.unclamp')->with($this->data1);
                    }else{
                        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
                        $user_token=Session::get('resource');
                        //dd($user_token);
                        $date3 = date("m/d/Y");
                        //dd($date2);
                        $send_token = $user_token[0]['token'];
                        //dd($send_token);
                        $data = [
                            "enforce_type"=> "UNCLAMPED",
                            "street"=> "",
                            "keyword"=>"",
                            "date_from"=>$date3,
                            "date_to"=> "string"
                        ];
                        $header =$send_token;
                        $this->data1['unclamped']=json_decode($this->to_curl($url, $data, $header));
                        //echo '<pre>'; print_r($data ) ; exit;
                        //dd($data);
                        //dd($this->data1['unclamped']);
                        if (empty($this->data1['unclamped']->response_data)){
                            return view('alerts.unclamped')->with($this->data1);
                        }else{
                            return view('all.all')->with($this->data1);
                        }
                    }

                }
            }
        }










    }

    public function view($id){
        $business_id = $id;
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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
        //dd($this->data);
        return view('attendants.moreAttendant')->with($this->data);
    }
    public function viewday($id){

        $business_id = $id;
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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
        return view('attendants.moreday')->with($this->data);
    }
    public function viewzone($id){
        $business_id = $id;
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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
        return view('attendants.morezones')->with($this->data);
    }
    public function viewstreet($id){
        $business_id = $id;
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
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
        return view('attendants.morestreets')->with($this->data);
    }

    public function history(){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>"string",
            "date_to"=> "string"

        ];
        $header =$send_token;
        $data['unique']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);

        if ($data['unique']->status_code == 200){
            return view('unique.unique')->with($data);
        }else{
            return view('errors.unique')->with($data);
        }
    }

    //plate
    public function plate($id){
        $Re_No = $id;

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetCarProfile';
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
       // dd($this->data);

        return view('history.history')->with($this->data);
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
