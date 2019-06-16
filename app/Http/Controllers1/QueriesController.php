<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QueriesController extends Controller
{
    public function qRange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDetailedParkingEnforcementQueries';
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
        //dd($data);
        $this->data['qRange']=json_decode($this->to_curl($url, $data, $header));

        $this->data1['queried']= $this->data['qRange']->response_data;
        // dd($this->data1['cZones']->collection_list[0]->par2);
        //dd($this->data1['queried']);

        //return $request->all();
        return view('queried.aQueried')->with($this->data1);


    }

    public function attRange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDetailedParkingEnforcementQueries';
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
        //dd($data);
        $this->data['qRange']=json_decode($this->to_curl($url, $data, $header));

        $this->data1['queried']= $this->data['qRange']->response_data;
        // dd($this->data1['cZones']->collection_list[0]->par2);
        //dd($this->data1['queried']);

        //return $request->all();
        return view('queried.attQueries')->with($this->data1);
    }

    public function pRange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data['pRange']=json_decode($this->to_curl($url, $data, $header));

        if ($this->data['pRange']->status_code == 200){
            return view('paid.pQueried')->with($this->data);
        }else{
            return view('errors.alertpaidQ')->with($this->data);
        }


        //return $request->all();


    }

    public function clampedRange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data['clampedRange']=json_decode($this->to_curl($url, $data, $header));
        //dd($this->data['clampedRange']);
        // $this->data1['paid']= $this->data['pRange']->response_data;
        // dd($this->data1['cZones']->collection_list[0]->par2);

        //return $request->all();

        if ($this->data['clampedRange']->status_code == 200){
            return view('clamped.clampedQuery')->with($this->data);
        }else{
            return view('errors.clampQ')->with($this->data);
        }




    }

    public function clampRange(Request $request){
        //dd($request->all());

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data['clampRange']=json_decode($this->to_curl($url, $data, $header));
        //dd($this->data['clampRange']);

        if ($this->data['clampRange']->status_code == 200){
            return view('unpaid.clampQuery')->with($this->data);
        }else{
            return view('errors.clampError')->with($this->data);
        }
        //return $request->all();

    }

    public function unclampRange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data['unclampRange']=json_decode($this->to_curl($url, $data, $header));
        //dd($this->data['unclampRange']);

        if ($this->data['unclampRange']->status_code == 200){
            return view('dueUnclamp.unclampQuery')->with($this->data);
        }else{
            return view('errors.unclampError')->with($this->data);
        }
        //return $request->all();


    }

    public function unclampedRange(Request $request){
        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetParkingsToEnforce';
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
            "date_from"=>$fromDate,
            "date_to"=> $toDate
        ];
        $header =$send_token;
        //dd($data);
        $this->data['unclampedRange']=json_decode($this->to_curl($url, $data, $header));
       // dd($this->data['unclampedRange']);

        if ($this->data['unclampedRange']->status_code == 200){
            return view('unclamped.unclampedQuery')->with($this->data);
        }else{
            return view('errors.unclampedError')->with($this->data);
        }
        //return $request->all();
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
