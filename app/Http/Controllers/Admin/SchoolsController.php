<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\User;
use App\School;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $schools = School::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('teachers', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orWhere('time_work', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $schools = School::latest()->paginate($perPage);
        }

        return view('admin.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(School $school)
    {

//        $school = School::find($id);
//        foreach ($school->teachers as $teacher) {
//            echo $teacher;
//        }
//        $school = new School();

//        $user = new User();
//        $teachers = User::has('role', '=', '3')->get();
//        $teachers = User::select('id', 'name')->get();
//        $teachers = DB::table('users')
//            ->join('roles');
////        where('role_id', 'LIKE', '3');

//        $teachers = User::where('role_id', 'LIKE', '3');
//            ->join('roles');
//        where('role_id', 'LIKE', '3');
//        $user->roles()->where('role_id','2')->get();
//        $user = User::all();
//        $user->join('roles');
//        $moderators = $user->first()->roles()->where('role_id','2');
//        $moderators = $moderators->pluck('name');

        $users=User::all();
//        $users = users()->get();
        $supervisors = $teachers = $users->pluck('name','id');
        return view('admin.schools.create',compact(['teachers','supervisors']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

//        $requestData = $request->all();
//        School::create($requestData);

//        $category = Category::find(3);
//
//        $product->categories()->detach($category);

//        $school = School::find($id);

//        foreach ($school->teachers as $teacher) {
//            echo $teacher;
//        }
//        dd($request);
//        $requestData = $request->except('teachers');
//        $requestData['teachers']='12';
//        $requestData->teachers()->sync([3]);
//
//        $school = School::create($requestData);
//        dd($request->supervisors);
//        $requestData = $request->all();
//        $school = School::create($requestData);


        $double_roles=array_fill_keys(array_intersect($request->supervisors,$request->teachers),['role_id'=>Role::where('name','Moderator')->value('id')]);
        $supervisors=array_fill_keys($request->supervisors, ['role_id'=>Role::where('name','Moderator')->value('id')]);
        $teachers=array_fill_keys($request->teachers, ['role_id'=>Role::where('name','School_Master')->value('id')]);
//        $productIds = [
//            1 => [
//                'role_id' => 1,
//            ]
//        ];
        $school = School::create($request->except('supervisors','teachers'));


        $school->supervisors()->sync($supervisors);
        $school->teachers()->syncWithoutDetaching($teachers);
        if(!empty($double_roles)) {
            $school->supervisors()->attach($double_roles);
        }

//        $string='';
//        foreach($request->supervisors as $s) {
//            $string .=  $s.',';
//        }


//        foreach ($your_array as $value){
//            $string .=  $value.',';
//        }

//     role_id - дополнительний параметр роль_ід для сінк должен бить..

//        $user->roles()->sync([1 => ['expires' => true], 2, 3]);
//        foreach ($requestData->teachers as $teacher) {
//            $school->assignRole($teacher);
//        }

        return redirect('admin/schools')->with('flash_message', 'School added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $school = School::findOrFail($id);

        return view('admin.schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);

        return view('admin.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $school = School::findOrFail($id);
        $school->update($requestData);

        return redirect('admin/schools')->with('flash_message', 'School updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        School::destroy($id);

        return redirect('admin/schools')->with('flash_message', 'School deleted!');
    }
}
