<?php

namespace App\Enums;

enum Roles: string
{
    case Admin = 'admin';
    case Moderator = 'moderator';
    case User = 'user';
}
