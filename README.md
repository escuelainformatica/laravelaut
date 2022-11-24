# spatie


## instalar

```shell
composer require spatie/laravel-permission
```

## crear codigo

```shell
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

## migrar la base de datos

```shell
php artisan migrate
```

## crear un rol

```shell
php artisan permission:create-role admin
php artisan permission:create-role user
```

## crear los permisos

```shell
php artisan permission:create-permission "leer"
php artisan permission:create-permission "escribir"
```

## asociar roles con los permisos

```shell
php artisan permission:create-role admin web "leer|escribir"
```

## modificar el modelo


## crear el usuario

```shell
php artisan tinker
```

```php
$user = new App\Models\User();
$user->password = Hash::make('abc123');
$user->email = 'correo@correo.com';
$user->name = 'administrador';
$user->save();
```

## asignar permiso y rol al usuario creado

```shell
php artisan tinker
```

```php
$user=User::find(1);
$user->givePermissionTo('leer');
$user->assignRole('admin');
```

## en el kernel
Agregar lo siguiente:
```php
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
```

## enrutamientos

```php
Route::controller(UsuarioController::class)->group(function () {
    Route::any('/login', 'login')->name('login'); // sin autenticacion
    Route::any('/ingreso', 'ingreso')->middleware(['auth','can:escribir']); // solo los que tienen permiso de escribir
    Route::any('/listado', 'listado')->middleware(['auth','can:leer']); // quiero que todos pueden ingresar
    Route::any('/ingresoadmin', 'ingreso')->middleware(['auth','role:admin']); // solo los que tienen el rol admin
});
```

## blade

```html
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

```

# Ejercicio

Cree un proyecto nuevo que use los siguientes roles.
* editor (permiso de leer y escribir)  
* normal (permiso de leer)

Y los permisos:
* leer,editar

Y cree una página que:
* solo los editores puedan ver
Y otra página donde parte de la página lo puedan ver los que pueden editar

Para ello cree lo siguiente

1. proyecto nuevo
2. Agregue la libreria de spatie
3. Configure el proyecto para usar la libreria
4. Haga la migracion
5. Cree los permisos
6. Cree los roles
7. Cree un par de usuarios
8. Cree una página de login (puede copiar la de este ejemplo)
9. Y cree dos páginas para el ejemplo
10. Agregue en el kernel las librerias
11. Y modifique el enrutamiento.
