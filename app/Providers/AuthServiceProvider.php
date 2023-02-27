<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-admin-tasks', function (User $user) {
            return roles()->in($user->role, ['admin', 'moderator']);
        });

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return new VerificationEmail($notifiable, $url);
        });
    }
}
