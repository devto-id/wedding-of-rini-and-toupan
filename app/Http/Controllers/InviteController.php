<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileBrides;
use App\Models\ParentsOfBrides;
use App\Models\Rundown;
use App\Models\Background;
use App\Models\Visitor;
use App\Models\Feedback;
use Carbon\Carbon;


class InviteController extends Controller
{
    public function cover()
    {
        $profile = ProfileBrides::find(1);
        $rundown = Rundown::find(1);

        $date = $rundown->start_date;

        return view('home.cover', [
            'profile' => $profile,
            'date' => $date,
            'backgrounds' => Background::all(),
            'visitor' => Visitor::all(),
        ]);
    }

    public function coverSlug($name)
    {
        $visitor = Visitor::where('name', $name)->first();
        $profile = ProfileBrides::find(1);
        $rundown = Rundown::find(1);

        $date = $rundown->start_date;

        return view('home.coverslug', [
            'profile' => $profile,
            'date' => $date,
            'visitor' => $visitor,
        ]);

        return abort(404);
    }

    public function index()
    {
        $profile = ProfileBrides::find(1);
        $rundown = Rundown::find(1);
        $parent = ParentsOfBrides::find(1);

        $date = $rundown->start_date;
        return view('home.index', [
            'profile' => $profile,
            'parent'=> $parent,
            'rundown' => $rundown,
            'date' => $date,
            'backgrounds' => Background::all(),
            'feedbacks' => Feedback::all()
        ]);
    }

    public function storeFeedback(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'addres' => 'required|string|max:15',
            'presensi' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        // Panggil metode createFeedback dengan data dari formulir
        Feedback::createFeedback(
            $data['name'],
            $data['addres'],
            $data['presensi'],
            $data['message']
        );

        return redirect()->route('invite.feedback.success');
    }

    public function feedback_success()
    {
        return view('home.feedback_success', []);
    }
}
