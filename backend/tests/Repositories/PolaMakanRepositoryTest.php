<?php namespace Tests\Repositories;

use App\Models\PolaMakan;
use App\Repositories\PolaMakanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PolaMakanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PolaMakanRepository
     */
    protected $polaMakanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->polaMakanRepo = \App::make(PolaMakanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->make()->toArray();

        $createdPolaMakan = $this->polaMakanRepo->create($polaMakan);

        $createdPolaMakan = $createdPolaMakan->toArray();
        $this->assertArrayHasKey('id', $createdPolaMakan);
        $this->assertNotNull($createdPolaMakan['id'], 'Created PolaMakan must have id specified');
        $this->assertNotNull(PolaMakan::find($createdPolaMakan['id']), 'PolaMakan with given id must be in DB');
        $this->assertModelData($polaMakan, $createdPolaMakan);
    }

    /**
     * @test read
     */
    public function test_read_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->create();

        $dbPolaMakan = $this->polaMakanRepo->find($polaMakan->id);

        $dbPolaMakan = $dbPolaMakan->toArray();
        $this->assertModelData($polaMakan->toArray(), $dbPolaMakan);
    }

    /**
     * @test update
     */
    public function test_update_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->create();
        $fakePolaMakan = PolaMakan::factory()->make()->toArray();

        $updatedPolaMakan = $this->polaMakanRepo->update($fakePolaMakan, $polaMakan->id);

        $this->assertModelData($fakePolaMakan, $updatedPolaMakan->toArray());
        $dbPolaMakan = $this->polaMakanRepo->find($polaMakan->id);
        $this->assertModelData($fakePolaMakan, $dbPolaMakan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pola_makan()
    {
        $polaMakan = PolaMakan::factory()->create();

        $resp = $this->polaMakanRepo->delete($polaMakan->id);

        $this->assertTrue($resp);
        $this->assertNull(PolaMakan::find($polaMakan->id), 'PolaMakan should not exist in DB');
    }
}
