<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckContentType
{
    use ApiResponser;

    public function handle(Request $request, Closure $next): Response
    {
        $contentType = $request->header('Content-Type');

        if (str_contains($contentType, 'multipart/form-data') 
            || str_contains($contentType, 'application/octet-stream')) {
            return $this->errorResponse('Не поддерживаемый заголовок');
        }

        return $next($request);
    }
}
