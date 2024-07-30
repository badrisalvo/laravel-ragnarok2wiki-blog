<?php

namespace App\Http\Middleware;
use App\Visitor;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class LogVisitors
{
    public function handle($request, Closure $next)
    {
        $ipAddress = $request->ip();

        // Check if the IP address already exists in the visitors table
        $existingVisitor = Visitor::where('ip_address', $ipAddress)->first();

        if (!$existingVisitor) {
            // If the IP address doesn't exist, create a new visitor record
            Visitor::create([
                'ip_address' => $ipAddress,
            ]);
        }

        return $next($request);
    }

    public static function getTotalVisitors()
    {
        $totalVisitors = Visitor::count(); // Retrieve the total number of visitors from the visitors table
        return $totalVisitors;
    }
}

// class LogVisitors
// {
//     public function handle($request, Closure $next)
//     {
//         $ipAddress = $request->ip();

//         // Check if the IP address already exists in the visitors table
//         $existingVisitor = Visitor::where('ip_address', $ipAddress)->first();

//         if ($existingVisitor) {
//             // If the IP address exists, delete the visitor record
//             $existingVisitor->delete();
//         } else {
//             // If the IP address doesn't exist, create a new visitor record
//             Visitor::create([
//                 'ip_address' => $ipAddress,
//             ]);
//         }

//         return $next($request);
//     }

//     public static function getTotalVisitors()
//     {
//         $totalVisitors = Visitor::count();
//         return $totalVisitors;
//     }
// }
