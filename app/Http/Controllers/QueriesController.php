<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QueriesController extends Controller
{
    public function filtercompliant(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';
        //$keyword = $request->keyword;
        //return $keyword;

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            "enforce_type"=> "PAID",
            "street"=> "",
            "keyword"=>"",
            "page"=>1,
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
       //dd($data);

        $this->data1['compliant']=json_decode($this->to_curl($url, $data, $header));

        $this->data['compliant']=$this->data1['compliant']->response_data;
        //dd($this->data['compliant']);

        if (empty( $this->data['compliant']->paginatedList)){
            return view('compliant.compliant')->with($this->data);
        }else{
            if (!empty($this->data['compliant']->paginatedList)){
                return view('compliant.compliant')->with($this->data);
            }
        }
    }
    public function filternoncompliant(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        //$id = $request->keyword;
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';


        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            "enforce_type"=> "CLAMP",
            "street"=> "",
            "keyword"=>"",
            "page"=>0,
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data1['noncompliant']=json_decode($this->to_curl($url, $data, $header));

        $this->data['noncompliant']=$this->data1['noncompliant']->response_data;
        //dd($this->data['noncompliant']);

        if (empty( $this->data['noncompliant']->paginatedList)){
            return redirect()->back();
        }else{
            if (!empty($this->data['noncompliant']->paginatedList)){
                return view('noncompliant.noncompliant')->with($this->data);
            }
        }

    }
    public function filterclamped(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        //$id = $request->keyword;
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            "enforce_type"=> "CLAMPED",
            "street"=> "",
            "keyword"=>"",
            "page"=>0,
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;

        //dd($data);
        $this->data1['clamped']=json_decode($this->to_curl($url, $data, $header));
       //dd($this->data['clamped']);
        $this->data['clamped']= $this->data1['clamped']->response_data;
        //dd( $this->data['clamped']);
        //return $request->all();

        if (empty( $this->data['clamped']->paginatedList)){
            return redirect()->back();
        }else{
            if (!empty($this->data['clamped']->paginatedList)){
                return view('clamped.clamped')->with($this->data);
            }
        }

    }
    public function filtertounclamp(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            "enforce_type"=> "UNCLAMP",
            "street"=> "",
            "keyword"=>"",
            "page"=>0,
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data1['tounclamp']=json_decode($this->to_curl($url, $data, $header));
        $this->data['tounclamp']= $this->data1['tounclamp']->response_data;

        //dd($this->data['tounclamp']);
        if (empty( $this->data['tounclamp']->paginatedList)){
            return view('tounclamp.tounclamp')->with($this->data);
        }else{
            if (!empty($this->data['tounclamp']->paginatedList)){
                return view('tounclamp.tounclamp')->with($this->data);
            }
        }

    }
    public function filterunclamped(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            "enforce_type"=> "UNCLAMPED",
            "street"=> "",
            "keyword"=>"",
            "page"=>0,
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data1['unclamped']=json_decode($this->to_curl($url, $data, $header));
        // dd($this->data['unclampedRange']);
        $this->data['unclamped']= $this->data1['unclamped']->response_data;

        //dd($this->data['unclamped']);
        if (empty( $this->data['unclamped']->paginatedList)){
            return view('unclamped.unclamped')->with($this->data);
        }else{
            if (!empty($this->data['unclamped']->paginatedList)){
                return view('unclamped.unclamped')->with($this->data);
            }
        }
    }
    public function filteroffstreet(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            "enforce_type"=> "PAID",
            "street"=> "",
            "keyword"=>"",
            "page"=>0,
            "duration_code_filter"=> "HOURLY",
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data1['offstreet']=json_decode($this->to_curl($url, $data, $header));
        // dd($this->data['offstreet']);
        $this->data['offstreet']= $this->data1['offstreet']->response_data;

        //dd($this->data['offstreet']);
        if (empty( $this->data['offstreet']->paginatedList)){
            return view('offstreet.offstreet')->with($this->data);
        }else{
            if (!empty($this->data['offstreet']->paginatedList)){
                return view('offstreet.offstreet')->with($this->data);
            }
        }
    }
    public function filterqueries(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetDetailedParkingEnforcementQueries';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        //$subcounties = $request->post("subcounties");
        $zones = $request->post("zones");
        $streets = $request->post("streets");
        $agents = $request->post("agents");
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "zone"=> $zones,
            "page"=> 0,
            "attendant"=> $agents,
            "street"=> $streets,
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate
        ];
        //dd($data);
        $header =$send_token;
        $this->data1['queries']=json_decode($this->to_curl($url, $data, $header));
        $this->data['queries']= $this->data1['queries']->response_data;
        //dd($this->data1['queries']);
        return view('queries.queries')->with($this->data);
        //return view('collection.daterangecollections')->with($this->data1);
    }
    public function filterwaiver(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Parking/GetParkingsToEnforcePaginated';
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "WAIVER",
            "street"=> "",
            "keyword"=>"",
            "page"=> 1,
            "date_from"=>$fromDate,
            "date_to"=> $toDate
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
