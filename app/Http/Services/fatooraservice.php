<?php
namespace App\Http\Services;

use GuzzleHttp\Client;

class FatooraServices
{
    private $base_url;
    private $headers;
    private $request_client;


    /**
     * Fatoora service constructor
     * @param Client $request_client
     */
    public function __construct(Client $request_client){
        $this->request_client = $request_client;
        $this->base_url  = config('fatoorah.fatoora_base_url');
        $this->headers =[
            'Content-type'=>'application/json',
            'authoriazation'=>'Bearer'.config('fatoorah.fatoorah_token')
        ];
    }

    public function makeRequest($url, $method = 'GET', $data = [])
    {
        try {
            // إرسال الطلب باستخدام Guzzle
            $response = $this->request_client->request($method, $this->base_url . $url, [
                'headers' => $this->headers,
                'json' => $data
            ]);

            // إرجاع محتوى الاستجابة
            return $response->getBody()->getContents();

        } catch (\Exception $e) {
            // التعامل مع الأخطاء
            return ['error' => 'Request failed', 'message' => $e->getMessage()];
        }
    }
    


}
