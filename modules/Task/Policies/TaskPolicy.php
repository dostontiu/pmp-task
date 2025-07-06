<?php

namespace Modules\Task\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Modules\Task\Enums\TaskStatus;
use Modules\Task\Models\Task;
use Modules\User\Models\User;

class TaskPolicy
{
    use HandlesAuthorization;

    public function acceptTask(User $user, Task $task)
    {
        return $task->assigned_user_id == $user->id ? Response::allow() : Response::deny('You dont have permission');
    }

    public function doneTask(User $user, Task $task)
    {
        return $task->assigned_user_id == $user->id && $task->status == TaskStatus::ACCEPTED ? Response::allow() : Response::deny('You dont have permission');
    }
}
