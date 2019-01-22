<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MessagesEnum extends Enum
{
    const success = 'Record created successfully!';
    const edit = 'Successfully changed data';
    const error = 'Could not insert record';
    const NOT_FOUND = 'NOT FOUND';
}
