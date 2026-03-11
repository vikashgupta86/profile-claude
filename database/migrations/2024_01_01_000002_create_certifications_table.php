<?php
// database/migrations/2024_01_01_000002_create_certifications_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('issuer');
            $table->string('certificate_url')->nullable();
            $table->string('icon')->default('award');
            $table->date('issued_date')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('certifications'); }
};
