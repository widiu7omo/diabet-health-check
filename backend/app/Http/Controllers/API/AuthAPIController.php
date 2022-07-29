<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthAPIController extends AppBaseController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
        $user = $this->userRepository->makeModel()->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken($request->device_name)->plainTextToken;
        return $this->sendResponse(['token' => $token], 'success');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = $this->userRepository->create($input);
        $user->syncRoles('Pasien');
        $token = $user->createToken($request->device_name)->plainTextToken;
        return $this->sendResponse(['token' => $token], 'success');
    }

    public function postTokenFCM(Request $request)
    {
        $this->userRepository->update(['token_fcm' => $request->tokenFCM], $request->user()->id);
        return $this->sendResponse([], 'Success Upload Token FCM');
    }

    public function user(Request $request)
    {
        return $this->sendResponse($request->user(), 'success');
    }

    public function updateProfile(Request $request)
    {
        if ($request->user()->hasRole("Pasien")) {
            $updatedUser = $this->userRepository->update($request->all(), $request->user()->id);
            return $this->sendResponse($updatedUser->only(['id', "name", 'email', 'email_kerabat', 'phone', 'alamat', 'tempat_lahir', 'tanggal_lahir']), 'success');
        } else {
            return $this->sendError("You dont have permission to change password");
        }
    }

    public function changePassword(Request $request)
    {
        if ($request->user()->hasRole("Pasien")) {
            if (Hash::check($request->user()->password, $request->old_password)) {
                $this->userRepository->update(['password' => $request->new_password], $request->user()->id);
                return $this->sendSuccess('Password changed successfully');
            } else {
                return $this->sendError("Failed Change Password");
            }
        } else {
            return $this->sendError("You dont have permission to change password");
        }
    }
}
