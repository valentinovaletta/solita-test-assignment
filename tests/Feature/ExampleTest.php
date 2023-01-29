<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_journeys_returns_a_successful_response()
    {
        $response = $this->get('/journeys');
        $response->assertStatus(200);
    }    
    public function test_stations_returns_a_successful_response()
    {
        $response = $this->get('/stations');
        $response->assertStatus(200);
    }    
    public function test_single_journey_returns_a_successful_response()
    {
        $response = $this->get('/journey/'.rand(1,1000));
        $response->assertStatus(200);
    }     
    public function test_single_station_returns_a_successful_response()
    {
        $response = $this->get('/station/'.rand(1,100));
        $response->assertStatus(200);
    }      
    public function test_new_jorney_add_api()
    {
        $response = $this->post('/api/journeys', [
            'departure_time'=>'2009-10-16T11:11:11',
            'return_time'=>'2009-10-16T11:11:11',
            'departure_station_id'=>123,
            'departure_station_name'=>'asd',
            'return_station_id'=>123,
            'return_station_name'=>'asd',
            'covered_distance'=>123,
            'duration'=>1232
        ], [
            'HTTP_Authorization' => 'Bearer '.ENV('API_TOKEN'),
            'X-Header-Test' => true
        ]
    
    );
    $response
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Passed'
        ]);
    }

}
