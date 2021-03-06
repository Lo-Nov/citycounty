<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomLoginController extends Controller
{
    public function nailogin(Request $request){
        $this->url = config('global.url');
        $url=$this->url. '/api/Account/GetToken';

        $username=$request->post("email");
        $password= $request->post('password');
        $data = array(
            'user_name'=>$username,
            'password'=>$password
        );
        //dd($data);
        // echo '<pre>'; print_r($data) ;
        $data = json_decode(stripslashes($this->to_curl($url,$data)));
        //dd($data);

        if (empty($data)) {
            return Redirect::back()->withErrors(['There is a technical error encountered, Please try again ']);
        }else{
            if(!empty($data)) {
                if($data->status_code == 200 && $data->roles == "PARKINGADMIN" or $data->roles == "GOV" or $data->roles == "DEMO"){
                    $product =collect([
                        'is_login'=>1,
                        'test' => $data->username,
                        'token' => $data->token,
                        'roles' => $data->roles,
                        'username' =>$data->username,
                    ]);

                    //dd($product);
                    Session::push('resource', $product);
                    return redirect()->route('dashboard');

                }elseif ($data->status_code ==200 && $data->roles=="UBPADMIN"){

                    $product =collect([
                        'is_login'=>1,
                        'test' => $data->username,
                        'token' => $data->token,
                        'roles' => $data->roles,
                        'username' =>$data->username,
                    ]);
                    Session::flush();

                    Session::push('resource', $product);
                    return redirect()->route('permits');

                }else{
                    return Redirect::back()->withErrors(['Your username or password incorrect. Please try again', 'The Message']);
                }
            }
        }
    }

    function to_curl($url, $data)
    {

        $headers = array
        (
            'Content-Type: application/json',
            'Content-Length: ' . strlen( json_encode($data) )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST" );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers );

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $output = curl_exec($ch);
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
