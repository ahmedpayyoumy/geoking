<?php

namespace Prismateq\DBLog\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prismateq\DBLog\Facades\DBLog;
use Prismateq\EloquentAddons\StaticRelation\HasStaticRelations;

class Log extends Model
{
    use HasStaticRelations;

    public $timestamps = false;

    protected $casts = [
        'data' => 'array',
        'backtrace' => 'array',
    ];

    protected $staticRelations = [
        'level' => 'level_key,config:db-log.levels',
    ];

    public function getLoggedAtAttribute($value)
    {
        return Carbon::parse($value, DBLog::getTimezone());
    }

    public static function add($level, $type, $subject, $data, $backtrace)
    {
        $log = new self;
        $log['level'] = $level;
        $log['type'] = $type;
        $log['subject'] = $subject;
        $log['data'] = $data;
        $log['backtrace'] = $backtrace;
        $log['logged_at'] = now(DBLog::getTimezone());
        $log->save();
    }

    public static function deleteOlder($dateTime) {
        self::where('logged_at', '<', $dateTime)->delete();
    }
}
