<?php

use App\Organization;
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = explode(', ', config('app.admin_names'));
        $emails = explode(', ', config('app.admin_emails'));
        if (count($names) != count($emails)) {

            throw new Exception('The number of names does not match the number of emails');
        }
        foreach($emails as $key => $email) {
            if (User::where('email', $email)->get()->isEmpty()) {
                $user = factory(User::class)->make([
                    'name' => $names[$key],
                    'email' => $email,
                    'role' => 'admin'
                ]);
                $user->save();
            }
        }

        if (env('APP_ENV') != 'production') {
            factory(User::class, 20)->create([
                'role' => 'transporter',
                'organization_id' => Organization::inRandomOrder()->first()->id,
            ]);
        }
    }
}
