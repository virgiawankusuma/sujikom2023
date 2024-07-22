<?php

namespace Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class KegiatanTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    // Setup and TearDown methods can be added if needed
    protected function setUp(): void
    {
        parent::setUp();
        $this->db->transBegin(); // Mulai transaksi
    }

    protected function tearDown(): void
    {
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback(); // Rollback jika terjadi kesalahan
        } else {
            $this->db->transCommit(); // Commit jika semuanya berhasil
        }

        parent::tearDown();
    }

    public function testIndexPage()
    {
        // Test if the index page loads correctly
        $result = $this->call('get', '/');

        // Check the response status
        $result->assertStatus(200);

        // Check if the view is loaded
        $result->assertSee('Home | Kegiatan');
    }

    public function testDetailPage()
    {
        // Assume there is a kegiatan with the slug 'example-slug'
        $result = $this->get('/kegiatan/example-slug');

        // Check the response status
        $result->assertStatus(200);

        // Check if the view is loaded
        $result->assertSee('Detail | Kegiatan');
    }

    public function testDetailPageNotFound()
    {
        // Test with a non-existing slug
        $result = $this->get('/kegiatan/non-existing-slug');

        // Check the response status for 404 not found
        $result->assertStatus(404);
    }
}
