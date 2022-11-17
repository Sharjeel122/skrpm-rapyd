<?php

namespace skrpm\rapyd\Helper;

use RPM;
use Response;

class Rapyd
{
    public function rapydBaseData($method)
    {
        $rapydCredentials = RPM::getCreds();
        $base_url = $rapydCredentials['base_url'];
        $access_key = $rapydCredentials['access_key'];        // The access key received from Rapyd.
        $secret_key = $rapydCredentials['secret_key'];       // Never transmit the secret key by itself.
        $ewallet = $rapydCredentials['client_ewallet'];

        $salt = random_int(10000000, 99999999); // Randomly generated for each request.
        $idempotency = random_int(10000000, 99999999);
        $date = new \DateTime();
        $timestamp = $date->getTimestamp();     // Current Unix time (seconds).

        return array(
            'method' => $method,
            'base_url' => $base_url,
            'access_key' => $access_key,
            'secret_key' => $secret_key,
            'salt' => $salt,
            'timestamp' => $timestamp,
            'idempotency' => $idempotency,
            'ewallet' => $ewallet,
        );
    }

    public function rapydSignature($rapyd)
    {
        $method = $rapyd['method'];
        $salt = $rapyd['salt'];
        $timestamp = $rapyd['timestamp'];
        $access_key = $rapyd['access_key'];
        $secret_key = $rapyd['secret_key'];
        $base_url = $rapyd['base_url'];
        $idempotency = $rapyd['idempotency'];
        $ewallet = $rapyd['ewallet'];
        $path = $rapyd['path'];
        $body = $rapyd['body'];

        if ($method === 'post') {
            $body_string = !is_null($body) ? json_encode($body, JSON_UNESCAPED_SLASHES) : '';
            $sig_string = "$method$path$salt$timestamp$access_key$secret_key$body_string";
        } else {
            $body_string = null;
            $sig_string = "$method$path$salt$timestamp$access_key$secret_key";
        }
        $hash_sig_string = hash_hmac("sha256", $sig_string, $secret_key);
        $signature = base64_encode($hash_sig_string);

        return array(
            'signature' => $signature,
            'path' => $path,
            'bodyString' => $body_string
        );

    }

    public function rapydRequest($rapyd)
    {
        $fullPath = $rapyd['base_url'] . $rapyd['path'];
        $request_data = NULL;

        if ($rapyd['method'] === 'post') {

            $request_data = array(
                CURLOPT_URL => "$fullPath",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $rapyd['bodyString']
            );
        } else {
            $request_data = array(
                CURLOPT_URL => "$fullPath",
                CURLOPT_RETURNTRANSFER => true,
            );
        }
        return $request_data;
    }

    public function rapydResponse($rapyd)
    {
        $request_data = $rapyd['requestData'];
        $access_key = $rapyd['access_key'];
        $salt = $rapyd['salt'];
        $timestamp = $rapyd['timestamp'];
        $signature = $rapyd['signature'];
        $idempotency = $rapyd['idempotency'];
        $curl = curl_init();
        curl_setopt_array($curl, $request_data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "access_key: $access_key",
            "salt: $salt",
            "timestamp: $timestamp",
            "signature: $signature",
            "idempotency: $idempotency"
        ));

        $response = curl_exec($curl);
        $data = json_decode($response);
        return $data;
    }

}
