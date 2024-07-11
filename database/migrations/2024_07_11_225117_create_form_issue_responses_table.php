<?php

use App\Models\FormResponse;
use App\Models\Issue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_issue_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(FormResponse::class);
            $table->foreignIdFor(Issue::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_issue_responses');
    }
};
