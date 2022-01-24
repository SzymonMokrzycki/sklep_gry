<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $products = [
            [
                'title' => 'Wiedźmin 3:Dziki Gon',
                'category' => 'cRPG',
                'count' => 5,
                'price' => 34.50,
                'publisher' => 'CD projekt RED',
                'platform' => 'Xbox Series X',
                'year' => '2015',
                'user' => 'administrator',
                'image' => '/pictures/1.jpg',
                'desc' => 'Gra akcji RPG, stanowiąca trzecią część przygód Geralta z Rivii.'

            ],
            [
                'title' => 'Assasins Creed:Odyssey',
                'category' => 'Akcja',
                'count' => 3,
                'price' => 14.55,
                'publisher' => 'Ubisoft',
                'platform' => 'PC',
                'year' => 2018,
                'user' => 'administrator',
                'image' => '/pictures/2.jpg',
                'desc' => 'Jedenasta główna część bestsellerowej serii sandboksowych gier akcji, tym razem wykonująca gwałtowny zwrot w stronę gatunku RPG.'
            ],
            [
                'title' => 'FIFA 22',
                'category' => 'Sportowe',
                'count' => 7,
                'price' => 67.99,
                'publisher' => 'EA Sports',
                'platform' => 'PS5',
                'year' => 2021,
                'user' => 'administrator',
                'image' => '/pictures/3.jpg',
                'desc' => 'FIFA 22 to symulacyjna gra wideo stowarzyszenia piłkarskiego wydana przez Electronic Arts w ramach serii FIFA.'
            ],
            [
                'title' => 'GTA V',
                'category' => 'Akcja',
                'count' => 4,
                'price' => 23.99,
                'publisher' => 'Rockstar',
                'platform' => 'PS4',
                'year' => 2015,
                'user' => 'administrator',
                'image' => '/pictures/4.jpg',
                'desc' => 'GTA 5 to piąta pełnoprawna odsłona niezwykle popularnej serii gier akcji, nad której rozwojem pieczę sprawuje studio Rockstar North we współpracy z koncernem Take Two Interactive.'
            ],
            [
                'title' => 'Red Dead Redemption',
                'category' => 'Akcja',
                'count' => 8,
                'price' => 61.99,
                'publisher' => 'Rockstar',
                'platform' => 'PC',
                'year' => 2010,
                'user' => 'administrator',
                'image' => '/pictures/5.jpg',
                'desc' => 'Red Dead Redemption – przygodowa gra akcji osadzona w realiach Dzikiego Zachodu, wyprodukowana przez Rockstar San Diego i wydana przez Rockstar Games.'
            ],
            [
                'title' => 'Cyberpunk 2077',
                'category' => 'Akcja',
                'count' => 2,
                'price' => 100.99,
                'publisher' => 'CD Projekt RED',
                'platform' => 'PS5',
                'year' => 2021,
                'user' => 'administrator',
                'image' => '/pictures/6.jpg',
                'desc' => 'Cyberpunk 2077 – komputerowa fabularna gra akcji stworzona przez studio CD Projekt Red na platformy Microsoft Windows, PlayStation 4, PlayStation 5, Xbox One, Xbox Series X/S, a także na usługi grania w chmurze – Google Stadia oraz GeForce Now.'
            ],
            [
                'title' => 'Call of Duty: Black Ops Cold War',
                'category' => 'Strzelanki',
                'count' => 3,
                'price' => 25.99,
                'publisher' => 'Activision',
                'platform' => 'Xbox One',
                'year' => 2020,
                'user' => 'administrator',
                'image' => '/pictures/7.jpg',
                'desc' => 'Call of Duty: Black Ops Cold War – strzelanka pierwszoosobowa, stworzona przez Treyarch i Raven Software.'
            ],
            [
                'title' => 'Far Cry 6',
                'category' => 'Strzelanki',
                'count' => 2,
                'price' => 150.99,
                'publisher' => 'Ubisoft',
                'platform' => 'PS5',
                'year' => 2021,
                'user' => 'administrator',
                'image' => '/pictures/8.jpg',
                'desc' => 'Far Cry 6 – strzelanka pierwszoosobowa opracowana przez Ubisoft Toronto i wydana przez Ubisoft.'
            ],
            [
                'title' => 'Dead Island 2',
                'category' => 'Survival horror',
                'count' => 1,
                'price' => 34.99,
                'publisher' => 'Deep Silver',
                'platform' => 'PS4',
                'year' => 2011,
                'user' => 'administrator',
                'image' => '/pictures/9.jpg',
                'desc' => 'Dead Island 2 – gra komputerowa będąca połączeniem gry akcji i survival horroru, opracowana przez Dambuster Studios i wydana przez Deep Silver na PC, PlayStation 4 i Xbox One.'
            ],
            [
                'title' => 'Dying Light 2',
                'category' => 'Survival horror',
                'count' => 5,
                'price' => 50.12,
                'publisher' => 'Techland',
                'platform' => 'PC',
                'year' => 2021,
                'user' => 'administrator',
                'image' => '/pictures/10.jpg',
                'desc' => 'Dying Light 2 – gra komputerowa będąca połączeniem gatunków fabularnej gry akcji i survival horroru, tworzona przez Techland.'
            ],
            [
                'title' => 'Football Manager 2022',
                'category' => 'Sportowe',
                'count' => 3,
                'price' => 74.99,
                'publisher' => 'Sports Interactive',
                'platform' => 'Xbox Series x',
                'year' => 2021,
                'user' => 'administrator',
                'image' => '/pictures/11.jpg',
                'desc' => 'Football Manager 2022 to symulacyjna gra wideo 2021 do zarządzania piłką nożną opracowana przez Sports Interactive i opublikowana przez Sega.'
            ]
        ];
        foreach($products as $product)
        {
            $replaced = Str::replace(':',' ',$product['title']);
            $replaced1 = Str::replace(' ', '', $replaced);
            Product::create([
               'title' => $product['title'],
               'title1' => Str::upper($replaced1),
               'category' => $product['category'],
               'count' => $product['count'],
               'price' => $product['price'],
               'publisher' => $product['publisher'],
               'platform' => $product['platform'],
               'year' => $product['year'],
               'user' => $product['user'],
               'image' => $product['image'],
               'desc' => $product['desc']
            ]);
        }
    }
}
