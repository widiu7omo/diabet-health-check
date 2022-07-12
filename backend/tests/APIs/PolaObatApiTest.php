<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PolaObat;

class PolaObatApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pola_obat()
    {
        $polaObat = PolaObat::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pola_obats', $polaObat
        );

        $this->assertApiResponse($polaObat);
    }

    /**
     * @test
     */
    public function test_read_pola_obat()
    {
        $polaObat = PolaObat::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pola_obats/'.$polaObat->id
        );

        $this->assertApiResponse($polaObat->toArray());
    }

    /**
     * @test
     */
    public function test_update_pola_obat()
    {
        $polaObat = PolaObat::factory()->create();
        $editedPolaObat = PolaObat::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pola_obats/'.$polaObat->id,
            $editedPolaObat
        );

        $this->assertApiResponse($editedPolaObat);
    }

    /**
     * @test
     */
    public function test_delete_pola_obat()
    {
        $polaObat = PolaObat::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pola_obats/'.$polaObat->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pola_obats/'.$polaObat->id
        );

        $this->response->assertStatus(404);
    }
}
