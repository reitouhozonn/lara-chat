<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupPost;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('groups.create', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GroupPost $request
     * @return void
     */
    public function store(GroupPost $request)
    {
        $group = Group::createGroupFromGroupPost($request);
        return redirect()->route('groups.show', [
            'group' => $group->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        if (!Auth::user()->belongsToGroup($group->id)) {
            return redirect('/');
        }
        return view('groups.show', [
            'group' => $group,
            'groupMessages' => $group->messages,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        return view('groups.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group $group)
    {
        return redirect('/groups/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        return redirect('dashboard');
    }
}
