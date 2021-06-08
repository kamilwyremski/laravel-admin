<?php

namespace App\Util;

use Illuminate\Http\Request;

class CaptchaUtil
{
  public function check(Request $request){

    if(config('services.recaptcha.secret')){

      $url = 'https://www.google.com/recaptcha/api/siteverify';
      $remoteip = $_SERVER['REMOTE_ADDR'];
      $data = [
        'secret' => config('services.recaptcha.secret'),
        'response' => $request->get('recaptcha'),
        'remoteip' => $remoteip
      ];
      $options = [
          'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
          ]
      ];
      $context = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      $resultJson = json_decode($result);
      if ($resultJson->success != true) {
        return false;
      }
      if ($resultJson->score >= 0.3) {
        return true;
      } else {
        return false;
      }
    }else{
      return true;
    }
  }
}