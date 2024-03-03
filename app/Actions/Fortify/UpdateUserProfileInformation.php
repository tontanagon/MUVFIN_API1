<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\customer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */


     public function update(User $user, array $input ): void
     {
         // ค้นหาข้อมูลลูกค้าที่มีอยู่แล้ว
         $customer = Customer::findOrFail($user->id);

         Validator::make($input, [
             'name' => ['required', 'string', 'max:255'],
             'first_name' => ['required', 'string', 'max:50'],
             'last_name' => ['required', 'string', 'max:50'],
             'phone' => ['required', 'string', 'max:20'],
             'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
             'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
         ])->validateWithBag('updateProfileInformation');

         if (isset($input['photo'])) {
             $user->updateProfilePhoto($input['photo']);
         }

         if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
             $this->updateVerifiedUser($user, $input);
         } else {
             $user->forceFill([
                 'name' => $input['name'],
                 'email' => $input['email'],
             ])->save();

             // อัปเดตข้อมูลลูกค้า
             $customer->forceFill([
                 'first_name' => $input['first_name'],
                 'last_name' => $input['last_name'],
                 'phone' => $input['phone'],
                 'email' => $input['email'],
             ])->save();
         }
     }

     /**
      * Update the given verified user's profile information.
      *
      * @param  array<string, string>  $input
      */
     protected function updateVerifiedUser(User $user, array $input): void
     {
         // ค้นหาข้อมูลลูกค้าที่มีอยู่แล้ว
         $customer = Customer::findOrFail($user->id);

         $user->forceFill([
             'name' => $input['name'],
             'email' => $input['email'],
             'email_verified_at' => null,
         ])->save();

         // อัปเดตข้อมูลลูกค้า
         $customer->forceFill([
             'first_name' => $input['first_name'],
             'last_name' => $input['last_name'],
             'phone' => $input['phone'],
             'email' => $input['email'],
             'email_verified_at' => null,
         ])->save();

         $user->sendEmailVerificationNotification();
     }
}
