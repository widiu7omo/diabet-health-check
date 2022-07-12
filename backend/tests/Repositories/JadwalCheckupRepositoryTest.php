<?php namespace Tests\Repositories;

use App\Models\JadwalCheckup;
use App\Repositories\JadwalCheckupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class JadwalCheckupRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var JadwalCheckupRepository
     */
    protected $jadwalCheckupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jadwalCheckupRepo = \App::make(JadwalCheckupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->make()->toArray();

        $createdJadwalCheckup = $this->jadwalCheckupRepo->create($jadwalCheckup);

        $createdJadwalCheckup = $createdJadwalCheckup->toArray();
        $this->assertArrayHasKey('id', $createdJadwalCheckup);
        $this->assertNotNull($createdJadwalCheckup['id'], 'Created JadwalCheckup must have id specified');
        $this->assertNotNull(JadwalCheckup::find($createdJadwalCheckup['id']), 'JadwalCheckup with given id must be in DB');
        $this->assertModelData($jadwalCheckup, $createdJadwalCheckup);
    }

    /**
     * @test read
     */
    public function test_read_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->create();

        $dbJadwalCheckup = $this->jadwalCheckupRepo->find($jadwalCheckup->id);

        $dbJadwalCheckup = $dbJadwalCheckup->toArray();
        $this->assertModelData($jadwalCheckup->toArray(), $dbJadwalCheckup);
    }

    /**
     * @test update
     */
    public function test_update_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->create();
        $fakeJadwalCheckup = JadwalCheckup::factory()->make()->toArray();

        $updatedJadwalCheckup = $this->jadwalCheckupRepo->update($fakeJadwalCheckup, $jadwalCheckup->id);

        $this->assertModelData($fakeJadwalCheckup, $updatedJadwalCheckup->toArray());
        $dbJadwalCheckup = $this->jadwalCheckupRepo->find($jadwalCheckup->id);
        $this->assertModelData($fakeJadwalCheckup, $dbJadwalCheckup->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_jadwal_checkup()
    {
        $jadwalCheckup = JadwalCheckup::factory()->create();

        $resp = $this->jadwalCheckupRepo->delete($jadwalCheckup->id);

        $this->assertTrue($resp);
        $this->assertNull(JadwalCheckup::find($jadwalCheckup->id), 'JadwalCheckup should not exist in DB');
    }
}
