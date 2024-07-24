<?php

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::getColumnType('tasks', 'is_done') == 'tinyint') {
            Schema::table('tasks', function (Blueprint $table) {
                // add a temp column to store string values
                $table->string('is_done_temp')->nullable();
            });

            // update values in the temp column depending on current values
            DB::statement("UPDATE tasks SET is_done_temp = 'processing' WHERE is_done = 0");
            DB::statement("UPDATE tasks SET is_done_temp = 'done' WHERE is_done = 1");

            Schema::table('tasks', function (Blueprint $table) {
                // delete current column
                $table->dropColumn('is_done');
            });

            Schema::table('tasks', function (Blueprint $table) {
                // add new column to tasks table with enum
                $table->enum('is_done', [TaskStatusEnum::Done, TaskStatusEnum::Processing])->after('end_date');
            });

            // transfere data from temp to original
            DB::statement("UPDATE tasks SET is_done = is_done_temp");

            Schema::table('tasks', function (Blueprint $table) {
                // delete the temp column
                $table->dropColumn('is_done_temp');
            });
        }
    }
};
