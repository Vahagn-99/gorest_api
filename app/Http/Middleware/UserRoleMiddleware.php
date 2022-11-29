<?php

namespace App\Http\Middleware;

use App\Enums\UserRoles;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string|null $allow
     * @return Response|RedirectResponse
     */
    public function handle(
        Request $request,
        Closure $next,
        string $allow = null
    ): Response|RedirectResponse {
        /** @var  User $user */
        $user = $this->user($request);
        if (is_null($user) || !$this->right_roles($user, $allow)) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }

    /**
     * @param Request $request
     * @return object|null
     */
    private function user(Request $request): object|null
    {
        return Auth::user() ?? ($request->user() ?? User::whereEmailLike($request->get('email'))->first());
    }

    /**
     * @param User $user
     * @param array|string|null $allow
     * @return bool
     */
    private function right_roles(User $user, array|string $allow = null): bool
    {
        if (is_null($allow)) {
            // if $allow is not given that maens than everyone can do reqeust
            $allow = UserRoles::only(as_string: true);
        }
        $allow = explode('|', $allow);
        return $user->hasRole(UserRoles::only($allow));
    }
}
