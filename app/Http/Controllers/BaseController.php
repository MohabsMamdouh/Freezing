<?php

namespace App\Http\Controllers;

use App\Models\pricing;
use App\Models\SiteInfo;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function __construct()
    {
        $site = SiteInfo::all();
        view()->share('site', $site);

        $price = pricing::all();
        view()->share('price', $price);
        $this->middleware('auth');
    }

    /**
     * It takes a date and time and returns a string like "2 hours ago" or "3 days ago" or "just now"
     *
     * @param datetime The datetime string you want to convert.
     * @param full If true, the full string will be returned. If false, it will only return the first
     * time unit.
     */
    public static function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime();
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
