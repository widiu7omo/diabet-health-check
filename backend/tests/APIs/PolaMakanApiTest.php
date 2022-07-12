<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PolaMakan;

class PolaMakanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pola_makans', $polaMakan
        );

        $this->assertApiResponse($polaMakan);
    }

    /**
     * @test
     */
    public function test_read_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pola_makans/'.$polaMakan->id
        );

        $this->assertApiResponse($polaMakan->toArray());
    }

    /**
     * @test
     */
    public function test_update_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->create();
        $editedPolaMakan = PolaMakan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pola_makans/'.$polaMakan->id,
            $editedPolaMakan
        );

        $this->assertApiResponse($editedPolaMakan);
    }

    /**
     * @test
     */
    public function test_delete_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pola_makans/'.$polaMakan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pola_makans/'.$polaMakan->id
        );

        $this->response->assertStatus(404);
    }
}
