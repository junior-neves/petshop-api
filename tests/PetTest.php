<?php

use App\Models\Owner;
use App\Models\Pet;
use App\Models\Species;
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
            'name' => 'Test Dog',
            'age' => 2,
            'species' => 1,
            'breed' => 'Test Breed',
            'owner_name' => "Test Owner",
            'owner_phone' => "12345"
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->owner = Owner::create([
            'name' => "Default Owner",
            'phone' => "12345",
        ]);

        Species::create(['name' => "Cachorro",]);
        Species::create(['name' => "Gato",]);

        $this->pet = Pet::create([
            'name' => 'Default Dog',
            'age' => 1,
            'species_id' => 1,
            'breed' => 'Default Breed',
            'owner_id' => $this->owner->id,
        ]);

        $this->pet->load("owner")->load("species");
    }

    public function testPetCreation() : void
    {
        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseOk();

        $this->assertObjectHasAttribute('id',$resposta);
        $this->assertObjectHasAttribute('name',$resposta);
        $this->assertObjectHasAttribute('age',$resposta);
        $this->assertObjectHasAttribute('breed',$resposta);

        $this->assertObjectHasAttribute('owner',$resposta);
        $this->assertObjectHasAttribute('id',$resposta->owner);
        $this->assertObjectHasAttribute('name',$resposta->owner);
        $this->assertObjectHasAttribute('phone',$resposta->owner);

        $this->assertObjectHasAttribute('species',$resposta);
        $this->assertObjectHasAttribute('id',$resposta->species);
        $this->assertObjectHasAttribute('name',$resposta->species);

        $this->assertEquals(2,$resposta->id);
        $this->assertEquals($this->data["name"],$resposta->name);
        $this->assertEquals($this->data["age"],$resposta->age);
        $this->assertEquals($this->data["breed"],$resposta->breed);
        $this->assertEquals($this->data["owner_name"],$resposta->owner->name);
        $this->assertEquals($this->data["owner_phone"],$resposta->owner->phone);
        $this->assertEquals($this->data["species"],$resposta->species->id);
    }

    public function testErrorWhenPetNameIsMissing() : void
    {
        $this->data["name"] = null;

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('name',$resposta);
    }

    public function testErrorWhenPetAgeIsMissing() : void
    {
        $this->data["age"] = null;

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('age',$resposta);
    }

    public function testErrorWhenPetAgeIsNotInteger() : void
    {
        $this->data["age"] = "1 ano";

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('age',$resposta);
    }

    public function testErrorWhenPetSpeciesIsMissing() : void
    {
        $this->data["species"] = null;

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('species',$resposta);
    }

    public function testErrorWhenPetSpeciesIsNotInteger() : void
    {
        $this->data["species"] = "cachorro";

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('species',$resposta);
    }

    public function testErrorWhenPetSpeciesDontExist() : void
    {
        $this->data["species"] = 9;

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(404);
        $this->assertObjectHasAttribute('error',$resposta);
    }

    public function testErrorWhenPetBreedIsMissing() : void
    {
        $this->data["breed"] = null;

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('breed',$resposta);
    }

    public function testErrorWhenOwnerNameIsMissing() : void
    {
        $this->data["owner_name"] = null;

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('owner_name',$resposta);
    }

    public function testErrorWhenPetOwnerPhoneIsMissing() : void
    {
        $this->data["owner_phone"] = null;

        $this->post('/pets',$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseStatus(422);
        $this->assertObjectHasAttribute('owner_phone',$resposta);
    }

    public function testGetAll() : void
    {
        $this->get('/pets');

        $this->assertResponseOk();
        $this->seeJsonStructure([
            '*' => [
                'id',
                'name',
                'age',
                'breed',
                'species',
                'owner',
            ]
        ]);
    }

    public function testGetOne() : void
    {
        $this->get('pets/'.$this->pet->id);
        $resposta = json_decode($this->response->content());

        $this->assertResponseOk();

        $this->assertObjectHasAttribute('id',$resposta);
        $this->assertObjectHasAttribute('name',$resposta);
        $this->assertObjectHasAttribute('age',$resposta);
        $this->assertObjectHasAttribute('breed',$resposta);

        $this->assertObjectHasAttribute('owner',$resposta);
        $this->assertObjectHasAttribute('id',$resposta->owner);
        $this->assertObjectHasAttribute('name',$resposta->owner);
        $this->assertObjectHasAttribute('phone',$resposta->owner);

        $this->assertObjectHasAttribute('species',$resposta);
        $this->assertObjectHasAttribute('id',$resposta->species);
        $this->assertObjectHasAttribute('name',$resposta->species);

        $this->assertEquals(1,$resposta->id);
        $this->assertEquals($this->pet->name,$resposta->name);
        $this->assertEquals($this->pet->age,$resposta->age);
        $this->assertEquals($this->pet->breed,$resposta->breed);
        $this->assertEquals($this->pet->owner->name,$resposta->owner->name);
        $this->assertEquals($this->pet->owner->phone,$resposta->owner->phone);
        $this->assertEquals($this->pet->species->id,$resposta->species->id);
        $this->assertEquals($this->pet->species->name,$resposta->species->name);
    }

    public function testErrorWhenGetOneWithWrongId() : void
    {
        $this->get('/pets/9999',$this->data);
        $this->assertResponseStatus(404);
    }

    public function testUpdate() : void
    {
        $this->put('pets/'.$this->owner->id,$this->data);
        $resposta = json_decode($this->response->content());

        $this->assertResponseOk();

        $this->assertObjectHasAttribute('id',$resposta);
        $this->assertObjectHasAttribute('name',$resposta);
        $this->assertObjectHasAttribute('age',$resposta);
        $this->assertObjectHasAttribute('breed',$resposta);

        $this->assertObjectHasAttribute('owner',$resposta);
        $this->assertObjectHasAttribute('id',$resposta->owner);
        $this->assertObjectHasAttribute('name',$resposta->owner);
        $this->assertObjectHasAttribute('phone',$resposta->owner);

        $this->assertObjectHasAttribute('species',$resposta);
        $this->assertObjectHasAttribute('id',$resposta->species);
        $this->assertObjectHasAttribute('name',$resposta->species);

        $this->assertEquals(1,$resposta->id);
        $this->assertEquals($this->data["name"],$resposta->name);
        $this->assertEquals($this->data["age"],$resposta->age);
        $this->assertEquals($this->data["breed"],$resposta->breed);
        $this->assertEquals($this->data["owner_name"],$resposta->owner->name);
        $this->assertEquals($this->data["owner_phone"],$resposta->owner->phone);
        $this->assertEquals($this->data["species"],$resposta->species->id);
    }

    public function testErrorWhenUpdateWithWrongId() : void
    {
        $this->put('pets/9999',$this->data);
        $this->assertResponseStatus(404);
    }

    public function testDelete() : void
    {
        $this->delete('pets/'.$this->pet->id);
        $this->assertResponseOk();
    }

    public function testErrorWhenDeleteWithWrongId() : void
    {
        $this->delete('pets/9999');
        $this->assertResponseStatus(404);
    }

}
