<?php
 
namespace App\Http\Middleware;
 
use App\Category;
use Closure;
 
class CategoriesShareMiddleware
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
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        view()->share('rootCategories',$categories);
        return $next($request);
    }
}