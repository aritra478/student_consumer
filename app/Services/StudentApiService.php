<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StudentApiService
{
    protected $api;

    public function __construct()
    {
        $this->api = config('services.api.url');
        // dd($this->api); // Check the actual URL
    }
    

    public function getAll()
    {
        return Http::timeout(60) // Increase timeout to 60 seconds
            ->get("$this->api/students")
            ->json();
    }

    public function get($id)
    {
        return Http::timeout(60) // Increase timeout to 60 seconds
            ->get("$this->api/students/$id")
            ->json();
    }

    public function create($data)
    {
        return Http::timeout(60) // Increase timeout to 60 seconds
            ->post("$this->api/students", $data);
    }

    public function update($id, $data)
    {
        return Http::timeout(60) // Increase timeout to 60 seconds
            ->put("$this->api/students/$id", $data);
    }

    public function delete($id)
    {
        return Http::timeout(60) // Increase timeout to 60 seconds
            ->delete("$this->api/students/$id");
    }
}
