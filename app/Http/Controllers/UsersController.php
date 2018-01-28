<?php

namespace Librory\Http\Controllers;

use Librory\Models\User;
use Illuminate\Http\Request;
use Librory\Http\Requests\EditMemberRequest;
use Librory\Http\Requests\AddNewMemberRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function allMembers()
    {
        $members = User::members();

        return view('pages.members.all', compact('members'));
    }

    public function addMember()
    {
        return view('pages.members.add');
    }

    public function saveMember(AddNewMemberRequest $request)
    {
        $newMember = User::create($request->except(['_token']));

        return redirect()->route('members.all')
            ->withNotification('Successfully create a new member.');
    }

    public function editMember(User $member)
    {
        return view('pages.members.edit', compact(
            'member'
        ));
    }

    public function updateMember(EditMemberRequest $request, User $member)
    {
        $member->update($request->except(['_token']));

        return redirect()->route('members.all')
            ->withNotification('Successfully updated member profile.');
    }

    public function switchMemberStatus(User $member)
    {
        $member->switchStatus();

        return response()->json([
            'done' => true,
            'id' => $member->id,
            'updatedRow' => view('pages.members.row', compact(
                'member'
            ))->render()
        ]);
    }
}
