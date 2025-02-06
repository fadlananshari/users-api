<!DOCTYPE html>
<html>
<head>
    <title>User API Documentation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/5.11.2/swagger-ui.min.css" rel="stylesheet">
</head>
<body>
    <div id="swagger-ui"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/5.11.2/swagger-ui-bundle.min.js"></script>
    <script>
        window.onload = () => {
            SwaggerUIBundle({
                url: '/api/documentation',
                dom_id: '#swagger-ui',
                deepLinking: true,
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIBundle.SwaggerUIStandalonePreset
                ],
                layout: "BaseLayout",
                docExpansion: 'list'
            });
        }
    </script>
</body>
</html>