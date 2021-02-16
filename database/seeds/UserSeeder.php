<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Transport;
use App\Department;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'name' => 'ሲስተም አድሚን',
        ]);

        $role2 = Role::create([
            'name' => 'ዋና አዘጋጅ',
        ]);
        $role4 = Role::create([
            'name' => 'ጋዜጠኛ',
        ]);
        $role3 = Role::create([
            'name' => 'ምክትል ዋና አዘጋጅ',
        ]);
        $role5 = Role::create([
            'name' => 'ፋይናንስ',
        ]);$role6 = Role::create([
            'name' => 'ፋይናንስ ሀላፊ',
        ]);


        $depatment1 = Department::create([
            'name' => 'ዋና ስራ አስኪያጅ',
            'slug' => 'ስራ አስኪያጅ',
        ]);

        $depatment2 = Department::create([
            'name' => 'ደንበኞ አገልግሎት',
            'slug' => 'ደንበኞ አገልግሎት',
        ]);


        $depratment3 = Department::create([
            'name' => 'በኩር ጋዜጣ ዝግጅት',
            'slug' => 'በኩር ጋዜጣ ዝግጅት',
        ]);
        $depratment4 = Department::create([
            'name' => 'ስልጠናና ምርምር ማዕከል',
            'slug' => 'ስልጠናና ምርምር ማዕከል',
        ]);
        $depratment5 = Department::create([
            'name' => 'ቋንቋዎች ዳይሬክቶሬት',
            'slug' => 'ቋንቋዎች ዳይሬክቶሬት',
        ]);

        $depratment6 = Department::create([
            'name' => 'ብሮድካስት ኢንጅነሪንግ ዳይሬክቶሬት',
            'slug' => 'ብሮድካስት ኢንጅነሪንግ',
        ]);
        $depratment7 = Department::create([
            'name' => 'ኘሮሞሽንና ገበያ ልማት ዳይሬክቶሬት',
            'slug' => 'ኘሮሞሽንና ገበያ ልማት',
        ]);
        $depratment8 = Department::create([
            'name' => 'ቀረፃና ቅንብር ዳይሬክቶሬት',
            'slug' => 'ቀረፃና ቅንብር',
        ]);
        $depratment9 = Department::create([
            'name' => 'አማራ ሬዲዬ ዜናና ኘሮግራሞች ዋና የስራ ሂደት',
            'slug' => 'አማራ ሬዲዬ ዜናና ኘሮግራሞች',
        ]);
        $department10 = Department::create([
            'name' => 'አማራ ቴሌቪዥን ዜናና ስፖርት ዋና የስራ ሂደት',
            'slug' => 'አማራ ቴሌቪዥን ዜናና ስፖርት',
        ]);
        $department11 = Department::create([
            'name' => 'አማራ ቴሌቪዥን ኘሮግራሞች ዋና የስራ ሂደት',
            'slug' => 'አማራ ቴሌቪዥን ኘሮግራሞች',
        ]);
        $department12 = Department::create([
            'name' => 'ኤፍኤም ዜናና ኘሮግራሞች ዋና የስራ ሂደት',
            'slug' => 'ኤፍኤም ዜናና ኘሮግራሞች',
        ]);
        $department13 = Department::create([
            'name' => 'ኦንላይንና ሞኒተሪንግ',
            'slug' => 'ኦንላይንና ሞኒተሪንግ',
        ]);
        $department14 = Department::create([
            'name' => 'የውስጥ ኦዲት ደጋፊ የስራ ሂደት',
            'slug' => 'የውስጥ ኦዲት ሂደት',
        ]);
        $department15 = Department::create([
            'name' => 'የሰው ሀብት ስራ አመራር ደጋፊ የስራ ሂደት',
            'slug' => 'የሰው ሀብት ስራ አመራር',
        ]);
        $department16 = Department::create([
            'name' => 'ደንበኞች አገልግሎትና ቅርጫፍ ጣቢያዎች ማስተባበሪያ ዳይሬክቶሬት',
            'slug' => 'ደንበኞች አገልግሎትና ቅርጫፍ ጣቢያዎች',
        ]);
        $department17 = Department::create([
            'name' => 'ግዥ፣ ፋይናንስና ንብረት አስተዳደር ደጋፊ የስራ ሂደት',
            'slug' => 'ግዥ፣ ፋይናንስና ንብረት አስተዳደር',
        ]);
        $department18 = Department::create([
            'name' => 'ጽ/ቤት ኃላፊ',
            'slug' => 'ጽ/ቤት ኃላፊ',
        ]);
        $department19 = Department::create([
            'name' => 'ፕሮዳክሽንና ስርጭት ኦፕሬሽን ዳይሬክቶሬት',
            'slug' => 'ፕሮዳክሽንና ስርጭት ኦፕሬሽን',
        ]);


        $department20 = Department::create([
            'name' => 'ሲሰተም እድሚን',
            'slug' => 'ሲሰተም እድሚን',
        ]);

        $transport1 = Transport::create([
            'name' => 'በመ/ቤቱ ተሽከርካሪ',
        ]);
        $transport2 = Transport::create([
            'name' => 'በህዝብተሽከርካሪ',
        ]);
        $transport3 = Transport::create([
            'name' => 'በአውሮኘላን',
        ]);
        $transport4 = Transport::create([
            'name' => 'በግል ትራንስፖርት',
        ]);


        $admin = User::create([
            'username' => 'chalie',
            'name' => 'Challelign Tilahun',
            'role_id' => $role1->id,
            'password' => Hash::make('passpass'),
            'department_id'=>$department20->id

        ]);

        $superhidet = User::create([
            'username' => 'Desalegn',
            'name' => 'Desalegne Kindu',
            'role_id' => $role2->id,
            'password' => Hash::make('adminadmin'),
            'department_id'=>$department10->id
        ]);

        $hidetmeri = User::create([
            'username' => 'hayile',
            'name' => 'Hayileyesus Adugna',
            'role_id' => $role3->id,
            'password' => Hash::make('adminadmin'),
            'department_id'=>$department10->id
        ]);
//
        $reporter = User::create([
            'username' => 'zelalem',
            'name' => 'Zelalem Asfaw',
            'role_id' => $role4->id,
            'password' => Hash::make('adminadmin'),
            'department_id'=>$department10->id
        ]);

        $finance = User::create([
            'username' => 'aklilu',
            'name' => 'Aklilu Yeniesew',
            'role_id' => $role5->id,
            'password' => Hash::make('adminadmin'),
            'department_id'=>$department17->id
        ]);
        $fmanager = User::create([
            'username' => 'finacemanager',
            'name' => 'Finance manager',
            'role_id' => $role6->id,
            'password' => Hash::make('adminadmin'),
            'department_id'=>$department17->id
        ]);

    }
}
