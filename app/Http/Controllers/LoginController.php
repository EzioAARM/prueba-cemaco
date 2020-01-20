<?php

namespace App\Http\Controllers;

use App\Mail\LoginSuccessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\UserInfo;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $correo = 'web@cemaco.com';
        $user = UserInfo::where('correo', $request->correo)
                        ->where('password', $request->password)->first();
        $error = null;
        $message = null;
        if (is_null($user)) {
            $error = "El usuario no existe o los datos son incorrectos";
            Mail::to($correo)->send(new LoginSuccessMail($error));

            //mail($correo, 'Prueba Senior CEMACO', 'Alguien intentó iniciar sesión con el correo ' . $request->correo . ' pero no fue exitoso');
        } else {
            $user = $user->attributesToArray();
            $message = 'Se logeo exitosamente';
            Mail::to($correo)->send(new LoginSuccessMail($message));

            //mail($correo, 'Prueba Senior CEMACO', 'Alguien inició sesión con el correo ' . $request->correo);
        }
        return view('login', array(
            'message' => $message,
            'error' => $error
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
