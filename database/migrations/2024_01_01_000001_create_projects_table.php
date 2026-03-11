<?php
// database/migrations/2024_01_01_000001_create_projects_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('short_description');
            $table->string('thumbnail')->nullable();
            $table->json('tech_stack');
            $table->string('github_url')->nullable();
            $table->string('live_url')->nullable();
            $table->string('category'); // laravel, php, api, government
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('projects'); }
};
