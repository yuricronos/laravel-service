<?php

namespace Yuricronos\LaravelService;

use Illuminate\Support\Facades\Blade;

class BladeDirective
{
    public static function createDirective()
    {
        Blade::directive('role', fn ($e) => sprintf("<?PHP if(auth()->check() && in_array(auth()->user()->role, %s)): ?>", $e));
        Blade::directive('endrole', fn () => "<?PHP endif; ?>");

        Blade::directive('href', fn ($e) => sprintf("<?PHP echo (isset(%s['collapse']) && %s['route']===\"#\") ? \"#\".%s['collapse']['id'] : ((!empty(%s['route'])) ? route(%s['route']) : '#'); ?>", $e, $e, $e, $e, $e));
        Blade::directive('collapse', fn ($e) => sprintf("<?PHP echo (isset(%s['collapse']) && %s['route']===\"#\") ? 'data-bs-toggle=\"collapse\" aria-expanded=\"false\" aria-controls=\"'.%s['collapse']['id'].'\"' : \"\"; ?>", $e, $e, $e));
    }
}
