<?php

use App\Models\Owner;
use App\Models\Pet;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class PetTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public array $data = [];
    protected Pet $pet;
    protected Owner $owner;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->data = [
            'name' => 'Pet Construct',
            'age' => 20,
            'species' => 2,
            'breed' => 'Construct',
            'owner_id' => 1,
        ];
    }


    protected function setUp(): void
    {
        parent::setUp();
        $this->owner = Owner::create([
            'name' => "Junior Setup",
            'phone' => "123",
        ]);

        $this->pet = Pet::create([
            'name' => 'Pet Setup',
            'age' => 10,
            'species' => 1,
            'breed' => 'Setup',
            'owner_id' => $this->owner,
        ]);
    }

    public function testPetCreation() : void
    {
        $this->post('/pets',$this->data);
        $this->assertResponseOk();

        echo $this->response->content();
        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id',$resposta);
        $this->assertArrayHasKey('name',$resposta);
    }

    public function testCreationWithMissingName() : void
    {
        $this->data["name"] = null;

        $this->post('/pets',$this->data);
        $this->assertResponseStatus(422);

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('name',$resposta);
    }

    public function testGetAll() : void
    {
        $this->get('/pets');

        $this->assertResponseOk();
        $this->seeJsonStructure([
            '*' => [
                'id',
                'name',
            ]
        ]);
    }

    public function testGetOne() : void
    {
        $this->get('pets/'.$this->pet->id);
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('name',$resposta);
        $this->assertArrayHasKey('id',$resposta);
    }

    public function testGetOneWithWrongId() : void
    {
        $this->get('/pets/9999',$this->data);
        $this->assertResponseStatus(404);
    }


    public function testUpdate() : void
    {
        $this->put('pets/'.$this->owner->id,$this->data);
        $this->assertResponseOk();

        $resposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('id',$resposta);
        $this->assertArrayHasKey('name',$resposta);

        $this->assertEquals($this->data["name"],$resposta["name"]);
    }

    public function testUpdateWithWrongId() : void
    {
        $this->put('pets/9999',$this->data);
        $this->assertResponseStatus(404);
    }

    public function testDelete() : void
    {
        $this->delete('pets/'.$this->pet->id);
        $this->assertResponseOk();
    }

    public function testDeleteWithWrongId() : void
    {
        $this->delete('pets/9999');
        $this->assertResponseStatus(404);
    }
}
