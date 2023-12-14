{% extends "base.mvc.php" %}

{% block title %}Edit Product{% endblock %}

{% block body %}

<h1>Edit Product</h1>
<form action="/Products/{{product["id"] }}/update" method="post">
    {% include "Products/form.mvc.php" %}
</form>
<p><a href="/Products/{{ product["id"] }}/show">Cancel</a></p>

{% endblock %}


