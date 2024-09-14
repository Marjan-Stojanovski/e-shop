<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_countries = '[
        {
        "id":"20",
        "alpha2":"ad",
        "alpha3":"and",
        "name":"Andora"
        },
        {
        "id":"8",
        "alpha2":"al",
        "alpha3":"alb",
        "name":"Albanija"
        },
        {
        "id":"826",
        "alpha2":"gb",
        "alpha3":"gbr",
        "name":"Združeno kraljestvo Velike Britanije in Severne Irske"
        },
        {
        "id":"300",
        "alpha2":"gr",
        "alpha3":"grc",
        "name":"Grčija"
        },
        {
        "id":"191",
        "alpha2":"hr",
        "alpha3":"hrv",
        "name":"Hrvaška"
        },
        {
        "id":"348",
        "alpha2":"hu",
        "alpha3":"hun",
        "name":"Madžarska"
        },
        {
        "id":"372",
        "alpha2":"ie",
        "alpha3":"irl",
        "name":"Irska"
        },
        {
        "id":"352",
        "alpha2":"is",
        "alpha3":"isl",
        "name":"Islandija"
        },
        {
        "id":"380",
        "alpha2":"it",
        "alpha3":"ita",
        "name":"Italija"
        },
        {
        "id":"438",
        "alpha2":"li",
        "alpha3":"lie",
        "name":"Lihtenštajn"
        },
        {
        "id":"440",
        "alpha2":"lt",
        "alpha3":"ltu",
        "name":"Litva"
        },
        {
        "id":"442",
        "alpha2":"lu",
        "alpha3":"lux",
        "name":"Luksemburg"
        },
        {
        "id":"428",
        "alpha2":"lv",
        "alpha3":"lva",
        "name":"Latvija"
        },
        {
        "id":"492",
        "alpha2":"mc",
        "alpha3":"mco",
        "name":"Monako"
        },
        {
        "id":"498",
        "alpha2":"md",
        "alpha3":"mda",
        "name":"Moldavija"
        },
        {
        "id":"499",
        "alpha2":"me",
        "alpha3":"mne",
        "name":"Črna gora"
        },
        {
        "id":"807",
        "alpha2":"mk",
        "alpha3":"mkd",
        "name":"Severna Makedonija"
        },
        {
        "id":"470",
        "alpha2":"mt",
        "alpha3":"mlt",
        "name":"Malta"
        },
        {
        "id":"528",
        "alpha2":"nl",
        "alpha3":"nld",
        "name":"Nizozemska"
        },
        {
        "id":"578",
        "alpha2":"no",
        "alpha3":"nor",
        "name":"Norveška"
        },
        {
        "id":"616",
        "alpha2":"pl",
        "alpha3":"pol",
        "name":"Poljska"
        },
        {
        "id":"620",
        "alpha2":"pt",
        "alpha3":"prt",
        "name":"Portugalska"
        },
        {
        "id":"642",
        "alpha2":"ro",
        "alpha3":"rou",
        "name":"Romunija"
        },
        {
        "id":"688",
        "alpha2":"rs",
        "alpha3":"srb",
        "name":"Srbija"
        },
        {
        "id":"643",
        "alpha2":"ru",
        "alpha3":"rus",
        "name":"Rusija"
        },
        {
        "id":"752",
        "alpha2":"se",
        "alpha3":"swe",
        "name":"Švedska"
        },
        {
        "id":"705",
        "alpha2":"si",
        "alpha3":"svn",
        "name":"Slovenija"
        },
        {
        "id":"703",
        "alpha2":"sk",
        "alpha3":"svk",
        "name":"Slovaška"
        },
        {
        "id":"674",
        "alpha2":"sm",
        "alpha3":"smr",
        "name":"San Marino"
        },
        {
        "id":"792",
        "alpha2":"tr",
        "alpha3":"tur",
        "name":"Turčija"
        },
        {
        "id":"804",
        "alpha2":"ua",
        "alpha3":"ukr",
        "name":"Ukrajina"
        }
        ]';

        //Empty the countries table
        DB::table("countries")->delete();
        DB::statement("ALTER TABLE countries AUTO_INCREMENT = 1;");


        //Get all of the countries
        $countries = json_decode($all_countries, true);

        foreach ($countries as $c) {

            $country = new Country();
            $country->country_code = $c["id"];
            $country->name = $c["name"];
            $country->save();
        }

    }

}
