<?php
declare(strict_types=1);

namespace Tests\Feature\API\V1\DogFacts\Rest;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testSuccess(): void
    {
        $response = $this->getJson('/api/v1/dog-facts');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'current_page',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'links',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total'
        ]);
    }

    public function testSuccessWithPage(): void
    {
        $response = $this->json('GET', '/api/v1/dog-facts', [
            'page' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'current_page' => 2,
        ]);
    }

    public function testSuccessWithPageSize(): void
    {
        $response = $this->json('GET', '/api/v1/dog-facts', [
            'pageSize' => 15,
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'per_page' => 15,
        ]);
    }
}
