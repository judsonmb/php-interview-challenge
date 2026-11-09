<?php
declare(strict_types=1);

namespace Tests\Feature\API\V1\DogFacts\Rest;

use App\Http\Controllers\API\V1\DogFacts\Rest\StoreController;
use App\Models\DogFact;
use App\Repositories\DogFactRepository;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    protected string $fact = 'This is a test fact from the StoreControllerTest';

    public function testSuccess(): void
    {
        $response = $this->postJson('/api/v1/dog-facts', [
            'fact' => $this->fact,
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'fact' => $this->fact,
        ]);

        DogFact::destroy($response->json('id'));
    }

    public function testValidationFailure(): void
    {
        $response = $this->postJson('/api/v1/dog-facts', []);

        $response->assertStatus(422);

        $response2 = $this->postJson('/api/v1/dog-facts', [
            'fact' => null,
        ]);

        $response2->assertStatus(422);

        $response3 = $this->postJson('/api/v1/dog-facts', [
            'fact' => 123,
        ]);

        $response3->assertStatus(422);
    }

    public function testHandlesExceptionDuringSave(): void
    {
        $this->app->bind(StoreController::class, function () {
            $mock = $this->getMockBuilder(DogFactRepository::class)
                ->onlyMethods(['store'])
                ->getMock();

            $mock->expects($this->once())
                ->method('store')
                ->willThrowException(new \Exception('Some DB error'));

            return new StoreController($mock);
        });

        $response = $this->postJson('/api/v1/dog-facts', [
            'fact' => $this->fact,
        ]);

        $response->assertStatus(500);
    }

    public function testHandlesFailureToSave(): void
    {
        $this->app->bind(StoreController::class, function () {
            $mock = $this->getMockBuilder(DogFactRepository::class)
                ->onlyMethods(['store'])
                ->getMock();

            $mock->expects($this->once())
                ->method('store')
                ->willReturn(null);

            return new StoreController($mock);
        });

        $response = $this->postJson('/api/v1/dog-facts', [
            'fact' => $this->fact,
        ]);

        $response->assertStatus(500);
    }
}
