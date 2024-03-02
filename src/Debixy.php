<?php

namespace Debixy\Plugins;

use Illuminate\Contracts\Auth\Authenticatable;

class Debixy
{
    /**
     * All of the registered Debixy plugins.
     *
     * @var array
     */
    public static $plugins = [];

    /**
     * All of the registered Debixy dashboard widgets.
     *
     * @var array
     */
    public static $widgets = [];

    /**
     * All of the registered Debixy scripts.
     *
     * @var array
     */
    public static $scripts = [];

    /**
     * All of the registered Debixy styles.
     *
     * @var array
     */
    public static $styles = [];

    /**
     * All registered Debixy view hooks.
     *
     * @var array
     */
    public static $hooks = [];

    /**
     * Register a new view hook.
     */
    public static function hook($name, $handler)
    {
        self::$hooks[$name][] = $handler;
    }

    /**
     * Check if there are handlers registered for the
     * provided hook name.
     *
     * @return bool
     */
    public static function hasHook($name)
    {
        return isset(self::$hooks[$name]);
    }

    /**
     * Get all handlers for a given hook name.
     *
     * @return mixed
     */
    public static function getHookHandlers($name)
    {
        return data_get(self::$hooks, $name);
    }

    /**
     * Register the given plugins.
     */
    public static function plugins(array $plugins)
    {
        self::$plugins = array_merge(self::$plugins, $plugins);
    }

    /**
     * Get the list of registered plugins.
     *
     * @return array
     */
    public static function availablePlugins()
    {
        return self::$plugins;
    }

    /**
     * Register the list of given dashboard widgets.
     */
    public static function widgets(array $widgets)
    {
        self::$widgets = array_merge(self::$widgets, $widgets);
    }

    /**
     * Get the list of widgets available for the provided user.
     *
     * @return array
     */
    public static function availableWidgets(Authenticatable $user)
    {
        return collect(self::$widgets)->filter->authorize($user)->values();
    }
}
