<?php namespace Tests\Repositories;

use App\Models\PolaObat;
use App\Repositories\PolaObatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PolaObatRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PolaObatRepository
     */
    protected $polaObatRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->polaObatRepo = \App::make(PolaObatRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pola_obat()
    {
        $polaObat = PolaObat::factory()->make()->toArray();

        $createdPolaObat = $this->polaObatRepo->create($polaObat);

        $createdPolaObat = $createdPolaObat->toArray();
        $this->assertArrayHasKey('id', $createdPolaObat);
        $this->assertNotNull($createdPolaObat['id'], 'Created PolaObat must have id specified');
        $this->assertNotNull(PolaObat::find($createdPolaObat['id']), 'PolaObat with given id must be in DB');
        $this->assertModelData($polaObat, $createdPolaObat);
    }

    /**
     * @test read
     */
    public function test_read_pola_obat()
    {
        $polaObat = PolaObat::factory()->create();

        $dbPolaObat = $this->polaObatRepo->find($polaObat->id);

        $dbPolaObat = $dbPolaObat->toArray();
        $this->assertModelData($polaObat->toArray(), $dbPolaObat);
    }

    /**
     * @test update
     */
    public function test_update_pola_obat()
    {
        $polaObat = PolaObat::factory()->create();
        $fakePolaObat = PolaObat::factory()->make()->toArray();

        $updatedPolaObat = $this->polaObatRepo->update($fakePolaObat, $polaObat->id);

        $this->assertModelData($fakePolaObat, $updatedPolaObat->toArray());
        $dbPolaObat = $this->polaObatRepo->find($polaObat->id);
        $this->assertModelData($fakePolaObat, $dbPolaObat->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pola_obat()
    {
        $polaObat = PolaObat::factory()->create();

        $resp = $this->polaObatRepo->delete($polaObat->id);

        $this->assertTrue($resp);
        $this->assertNull(PolaObat::find($polaObat->id), 'PolaObat should not exist in DB');
    }
}
