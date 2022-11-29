<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioAPIController extends Controller
{
    public function login(Request $request)
    {
        $body = json_decode($request->getContent(), true);
        // die(var_dump($body));
        //$credentials = $request->validate($body);
        if (Auth::attempt($body)) {
            $user=$request->user();
            // $token = $request->user()->createToken('token', ['editar']);
            $activities = [];
            $roles = $user->getRoleNames()->toArray();
            $permisos = $user->getPermissionNames()->toArray();
            //$permissions = $user->getDirectPermissions();
            //$permissions = $user->getPermissionsViaRoles();
            //$permissions = $user->getAllPermissions();
            $activities=$permisos;
            /*if (Auth::user()->perfil?->editar === 1)
                array_push($activities, 'editar');
            if (Auth::user()->perfil?->ver === 1)
                array_push($activities, 'ver');*/
            $token = $request->user()->createToken('token', $activities);
            return ['token' => $token->plainTextToken,'roles'=>$roles,'permisos'=>$permisos];
        }
        return [];
    }
}
