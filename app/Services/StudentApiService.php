<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StudentApiService
{
    protected $api;

    public function __construct()
    {
        $this->api = config('services.api.url');
    }

    public function getAll()
    {
        return Http::get("$this->api/student-crud")->json();
    }

    public function get($id)
    {
        return Http::get("$this->api/student-crud/$id")->json();
    }

    public function create($data)
    {
        return Http::post("$this->api/student-crud", $data);
    }

    public function update($id, $data)
{
    $response = Http::withHeaders([
        'Accept' => 'application/json',
    ])->put("$this->api/student-crud/$id", $data);

    if ($response->failed()) {
        logger()->error('API Update Failed', [
            'url' => "$this->api/student-crud/$id",
            'status' => $response->status(),
            'body' => $response->body(),
            'data_sent' => $data,
        ]);
    }

    return $response;
}


    public function delete($id)
    {
        return Http::delete("$this->api/student-crud/$id");
    }
}
