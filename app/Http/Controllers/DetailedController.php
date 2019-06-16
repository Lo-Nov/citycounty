<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailedController extends Controller
{
    public function sub_county($parameter){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        return $parameter;
    }

    public function dcollections(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $url =  'http://102.133.165.199:8086/api/Parking/GetDetailedParkingEnforcementQueries';
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
        $this->data['dcollections']=json_decode($this->to_curl($url, $data, $header));
        //dd($this->data);
        $this->data1['detailsCollections']= $this->data['dcollections']->response_data;
        //echo '<pre>'; print_r($this->data1['detailsCollections'] ) ; exit;

       //dd( $this->data1['detailsCollections']);
        //return $request->all();
        return view('collection.detailedcollections')->with($this->data1);
    }

    public function detailed(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $url =  'http://102.133.165.199:8086/api/Parking/GetDetailedParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $subcounties = $request->post("subcounties");
        $zones = $request->post("zones");
        $streets = $request->post("streets");
        $agents = $request->post("agents");
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "subcounty"=> $subcounties,
            "zone"=> $zones,
            "page"=> 0,
            "attendant"=> $agents,
            "street"=> $streets,
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate
        ];


        //dd($data);
        $header =$send_token;

        $this->data['filter']=json_decode($this->to_curl($url, $data, $header));
        $this->data1['detailsCollections']= $this->data['filter']->response_data;
        //dd($this->data1['detailsCollections']);
        return view('collection.detailedcollections')->with($this->data1);

//        return view('collection.daterangecollections')->with($this->data1);


    }

    public function detaildate(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $url =  'http://102.133.165.199:8086/api/Parking/GetDetailedParkingEnforcementQueries';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $fromDate=$request->post("fromDate");
        //dd($fromDate);
        $toDate= $request->post('toDate');
        $data = [
            "subcounty"=> "ALL",
            "zone"=> "ALL",
            "attendant"=> 0,
            "street"=> "ALL",
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate,
        ];

        $header =$send_token;
        $this->data['datecollections']=json_decode($this->to_curl($url, $data, $header));
        $this->data1['dateDetailCollections']= $this->data['datecollections']->response_data;
        //dd($this->data1['dateDetailCollections']);

        return view('collection.daterangecollections')->with($this->data1);
    }

    public function waiver(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $url =  'http://102.133.165.199:8086/api/Parking/GetParkingsToEnforce';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "enforce_type"=> "WAIVER",
            "street"=> "",
            "keyword"=> "",
            "comments"=> ""
        ];
        $header =$send_token;
        $this->data['waiver']=json_decode($this->to_curl($url, $data, $header));
        $this->data1['cWaiver']= $this->data['waiver'];
        //dd($this->data1['cWaiver']->message);

        if ($this->data['waiver']->status_code == 200){
            return view('waiver.waiver')->with($this->data1);
        }else{
            return view('waiver.waivererror')->with($this->data1);
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
