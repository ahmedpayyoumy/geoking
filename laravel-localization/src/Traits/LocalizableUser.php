<?php

namespace Prismateq\Localization\Traits;

use Prismateq\Localization\Locale;
use Prismateq\Localization\TimeZone;

trait LocalizableUser
{
    public function setLanguage($language)
    {
        return Locale::saveUserLanguage($this, $language);
    }

    public function localize()
    {
        Locale::setLocaleForUser($this);
    }

    public function setTimezone($timezone)
    {
        return TimeZone::saveUserTimezone($this, $timezone);
    }
}
