{{ form(form.getAction(), 'method': 'post') }}

    <label for="name">Username</label>
    {{ form.render('username') }}

    <label for="type">Password</label>
    {{ form.render('password') }}

    {{ form.render('submit') }}

{{ end_form() }}
