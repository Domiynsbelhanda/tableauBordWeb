<?php

namespace Database\Seeders;

use App\Models\Militaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MilitaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $noms = [
            "Lumumba",
            "Mwepu",
            "Kasongo",
            "Nkunda",
            "Ilunga",
            "Kabange",
            "Katumbi",
            "Muzito",
            "Kamerhe",
            "Bemba",
            "Kalala",
            "Ngoy",
            "Kongo",
            "Matata",
            "Nkuba",
            "Lutumba",
            "Mulumba",
            "Mukendi",
            "Kasavubu",
            "Masuwa",
            "Kimbangu",
            "Mobutu",
            "Moke",
            "Kabongo",
            "Mbuyi",
            "Tshimanga",
            "Lumbala",
            "Mukwege",
            "Ngbale",
            "Tshibangu",
            "Kanambe",
            "Likulia",
            "Munene",
            "Sakombi",
            "Batubenga",
            "Bombole",
            "Kyungu",
            "Yav",
            "Ntumba",
            "Ngandu",
            "Sendwe",
            "Kibassa",
            "Kiaku",
            "Mwanza",
            "Ndaye",
            "Numbi",
            "Bongongo",
            "Kikaya",
            "Nzimbi",
            "Kimba",
            "Kanyama",
            "Lukonde",
            "Kalombo",
            "Nzemba",
            "Kinkela",
            "Mulanga",
            "Nyembo",
            "Mukuna",
            "Nkoy",
            "Nsenga",
            "Katalay",
            "Mulongoy",
            "Mwamba",
            "Ngeleka",
            "Shamavu",
            "Shango",
            "Kambale",
            "Kumwimba",
            "Mubiala",
            "Nzaji",
            "Wamba",
            "Lusamba",
            "Mulopwe",
            "Kikunda",
            "Kin-kiey",
            "Mudimbi",
            "Mutombo",
            "Mundele",
            "Muteba",
            "Kizito",
            "Kamitatu",
            "Malumba",
            "Kabeya",
            "Nkere",
            "Kalume",
            "Musungay",
            "Ngulu",
            "Tambwe",
            "Wazabanga",
            "Mpinga",
            "Musangu",
            "Lokuli",
            "Lwamba",
            "Dibwe",
            "Batumona",
            "Mbuku",
            "Nyimi",
            "Kwete"
        ];
        $prenoms = [
            "Lumumba",
            "Mwepu",
            "Kasongo",
            "Nkunda",
            "Ilunga",
            "Kabange",
            "Katumbi",
            "Muzito",
            "Kamerhe",
            "Bemba",
            "Kalala",
            "Ngoy",
            "Kongo",
            "Matata",
            "Nkuba",
            "Lutumba",
            "Mulumba",
            "Mukendi",
            "Kasavubu",
            "Masuwa",
            "Kimbangu",
            "Mobutu",
            "Moke",
            "Kabongo",
            "Mbuyi",
            "Tshimanga",
            "Lumbala",
            "Mukwege",
            "Ngbale",
            "Tshibangu",
            "Kanambe",
            "Likulia",
            "Munene",
            "Sakombi",
            "Batubenga",
            "Bombole",
            "Kyungu",
            "Yav",
            "Ntumba",
            "Ngandu",
            "Sendwe",
            "Kibassa",
            "Kiaku",
            "Mwanza",
            "Ndaye",
            "Numbi",
            "Bongongo",
            "Kikaya",
            "Nzimbi",
            "Kimba",
            "Kanyama",
            "Lukonde",
            "Kalombo",
            "Nzemba",
            "Kinkela",
            "Mulanga",
            "Nyembo",
            "Mukuna",
            "Nkoy",
            "Nsenga",
            "Katalay",
            "Mulongoy",
            "Mwamba",
            "Ngeleka",
            "Shamavu",
            "Shango",
            "Kambale",
            "Kumwimba",
            "Mubiala",
            "Nzaji",
            "Wamba",
            "Lusamba",
            "Mulopwe",
            "Kikunda",
            "Kin-kiey",
            "Mudimbi",
            "Mutombo",
            "Mundele",
            "Muteba",
            "Kizito",
            "Kamitatu",
            "Malumba",
            "Kabeya",
            "Nkere",
            "Kalume",
            "Musungay",
            "Ngulu",
            "Tambwe",
            "Wazabanga",
            "Mpinga",
            "Musangu",
            "Lokuli",
            "Lwamba",
            "Dibwe",
            "Batumona",
            "Mbuku",
            "Nyimi",
            "Kwete"
        ];
        $grades = ['Caporal', 'Sergent', 'Lieutenant', 'Capitaine'];

        for ($i = 0; $i < 100; $i++) {
            Militaire::create([
                'nom' => $noms[array_rand($noms)],
                'prenom' => $prenoms[array_rand($prenoms)],
                'matricule' => 'MIL' . str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'grade' => $grades[array_rand($grades)],
                'description' => 'Description générique'
            ]);
        }
    }
}
