<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@meilisearch/instant-meilisearch/templates/basic_search.css" />
  </head>
  <body>
    <div class="wrapper">
      <div id="searchbox" focus></div>
      <div id="hits"></div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/@meilisearch/instant-meilisearch@0.3.2/dist/instant-meilisearch.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4"></script>
  <script>
  const search = instantsearch({
      indexName: "productos",
      searchClient: instantMeiliSearch(
          "http://localhost:7700"
      )
  });

  search.addWidgets([
      instantsearch.widgets.searchBox({
          container: "#searchbox"
      }),
      instantsearch.widgets.configure({ hitsPerPage: 8 }),
      instantsearch.widgets.hits({
          container: "#hits",
          templates: {
              item: `
              <div>
                  <a href="#">
                  <img src="http://localhost:8000/storage/imagenes_producto/700x700/@{{#helpers.highlight}}{ "attribute": "imagen" }@{{/helpers.highlight}}">
                  <div class="hit-name">
                      @{{#helpers.highlight}}{ "attribute": "nombre" }@{{/helpers.highlight}}
                  </div>
                  </a>
              </div>
              `
          }
      })
  ]);
  search.start();
  </script>
</html>