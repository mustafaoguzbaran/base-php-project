
<!DOCTYPE html>
<html>
  <head>
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.49.0/swagger-ui.css" />
  </head>
  <body>
    <div id="swagger-ui"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.49.0/swagger-ui-bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.49.0/swagger-ui-standalone-preset.js"></script>
    <script>
window.onload = function() {
    const ui = SwaggerUIBundle({
          url: "/swagger.json",
          dom_id: '#swagger-ui',
          presets: [
        SwaggerUIBundle.presets.apis,
        SwaggerUIStandalonePreset
    ],
          layout: "StandaloneLayout"
        })
      }
    </script>
  </body>
</html>
