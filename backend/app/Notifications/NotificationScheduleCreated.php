<?php

namespace App\Notifications;

use App\Models\JadwalCheckup;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;

class NotificationScheduleCreated extends Notification
{
    use Queueable;

    private $jadwalCheckup;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($jadwalCheckup)
    {
        $this->jadwalCheckup = $jadwalCheckup;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FcmChannel::class];
    }

    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData(['data1' => 'value', 'data2' => 'value2'])
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle('Halo ' . $this->jadwalCheckup->pasien->name . ', Jadwal telah dibuat')
                ->setBody('Jadwal checkup selanjutnya di hari ' . $this->jadwalCheckup->tgl_checkup . ', dengan ' . $this->jadwalCheckup->dokter->name))
            ->setAndroid(
                AndroidConfig::create()
                    ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
                    ->setNotification(AndroidNotification::create()->setColor('#0A0A0A'))
            )->setApns(
                ApnsConfig::create()
                    ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios')));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return string
     */
    public function fcmProject($notifiable, $message)
    {
        // $message is what is returned by `toFcm`
        return 'app'; // name of the firebase project to use
    }
}
