<?php

namespace App\Http\Controllers;

use App\Charts\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PermitsController extends Controller
{
    public function index(){

        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetDashboardTopData';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [];
        $header =$send_token;
        $data['sbp']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
       // dd($data);


        $provisional= $data['sbp']->provisional_licences_revenue;
        $approved = $data['sbp']->approved_licenses_revenue;
        $renewalUbpReg = $data['sbp']->renewal_licenses_applications_count;

        $chart = new Revenue;
        $chart->labels([ 'Provisional', 'Top Ups','Renewal']);

        $dataset = $chart->dataset('', 'bar', [$provisional,$approved,$renewalUbpReg]);
        $dataset->backgroundColor(collect(['#3ae374','#a61f25','#f89b03']));
        //$dataset->color(collect(['#3ae374','#32ff7e']));
        //dd($data);

        return view('sbp.welcome')->with('sbp', ['sbp' => $data['sbp'], 'chart' => $chart]);

        //return view('welcome')->with($data);
    }
    public function newapplications(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetUBPInspections';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'ubpTypeFilter'=>"NEW"
        ];
        $header =$send_token;
        $data['new']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        return view('sbp.new.new')->with($data);


    }
    public function renewals(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetUBPInspections';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'ubpTypeFilter' =>  'RENEWAL',
        ];
        $header =$send_token;
        $this->data['renewal']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['renewal']);

        return view('sbp.renew.renew')->with($this->data);

    }
    public function invoices (){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetUBPInvoices';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [];
        $header =$send_token;
        $data['invoices']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        return view('sbp.invoices.invoices')->with($data);

    }
    public function receipts(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetDashboardTopData';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [];
        $header =$send_token;
        $data['receipts']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);
        return view('sbp.receipts.receipts')->with($data);


    }
    public function summaries(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetUBPInspections';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'ubpTypeFilter' =>  'APPROVED',
        ];
        $header =$send_token;
        $this->data['Approved']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['Approved']);



        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetUBPInspections';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'ubpTypeFilter' =>  'DECLINED',
        ];
        $header =$send_token;
        $this->data['Declined']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['Declined']);



        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetUBPInspections';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'ubpTypeFilter' =>  'REEVALUATION',
        ];
        $header =$send_token;
        $this->data['Re_evaluate']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['Re-evaluate']);



        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetUBPInspections';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'ubpTypeFilter' =>  'PROVISIONAL',
        ];
        $header =$send_token;
        $this->data['Provisional']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['Provisional']);



        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetBusinessesToVerify';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'request_type' => 1,
        ];
        $header =$send_token;
        $this->data['Inspected']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($this->data['Inspected']);


        return view('sbp.collections.collections')->with($this->data);
    }
    public function test($id){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }
        $business_id = $id;
        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetApprovalCheckList?identifier='.$id;

        $user_token=Session::get('resource');
        $data = [];
        $this->data['Collections']=json_decode($this->get_curl($url));
        $this->data1['Collections1']=$this->data['Collections']->response_data;
        //echo '<pre>'; print_r($this->data1['Collections1']) ; exit;
        //dd($this->data1);
        return view('sbp.approve.approve')->with($this->data1);

    }
    public function statechange(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/UpdateInspectionAndApproval';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        $id= $request->post('business_id');
        $actionType="APPROVAL";
        $by=  Session::get('resource')[0]['username'] ;
        $newStatus=$request->post("status");
        $comment= $request->post('comment');
        //dd($send_token);
        $data = [
            'businessId'=>$id,
            'actionType'=>$actionType,
            'actionBy'=>$by,
            'newStatus'=>$newStatus,
            'remarks'=>$comment
        ];
        //dd($data);
        $header =$send_token;
        $data['data']=json_decode($this->to_curl($url,$data,$header));

        //dd($data['data']->status_code);


        if ($data['data']->status_code ==200){
            return Redirect::to('/approve')->with('message' , 'Ship method updated successfully');
        }else{
            return redirect()->back()->with('success');
        }

    }
    public function details(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetDetailedSBPReport';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        $date1=date("m/d/Y");
        //dd($date1);
        //$fromDate=$request->post("fromDate");
        //dd($fromDate);
        //$toDate= $request->post('toDate');
        $data = [
            "subcounty"=> "",
            "inspected_by"=> "",
            "approved_by"=> "",
            "ward"=> "",
            "status"=> "",
            "date_from"=> "string",
            "date_to"=> "string"
        ];
        $header =$send_token;
        //dd($data);
        $this->data['dcollections']=json_decode($this->to_curl($url, $data, $header));

        $this->data1['detailsCollections']= $this->data['dcollections']->response_data;
        //echo '<pre>'; print_r($this->data1['detailsCollections'] ) ; exit;

        //dd( $this->data1['detailsCollections']);
        //return $request->all();
        return view('sbp.detailed.detailed')->with($this->data1);
    }
    public function sbpdetails(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetDetailedSBPReport';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $subcounties = $request->post("subcounties");
        $zones = $request->post("ward");
        $streets = $request->post("approver");
        $agents = $request->post("inspector");
        $fromDate=$request->post("fromDate");
        $toDate= $request->post('toDate');
        $data = [
            "subcounty"=> $subcounties,
            "zone"=> $zones,
            "attendant"=> $agents,
            "street"=> $streets,
            'date_from' =>  $fromDate,
            'date_to' =>  $toDate
        ];


        // dd($data);
        $header =$send_token;
        $this->data['dcollections']=json_decode($this->to_curl($url, $data, $header));
        $this->data1['detailsCollections']= $this->data['dcollections']->response_data;
        //dd($this->data1['detailsCollections']);

        return view('sbp.detailed.detailed')->with($this->data1);

    }
    public function approve(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            return redirect()->route('login');
        }

        $this->url = config('global.url');
        $url=$this->url. 'api/Sbp/GetBusinessesToVerify';

        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            'request_type' => 1,
        ];
        $header =$send_token;
        $data['Inspection']=json_decode($this->to_curl($url,$data,$header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);

        if (empty( $data['Inspection'])){
            return view('sbp.inspected.inspected')->with($data);
        }else{
            if (!empty($data['Inspection'])){
                return view('sbp.inspected.inspected')->with($data);
            }
        }

    }
    function get_curl( $url) {
        // append the header putting the secret key and hash

        $request_headers = array();
        $request_headers[] = "application/json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);

        if (curl_errno($ch))
        {
            print "Error: " . curl_error($ch);
        }
        else
        {
            // Show me the result
            return $output;



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
