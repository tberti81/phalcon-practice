{{ form('signup/signup', 'method': 'post') }}

    <label for="name">Username</label>
    {{ text_field("username", "size": 32) }}

    <label for="type">Password</label>
    {{ password_field("password", "size": 32) }}

    {{ submit_button('Send') }}

{{ end_form() }}
