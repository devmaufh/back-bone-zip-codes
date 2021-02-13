<?php

namespace App\Http\Controllers;

use App\Http\Requests\Municipality\MunicipalityyRequest;
use App\Services\MunicipalityService;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    protected $service;
    /**
     * Constructor
     * @param MunicipalityService $service
     */
    public function __construct(MunicipalityService $service) {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->has('perpage') ? $request->perpage : 10;
        return response()->json($this->service->get($perPage),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipalityyRequest $request)
    {
        return response()->json($this->service->store($request->only('name', 'federal_entity')),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->service->getOne($id),200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipalityyRequest $request, $id)
    {
        return response()->json($this->service->update($id, $request->only('name','federal_entity')),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->service->delete($id),200);
    }
}
