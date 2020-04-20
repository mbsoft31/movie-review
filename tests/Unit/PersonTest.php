<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Mbsoft\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_person()
    {
        $names = collect([
            'Craig T. Nelson', 'Holly Hunter', 'Sarah Vowell'
        ]);

        $persons = collect();

        $names->each(function($name) use($persons){
            $persons->add(Person::createPerson($name));
        });

        self::assertCount(3, $persons);
        self::assertEquals($names->first(), $persons->first()->name);
    }
}
