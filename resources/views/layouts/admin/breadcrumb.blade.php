<h4 class="py-3 mb-4">
    @foreach (getMenu() as $menu)
        @if (isset($menu['submenu']) && checkSubmenu(Route::currentRouteName(), $menu['submenu']))
            <span class="text-muted fw-light">
                {{ $menu['name'] }} /
            </span>
            @foreach ($menu['submenu'] as $submenu)
                @if (Route::currentRouteName() == $submenu['slug'])
                    {{ $submenu['name'] }}
                @endif
            @endforeach
        @endif
        @if (!isset($menu['submenu']) && Route::currentRouteName() == $menu['slug'])
            <span class="text-muted fw-light">
                {{ $menu['name'] }}
            </span>
        @endif
    @endforeach
</h4>
