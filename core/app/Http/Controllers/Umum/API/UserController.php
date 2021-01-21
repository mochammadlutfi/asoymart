<?php
namespace App\Http\Controllers\Umum\API;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    function login(Request $request)
    {
        $input = $request->all();

        $rules = [
            'email' => 'required|exists:users,email|string',
            'password' => 'required|string'
        ];

        $pesan = [
            'email.required' => 'Alamat Email Wajib Diisi!',
            'email.exists' => 'Alamat Email Belum Terdaftar!',
            'password.required' => 'Password Wajib Diisi!',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'msg' => 'Terdapat Kesalahan Di Form!',
                'errors' => $validator->errors(),
            ]);
        }else{
            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            if(auth()->attempt($request->only('email','password')))
            {
                // $data = auth()->user()->createToken('authToken')->accessToken;
                $data = auth()->user();
                $data->device_token = $request->input('device_token', '');
                $data->save();
                $data->api_token = auth()->user()->createToken('authToken')->accessToken;
                // return response()->json([
                //     'data' => $data
                // ]);
                
                return $this->sendResponse($data, 'User retrieved successfully', 200);
            }else{
                $gagal['password'] = array('Password salah!');
                return response()->json([
                    'fail' => true,
                    'errors' => $gagal,
                ]);
            }
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return
     */
    function register(Request $request)
    {
            // $this->validate($request, [
            //     'nama' => 'required',
            //     'email' => 'required|unique:users|email',
            //     'password' => 'required',
            // ]);
            $rules = [
                'nama' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'min:6',
            ];
    
            $pesan = [
                'nama.required' => 'Nama Lengkap Wajib Diisi!',
                'email.required' => 'Alamat Email Wajib Diisi!',
                'password.required' => 'Password Wajib Diisi!',
                'password.min' => 'Password Tidak Boleh Kurang Dari 6 Karakter!',
            ];
            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()){
                return response()->json([
                    'fail' => true,
                    'msg' => 'Terdapat Kesalahan Di Form!',
                    'errors' => $validator->errors(),
                ],401);
            }else{
                $user = new User();
                $user->nama = $request->input('nama');
                $user->email = $request->input('email');
                $user->device_token = $request->input('device_token', '');
                $user->password = Hash::make($request->input('password'));
                $user->save();
                $user->api_token = $user->createToken('authToken')->accessToken;

                return $this->sendResponse($user, 'User retrieved successfully',200);
            }
            
            


            // if (copy(public_path('images/avatar_default.png'), public_path('images/avatar_default_temp.png'))) {
            //     $user->addMedia(public_path('images/avatar_default_temp.png'))
            //         ->withCustomProperties(['uuid' => bcrypt(str_random())])
            //         ->toMediaCollection('avatar');
            // }

        // return $this->sendResponse($user, 'User retrieved successfully');
    }

    function logout(Request $request)
    {
        $user = $this->userRepository->findByField('api_token', $request->input('api_token'))->first();
        if (!$user) {
            return $this->sendError('User not found', 401);
        }
        try {
            auth()->logout();
        } catch (\Exception $e) {
            $this->sendError($e->getMessage(), 401);
        }
        return $this->sendResponse($user['name'], 'User logout successfully');

    }

    function user(Request $request)
    {
        $user = $this->userRepository->findByField('api_token', $request->input('api_token'))->first();
        if (!$user) {
            return $this->sendError('User not found', 401);
        }
        return $this->sendResponse($user, 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param Request $request
     *
     */
    public function update($id, Request $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            return $this->sendResponse([
                'error' => true,
                'code' => 404,
            ], 'User not found');
        }
        $input = $request->except(['password', 'api_token']);
        try {
            if ($request->has('device_token')) {
                $user = $this->userRepository->update($request->only('device_token'), $id);
            } else {
                $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->userRepository->model());
                $user = $this->userRepository->update($input, $id);

                foreach (getCustomFieldsValues($customFields, $request) as $value) {
                    $user->customFieldsValues()
                        ->updateOrCreate(['custom_field_id' => $value['custom_field_id']], $value);
                }
            }
        } catch (ValidatorException $e) {
            return $this->sendError($e->getMessage(), 401);
        }

        return $this->sendResponse($user, __('lang.updated_successfully', ['operator' => __('lang.user')]));
    }

    function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::broker()->sendResetLink(
            $request->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return $this->sendResponse(true, 'Reset link was sent successfully');
        } else {
            return $this->sendError('Reset link not sent', 401);
        }

    }
}
