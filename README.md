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
