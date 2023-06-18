<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Person;

class UsernameTest extends TestCase
{
    public function testCheckUsername()
    {
        // Test username that does not exist
        $response = $this->get('/check-username/johndoe');
        $response->assertJson([
            'exists' => false,
        ]);

        // Test username that exists
        $person = Person::factory()->create([
            'fullName' => 'Jane Doe',
            'username' => 'janedoe',
            'birthDate' => '1990-01-01',
            'phone' => '123-456-7890',
            'address' => '123 Main St',
            'password' => 'password',
            'confirmPassword' => 'password',
            'image' => 'asmaa.jpg',
            'email' => 'johndoe@example.com'

        ]);
        $response = $this->get('/check-username/janedoe');
        $response->assertJson([
            'exists' => true,
        ]);
    }

}
