<?php
/**
 * Created by PhpStorm.
 * User: edu7
 * Date: 9/3/2017
 * Time: 5:15 PM
 */

namespace App;


trait RecordsActivity
{

    protected static function bootRecordsActivity()
    {
        if (auth()->guest()) return;

        foreach (self::getActivitiesToRecord() as $event){
            static::created(function ($model) use($event){
                $model->recordActivity($event);
            });
        }
    }

    protected static function getActivitiesToRecord(){
        return ['created'];
    }

    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event)
        ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    protected function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        return "{$event}_{$type}";
    }
}