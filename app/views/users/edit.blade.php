<h1>Edit</h1>
<p>You are here, you rock again!</p>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{{ Form::open(array('url' => 'users/update/'.$users->id, 'class' => 'form-signup')) }}

    {{ Form::text('firstname', Input::old('firstname') ? Input::old('firstname') : $users->firstname, array('class' => 'form-control', 'placeholder' => 'First Name')) }}

    {{ Form::text('lastname', Input::old('lastname') ? Input::old('lastname') : $users->lastname, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}

    {{ Form::text('email', Input::old('email') ? Input::old('email') : $users->email, array('class' => 'form-control', 'placeholder' => 'Email')) }}
    
    {{ Form::submit('Update', array('class' => 'btn btn-primary btn-lg btn-block')) }}
    
{{ Form::close() }}

