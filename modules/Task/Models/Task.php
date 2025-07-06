<?php

namespace Modules\Task\Models;

use Database\Factories\TaskFactory;
use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Project\Models\Project;
use Modules\Task\Enums\TaskStatus;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected static function newFactory()
    {
        return TaskFactory::new();
    }

    protected $fillable = [
        'user_id',
        'assigned_user_id',
        'project_id',
        'name',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => TaskStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
