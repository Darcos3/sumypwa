<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function index(Request $request){
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us12'
        ]);

        $response = $mailchimp->lists->getListMembersInfo('37abae7461');

        
        $email = $request['email'];
        // dd(count($response->members));
        
        if(count($response->members) >0){
            foreach($response->members as $key => $value){

                if( $value->email_address == $email){
                    // dd($response);
                    $estado = true;
                    return view('frontend.subscrito', compact('email', 'estado'));
                }
                else {
                    $response = $mailchimp->lists->addListMember('37abae7461', [
                        'email_address' => $request['email'],
                        'status' => 'subscribed'
                    ]);
                    $estado = false;
                    return view('frontend.subscrito', compact('email', 'estado'));
                }
            }
        }
        else {
            $response = $mailchimp->lists->addListMember('37abae7461', [
                'email_address' => $request['email'],
                'status' => 'subscribed'
            ]);
            $estado = false;
            return view('frontend.subscrito', compact('email', 'estado'));
        }
        

        
    }
}