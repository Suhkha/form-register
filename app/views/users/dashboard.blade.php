<h1>Dashboard</h1>
<p>You are here, you rock {{ Auth::user()->firstname }} !</p>

<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>
                {{ HTML::link(('users/edit/'.$user->id.'/ '), 'Editar', array('class' => 'btn btn-xs btn-info')) }} 
                
                {{ Form::open(array('url' => 'users/delete/'.$user->id.'/ ', 'class' => 'delete_form')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

