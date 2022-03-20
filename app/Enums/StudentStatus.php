<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StudentStatus extends Enum
{
    const Active =   0;
    const InActive =   1;
//    const O = 2;
}
