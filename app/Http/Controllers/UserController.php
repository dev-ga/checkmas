<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Http\Responses\LogoutResponse;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{

    public function storeRegistro(Request $request)
    {
        try {

        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function destroy(Request $request): LogoutResponse
    {

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
