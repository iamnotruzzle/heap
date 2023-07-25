<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreUserLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $user = User::where('employeeid', $this->request->login)->first();

        // StoreUserLoginHistory::create([
        //     'employeeid' => $this->request->login,
        //     'wardcode' => $this->request->wardcode
        // ]);
    }
}
