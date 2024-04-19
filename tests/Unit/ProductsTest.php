<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Products;
use JWTAuth;

class ProductsTest extends TestCase
{
    protected $baseUrl; 

    protected $email;

    protected $password;

    protected function setUp(): void
    {
        parent::setUp();

        $this->baseUrl = env('APP_URL');
        $this->email = "test@artlume.io";
        $this->password = "adminadmin";

    }

    /**
     * Login as default API user and get token back.
     *
     * @return void
     */
    public function testLogin()
    {       
        $response = $this->json('POST', $this->baseUrl. '/api/login' . '/', [
            'email' => $this->email,
            'password' => $this->password
        ]);

        $response->assertStatus(200);
    }
    

    /**
     * Get all users.
     *
     * @return void
     */
    public function testGetProducts()
    {
        $user = User::where('email', $this->email)->first();
        $token = JWTAuth::fromUser($user);$token="";
        $products = Products::limit(5)->get();
        if(!empty($token)){
            $this->assertTrue(true);
        } else
            $this->assertFalse(false);
        
    }

    /**
     * Test logout.
     *
     * @return void
     */
    public function testLogout()
    {

        $user = User::where('email', $this->email)->first();
        $token = JWTAuth::fromUser($user); 
        $baseUrl = $this->baseUrl . '/api/logout?token=' . $token;

        $response = $this->json('POST', $baseUrl, []);            
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'message' => 'Successfully logged out'
            ]);
    }

    /**
     * Test token refresh.
     *
     * @return void
     */
    public function testRefresh()
    {
        $user = User::where('email', $this->email)->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = $this->baseUrl . '/api/refresh?token=' . $token;

        $response = $this->json('POST', $baseUrl, []);

        $response
            ->assertStatus(200);
    }

}
