{{ form(form.getAction(), 'method': 'post') }}

    <label for="name">Username</label>
    {{ form.render('username') }}

    <label for="type">Password</label>
    {{ form.render('password') }}

    <label for="type">Confirm Password</label>
    {{ form.render('password_confirmed') }}

    {{ form.render('submit') }}

{{ end_form() }}
