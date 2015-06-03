{{ Form::open(array('url' => 'users/create', 'class' => 'form-signup', 'autocomplete' => 'off')) }}
    <h2 class="form-signup-heading">Please Register</h2>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {{ Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
    {{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
    {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
    
    {{ Form::submit('Register', array('class' => 'btn btn-primary btn-lg btn-block')) }}
{{ Form::close() }}