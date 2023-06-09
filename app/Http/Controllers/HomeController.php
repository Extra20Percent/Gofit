<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {

        return view('home', []);
    }

    public function getDashboard()
    {
        $totalInstructor = User::where(['role' => 'instructor'])->get();
        $totalMember = User::where(['role' => 'member'])->get();
        $totalSchedule = Schedule::get();

        return view('dashboard', [
            'user' => Auth::user(),
            'totalInstructor' => $totalInstructor->count(),
            'totalMember' => $totalMember->count(),
            'totalSchedule' => $totalSchedule->count(),
        ]);
    }

    public function getInstructors(Request $request)
    {
        $instructor = User::where(['role' => 'instructor'])->get();
        if (request('search')) {
            $instructor = User::where('username', 'like', '%' . request('search') . '%')
                ->where('role', 'like', 'instructor')->get();
        }

        return view('instructors', [
            'user' => Auth::user(),
            'instructors' => $instructor,
        ]);
    }

    public function getMembers()
    {
        $members = User::where(['role' => 'member'])->get();
        if (request('search')) {
            $members = User::where('username', 'like', '%' . request('search') . '%')
                ->where('role', 'like', 'member')->get();
        }
        $membership = Membership::get();
        $countMembership = Membership::count();

        return view('members', [
            'user' => Auth::user(),
            'members' => $members,
            'memberships' => $membership,
            'countMembership' => $countMembership,
        ]);
    }

    public function getSchedule()
    {
        return view('schedule', [
            'user' => Auth::user(),
            'schedule' => Schedule::get(),
            'instructors' => User::where(['role' => 'instructor'])->get(),
        ]);
    }
}
