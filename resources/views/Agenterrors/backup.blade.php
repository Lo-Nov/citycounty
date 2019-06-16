
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
        //dd($data);

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


        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDashboardData';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
        ];
        $header =$send_token;
        $this->data1['towed']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);

        $url =  'http://www.revenuesure.co.ke:8086/api/Parking/GetDashboardData';
        $user_token=Session::get('resource');
        //dd($user_token);
        $send_token = $user_token[0]['token'];
        //dd($send_token);
        $data = [
            "user_type" => "MANAGEMENT",
        ];
        $header =$send_token;
        $this->data1['untowed']=json_decode($this->to_curl($url, $data, $header));
        //echo '<pre>'; print_r($data ) ; exit;
        //dd($data);


        //dd($this->data1);
        return view('all.all')->with($this->data1);
    }


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
        //dd($data);
