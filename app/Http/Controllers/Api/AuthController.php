<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function register(Request $request) {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed|min:6',
            'date_of_birth' => 'required|date|date_format:Y-m-d',
            'last_donation' => 'required|date|date_format:Y-m-d|before:tomorrow',
            'phone' => ['required', 'unique:clients', 'regex:/\d{3}-\d{3}-\d{4}|\d{10}/'],
            'blood_type_id' => 'required|exists:blood_types,id',
            'city_id' => 'required|exists:cities,id',
        ]);
        if ($validator->fails()) {
            return jsonResponce(0, "بيانات غير صحيحة", ['errors' => $validator->errors()], 400);
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random('60');
        $client->save();

        // add client city and blood type to notifications subscription
        $client->governorates()->attach($client->city->governorate_id);
        $client->bloodTypes()->attach($client->blood_type_id);
        return jsonResponce(1, 'تم اضافة المستخدم بنجاخ'
                , ['api_token' => $client->api_token, 'client' => $client], 201);
    }

    public function login(Request $request) {
        $validator = validator()->make($request->all(), [
            'phone' => ['required', 'regex:/\d{3}-\d{3}-\d{4}|\d{10}/'],
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return jsonResponce(0, "بيانات غير صحيحة", ['errors' => $validator->errors()], 400);
        }
        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return jsonResponce(1, 'تم تسجيل الدخول'
                        , ['api_token' => $client->api_token, 'client' => $client], 201);
            }
        }
        return jsonResponce(0, "بيانات الدخول غير صحيحة", null, 400);
    }

    public function profile() {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed|min:6',
        ]);
        $client = auth()->guard('api')->user();
        return jsonResponce(1, 'معلومات المستخدم', $client);
    }

}
