@extends('frontend.layouts.app')

@section('titulo', 'Búsqueda')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7/themes/algolia-min.css" />

    <style media="screen">
    body {
        font-family: sans-serif;
        padding: 1em;
    }

    .ais-ClearRefinements {
        margin: 1em 0;
    }

    .ais-SearchBox {
        margin: 1em 0;
    }

    .ais-Pagination {
        margin-top: 1em;
    }

    .left-panel {
        float: left;
        width: 250px;
    }

    .right-panel {
        margin-left: 260px;
    }

    .ais-InstantSearch {
        max-width: 960px;
        overflow: hidden;
        margin: 0 auto;
    }

    .ais-Hits-item {
        margin-bottom: 1em;
        width: calc(50% - 1rem);
    }

    .ais-Hits-item img {
        margin-right: 1em;
    }

    .hit-name {
        margin-bottom: 0.5em;
    }

    .hit-description {
        color: #888;
        font-size: 14px;
        margin-bottom: 0.5em;
    }

    </style>
@endsection


@section('content')
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Búsqueda</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-5 text-center pb-3 border-bottom border-color-1">
            <h1 class="font-size-sl-72 font-weight-light mb-3">Búqueda</h1>
        </div>
        <div class="d-flex mb-6">
            <div class="ais-InstantSearch">

                <div class="left-panel">
                    <div id="clear-refinements"></div>

                    <h2>Productos</h2>
                    <div id="brand-list"></div>
                </div>

                <div class="right-panel">
                    <div id="searchbox" class="ais-SearchBox"></div>
                    <div id="hits"></div>
                    <div id="pagination"></div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4/dist/algoliasearch-lite.umd.js"></script>

    <script>
    /* global instantsearch algoliasearch */

    const search = instantsearch({
        indexName: 'productos',
        searchClient: algoliasearch('G3DDNZM2OX', '2c1cc30bb4ab350a3d0195624d89bc92'),
    });

    search.addWidgets([
        instantsearch.widgets.searchBox({
            container: '#searchbox',
        }),
        instantsearch.widgets.refinementList({
            container: '#brand-list',
            attribute: 'brand',
        }),
        instantsearch.widgets.hits({
            container: '#hits',
            templates: {
                item: `
                <div>
                <img src="http://localhost:8000/storage/imagenes_producto/original/@{{imagen}}" align="left" alt="@{{name}}" />
                <div class="hit-name">
                @{{#helpers.highlight}}{ "attribute": "nombre" }@{{/helpers.highlight}}
                </div>
                <div class="hit-description">
                @{{#helpers.highlight}}{ "attribute": "description" }@{{/helpers.highlight}}
                </div>
                <div class="hit-price">\$@{{precio}}</div>
                </div>
                `,
            },
        }),
        instantsearch.widgets.pagination({
            container: '#pagination',
        }),
    ]);

    search.start();

    </script>

@endsection
