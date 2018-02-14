<?php

namespace Pvtl\ApiAuthentication\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->response = new \stdClass();
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'bail|required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $this->response->status = 401;
            $this->response->errors['errors'][] = ['message' => 'You must supply credentials'];

            return response()->json($this->response->errors, $this->response->status);
        }

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                $this->response->status = 401;
                $this->response->errors['errors'][] = ['message' => 'Invalid credentials supplied'];

                return response()->json($this->response->errors, $this->response->status);
            }
        } catch (JWTException $e) {
            $this->response->status = 500;
            $this->response->errors['errors'][] = ['message' => 'Unknown error, could not create token'];

            return response()->json($this->response->errors, $this->response->status);
        }


        $this->response->status = 200;
        $this->response->data['data'][] = compact('token');

        return response()->json($this->response->data, $this->response->status);
    }

    public function register(Request $request)
    {
        $input = $request->all();

        $dataValidator = Validator::make($input, [
            'name' => 'bail|required',
            'email' => 'bail|required',
            'password' => 'required',
        ]);

        $emailValidator = Validator::make($input, [
            'email' => 'required|unique:users',
        ]);

        if ($emailValidator->fails()) {
            $this->response->status = 409;
            $this->response->errors['errors'][] = ['message' => 'A user with this email already exists'];

            return response()->json($this->response->errors, $this->response->status);
        }

        if ($dataValidator->fails()) {
            $this->response->status = 403;
            $this->response->errors['errors'][] = ['message' => 'You must supply the appropriate data'];

            return response()->json($this->response->errors, $this->response->status);
        }

        User::create($input);

        $this->response->status = 201;
        return response(null)->setStatusCode($this->response->status);
    }
}