<?php

namespace App\Http\Controllers;

require dirname(__DIR__, 2) . "/Models/User.php";

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register($request)
    {
        global $wpdb;

        $status = false;
        $result = null;
        $wpdb->query("START TRANSACTION");
        try {
            $user = new User();
            $user->uid = $request["name"].$request["last_name"];
            $user->fullname = $request["name"]. " " .$request["last_name"];
            $user->email = $request["email"];
            $user->phone = $request["phone"];
            $user->password = $request["password"];
            $user->username = $request["username"];
            $user->profession = $request["profession"];
            $user->status_id = 2;
            $user->save();

            $status = true;
            $wpdb->query("COMMIT");
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            $wpdb->query("ROLLBACK");
        }if($status){
            return $this->response($status, ["type" => "success", "content" => "Done."], $user);
        }else{
            return $this->response($status, ["type" => "error", "content" => "Error."], $result);
        }
    }

    public function login($request)
    {
        $user = User::where("email", $request["email"])->where("password", $request["password"])->whereStatusId(1)->first();
        if(isset($user->id)){
            return $this->response(true, ["type" => "success", "content" => "Done."], ["token" => base64_encode("praxis"), "user" => $user]);
        }else{
            return $this->response(false, ["type" => "success", "content" => "No Estas Authorizado Para El Ingreso A La Plataforma"], []);
        }
    }

    public function getUsers()
    {
        return $this->response(true, ["type" => "success", "content" => "Done."], User::whereStatusId(2)->get());
    }

    public function deleteUser($request)
    {
        global $wpdb;

        $status = false;
        $result = null;
        $wpdb->query("START TRANSACTION");
        try {
            $user = User::find($request["id"]);
            $user->delete();

            $status = true;
            $wpdb->query("COMMIT");
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            $wpdb->query("ROLLBACK");
        }if($status){
            return $this->response($status, ["type" => "success", "content" => "Usuario Eliminado"], []);
        }else{
            return $this->response($status, ["type" => "error", "content" => "Ocurrio un problema al momento de eliminar el usuario."], $result);
        }
    }

    public function activeUser($request)
    {
        global $wpdb;

        

        $status = false;
        $result = null;
        $wpdb->query("START TRANSACTION");
        try {
            $user = User::find($request["id"]);
            $user->status_id = 1;
            $user->save();

            wp_mail($user->email, "Activación Cuenta Praxis", "Su cuenta en la plataforma de praxis fue activada exitosamente.");

            $status = true;
            $wpdb->query("COMMIT");
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            $wpdb->query("ROLLBACK");
        }if($status){
            return $this->response($status, ["type" => "success", "content" => "Usuario activado"], []);
        }else{
            return $this->response($status, ["type" => "error", "content" => "Ocurrio un problema al momento de eliminar el usuario."], $result);
        }
    }
}