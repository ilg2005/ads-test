<?php

namespace App\Http\Middleware;

use App\Models\Record;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessRecordsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $recordId = $request->route('id');

        $record = Record::find($recordId);

        if (!$record) {
            return response()->json(['message' => 'Record not found.'], 404);
        }

        if ($record->access === 0) {
            return response()->json(['message' => 'Access denied.'], 403);
        }

        return $next($request);
    }
}
