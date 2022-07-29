<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderJob;
use App\Mail\Gmail;
use App\Models\Motivasi;
use App\Models\User;
use App\Notifications\MotivationReminder;
use App\Notifications\NotificationCheckup;
use Arcanedev\LaravelSettings\Contracts\Store;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use InfyOm\Generator\Utils\ResponseUtil;

class SettingsController extends Controller
{
    private $settings;

    public function __construct(Store $store)
    {
        $this->settings = $store;
    }

    public function notification()
    {
        $users = User::all();
        return view('settings.notification')->with('users', $users);
    }

    public function notificationSave(Request $request)
    {
        $input = $request->except('_token');
        $this->settings->set($input)->save();
        return redirect(route('settings.notification'));
    }

    public function notificationTest(Request $request)
    {
        $user = new User();
        $user->token_fcm = $request->tokenFCM;
        $user->notify(new NotificationCheckup($request->notifTitle, $request->notifContent));
    }

    public function reminderTest(Request $request, Schedule $schedule)
    {
        $user = new User();
        $user->token_fcm = $request->tokenFCM;
        $user->notify(new MotivationReminder(Motivasi::all()));
    }

    public function reminderSave(Request $request)
    {
        $input = $request->except('_token');
        $this->settings->set($input)->save();
        return redirect(route('settings.reminder'));
    }

    public function reminder()
    {
        $this->settings->set('reminder_');
        return view('settings.reminder');
    }

    public function email()
    {
        return view('settings.email');
    }

    public function emailTest(Request $request, Schedule $schedule)
    {
        if ($request->email == null) {
            return Response::json(ResponseUtil::makeResponse("Failed Send Email Test", []));
        }
//        $schedule->job(SendReminderJob::class, 'default', 'database')->cron("*/5 * * * * *");
        $details = [
            'title' => 'Thank you for subscribing to my newsletter',
            'body' => 'You will receive a newsletter every Fourth Friday of the month'

        ];
        Mail::to($request->email)->send(new Gmail($details));
        return Response::json(ResponseUtil::makeResponse("Success Send Email Test", []));

    }

    public function emailSave(Request $request)
    {
        $input = $request->except('_token');
        $this->settings->set($input)->save();
        return redirect(route('settings.email'));
    }
}
