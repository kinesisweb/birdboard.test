<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * Project creation middleware test for authenticated user
     * @test
     *
     * @return void
     */
    public function guests_cannot_create_projects()
    {

        // raw() - Creates a raw PHP array from the model
        $attributes = factory('App\Project')->raw();
        $this->post('/projects', $attributes)->assertRedirect('login');
    }

    /**
     * Project view middleware test for authenticated user
     * @test
     *
     * @return void
     */
    public function guests_cannot_view_projects()
    {
        $this->get('/projects')->assertRedirect('login');
    }

    /**
     * Single project view middleware test for authenticated user
     * @test
     *
     * @return void
     */
    public function guests_cannot_view_a_single_project()
    {
        $project = factory('App\Project')->create();

        $this->get($project->path())->assertRedirect('login');
    }

    /**
     * a_user_can_view_a_project
     * @test
     *
     * @return void
     */
    public function a_user_can_view_their_project()
    {
        $this->signIn();
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /**
     * an_authenticated_user_cannot_view_the_projects_of_others
     * @test
     *
     * @return void
     */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->signIn();

        // $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
    }

    /**
     * an_authenticated_user_cannot_update_the_projects_of_others
     * @test
     *
     * @return void
     */
    public function an_authenticated_user_cannot_update_the_projects_of_others()
    {
        $this->signIn();

        // $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->patch($project->path())->assertStatus(403);
    }

    /**
     * Can a user create a project which persists?
     * @test
     *
     * @return void
     */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'notes' => 'General notes here.'
        ];

        $response = $this->post('/projects', $attributes);
        $this->assertDatabaseHas('projects', $attributes);

        $project = Project::where($attributes)->first();

        $response->assertRedirect($project->path());

        $this->get('/projects')->assertSee($attributes['title']);

        $this->get($project->path())
            ->assertSee($attributes['title'])
            ->assertSee($attributes['description'])
            ->assertSee($attributes['notes']);
    }

    /**
     * a_user_can_update_a_project
     * @test
     *
     * @return void
     */
    public function a_user_can_update_a_project()
    {
        $this->signIn();
        $this->withoutExceptionHandling();
        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        $this->patch($project->path(), [
            'notes' => 'Changed'
        ])->assertRedirect($project->path());

        $this->assertDatabaseHas('projects', ['notes' => 'Changed']);
    }

    /**
     * a_project_requires_a_title
     * @test
     *
     * @return void
     */
    public function a_project_requires_a_title()
    {
        $this->signIn();

        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /**
     * a_project_requires_a_description
     * @test
     *
     * @return void
     */
    public function a_project_requires_a_description()
    {
        $this->signIn();

        // raw() - Creates a raw PHP array from the model
        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }
}