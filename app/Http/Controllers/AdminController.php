<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::get();
        return view('admin.admin',[
            'tickets' => $tickets
        ]);
    }

    public function report()
    {
        $tickets = Ticket::get();
        return view('admin.laporan',[
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('admin.admin-edit',[
            'ticket' => $ticket
        ]);
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
        $currentTicket = Ticket::findOrFail($id);
        $rules = [
            'name' => 'required',
            // 'email' => 'required|email|unique:tickets,email',
            // 'phone' => 'required|unique:tickets,phone',
            'type' => 'required',
            'price' => 'required',
        ];

        if($request->email != $currentTicket->email){
            $rules['email'] = 'required|email|unique:tickets,email';
        }

        if($request->phone != $currentTicket->phone){
            $rules['phone'] = 'required|unique:tickets,phone';
        }

        $validatedData = $request->validate($rules);
       

        Ticket::where('id',$id)
            ->update($validatedData);

        return redirect('/home')->with('success','Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);

        return redirect('/home')->with('success','Daftar pemesan berhasil dihapus');
    }
}
