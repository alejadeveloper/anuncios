<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ad;
use App\Models\Admin;
use App\Models\AdPackage;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Group;
use App\Models\Media;
use App\Models\Phone;
use App\Models\Profile;
use App\Models\State;
use App\Models\SuperAdmin;
use App\Models\Tag;
use App\Models\TransactionHistory;
use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Eloquent::unguard();

        $this->call([
            PermissionsSeeder::class,
            RoleWebSeeder::class,
            RoleAdminSeeder::class,
            RoleSuperAdminSeeder::class,
        ]);

        $superAdminRole = Role::findByName('Super Admin');
        $adminRole = Role::findByName('Admin');
        $publisherRole = Role::findByName('Publisher');
        $memberRole = Role::findByName('Member');

        $superAdminPermissions = $superAdminRole->permissions;
        $adminPermissions = $adminRole->permissions;
        $publisherPermissions = $publisherRole->permissions;
        $memberPermissions = $memberRole->permissions;

        $superAdmin = User::factory()->create([
            'username' => 'alejita271991',
            'email' => 'alejandra.jaramillo3@icloud.com',
            'level' => 'Super Admin',
        ]);

        $admin = User::factory()->create([
            'username' => 'alberto2498',
            'email' => 'alberto2498@icloud.com',
            'level' => 'Admin',
        ]);

        $superAdmin->assignRole($superAdminRole);
        $superAdmin->givePermissionTo($superAdminPermissions);

        $admin->assignRole($adminRole);
        $admin->givePermissionTo($adminPermissions);

        $superAdmin->profile()->save(Profile::factory()->make());
        $admin->profile()->save(Profile::factory()->make());

        $file_path = resource_path('sql/world.sql');
        \DB::unprepared(file_get_contents($file_path));

        AdPackage::factory(9)->create();
        Category::factory(15)->create();
        Tag::factory(30)->create();
        Group::factory(12)->create();
        Phone::factory(20)->create();

        $countryIds = Country::where('name', 'Spain')->value('id');
        $stateIds = State::whereHas('country', function ($query) {
            $query->where('name', 'Spain');
        })->pluck('id')->toArray();
        $cityIds = City::whereHas('country', function ($query) {
            $query->where('name', 'Spain');
        })->pluck('id')->toArray();
        $groupArray = Group::inRandomOrder()->first();

        User::factory(20)->create()->each(function ($user) use ($countryIds, $stateIds, $cityIds, $publisherPermissions, $publisherRole, $memberRole, $memberPermissions, $groupArray) {
            $photo = Media::factory()->make([
                'url' => 'https://picsum.photos/id/' . rand(1 ,1000) . '/90/90',
                'type' => 'image',
            ]);

            $user->image()->save($photo);
            $user->group()->attach($groupArray);

            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->country()->attach($countryIds);
            $profile->state()->attach($this->randomElement($stateIds));
            $profile->city()->attach($this->randomElement($cityIds));
            $profile->image()->save($photo);
            $profile->group()->attach($groupArray);
//            $profile->phone()->save(Phone::factory()->make());

            if ($user->level === 'Publisher') {
                $user->assignRole($publisherRole);
                $user->givePermissionTo($publisherPermissions);
                $user->save();

                $user->profile->is_publicist = true;
                $user->profile->save();

                $profilesCount = rand(10, 20);
                for ($i = 0; $i < $profilesCount; $i++) {
                    $profileModel = $user->profiles()->save(Profile::factory()->make());
                    $profileModel->country()->attach($countryIds);
                    $profileModel->state()->attach($this->randomElement($stateIds));
                    $profileModel->city()->attach($this->randomElement($cityIds));
                    $profileModel->image()->save(Media::factory()->make([
                        'url' => 'https://picsum.photos/id/' . $profileModel->id . '/90/90',
                        'type' => 'image',
                    ]));

//                    $profile->phone()->save(Phone::factory()->make());

                    $ads = $profileModel->ads()->saveMany(Ad::factory(rand(30, 50))->make());

                    $profileModel->group()->attach($groupArray);

                    $this->getEach($ads, $profileModel);
                }
            } else if ($user->level === 'Member') {
                $user->assignRole($memberRole);
                $user->givePermissionTo($memberPermissions);
                $user->save();
                $profileUser = $user->profile;
                $ads = $profileUser->ads()->saveMany(Ad::factory(rand(10, 20))->make());

                $this->getEach($ads, $profileUser);
            }
        });
    }

    private function randomElement($array)
    {
        return $array[array_rand($array)];
    }

    /**
     * @param $ads
     * @param Model|bool $profile
     * @return void
     */
    private function getEach($ads, Model|bool $profile): void
    {
        $categories = Category::inRandomOrder()->pluck('id')->toArray();
        $tags = Tag::all()->pluck('id')->toArray();
        $groupArray = Group::inRandomOrder()->take(2)->pluck('id');

        $ads->each(function ($ad) use ($profile, $categories, $tags, $groupArray) {
            for ($i = 0; $i < 10; $i++) {
                $mediaType = $this->randomElement(['image', 'video']);

                $url = match ($mediaType) {
                    'image' => 'https://picsum.photos/id/' . rand(1,1000) . '/1024/1024',
                    'video' => $this->randomElement([
                        'https://www.youtube.com/watch?v=Kc6FFUCFFWY',
                        'https://player.vimeo.com/video/819819044?h=1e37baa3f3'
                    ]),
                };

                $ad->media()->save(Media::factory()->make([
                    'url' => $url,
                    'type' => $mediaType,
                ]));
            }

            $ad->country()->attach($profile->country->first());
            $ad->category()->attach($this->randomElement($categories));
            $ad->state()->attach($profile->state->first());
            $ad->city()->attach($profile->city->first());
            $ad->tags()->attach($this->randomElement($tags));

            $ad->cover = Media::factory()->make([
                'url' => 'https://picsum.photos/id/' . rand(1, 1000) . '/200/200',
                'type' => $mediaType,
            ])->url;
            $ad->save();

            $ad->groups()->attach($groupArray);

            $adPackage = AdPackage::inRandomOrder()->first();
            $ad->package()->attach($adPackage->id, ['expires_at' => now()->addDays($adPackage->duration)]);

            TransactionHistory::factory()->create([
                'user_id' => $profile->user_id,
                'ad_id' => $ad->id,
                'ad_package_id' => $ad->package->first()->id,
            ]);
        });
    }
}
