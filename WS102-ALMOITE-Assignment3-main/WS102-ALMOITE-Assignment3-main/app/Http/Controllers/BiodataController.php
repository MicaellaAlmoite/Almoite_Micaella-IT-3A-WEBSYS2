<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $data = [
            'fullName' => 'Micaella Shane M. Almoite',
            'age' => 23,
            'birthInfo' => 'January 27 , 2003 , 8:30 AM',
            'residence' => 'Binalonan, Pangasinan',
            'nationality' => 'Filipino',
            'religion' => 'Pentecostal',
            'height' => '5\'0"',
            'education' => 'BS in Information Technology',
            'occupation' => 'Junior Web Developer',
            'languages' => 'English, Filipino , Ilocano',
            'aboutMe' => 'I like reading book (fiction and romance) and i also love watching k-drama and anime when i  dont have anything to do. I am the Creative and Media Head in our Church, I also do simple layouts for our church and post it in our page. what i really love is going out with my friends and coffee hunting with them.',
            'father' => 'Clint Almoite',
            'fatherProf' => 'Philippine Navy',
            'mother' => 'Imee Almoite',
            'motherProf' => 'Housewife',
            'noBrother' => '1',
            'noSister' => '1',
            'familyType' => 'Nuclear Family',
            'socialClass' => 'Middle Class',
            'placeRes' => 'Philippines',
            'expectations' => 'What are my expectations here in this course is to learn and love more about Web Designing and the system itself.',
            'contact' => '09097961853',
            'address' => 'Sumabnit , Binalonan , Pangasinan'
        ];

        return view('biodata', $data);
    }
}
