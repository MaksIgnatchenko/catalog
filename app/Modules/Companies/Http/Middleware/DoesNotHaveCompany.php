<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 21.01.19
 *
 */

namespace App\Modules\Companies\Http\Middleware;

use Closure;

class DoesNotHaveCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user('company')->company) {
            return redirect()->route('my-company.show');
        }

        return $next($request);
    }
}
