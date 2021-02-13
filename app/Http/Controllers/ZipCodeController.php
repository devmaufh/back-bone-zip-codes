<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZipCode\ZipCodeStoreRequest;
use App\Services\ZipCodeService;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    protected $service;

    /**
     * Constructor
     * @param ZipCodeService $service
     */
    public function __construct(ZipCodeService $service) {
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
        return response()->json($this->service->get($perPage));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZipCodeStoreRequest $request)
    {
        return response()->json($this->service->store(
            $request->only(
                'locality','zip_code','municipality','federal_entity',
            )
        ),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->service->searchByZipCode($id),200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json($this->service->update($id,
            $request->only(
                'locality','zip_code','municipality','federal_entity',
            )
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->service->delete($id));
    }
}
