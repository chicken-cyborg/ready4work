<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EnsureUserRoleIsAllowedToAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        try{
            $userRole= auth()->user()->role;
            $currentRouteName=Route::currentRouteName();
    
            if(in_array($currentRouteName,$this->userAccessRole()[$userRole])){
                return $next($request);
            }else{
                abort(403,'Acesso negado, não tem permissão para aceder a esta pagina.');
            }
        } catch(\Throwable $th){
            abort(403,'Acesso negado, não tem permissão para aceder a esta pagina.');
        }

        
        
    }


    /**
    *Função da lista de paginas acessiveis pelo usuário
    *
    *@return void 
    */
    private function userAccessRole()
    {
       return[

                'user'=>[
                    'dashboard',
                    'propostas',
                ] ,


                'admin'=>[
                    'dashboard',
                    'users',
                    'propostas',
                    
                ],

                'empresa'=>[
                    'dashboard',
                    
                ]
           ];
    }
}
