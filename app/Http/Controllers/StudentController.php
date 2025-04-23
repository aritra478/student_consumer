<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentApiService;

class StudentController extends Controller
{
    protected $api;

    public function __construct(StudentApiService $api)
    {
        $this->api = $api;
    }

    public function index()
    {
        $students = $this->api->getAll();
        return view('students.index', compact('students'));
    }

    public function show($id)
    {
        $student = $this->api->get($id);
        return view('students.show', compact('student'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $response = $this->api->create($request->all());

        if ($response->failed()) {
            return back()->withErrors($response->json())->withInput();
        }

        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = $this->api->get($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $response = $this->api->update($id, $request->all());

        if ($response->failed()) {
            return back()->withErrors($response->json())->withInput();
        }

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $this->api->delete($id);
        return redirect()->route('students.index');
    }
}
