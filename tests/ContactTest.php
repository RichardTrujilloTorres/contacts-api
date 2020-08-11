<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Faker\Provider\Uuid;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;

class ContactTest extends ApiTestCase
{
    use RefreshDatabaseTrait;

    public function testGetCollection(): void
    {
        static::createClient()->request('GET', '/api/contacts', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertResponseHasHeader('content-type', 'application/json');
    }

    public function testCreateContact(): void
    {
        $uuid = Uuid::uuid();

        $contactData = [
            'uuid' => $uuid,
            'email' => 'john.doe@gmail.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'gender' => 'male',
            'notes' => 'Some test user',
        ];

        static::createClient()->request('POST', '/api/contacts', [
            'json' => $contactData,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertResponseHasHeader('content-type', 'application/json');
        $this->assertJsonContains($contactData);
    }
}
