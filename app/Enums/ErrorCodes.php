<?php

namespace App\Enums;

enum ErrorCodes: string
{
    const Generic = 'generic';

    const ValidationError = 'validation_error';

    const UnsupportedLocale = 'unsupported_locale';

    const BlockedAccount = 'blocked_account';

    const InvalidCurrency = 'invalid_currency';
}
