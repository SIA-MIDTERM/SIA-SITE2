<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request; 
use App\Traits\ApiResponser;
use App\Models\User; 

class TeacherController extends Controller
{
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

// VIEW ALL
    public function getallTeacher()
    {
        $users = User::all();

        return $this->successResponse($users);
    }

// SEARCH BY ID
public function getTeachersID($id)
    { 
    return User::where('teacherid', '=', $id)->get();
    }

// INSERT
public function addTeacher(Request $request)
    {
        $rules = [
            $this->validate($request, [
                'lastname' => 'required|alpha:max:50',
                'firstname' => 'required|alpha:max:50',
                'middlename' => 'required|alpha:max:50',
                'bday' => 'date',
                'age' => 'required|integer|min:18'
            ])  
        ];
        $this->validate($request, $rules);
        $user = User::create($request->all());
        
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

// UPDATE
public function updateTeachersInfo(Request $request, $id)
    {
        $rules = [
            $this->validate($request, [
                'lastname' => 'required|alpha:max:50',
                'firstname' => 'required|alpha:max:50',
                'middlename' => 'required|alpha:max:50',
                'bday' => 'date',
                'age' => 'required|integer|min:18'
            ])  
        ];
        $this->validate($request, $rules);
        $user = User::findOrFail($id);
        $user->fill($request->all());

        $user->save();

        return $user;
    }

// DELETE
public function deleteTeacher($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
