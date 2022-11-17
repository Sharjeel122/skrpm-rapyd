<?php

namespace skrpm\rapyd\Controller;

use Illuminate\Http\Request;
use RPM;
use skrpm\rapyd\Helper\Rapyd;
class SkRapydController
{
    public function skRapydResponse($data)
    {
        $method = $data['method'];
        $path = $data['path'];
        $body = $data['body'];

        $rapyd = new Rapyd();
        $rapydBaseData = $rapyd->rapydBaseData($method);

        $rapydBaseData['path'] = $path;
        $rapydBaseData['body'] = $body;

        $rapydSignature = $rapyd->rapydSignature($rapydBaseData);
        $rapydBaseData['bodyString'] = $rapydSignature['bodyString'];

        $signature = $rapydSignature['signature'];

        $rapydBaseData['signature'] = $signature;
        $rapydRequest = $rapyd->rapydRequest($rapydBaseData);


        $rapydBaseData['requestData'] = $rapydRequest;
        $rapydResponse = $rapyd->rapydResponse($rapydBaseData);
        return $rapydResponse;

    }
}
