<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Project;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * guests_cannot_add_tasks_to_projects
     * @test
     *
     * @return void
     */
    public function guests_cannot_add_tasks_to_projects()
    {
        $project = factory('App\Project')->create();

        $this->post($project->path() . '/tasks')->assertRedirect('login');
    }

    /**
     * only_the_owner_of_a_project_may_add_tasks
     * @test
     *
     * @return void
     */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = factory('App\Project')->create();

        $this->post($project->path() . '/tasks', ['body' => 'Test task'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Test task']);
    }

    /**
     * only_the_owner_of_a_project_can_update_tasks
     * @test
     *
     * @return void
     */
    public function only_the_owner_of_a_project_may_update_a_task()
    {
        $this->signIn();

        $project = factory('App\Project')->create();

        $task = $project->addTask('Test task');

        $this->patch($task->path(), ['body' => 'Updated'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Updated']);
    }

    /**
     * Projects are able to have tasks saved to them
     * @test
     *
     * @return void
     */
    public function a_project_can_have_tasks()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $this->post($project->path() . '/tasks', ['body' => 'Test task']);

        $this->get($project->path())
            ->assertSee('Test task');
    }

    /**
     * a_project_can_be_updated
     * @test
     *
     * @return void
     */
    public function a_project_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $project = auth()->user()->projects()->create(
            factory(Project::class)->raw()
        );

        $task = $project->addTask('Test task');

        $this->patch($task->path(), [
            'body' => 'Changed',
            'completed' => true
        ])->assertRedirect($project->path());

        $this->assertDatabaseHas('tasks', [
            'body' => 'Changed',
            'completed' => true
        ]);
    }

    /**
     * a_task_requires_a_body
     * @test
     *
     * @return void
     */
    public function a_task_requires_a_body()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            factory(Project::class)->raw()
        );

        $attributes = factory('App\Task')->raw(['body' => '']);

        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('body');
    }
}