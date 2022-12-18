<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->nullable();
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade_value');
            $table->string('subject');
            $table->string('id_user');
            $table->string('comment');
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('subject_name');
        });

        Schema::create('grade_change', function (Blueprint $table) {
            $table->id();
            $table->string('id_grade');
            $table->string('previous_grade');
            $table->timestamp('history_created_at',0)->nullable();
            $table->timestamp('history_updated_at',0)->nullable();
        });

        $this->initializeFirstUsers();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('grade_change');
    }

    public function initializeFirstUsers()
    {
        DB::table('users')->insert([
            [   'id' => '1',
                'name' => 'Adam Administratorski',
                'email' => 'admin@a.a',
                'password' => Hash::make('admin'),
                'role' => 'admin'],
            [
                'id' => '2',
                'name' => 'Tomek Teacherowski',
                'email' => 'teacher@t.t',
                'password' => Hash::make('teacher'),
                'role' => 'teacher'],
            [
                'id' => '3',
                'name' => 'Staszek Studentowski',
                'email' => 'student@s.s',
                'password' => Hash::make('student'),
                'role' => 'student']]
        );
    }
};
