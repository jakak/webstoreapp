<?php

namespace App\Observers;

use App\MailSetting;

class MailSettingObserver
{
    /**
     * Handle the mail setting "created" event.
     *
     * @param MailSetting $mailSetting
     * @return void
     */
    public function created(MailSetting $mailSetting)
    {
        MailSetting::flushCache();
    }

    /**
     * Handle the mail setting "updated" event.
     *
     * @param MailSetting $mailSetting
     * @return void
     */
    public function updated(MailSetting $mailSetting)
    {
        MailSetting::flushCache();
    }

    /**
     * Handle the mail setting "deleted" event.
     *
     * @param MailSetting $mailSetting
     * @return void
     */
    public function deleted(MailSetting $mailSetting)
    {
        MailSetting::flushCache();
    }

    /**
     * Handle the mail setting "restored" event.
     *
     * @param MailSetting $mailSetting
     * @return void
     */
    public function restored(MailSetting $mailSetting)
    {
        MailSetting::flushCache();
    }

    /**
     * Handle the mail setting "force deleted" event.
     *
     * @param MailSetting $mailSetting
     * @return void
     */
    public function forceDeleted(MailSetting $mailSetting)
    {
        MailSetting::flushCache();
    }
}
