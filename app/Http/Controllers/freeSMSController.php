<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

define("SERVER", "https://admin.freesms.vn");
define("API_KEY", "c0a3bb01b315a6039fb7276d106d808213fa870a");

define("USE_SPECIFIED", 0);
define("USE_ALL_DEVICES", 1);
define("USE_ALL_SIMS", 2);
class freeSMSController extends Controller
{
    public function index() {
        return 'run';
    }

    public function sendSingleMessage($number, $message, $device = 0, $schedule = null, $isMMS = false, $attachments = null)
    {
        $url = SERVER . "/services/send.php";
        $postData = array(
            'number' => $number,
            'message' => $message,
            'schedule' => $schedule,
            'key' => API_KEY,
            'devices' => $device,
            'type' => $isMMS ? "mms" : "sms",
            'attachments' => $attachments
        );
        return $this->sendRequest($url, $postData)["messages"][0];
    }

    private function sendRequest($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);
        if ($httpCode == 200) {
            $json = json_decode($response, true);
            if ($json == false) {
                if (empty($response)) {
                    throw new Exception("Missing data in request. Please provide all the required information to send messages.");
                } else {
                    throw new Exception($response);
                }
            } else {
                if ($json["success"]) {
                    return $json["data"];
                } else {
                    throw new Exception($json["error"]["message"]);
                }
            }
        } else {
            throw new Exception("HTTP Error Code : {$httpCode}");
        }
    }
}
