<?php

namespace Prismateq\RecursiveLoop;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RecursiveLoopServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/recursive-loop.php', 'recursive-loop');
        $this->publishes([
            __DIR__.'/../config/recursive-loop.php' => config_path('recursive-loop.php'),
        ]);
        $class = '\\' . RecursiveLoop::class;
        $directives = config('recursive-loop.directives');
        Blade::directive($directives['start_recursive_loop']??'recursion', function ($arguments) use ($class) {
            return "<?php $class::loop($arguments, function(\$loop){?>";
        });
        Blade::directive($directives['if_has_children']??'repeat', function () {
            return "<?php }, function(\$loop, \$__recursiveLoopCallback, \$__recursiveLoopChildren) { ?>";
        });
        Blade::directive($directives['children_stack']??'content', function () use ($class) {
            return "<?php $class::loop(\$loop['item'], \$__recursiveLoopCallback, \$__recursiveLoopChildren, \$loop['path']); ?>";
        });
        Blade::directive($directives['end_recursive_loop']??'endrecursion', function () {
            return "<?php }); ?>";
        });
    }
}
