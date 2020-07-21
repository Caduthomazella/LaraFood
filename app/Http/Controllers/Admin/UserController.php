<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $profile)
    {
        $this->repository = $profile;
    }

    public function index()
    {
        $users = $this->repository->paginate();

        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create'); 
    }

    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;
        

        $this->repository->create($data);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.show', compact('profile'));
    }

    public function edit($id)
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.edit', compact('profile'));
    }

    public function update(StoreUpdateUser $request, $id)
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->update($request->all());
        
        return redirect()->route('users.index');         
    }

    public function destroy($id)
    {
        if(!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->delete();
        
        return redirect()->route('users.index');    
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->repository
                                ->where(function($query) use($request){
                                    if($request->filter) {
                                        $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                        $query->orWhere('email', $request->filter);                                       
                                    }
                                })
                                ->paginate();

        return view('admin.pages.users.index', compact('users', 'filters'));
    }
}
