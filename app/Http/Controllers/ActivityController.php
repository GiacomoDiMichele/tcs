<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Helpers\Acl;
use App\Helpers\Helper;

class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        $activity = Activity::find(1);
        $data = [
            'activities' => $activities,
            'activity' => $activity,
        ];
        return view('activities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
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
            'code_activity' => 'required|unique:activities',
            'name' => 'required',
            'description' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $form_data = $request->all();
        $new_relation = new Activity();
        $new_relation->fill($form_data);
        $new_relation->save();

        return redirect()->route('activities.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);
        return $activity;
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
    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);
            $fields_data = [
                'code_activity'=>$request->code_activity,
                'name'=>$request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'is_active' => $request->is_active,
            ];

            $activity->update($fields_data);

            return redirect(route('activities.index'));
    }


    public function delete(Request $request){

            $activity = Activity::find($request->id);
            $activity->delete();

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listDataTable(): \Illuminate\Http\JsonResponse
    {

        return datatables(Activity::query())->make(true);
    }

    public function listDataTableFiltered($isActive): \Illuminate\Http\JsonResponse
    {
        $isActive = $isActive == 'true' ? 1 : 0;
        $query = Activity::where('is_active', $isActive);
        return datatables($query)->make(true);
    }
}
