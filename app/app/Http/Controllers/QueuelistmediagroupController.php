<?php

namespace App\Http\Controllers;

use App\Confirmmediagroup;
// use App\Queuelistmediagroup;
use Illuminate\Http\Request;

class QueuelistmediagroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmmediagroups = Confirmmediagroup::paginate();
        
        return view('queuelistmediagroups.index',compact('confirmmediagroups'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // $queuelistmediagroups = Queuelistmediagroup::paginate(5);
        
        // return view('queuelistmediagroups.index',compact('queuelistmediagroups'))
        //    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('queuelistmediagroups.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'user_fullname' => 'required',
            'user_telnum' => 'required',
            'room_type' => 'required',
            'room_floor' => 'required',
            'room_name' => 'required',
            'book_status' => 'required',
        ]);

        // Queuelistmediagroup::create($request->all());
        // return redirect()->route('queuelistmediagroups.index')
        //                 ->with('success','Booking successfully.');

        $bookId = $request->booking_id;
		Confirmmediagroup::updateOrCreate(['username' => $request->username, 'user_fullname' => $request->user_fullname]);
		// if(empty($request->booking_id))
		// 	$msg = 'Booking entry created successfully.';
		// else
		// 	$msg = 'Booking data is updated successfully';
		// return redirect()->route('queuelistmediagroups.index')->with('success',$msg);
        return response()->json(['success'=>'Booking saved successfully!']);

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
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confirmmediagroup $confirmmediagroup)
    {
        print_r($request->input());
        
        // $request->validate([
        //     'username' => 'required',
        //     'user_fullname' => 'required',
        //     'user_telnum' => 'required',
        //     'room_type' => 'required',
        //     'room_floor' => 'required',
        //     // 'room_name' => 'required',
        //     // 'book_status' => 'required',
        // ]);

        // $confirmmediagroup->update($request->all());

        // return redirect()->route('queuelistmediagroups.index')
        //                 ->with('success','Update booking successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $confirmmediagroups = Confirmmediagroup::find($id);
        // $confirmmediagroups->delete();

        // return redirect('/queuelistmediagroups')->with('success','Data Deleted');
        $confirmmediagroups = Confirmmediagroup::where('id',$id)->delete();
		return Response::json($confirmmediagroups);
    }
}
