
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>Products</h1>
<a href="/Products/new">New Product</a>
<p>Total: {{ total }} </p>
{% foreach ($products as $product): %}
    <h2>
        <a href="/products/{{ product["id"] }}/show">
        {{ product["name"] }}
        </a>

    </h2>

    {% endforeach; %}

</body>
</html>