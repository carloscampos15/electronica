<?php

namespace App\Http\Controllers;

use App\Device;
use App\Dump;
use Illuminate\Http\Request;
use App\Http\Requests\DumpRequest;

class DumpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dumps = Dump::all();
        return view('dumps.index', ['dumps' => $dumps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devices = Device::all();
        $devicesResponse = [];
        for($i = 0 ; $i < count($devices) ; $i++){
            if(!$devices[$i]->dump){
                $devicesResponse[] = $devices[$i];
            }
        }
        return view('dumps.create', ['devices' => $devicesResponse]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DumpRequest $request)
    {
        $input = $request->all();
        $dump = new Dump();
        $dump->fill($input);
        $dump->save();

        return redirect()->route('dump.index')->withStatus(__('Dump successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dump  $dump
     * @return \Illuminate\Http\Response
     */
    public function show(Dump $dump)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dump  $dump
     * @return \Illuminate\Http\Response
     */
    public function edit(Dump $dump)
    {
        $devices = Device::all();
        for($i = 0 ; $i < count($devices) ; $i++){
            if($devices[$i]->dump && $devices[$i]->dump->id != $dump->id){
                unset($devices[$i]);
            }
        }
        return view('dumps.edit', ['dump' => $dump, 'devices' => $devices]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dump  $dump
     * @return \Illuminate\Http\Response
     */
    public function update(DumpRequest $request, Dump $dump)
    {
        $input = $request->all();
        $dump->fill($input);
        $dump->save();
        return redirect()->route('dump.index')->withStatus(__('Dump successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dump  $dump
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dump $dump)
    {
        $dump->delete();

        return redirect()->route('dump.index')->withStatus(__('Dump successfully deleted.'));
    }
}
