<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable = ['street', 'city', 'state', 'country', 'zip', 'price', 'description'];

    public function scopeLocatedAt($query, $zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        return $query->where(compact('zip', 'street'));
    }

    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    /**
     * A flyer containes multiple photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    function timeAgo($time_ago){
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
// Seconds
        if($seconds <= 60){
            echo "$seconds seconds ago";
        }
//Minutes
        else if($minutes <=60){
            if($minutes==1){
                echo "one minute ago";
            }
            else{
                echo "$minutes minutes ago";
            }
        }
//Hours
        else if($hours <=24){
            if($hours==1){
                echo "an hour ago";
            }else{
                echo "$hours hours ago";
            }
        }
//Days
        else if($days <= 7){
            if($days==1){
                echo "yesterday";
            }else{
                echo "$days days ago";
            }
        }
//Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                echo "a week ago";
            }else{
                echo "$weeks weeks ago";
            }
        }
//Months
        else if($months <=12){
            if($months==1){
                echo "a month ago";
            }else{
                echo "$months months ago";
            }
        }
//Years
        else{
            if($years==1){
                echo "one year ago";
            }else{
                echo "$years years ago";
            }
        }
    }

    function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}
}
