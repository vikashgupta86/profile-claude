<?php
// database/migrations/2024_01_01_000005_create_admin_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('bio')->nullable();
            $table->string('resume_pdf')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->integer('profile_views')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('admin_users'); }
};
