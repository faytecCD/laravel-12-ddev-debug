<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class UserRegisterJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        readonly private User $user,
        readonly private string $target = 'default',
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('User registered: '.$this->user->email.' on target '.$this->target);
        fwrite(STDOUT, 'User registered: '.$this->user->email.' on target '.$this->target.PHP_EOL);
    }
}
