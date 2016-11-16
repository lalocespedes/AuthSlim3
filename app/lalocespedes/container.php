<?php

use lalocespedes\Models\Users;
use InterOp\Container\ContainerInterface;
use function DI\get;

return [
    Users::class => function (ContainerInterface $c) {
        return new Users;
    }
];
