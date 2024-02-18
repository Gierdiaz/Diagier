<?php

namespace App\Providers;

use App\Models\Developer;
use App\Models\Feedback;
use App\Models\Project;
use App\Models\Task;
use App\Policies\DeveloperPolicy;
use App\Policies\FeedbackPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
        Developer::class => DeveloperPolicy::class,
        Task::class => TaskPolicy::class,
        Feedback::class => FeedbackPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

    }
}
