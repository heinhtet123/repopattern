<?php

// Backend Dashboard
Breadcrumbs::register('backend', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('backend.index'));
});


//Dashboard > Blogs
Breadcrumbs::register('blogs', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('Blogs', route('backend.blog.index'));
});

// Dashboard > Blogs > create
Breadcrumbs::register('blogs.create',function($breadcrumbs){

	$breadcrumbs->parent('blogs');
	$breadcrumbs->push('Create', route('backend.blog.create'));
});


// Dashboard > Course


// Dashboard > Student
Breadcrumbs::register('students', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('Students', route('backend.student.index'));
});


// Dashboard > Student > create
Breadcrumbs::register('students.create', function($breadcrumbs)
{
    $breadcrumbs->parent('students');
    $breadcrumbs->push('Create', route('backend.student.create'));
});

// Dashboard > Student > edit
Breadcrumbs::register('students.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('students');
    $breadcrumbs->push('Edit', route('backend.student.edit'));
});


Breadcrumbs::register('enrolled students', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('Enrolled Students', route('backend.enrolledstudent.index'));
});


// Dashboard > Groups
Breadcrumbs::register('groups', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('Groups', route('backend.group.index'));
});

Breadcrumbs::register('groups.create', function($breadcrumbs)
{
    $breadcrumbs->parent('groups');
    $breadcrumbs->push('Create', route('backend.group.create'));
});