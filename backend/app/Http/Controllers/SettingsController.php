<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderJob;
use App\Mail\Gmail;
use App\Models\User;
use App\Notifications\MotivationReminder;
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
        return view('settings.notification');
    }

    public function notificationSave(Request $request)
    {
        $input = $request->except('_token');
        $this->settings->set($input)->save();
        return redirect(route('settings.notification'));
    }

    public function reminderTest(Request $request, Schedule $schedule)
    {
        $user = User::find(4);
        if ($user == null) {
            $user = new User();
            $user->token_fcm = $request->tokenFCM;
        }
        if ($user != null && $user->token_fcm == null) {
            $user->token_fcm = $request->tokenFCM;
        }
//        $schedule->job(SendReminderJob::class, 'default', 'database')->cron("*/5 * * * * *");
        $user->notify(new MotivationReminder);
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
