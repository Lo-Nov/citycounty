<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FilterController extends Controller
{

//adminhourrange

    public function adminhourrange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter" =>"HOURS",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];
        //dd($data);
        $header =$send_token;
        $this->data['hourfilter']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['hourfilter']);

        return view('hour.adminhourfilter')->with($this->data);
    }
    public function hourrange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter" =>"HOURS",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];
        //dd($data);
        $header =$send_token;
        $this->data['hourfilter']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['hourfilter']);

        return view('hour.hourfilter')->with($this->data);
    }
//admindayrange

public  function admindayrange(Request $request){

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter" =>"DAYS",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];
        //dd($data);
        $header =$send_token;
        $this->data['dayfilter']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['dayfilter']);

        return view('daily.admindaily')->with($this->data);
    }
public  function dayrange(Request $request){

    $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
    $user_token=Session::get('resource');
    //dd($user_token);
    $send_token = $user_token[0]['token'];
    //dd($send_token);
    $fromDate=$request->post("fromDate");
    $toDate= $request->post('toDate');
    $data = [
        "user_type" => "MANAGEMENT",
        "page_data_filter" =>"DAYS",
        'date_from' =>  $fromDate,
        'date_to' =>  $toDate,
    ];
    //dd($data);
    $header =$send_token;
    $this->data['dayfilter']=json_decode($this->to_curl($url,$data,$header));
    //echo '<pre>'; print_r($data ) ; exit;
    //dd($this->data['dayfilter']);

    return view('daily.daily')->with($this->data);
}
//adminzonerange
public function adminzonerange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter" =>"ZONES",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];
        //dd($data);
        $header =$send_token;
        $this->data['zonefilter']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['zonefilter']);
        return view('location.adminlocation')->with($this->data);

    }
public function zonerange(Request $request){
    $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
    $user_token=Session::get('resource');
    //dd($user_token);
    $send_token = $user_token[0]['token'];
    //dd($send_token);
    $fromDate=$request->post("fromDate");
    $toDate= $request->post('toDate');
    $data = [
        "user_type" => "MANAGEMENT",
        "page_data_filter" =>"ZONES",
        'date_from' =>  $fromDate,
        'date_to' =>  $toDate,
    ];
    //dd($data);
    $header =$send_token;
    $this->data['zonefilter']=json_decode($this->to_curl($url,$data,$header));
    //echo '<pre>'; print_r($data ) ; exit;
    //dd($this->data['zonefilter']);
    return view('location.location')->with($this->data);

}
//streetrangeadmin
public function streetrangeadmin(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "user_type" => "MANAGEMENT",
            "page_data_filter" =>"STREETS",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];
        //dd($data);
        $header =$send_token;
        $this->data['streetfilter']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['zonefilter']);
        return view('street.admstreet')->with($this->data);

    }

public function streetrange(Request $request){
    $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingEnforcementQueries';
    $user_token=Session::get('resource');
    //dd($user_token);
    $send_token = $user_token[0]['token'];
    //dd($send_token);
    $fromDate=$request->post("fromDate");
    $toDate= $request->post('toDate');
    $data = [
        "user_type" => "MANAGEMENT",
        "page_data_filter" =>"STREETS",
        'date_from' =>  $fromDate,
        'date_to' =>  $toDate,
    ];
    //dd($data);
    $header =$send_token;
    $this->data['streetfilter']=json_decode($this->to_curl($url,$data,$header));
    //echo '<pre>'; print_r($data ) ; exit;
    //dd($this->data['zonefilter']);
    return view('street.street')->with($this->data);

}

public function cStreetrange(Request $request){
    $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetCollection';
    $user_token=Session::get('resource');
    //dd($user_token);
    $send_token = $user_token[0]['token'];
    //dd($send_token);
    $fromDate=$request->post("fromDate");
    $toDate= $request->post('toDate');
    $data = [
        "page_data_filter" =>"STREETS",
        'date_from' =>  $fromDate,
        'date_to' =>  $toDate,
    ];
    //dd($data);
    $header =$send_token;
    $this->data['cStreetrange']=json_decode($this->to_curl($url,$data,$header));
    //echo '<pre>'; print_r($data ) ; exit;
   // dd($this->data['cStreetrange']);

    $this->data1['sRange']= $this->data['cStreetrange']->response_data;
    //dd($this->data1['sRange']);

    return view('cstreet.cstreet')->with($this->data1);
}

public function cZonerange(Request $request){
    $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetCollection';
    $user_token=Session::get('resource');
    //dd($user_token);
    $send_token = $user_token[0]['token'];
    //dd($send_token);
    $fromDate=$request->post("fromDate");
    $toDate= $request->post('toDate');
    $data = [
        "page_data_filter" =>"ZONES",
        'date_from' =>  $fromDate,
        'date_to' =>  $toDate,
    ];
    //dd($data);
    $header =$send_token;
    $this->data['cZonerange']=json_decode($this->to_curl($url,$data,$header));
    //echo '<pre>'; print_r($data ) ; exit;
    //dd($this->data['cStreetrange']);

    $this->data1['zRange']= $this->data['cZonerange']->response_data;
   // dd($this->data1['zRange']);

    return view('czones.czones')->with($this->data1);
}
public function fVehicles(Request $request){
    $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetCollection';
    $user_token=Session::get('resource');
    //dd($user_token);
    $send_token = $user_token[0]['token'];
    //dd($send_token);
    $fromDate=$request->post("fromDate");
    $toDate= $request->post('toDate');
    $data = [
        "page_data_filter" =>"VEHICLECATEGORIES",
        'date_from' =>  $fromDate,
        'date_to' =>  $toDate,
    ];
    //dd($data);
    $header =$send_token;
    $this->data['carRange']=json_decode($this->to_curl($url,$data,$header));
    //echo '<pre>'; print_r($data ) ; exit;
    //dd($this->data['cStreetrange']);

    $this->data1['vRange']= $this->data['carRange']->response_data;
    //dd($this->data1['vRange']);

    return view('vFilter.vehicleFilter')->with($this->data1);
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
