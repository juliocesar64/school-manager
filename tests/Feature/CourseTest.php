<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function testIfUnauthenticatedCantCreateCourse()
    {
        $course = factory('School\Course')->make();

        $this->post('admin/course/store', $course->toArray())
            ->assertDontSee($course->name);
    }

    public function testIfUnauthenticatedCantViewCourse()
    {
        $course = factory('School\Course')->create();

        $this->get('/admin/course/'.$course->id)
            ->assertDontSee($course->name)
            ->assertRedirect('/login');
    }

    public function testIfUnauthenticatedCantUpdateCourse()
    {
        $course = factory('School\Course')->create();

        $this->put('/admin/course/update/'.$course->id, $course->toArray())
            ->assertDontSee($course->name)
            ->assertRedirect('/login');
    }

    public function testIfUnauthenticatedCantDeleteCourse()
    {
        $course = factory('School\Course')->create();

        $this->delete('/admin/course/destroy/'.$course->id, $course->toArray())
            ->assertDontSee($course->name)
            ->assertRedirect('/login');
    }
}
