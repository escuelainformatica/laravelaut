<h1>Usted esta logeado como {{auth()->user()->name}}</h1>


<h2>Permisos</h2>
@can('leer')
    El usuario puede leer<br>
@else
    El usuario no puede leer<br>
@endcan
@can('escribir')
    El usuario puede escribir<br>
@else
    El usuario no puede escribir<br>
@endcan
<h2>Roles</h2>
@role('admin')
El usuario tiene el rol de administrador
@else
El usuario no es administrador
@endrole
