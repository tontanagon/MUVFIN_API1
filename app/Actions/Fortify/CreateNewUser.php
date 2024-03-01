<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
        public function create(array $input): User
        {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'phone' => ['required', 'string', 'max:20'],

            ])->validate();

            return DB::transaction(function () use ($input) {
                // สร้างผู้ใช้ใหม่
                $user = User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
                ]);

                // สร้างทีมสำหรับผู้ใช้ใหม่
                $this->createTeam($user);

                // เพิ่มข้อมูลลงในตาราง customer
                $customer = customer::create([
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'phone' => $input['phone'],
                    'email' => $input['email'],
                ]);

                return $user;
            });


        }




    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
