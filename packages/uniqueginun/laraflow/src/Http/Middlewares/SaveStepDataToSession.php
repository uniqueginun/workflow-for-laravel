<?php

namespace Uniqueginun\Laraflow\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaveStepDataToSession
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $currentStep = "wf." . request()->input('current_step');

        if (request()->has($currentStep)) {
            session()->put(
                $currentStep,
                array_merge(session()->pull($currentStep, []), data_get(request()->input(), $currentStep))
            );
        }

        return $next($request);
    }
}
