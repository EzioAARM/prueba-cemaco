<?php

namespace App\Http\Controllers;

use App\Mail\LoginSuccessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\UserInfo;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registro', array(
            'error' => null,
            'message' => null
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $user = UserInfo::where('correo', $request->correo)->first();
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        if (is_null($user)) {
            $user = new UserInfo;
            $user->nombre = $request->nombre;
            $user->telefono = $request->telefono;
            $user->correo = $request->correo;
            $user->password = $request->password;
            $user->porque = $request->porque;
            $user->save();
            //mail($correo, 'Prueba Senior CEMACO', , implode("\r\n", $headers));
            
            Mail::to($correo)->send(new LoginSuccessMail('Se registró con el correo ' . $request->correo . ' a nombre de ' . $request->nombre . ' y quiere trabajar en CEMACO por que: ' . $request->porque));
            return view('registro', array(
                'error' => null,
                'message' => 'El correo ' . $request->correo . ' se registro con éxito'
            ));
        } else {

            Mail::to($correo)->send(new LoginSuccessMail('Alguien intentó registrar el correo ' . $request->correo . ' pero ya existe'));
            //mail($correo, 'Prueba Senior CEMACO', , implode("\r\n", $headers));
            return view('registro', array(
                'error' => 'El correo ya existe',
                'message' => null
            ));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
