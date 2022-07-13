<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\MotivationReminder;
use Arcanedev\LaravelSettings\Contracts\Store;
use Illuminate\Http\Request;

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

    public function reminderTest(Request $request)
    {

        $user = User::find(4);
        if ($user == null && $user->token_fcm == null) {
            $user->token_fcm = $request->tokenFCM;
        }
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

    public function emailSave(Request $request)
    {
        $input = $request->except('_token');
        $this->settings->set($input)->save();
        return redirect(route('settings.email'));
    }
}