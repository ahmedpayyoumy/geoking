<?php

namespace Prismateq\Localization;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Config;
use RuntimeException;

class TimeZone
{

    /**
     * Get timezone attribute name of the User model.
     *
     * @return string
     */
    private static function getUserTimezoneAttributeName()
    {
        return config('localization.attributes.user_timezone');
    }

    /**
     * Get server timezone.
     *
     * @return string
     */
    public static function getServerTimezone()
    {
        return config('localization.server_timezone');
    }

    /**
     * Get App Default timezone
     *
     * @return string
     */
    public static function getAppDefaultTimezone()
    {
        return Config::get('app.timezone', 'UTC');
    }

    /**
     * Get all supported timezones.
     *
     * @return array|false
     */
    public static function getTimezones()
    {
        return timezone_identifiers_list();
    }

    /**
     * Get current timezone.
     *
     * @return string
     */
    public static function getTimezone()
    {
        return date_default_timezone_get();
    }

    /**
     * Check if timezone supported.
     *
     * @param $timezone
     * @param bool $throwOnFailure
     * @return bool
     * @throws RuntimeException
     */
    public static function isSupported($timezone, $throwOnFailure = false)
    {
        $isSupported = in_array($timezone, static::getTimezones());
        if (!$isSupported && $throwOnFailure) throw new RuntimeException('Time Zone "' . $timezone . '" is invalid.');
        return $isSupported;
    }

    /**
     * Set current timezone.
     *
     * @param null $timezone
     * @param bool $throwOnFailure
     * @return bool
     */
    public static function setTimezone($timezone = null, $throwOnFailure = true)
    {
        if (!$timezone || !static::isSupported($timezone, $throwOnFailure)) {
            $timezone = static::getAppDefaultTimezone();
            $result = false;
        } else $result = true;
        date_default_timezone_set($timezone);
        return $result;
    }

    /**
     * Set current timezone from user settings.
     *
     * @param $user
     * @param bool $updateOnFailure
     * @return bool
     */
    public static function setTimezoneForUser($user, $updateOnFailure = true)
    {
        if (!$user instanceof User) throw new RuntimeException('Please provide valid User instance.');
        $result = static::setTimezone($user[static::getUserTimezoneAttributeName()], false);
        if (!$result && $updateOnFailure) static::saveUserTimezone($user, static::getServerTimezone());
        return $result;
    }

    private static function parseCarbon($time)
    {
        if ($time instanceof Carbon) return $time;
        else try {
            return Carbon::parse($time);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Convert time to local timezone.
     *
     * @param $time
     * @return Carbon|null
     */
    public static function convertToLocal($time)
    {
        $carbon = static::parseCarbon($time);
        if (!$carbon) return null;
        return $carbon->shiftTimezone(static::getServerTimezone())->setTimezone(static::getTimezone());
    }

    /**
     * Convert time to server timezone.
     *
     * @param $time
     * @return Carbon|null
     */
    public static function convertToServer($time)
    {
        $carbon = static::parseCarbon($time);
        if (!$carbon) return null;
        return $carbon->setTimezone(static::getServerTimezone());
    }

    /**
     * Save the timezone for the user to the database.
     *
     * @param $user
     * @param $timezone
     * @return true
     */
    public static function saveUserTimezone($user, $timezone)
    {
        static::isSupported($timezone, true);
        $user[static::getUserTimezoneAttributeName()] = $timezone;
        $user->save();
        return true;
    }
}
