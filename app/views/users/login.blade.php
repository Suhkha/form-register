{{ Form::open(array('url' => 'users/signin', 'class' => 'form-signin', 'autocomplete' => 'off')) }}
    <h1 class="form-signin-heading">Please Login</h1>

    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}

    {{ Form::submit('Login', array('class' => 'btn btn-primary btn-lg btn-block')) }}
{{ Form::close() }}