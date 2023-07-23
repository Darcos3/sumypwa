<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.layouts.app', function ($view) {
            $view
                ->with('destacados', \App\Models\Producto::destacados())
                ->with('promociones', \App\Models\Etiqueta::promociones())
                ->with('novedades', \App\Models\Etiqueta::novedades())
                ->with('masValorados', \App\Models\Producto::masValorados())
                ->with('categoriasPrincipales', \App\Models\Categoria::principales())
                ->with('categoriasDestacadas', \App\Models\Categoria::destacadas())
                ->with('carritoTotal', \App\Models\User::carritoTotal())
                ->with('marcas', \App\Models\Atributo::marcas());
        });
        view()->composer('frontend.productos.buscar', function ($view) {
            $view
                ->with('destacados', \App\Models\Producto::destacados())
                ->with('promociones', \App\Models\Etiqueta::promociones())
                ->with('novedades', \App\Models\Etiqueta::novedades())
                ->with('masValorados', \App\Models\Producto::masValorados())
                ->with('categoriasPrincipales', \App\Models\Categoria::principales())
                ->with('categoriasDestacadas', \App\Models\Categoria::destacadas());
        });
        view()->composer('frontend.categorias.show-productos', function ($view) {
            $view
                ->with('categoriasPrincipales', \App\Models\Categoria::principales());
        });
        view()->composer('frontend.categorias.show-subs', function ($view) {
            $view
                ->with('categoriasPrincipales', \App\Models\Categoria::principales());
        });
    }
}
