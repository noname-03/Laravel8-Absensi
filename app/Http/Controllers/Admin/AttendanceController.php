<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\ClassEducation;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('admin.attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = ClassEducation::all();
        $user = User::where('role', 'mahasiswa')->get();
        // dd($user);
        // $activeOrders = Order::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        return view('admin.attendance.create', compact('class', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->status[0]);
        for ($i = 0; $i < count($request->user_id); $i++) {

            // $user = $request->user_id;
            // dd($user);
            $attendances = new Attendance;
            $attendances->user_id = $request->user_id[$i];
            $attendances->status = $request->status[$i];
            $attendances->pertemuan = $request->pertemuan;
            $attendances->class_education_id = $request->class_education_id;
            $attendances->save();
        }
        return redirect()->route('admin.attendances.index');
        // for ($i = 0; $i < count($idm); $i++) {

        //     $data = array(
        //         'id_jadwal' => $idj,
        //         'id_mahasiswa' => $idm[$i],
        //         'pertemuan' => $pertemuan,
        //         'tgl' => $tgl,
        //         'absensi' => $absensi[$i]
        //     );
        //     $this->load->model('M_Absensi');
        //     $this->M_Absensi->input_Absensi_mahasiswa($data, 'tbl_absensi');
        // }
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
        $attendances = Attendance::findOrFail($id);
        $class = ClassEducation::all();
        $user = User::where('role', 'mahasiswa')->get();
        return view('admin.attendance.edit', compact('attendances', 'class', 'user'));
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
        $attendances = Attendance::findOrFail($id);
        $attendances->update($request->all());
        return redirect()->route('admin.attendances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendances = Attendance::findOrFail($id);
        $attendances->delete();
        return redirect()->route('admin.attendances.index');
    }
}
