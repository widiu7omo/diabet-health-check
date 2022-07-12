<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\JadwalCheckup;

class JadwalCheckupApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/jadwal_checkups', $jadwalCheckup
        );

        $this->assertApiResponse($jadwalCheckup);
    }

    /**
     * @test
     */
    public function test_read_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/jadwal_checkups/'.$jadwalCheckup->id
        );

        $this->assertApiResponse($jadwalCheckup->toArray());
    }

    /**
     * @test
     */
    public function test_update_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->create();
        $editedJadwalCheckup = JadwalCheckup::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/jadwal_checkups/'.$jadwalCheckup->id,
            $editedJadwalCheckup
        );

        $this->assertApiResponse($editedJadwalCheckup);
    }

    /**
     * @test
     */
    public function test_delete_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/jadwal_checkups/'.$jadwalCheckup->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/jadwal_checkups/'.$jadwalCheckup->id
        );

        $this->response->assertStatus(404);
    }
}
