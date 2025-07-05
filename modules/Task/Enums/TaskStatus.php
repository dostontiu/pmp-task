<?php

namespace Modules\Task\Enums;

enum TaskStatus: int
{
    case ASSIGNED = 1;
    case DONE = 2;
    case REJECTED = 9;
}
