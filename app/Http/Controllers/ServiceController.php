<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::All();
        return view('services.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion = request()->validate([
            'servicio' => 'required',
            'precio' => 'required'
        ]);

        if (isset($validacion)) {
            $service = new Service();
            $service->servicio = $request->servicio;
            $service->precio = $request->precio;

            $fotografia = $request->file('foto');
            $fotografia->move('img', $fotografia->getClientOriginalName());
            $service->foto = $fotografia->getClientOriginalName();

            $service->sitio_id = $request->sitio_id;
            $service->save();
            session()->flash('message', 'Servicio creado a satisfaccion!!');
            return redirect()->route('service.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
