<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pemeriksaan;

class PemeriksaanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pemeriksaans', $pemeriksaan
        );

        $this->assertApiResponse($pemeriksaan);
    }

    /**
     * @test
     */
    public function test_read_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pemeriksaans/'.$pemeriksaan->id
        );

        $this->assertApiResponse($pemeriksaan->toArray());
    }

    /**
     * @test
     */
    public function test_update_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->create();
        $editedPemeriksaan = Pemeriksaan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pemeriksaans/'.$pemeriksaan->id,
            $editedPemeriksaan
        );

        $this->assertApiResponse($editedPemeriksaan);
    }

    /**
     * @test
     */
    public function test_delete_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pemeriksaans/'.$pemeriksaan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pemeriksaans/'.$pemeriksaan->id
        );

        $this->response->assertStatus(404);
    }
}
