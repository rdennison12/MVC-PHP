{% extends "base.mvc.php" %}

{% block title %}Product{% endblock %}

{% block body %}

<h1>{{ product["name"] }}</h1>
<p>{{ product["description"] }}</p>
<p><a href="/Products/{{ product["id"] }}/edit">Edit</a></p>
<p><a href="/Products/{{ product["id"] }}/delete">Delete</a></p>

{% endblock %}