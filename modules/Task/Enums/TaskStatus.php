<?php

namespace Modules\Task\Enums;

enum TaskStatus: int
{
    case ASSIGNED = 1;
    case ACCEPTED = 2;
    case DONE = 3;
    case REJECTED = 9;
}
