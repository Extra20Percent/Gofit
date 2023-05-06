<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function getAddMembers()
    {
        return view('member.addMembers', [
            'user' => Auth::user(),
        ]);
    }

    public function postAddMembers(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'phone' => 'required|min:10|max:13',
            'address' => 'required|min:5',
        ]);

        User::create([
            'username' => $request->username,
            'role' => 'member',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/members/add');
    }

    public function getDeleteMembers($id)
    {

        $member = User::where(['id' => $id])->first();

        if ($member->role == "member") {
            $member->delete();
        }

        return redirect('/members');
    }

    public function getUpdateMembers($id)
    {
        return view('member.editMembers', [
            'member' => User::where(['role' => 'member', 'id' => $id])->first(),
            'user' => Auth::user(),
        ]);
    }

    public function postUpdateMembers(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required|min:10|max:13',
            'address' => 'required|min:5',
        ]);

        $content = User::where(['role' => 'member', 'id' => $id])->first();

        if ($content->count() <= 0) {
            return redirect('/members')->withErrors("member not registered");
        }

        $content = User::where(['id' => $id])->first();
        $content->phone = $request->phone;
        $content->address = $request->address;
        $content->save();

        return redirect('/members/update/' . $id);
    }

    public function getMembership($id)
    {
        return view('member.addMembership', [
            'member' => User::where(['role' => 'member', 'id' => $id])->first(),
            'user' => Auth::user(),
        ]);
    }

    public function postMembership(Request $request, $id)
    {
        $request->validate([
            'price' => 'required',
        ]);

        $now = Carbon::now();
        if ($request->price == 50000) {
            $expired_on = $now->addMonth();
        } else {
            $expired_on = $now->addYear();
        }

        $content = new Membership;
        $content->subscribed_on = $now->format('Y-m-d H:i:s');
        $content->expired_on = $expired_on->format('Y-m-d H:i:s');
        $content->price = $request->price;
        $content->user_id = $id;
        $content->save();

        return redirect('/members');
    }

    public function getPrintCard($id)
    {
        $member = User::where(['role' => 'member', 'id' => $id])->first();
        $membership = Membership::where(['user_id' => $id])->first();

        return view('member.printCard', [
            'member' => $member,
            'membership' => $membership,
        ]);
    }
}
