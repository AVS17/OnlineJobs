<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        //Mostrar notificaciones no leidas
        $notificaciones = auth()->user()->unreadNotifications;
        //Limpiar notificaciones vistas
        auth()->user()->unreadNotifications->markAsRead();
        return view('notificaciones.index',[
            'notificaciones' => $notificaciones,
        ]);
    }
}
