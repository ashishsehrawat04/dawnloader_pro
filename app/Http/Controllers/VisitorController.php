<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorController extends Controller
{
    public function track(Request $request)
    {
        $ip = $this->getClientIP($request);
        $agent = $request->header('User-Agent');
        $device = $request->header('sec-ch-ua-platform') ?? 'Unknown';

        $browser = $request->header('sec-ch-ua') ?? 'Unknown';
        $visitor = Visitor::where('ip_address', $ip)->first();

        if (!$visitor) {
            // First visit → create new record
            $visitor = Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $agent,
                'device'     => $device,
                'browser'    => $browser,
                'visit_count'=> 1,
                'last_visit' => now(),
            ]);
        } else {

            $visitor->increment('visit_count');
            $visitor->update(['last_visit' => now()]);
        }

        return response()->json([
            'message' => 'Visitor stored successfully',
            'visitor' => $visitor
        ]);
    }


    public function totalVisitors()
    {
        return response()->json([
            'total_visitors' => Visitor::count()
        ]);
    }

    function getClientIP(Request $request) {
        $ip = null;

        if ($request->server('HTTP_CLIENT_IP')) {
            $ip = $request->server('HTTP_CLIENT_IP');
        } elseif ($request->server('HTTP_X_FORWARDED_FOR')) {
            $ipList = explode(',', $request->server('HTTP_X_FORWARDED_FOR'));
            $ip = trim($ipList[0]); // Take first IP
        } elseif ($request->server('REMOTE_ADDR')) {
            $ip = $request->server('REMOTE_ADDR');
        }

        return $ip;
    }

}
