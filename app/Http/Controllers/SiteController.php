<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::simplePaginate(3);
        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
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
            'municipio' => 'required',
            'lugar' => 'required',
            'nombre' => 'required'
        ]);

        if (isset($validacion)) {
            $sitio = new Site;
            $sitio->municipio = $request->municipio;
            $sitio->lugar = $request->lugar;
            $sitio->nombre = $request->nombre;
            $sitio->direccion = $request->direccion;
            $sitio->telefono = $request->telefono;
            $sitio->correo = $request->correo;

            $fotografia = $request->file('foto');
            $fotografia->move('img', $fotografia->getClientOriginalName());
            $sitio->foto = $fotografia->getClientOriginalName();

            $sitio->descripcion = $request->descripcion;
            $sitio->tipo_actividad = $request->tipo_actividad;
            $sitio->horario_atencion = $request->horario_atencion;
            $sitio->estado = $request->estado;
            $sitio->save();
            session()->flash('message', 'Sitio creado a satisfaccion!!');
            return redirect()->route('site.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        $services = Service::join("sites", "services.sitio_id", "=", "sites.id")
            ->where("sitio_id", $site->id)
            ->select("services.servicio", "services.precio")
            ->get();
        return view('sites.show', compact('services', 'site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return View('sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $validacion = request()->validate([
            'municipio' => 'required',
            'lugar' => 'required',
            'nombre' => 'required'
        ]);

        if (isset($validacion)) {

            $site->municipio = $request->municipio;
            $site->lugar = $request->lugar;
            $site->nombre = $request->nombre;
            $site->direccion = $request->direccion;
            $site->telefono = $request->telefono;
            $site->correo = $request->correo;

            if (isset($request->foto)) {
                $image_path = public_path() . '/img/' . $site->foto;
                unlink($image_path);

                $fotografia = $request->file('foto');
                $fotografia->move('img', $fotografia->getClientOriginalName());
                $site->foto = $fotografia->getClientOriginalName();
            } else {
                $site->foto = $site->foto;
            }
        }

        $site->descripcion = $request->descripcion;
        $site->tipo_actividad = $request->tipo_actividad;
        $site->horario_atencion = $request->horario_atencion;
        $site->estado = $request->estado;
        $site->save();
        session()->flash('upload', 'Sitio actualizado correctamente!!');
        return redirect()->route('site.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $image_path = public_path() . '/img/' . $site->foto;
        unlink($image_path);
        $site->delete();
        session()->flash('Eliminar', 'Sitio eliminado...');
        return redirect()->route('site.index');
    }
}
