<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

trait RefreshTestDatabase
{
    use RefreshDatabase {
        RefreshDatabase::refreshInMemoryDatabase as parentRefreshInMemoryDatabase;
    }

    public function refreshInMemoryDatabase()
    {
        $this->artisan('migrate', array('--path' => 'tests/Migrations'));
    }
}
