<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\GalleryImages;
use App\Enums\StatusEnums;
use Illuminate\Database\Eloquent\Factories\Factory ;

class TrystUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $model = User::class;
   // protected $galaryImage = GalleryImages::class;


    public function run(): void
    {
          $jsonData = '[
               {
  "name": "Zoe Blair",
  "tagline": "Unforgettable Vixen",
  "pronouns": "She/Her",
  "locations": [
    "tennessee/nashville",
    "tennessee/memphis",
    "alabama/birmingham"
  ],
  "about": "***To get a first look at candid photos, stay up to date with my schedule, and to get to know me better, feel free to visit my website and follow my Twitter: @zoeblairxo Hello, love.I\u2019m excited that we\u2019re finally crossing paths. Nice to meet you, I\u2019m Zoe. I\u2019m a tech-savvy IT student, diving into the world of cybersecurity and project management. But wait, there\u2019s more to me than firewalls and scripting code. I\u2019m the adventurous, wild, and versatile soul you\u2019ve been looking for, with a hunger for experiences that set the soul on fire. From traveling the country to hiking rugged trails, kayaking through the wild rapids to exercising my culinary expertise, and turning clay and paint into art, I\u2019m all about living hands-on. Let\u2019s chat about my escapades across the country over a dinner date.I\u2019m petite, yet curvaceous, with velvety brown skin that begs to be touched. My smile? It\u2019s infectious, capable of brightening even the gloomiest of days. Those who know me knows there\u2019s more to the surface than my appearance. They\u2019d describe me as kind-hearted, quick-witted, down to earth, brilliantly sharp, and delightfully comical. One of my many gifts, that I can\u2019t wait to share with you, is the ability to make people feel like they\u2019ve known me a lifetime by making them feel comfortable. I\u2019m here to be your source of pleasure, your escape from the monotony of life, and who you think of when you remember the difference between merely existing and living.So what do you say? Will we celebrate each other over glasses of champagne after wandering the halls of art museums? Will we exchange our deepest passions while exploring Or, will we stay in bed on a Sunday and watch the sunrise after a long night of adventure and rendezvous? Let\u2019s answer that together.Until Then,Zoe xxI can\u2019t wait to meet you! \u2665\ufe0f",
  "based_in": "Nashville, Tennessee, United States",
  "caters_to": "Men, Women, Non-binary, and Couples",
  "last_active": "Today",
  "gender": "Woman (She/Her)",
  "age": "20s",
  "policies": {
    "deposits": "Screening and a 30% deposit are required for all new friends. \r\n50% deposit required for all appointments 4 hours or more and FMTY arrangements.\r\nI accept Cash App, Venmo, and Bitcoin (BTC) for deposits. \r\n\r\n**For more details, feel free to visit my website.",
    "cancellations": "I get it; life can throw unexpected things our way. In those unpredictable moments, let\u2019s be considerate of each other\u2019s time.\r\n\r\nA 72-hour notice is needed in order to cancel or reschedule within 30 days of your deposit. Cancellations outside of that window will result in a forfeiture of deposit to cover your cancellation fee.\r\n\r\nIn the very rare event that I need to cancel, you\u2019ll receive a full refund.\r\n\r\n**For more details, feel free to visit my website."
  },
  "contact": {
    "twitter": "https://twitter.com/Zoeblairxo",
    "website": "https://zoeblair.net"
  },
  "incall_rates": {
    "Incall Fee": "250"
  },
  "outcall_rates": {
    "1.5 Hours - Primer": "700",
    "2 Hours - Gesso": "900",
    "3 Hours - Watercolour": "1400",
    "4 Hours - Gouache": "1800",
    "6 Hours - Acrylic Ink": "2500",
    "Up to 12 Hours - Overnight": "4000"
  },
  "slideshow_images": [
    "https://media.tryst.a4cdn.org/wvceR6HyhI14f4Ah-uDK3E1NNmyDQbomq06-Lez8zYc/fit/0/0/no/0/plain/tryst/store/c348a618c97ff46905a58a5ba0483717.jpg",
    "https://media.tryst.a4cdn.org/AIG4BvdFShT3Jrx9Anw7NDRhfEYlxTwYE6x0E9cHOGU/fit/0/0/no/0/plain/tryst/store/373180d183c7f373fcf6d4538058b30d.jpg",
    "https://media.tryst.a4cdn.org/Ld73y-hpaDFtjztezAfB25PMNNNO_tBFtbIBlyTvvVU/fit/0/0/no/0/plain/tryst/store/101ac2282a264f6df749a01325d6a933.jpg",
    "https://media.tryst.a4cdn.org/1tun0GEfRLFZ1uas21GyRA_i2OAvnnGQWWAMQ0ghuUo/fit/0/0/no/0/plain/tryst/store/e71bf4e759d28e0ac30e95d4e94c3cba.jpg",
    "https://media.tryst.a4cdn.org/zdXjiBTfYDryvhRMx8ta3SfvYXeDj4BJ3WAZGYypSYs/fit/0/0/no/0/plain/tryst/store/744fb08d00ded4fe41732786e34f4847.jpg",
    "https://media.tryst.a4cdn.org/YuWYWuPyAIM_LUbnP1A-rSXpDBKNYyV45n457erPcFs/fit/0/0/no/0/plain/tryst/store/be39edc7a795fcf6994c6566dd3842cf.jpg",
    "https://media.tryst.a4cdn.org/4pD4jknCdlEUBWLz7fDDVQXlMMaX0cq5a3q1ta35_V0/fit/0/0/no/0/plain/tryst/store/f04493705620dad326611240794b71c5.jpg",
    "https://media.tryst.a4cdn.org/bKOu2jkIz01kfNyeYCIifYc52GdooRX8M0kT5U1ik2w/fit/0/0/no/0/plain/tryst/store/803df11ea7a059041a2430fb4283b186.jpg",
    "https://media.tryst.a4cdn.org/a6ce8hDvi_LAMDtIrMfxtlwly4rYFOsm-dHEvh2vKLM/fit/0/0/no/0/plain/tryst/store/500ae6ef72dbd88c533fe79874f70d9e.jpg",
    "https://media.tryst.a4cdn.org/BoHsdotrz5PMRoIVDQ9x5G415LZLtvih8u8g1yefazE/fit/0/0/no/0/plain/tryst/store/ef2d6b4333462d134d3f8b39a1dd1da7.jpg",
    "https://media.tryst.a4cdn.org/YNMiS80xnerXJnd0u5V1nKqVA9XS2jqfp1EAFOPnpK8/fit/0/0/no/0/plain/tryst/store/909f82f0b1e24d66bfe3acf8314cdfaa.jpg",
    "https://media.tryst.a4cdn.org/MhwF6CgD1bg7TotFZHveoqoPzxb-9CuOHGQWrEmn33o/fit/0/0/no/0/plain/tryst/store/a4ccc319461e42d6ebad7498fc08c7ac.jpg",
    "https://media.tryst.a4cdn.org/UhWQJXqDd1rNg06LIIAp6OvZxMYVVsKSJ-kEC-K7ZZ8/fit/0/0/no/0/plain/tryst/store/96de04dbb85fec3569f9a1ba325042f6.jpg",
    "https://media.tryst.a4cdn.org/TfiXHOfAWBEXsCLD8k_HxhTYh0m28USpH-x8oZ8EPhg/fit/0/0/no/0/plain/tryst/store/b097725a45a42c394a3b65b5d1844035.jpg",
    "https://media.tryst.a4cdn.org/zqc-gX4vLAa8IhNwfOPrbabkMQ5Gl_jMER6wzJ4gDhg/fit/0/0/no/0/plain/tryst/store/c79b6f1f30034598023700f82383c3ae.jpg",
    "https://media.tryst.a4cdn.org/-pZuoKsj0KyP7mH-YMJLTY_4OAPNm9RSock-TvIJv9U/fit/0/0/no/0/plain/tryst/store/bce67ceeaaad3a678919230948bff0fd.jpg",
    "https://media.tryst.a4cdn.org/DJUFiUczTFVCfb1U2j5oybTDGuKv43EON5oqHI2kbLg/fit/0/0/no/0/plain/tryst/store/15d232e70ca154a70bd273e5e11efac4.jpg",
    "https://media.tryst.a4cdn.org/XJWjr5xhm7RZV-InT8tPPRRVXScKtLN8xAMKn5WaAiY/fit/0/0/no/0/plain/tryst/store/9f425708a923cf72086ceb2c879ae834.jpg",
    "https://media.tryst.a4cdn.org/oIYmHmcawcAW3kEF_hN3LWZbVYFJoxQD3K-RmUUZZ6U/fit/0/0/no/0/plain/tryst/store/584eb97fa0ee7041a54116e60d256d25.jpg"
  ]
},
{
  "name": "Annastasia",
  "tagline": "Incall and Outcalls Available",
  "pronouns": "She/Her",
  "locations": [
    "texas/dallas",
    "texas/addison",
    "texas/plano"
  ],
  "about": "Hey boys! I\u2019m Anastasia, the Puerto Rican mami who will Rock your world. I am a dancer, and have worked at many clubs across the state, and country; come enjoy me privately!  I tend to get along with older, wiser gentlemen, who know what that want out of life or they\u2019ve already attained it.    I\u2019m not too picky though, I have made great relationships with dapper respectful younger gentlemen as well. Please be clean and respectful, and I\u2019m sure we can both enjoy ourselves, I know I will!! FT verification upon requestNo scam!No deposit!",
  "based_in": "Dallas, Texas, United States",
  "caters_to": "Men, Women, Non-binary, and Couples",
  "last_active": "Today",
  "gender": "Woman (She/Her)",
  "age": "25",
  "contact": {},
  "slideshow_images": [
    "https://media.tryst.a4cdn.org/ekXyDk1z2Ckl0hxAJojxiCe66BFLUMAd0L__ibrmRWM/fit/0/0/no/0/plain/tryst/store/57272ea2e030cd7a7b560318e066e55f.jpg",
    "https://media.tryst.a4cdn.org/6DhM6pieOFhBl16f5ev5-Ke6FUJ0NUtDV3p8V9ORU_M/fit/0/0/no/0/plain/tryst/store/897f3f74d4df618fe23ac19b0e0cb3da.jpg",
    "https://media.tryst.a4cdn.org/KBT2KQVz8NlwiP6_WHZSwaCeBAksMH_6N15nvo6xbJA/fit/0/0/no/0/plain/tryst/store/dc2c9a1700858f2b2e5660107438c91b.jpg",
    "https://media.tryst.a4cdn.org/23BfJmDsuAq-m79Qz4mBlg_RDf8FTqHzf9p-8DBTPaA/fit/0/0/no/0/plain/tryst/store/e0f12170691df73d58f97b0dd2d31e38.jpg",
    "https://media.tryst.a4cdn.org/wjfk5qebKdq3ECRZeBgLG-PUbH2dDshzG92Xi47R_BA/fit/0/0/no/0/plain/tryst/store/edb78a210f2c203fa2d12c827c6338de.jpg",
    "https://media.tryst.a4cdn.org/q9TE-WWxH0rSkA6068xNSBL0bYvKIfBL8jnVYQ8xuuU/fit/0/0/no/0/plain/tryst/store/3f9cd619ae7db0ff1091785c45912626.jpg",
    "https://media.tryst.a4cdn.org/LHLMPhU2au-qJaxfefGobUZzN8IHEtNTtnXosgkbyc4/fit/0/0/no/0/plain/tryst/store/249b54529ca8d3fa95940afd2e4dc1d3.jpg"
  ]
}
        ]';


          $data = json_decode($jsonData, true);

        foreach ($data as $userJson) {

        $user = User::create([
            'custom_id' => get_unique_string('users'),
            'full_name' => $userJson['name'],
            'user_name' => str_replace(' ', '', $userJson['name']),
            'email' => str_replace(' ', '', $userJson['name']) . '@gmail.com',
            'password' => Hash::make('password'),
            'short_description' => $userJson['tagline'],
            'description' => $userJson['about'],
            'pronouns' => $userJson['pronouns'],
            'gender' => 'female',
            'age' => (int) preg_replace('/[^0-9]/', '', $userJson['age']),
            'caters_to' => $userJson['caters_to'],
            'body_type' => implode(',', $this->getRandomElements(['Slim', 'Curvy', 'Athletic', 'BBW', 'Muscular'], 2)), // Adjust the count as needed
            'height' => $this->getRandomNumberBetween(140, 190),
            'ethnicity' => $this->getRandomElement(['Asian', 'Black', 'Caucasian', 'Latin', 'Mixed']),
            'availibility' => json_encode(['Monday' => true, 'Tuesday' => true, 'Wednesday' => true, 'Thursday' => true, 'Friday' => true, 'Saturday' => true, 'Sunday' => true]),
            'availibility_description' => "ascasc",
            'cup_size' => $this->getRandomElement(['AA', 'A', 'B', 'C', 'D', 'DD', 'DDD', 'F', 'G']),
            'hair_colour' => $this->getRandomElement(['Black', 'Blonde', 'Brunette', 'Red', 'Grey', 'White']),
            'shoe_size' => $this->getRandomNumberBetween(3, 10),
            'eye_colour' => $this->getRandomElement(['Black', 'Blue', 'Brown', 'Green', 'Grey']),
            'last_logged_in' => now()->subYears(rand(0, 1))->format('Y-m-d H:i:s'),
            'profile_photo' => null,
            'thumbnail_image' => $userJson['slideshow_images'][0],
            'membership' => null,
            'contact_disclaimer' => "sacasc",
            'is_active' => $this->getRandomElement([StatusEnums::ACTIVE, StatusEnums::INACTIVE]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        foreach ($userJson['slideshow_images'] as $imageUrl) {
        $user->gallery_images()->create([
            'custom_id' => get_unique_string(),
            'image' => $imageUrl,
        ]);
    }

    }
    }

    // Helper methods

    private function getRandomElement(array $array)
    {
        return $array[array_rand($array)];
    }

    private function getRandomNumberBetween($min, $max)
    {
        return rand($min, $max);
    }

    private function getRandomElements(array $array, $count = 1)
    {
        return array_rand(array_flip($array), $count);
    }

    // Add more helper methods as needed
}
