<?php namespace Tests\Repositories;

use App\Models\Pemeriksaan;
use App\Repositories\PemeriksaanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PemeriksaanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PemeriksaanRepository
     */
    protected $pemeriksaanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pemeriksaanRepo = \App::make(PemeriksaanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->make()->toArray();

        $createdPemeriksaan = $this->pemeriksaanRepo->create($pemeriksaan);

        $createdPemeriksaan = $createdPemeriksaan->toArray();
        $this->assertArrayHasKey('id', $createdPemeriksaan);
        $this->assertNotNull($createdPemeriksaan['id'], 'Created Pemeriksaan must have id specified');
        $this->assertNotNull(Pemeriksaan::find($createdPemeriksaan['id']), 'Pemeriksaan with given id must be in DB');
        $this->assertModelData($pemeriksaan, $createdPemeriksaan);
    }

    /**
     * @test read
     */
    public function test_read_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->create();

        $dbPemeriksaan = $this->pemeriksaanRepo->find($pemeriksaan->id);

        $dbPemeriksaan = $dbPemeriksaan->toArray();
        $this->assertModelData($pemeriksaan->toArray(), $dbPemeriksaan);
    }

    /**
     * @test update
     */
    public function test_update_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->create();
        $fakePemeriksaan = Pemeriksaan::factory()->make()->toArray();

        $updatedPemeriksaan = $this->pemeriksaanRepo->update($fakePemeriksaan, $pemeriksaan->id);

        $this->assertModelData($fakePemeriksaan, $updatedPemeriksaan->toArray());
        $dbPemeriksaan = $this->pemeriksaanRepo->find($pemeriksaan->id);
        $this->assertModelData($fakePemeriksaan, $dbPemeriksaan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pemeriksaan()
    {
        $pemeriksaan = Pemeriksaan::factory()->create();

        $resp = $this->pemeriksaanRepo->delete($pemeriksaan->id);

        $this->assertTrue($resp);
        $this->assertNull(Pemeriksaan::find($pemeriksaan->id), 'Pemeriksaan should not exist in DB');
    }
}
