<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FederalEntity\StoreFederalEntityRequest;
use App\Services\FederalEntityService;
use Illuminate\Http\Request;

class FederalEntityController extends Controller
{
    protected $service;
    /**
     * Constructor
     * @param FederalEntityService $service
     */
    public function __construct(FederalEntityService $service) {
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
    public function store(StoreFederalEntityRequest $request)
    {
        return response()->json($this->service->store($request->only('name', 'code')),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response($this->service->getOne($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFederalEntityRequest $request, $id)
    {
        return response()->json($this->service->update($id,$request->only('name', 'code')),200);

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
