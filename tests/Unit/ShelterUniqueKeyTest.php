<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 22.11.2018
 * Time: 20:11
 */

namespace Tests\Unit;


use App\Shelter;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShelterUniqueKeyTest extends AppBaseTestClass
{
    use RefreshDatabase;

    /**
     * Test shelter unique key
     *
     */
    public function testShelterUniqueKey()
    {
        try {
            $key = $this->createShelter1()->uskey;

            Shelter::create([
                "uskey" => $key,
                "name" => "Schronisko Warszawa",
                "city" => "Warszawa",
                "size" => 2500
            ]);
        } catch (\PDOException $e) {
            $this->assertEquals("23000", $e->getCode());
            return;
        }
        $this->fail(['Duplicate for key shelters_uskey_unique']);

    }
}