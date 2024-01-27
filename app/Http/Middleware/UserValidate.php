<?php

namespace App\Http\Middleware;

use App\Enums\StatusEnums;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('web')->check() && Auth::guard('web')->user()->is_active != StatusEnums::ACTIVE->value) {
            Auth::guard('web')->logout();
            return redirect(route('login'))->withErrors(['accountActivationError' => 'Your account has been deactivated by admin..! Please contact admin to continue.']);
        }
        return $next($request);
    }
}
