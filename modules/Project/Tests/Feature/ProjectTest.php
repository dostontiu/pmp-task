<?php

namespace Modules\Project\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Project\Models\Project;
use Modules\User\Models\User;
use Modules\Project\Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /**
     * A basic test example.
     */
    public function test_the_project_list_returns_a_successful_response(): void
    {
        $response = $this->get('project');

        $response->assertStatus(200);
        $response->assertSee('Projects');
        $response->assertSee('Add new project');
    }

    public function test_project_show()
    {
        $project = Project::factory()->create();

        $this->get('project/'.$project->id)
            ->assertSee($project->name);
    }

    public function test_project_store()
    {
        $data = [
            'name' => fake()->name,
            'description' => fake()->name,
        ];
        $response = $this->post('project', $data);

        $response->assertRedirect('project');
        $this->assertDatabaseHas('projects', $data);
    }

    public function test_it_redirects_back_with_errors_when_required_fields_are_missing()
    {
        $response = $this->post('project', []);

        $response->assertSessionHasErrors(['name', 'description']);
    }

    public function test_product_edit_page()
    {
        $project = Project::factory()->create();

        $response = $this->get('project/'. $project->id);

        $response->assertSuccessful();
        $response->assertSee($project->name);
    }

    public function test_project_update()
    {
        $project = Project::factory()->create();

        $data = [
            'name' => fake()->name,
            'description' => fake()->name,
        ];

        $response = $this->put('project/'.$project->id, $data);

        $response->assertRedirect('project');
        $this->assertDatabaseHas('projects', $data);
    }

    public function test_project_update_redirect_if_required_fields_are_missing()
    {
        $project = Project::factory()->create();

        $response = $this->put('project/'.$project->id, []);

        $response->assertSessionHasErrors(['name', 'description']);
        $this->assertDatabaseHas('projects', $project->only(['name', 'description']));
    }

    public function test_project_delete()
    {
        $project = Project::factory()->create();

        $response = $this->delete('project/'.$project->id);

        $response->assertRedirect('project');
        $this->assertDatabaseCount('projects', 0);
    }

    public function test_it_returns_404_if_project_not_found()
    {
        $response = $this->delete('projects/999');

        $response->assertNotFound();
    }
}
