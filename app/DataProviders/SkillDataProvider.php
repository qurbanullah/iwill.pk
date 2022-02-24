<?php

namespace App\DataProviders;

abstract class SkillDataProvider
{

    public static function Skills()
    {
        return [
            ['id' => '1', 'name' => 'Carpenter', 'slug' => 'carpenter', 'content' => 'A person who makes and repairs wooden objects and structures.'],
            ['id' => '2', 'name' => 'Cargo', 'slug' => 'cargo', 'content' => 'Goods carried on a ship, aircraft, or motor vehicle.'],
            ['id' => '3', 'name' => 'Computer Technician', 'slug' => 'computer-technician', 'content' => 'A computer technician is an individual who identifies, troubleshoots and resolves computer problems. '],
            ['id' => '4', 'name' => 'Doctor', 'slug' => 'doctor', 'content' => 'A person who is qualified to treat people who are ill.'],
            ['id' => '5', 'name' => 'Electrician', 'slug' => 'electrician', 'content' => 'A person who installs and maintains electrical equipment.'],
            ['id' => '6', 'name' => 'Plumber', 'slug' => 'plumber', 'content' => 'A person who fits and repairs the pipes, fittings, and other apparatus of water supply, sanitation, or heating systems.'],
            ['id' => '7', 'name' => 'Programmer', 'slug' => 'programmer', 'content' => 'A person who writes computer programs.'],
            ['id' => '8', 'name' => 'Tutor', 'slug' => 'tutor', 'content' => 'A private teacher, typically one who teaches a single pupil or a very small group.'],
        ];
    }
}
