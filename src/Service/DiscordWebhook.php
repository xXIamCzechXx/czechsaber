<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

class DiscordWebhook {

    /**
     * @var string
     */
    private $url;

    protected function sendMessage($url = '', JsonResponse $data)
    {
        if(!empty($data)) {
            $ch = curl_init($url);
            $msg = "payload_json=" . urlencode(json_encode($data))."";

            if(isset($ch)) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);

                return $result;
            }
        }
    }
}