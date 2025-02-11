<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:groups|max:255',
            'description' => 'nullable',
        ]);
        // if ($validator->fails()) {
        //     dd($validator->errors(), $request->all());
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        Group::create($request->all());
        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    public function show(Group $group)
    {
        $groupData =Group::where('id', $group->id)->first();
        $userData = User::all();
        $userListData = User::where('group_id',$group->id)->get();
        return view('admin.groups.show', compact('groupData','userData','userListData'));
    }

    public function edit(Group $group)
    {
        $userData = User::all();    
        return view('admin.groups.edit', compact('group','userData'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|max:255|unique:groups,name,' . $group->id,
            'description' => 'nullable',
        ]);
        $group->update($request->all());
        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }

    public function storeUsersGroup(Request $request) 
    {
        if ($request->usersGroup) {
            foreach($request->usersGroup as $userData) {
                // dd($request);
                $user = User::findOrFail($userData);
                $groupData = $user->update([
                    'group_id' => $request->group_id
                ]);
            }
            return redirect()->route('groups.store.users')->with('success', 'Group updated successfully.');
        }
    }
}
