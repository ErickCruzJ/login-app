<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Http\Request\Users\StoreUserRequest;
use App\Http\Request\Users\UpdateUserRequest;
use App\Http\Resorces\UserResource;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index',[
            'users' =>UserResource::collection(
                User::latest()->paginate(10)
            ),
        ]);
    }
    public function create()
    {
        return Inertia::render('Users/Create');
    }
    public function store(StoreUserRequest $request)
    {
        $data = $request->valodated();

        if ($request->hasFile('foto')){
            $data['foto']=$request->file('foto')->store('user','public');
        }

        $data['name']=$data['nombre'].' '.$data['apellido_paterno'];

        User::create($data);

        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        return Inertia::render('Users/Edit',[
            'user' => UserResource::make($user),
        ]);
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if($request->hasFile('foto')){
            if($user->foto){
                Storage::disk('public')->delete($user->foto);
            }
            $data['foto']=$request->file('foto')->store('users','public');
        }
        $data['name']=$data['nombre'].' '. $data['apellido_paterno'];
        $user->update($data);
        return redirect()->route('user.index');

        public function destroy (User $user)
        {
            if($user->foto){
                Storage::disk('public')->delete($user->foto);
            }
            $user->delete();
            return back();
        }
    }

}
