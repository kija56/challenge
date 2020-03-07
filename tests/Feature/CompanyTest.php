<?php

namespace Tests\Feature;

use App\Company;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
     /**@test */
    public function testOnlyLogedInUsersCanSeeCompanies(){
        $response = $this->get('/companies')
        ->assertRedirect('/login');
    }

    public function testAuthenticatedUsersCanSeeCompaniesList(){
       $this->actingAs(factory(User::class)->create());
       $response = $this->get('/companies')->assertOk();
    }

    public function testCompanyCanBeAddedThroughTheForm(){
        
        Notification::fake();
        Storage::fake('public');
        $this->withoutExceptionHandling();
        $this->withoutMiddleware($middleware=null);
        $this->actingAs(factory(User::class)->create());
        $file = UploadedFile::fake()->image('logo.jpg',$width=100, $height=100 )->size(100);
        $response =$this->post('/companies',[
            'name'=>'Test Company',
            'email'=>'testcompany@test.com',
            'website'=>'https://www.testcompany.com',
            'logo'=>$file,
        ]) ;
        $this->assertCount(1, Company::all());
    }
    public function testCompanyLogoDimensions(){
        
        Notification::fake();
        Storage::fake('public');
        // $this->withoutExceptionHandling();
        $this->withoutMiddleware($middleware=null);
        $this->actingAs(factory(User::class)->create());
        $file = UploadedFile::fake()->image('logo.jpg',$width=10, $height=10 )->size(100);
        $response =$this->post('/companies',[
            'name'=>'Test Company',
            'email'=>'testcompany@test.com',
            'website'=>'https://www.testcompany.com',
            'logo'=>$file,
        ]) ;
        $response->assertSessionHasErrors('logo');
        
    }

    public function testCanViewCompanyDetails(){
        // $this->withoutExceptionHandling();
        $company = factory(Company::class)->create();
        $this->actingAs(factory(User::class)->create());
       $response = $this->get('/companies/'.$company->id)->assertOk();
    }

    public function testCanUpdateCompanyDetails(){
        
        Notification::fake();
        Storage::fake('public');
        $this->withoutExceptionHandling();
        $this->withoutMiddleware($middleware=null);
        $this->actingAs(factory(User::class)->create());
        $company = factory(Company::class)->create();
        $file = UploadedFile::fake()->image('logo.jpg',$width=100, $height=100 )->size(100);
        $response =$this->patch('/companies/'.$company->id,[
            'name'=>'Test Company',
            'email'=>'testcompany@test.com',
            'website'=>'https://www.testcompany.com',
            'logo'=>$file,
        ]) ;
        $this->assertCount(1, Company::all());
    }
    public function testDeleteCompany(){
        $company = factory(Company::class)->create();
        $this->actingAs(factory(User::class)->create());
        $this->withoutMiddleware($middleware=null);
        $this->withoutExceptionHandling();
    $response = $this->delete('/companies/' . $company->id);

    $response->assertStatus(200); 
    }

}
