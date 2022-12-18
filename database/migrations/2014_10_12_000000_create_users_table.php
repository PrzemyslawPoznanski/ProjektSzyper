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

        $this->initializeInitialData();
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

    public function initializeInitialData()
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
                    'name' => 'Sara Studentowska',
                    'email' => 'student@s.s',
                    'password' => Hash::make('student'),
                    'role' => 'student'],
                [
                    'id' => '4',
                    'name' => 'Staszek Studentowski',
                    'email' => 'student2@s.s',
                    'password' => Hash::make('student2'),
                    'role' => 'student']]
        );
        DB::table('grades')->insert([
                [   'id' => '1',
                    'grade_value' => '3',
                    'subject' => 'Maths',
                    'id_user' => '3',
                    'comment' => 'Final test',
                    'created_at' => '2022-12-18 20:21:06',
                    'updated_at' => '2022-12-18 20:21:06'],

                [   'id' => '2',
                    'grade_value' => '4',
                    'subject' => 'Physics',
                    'id_user' => '3',
                    'comment' => 'Final test',
                    'created_at' => '2022-12-18 20:21:06',
                    'updated_at' => '2022-12-18 20:21:06'],

                [   'id' => '3',
                    'grade_value' => '4',
                    'subject' => 'Maths',
                    'id_user' => '3',
                    'comment' => '5th exam',
                    'created_at' => '2022-12-18 20:21:06',
                    'updated_at' => '2022-12-18 20:21:06'],

                [   'id' => '4',
                    'grade_value' => '4',
                    'subject' => 'Maths',
                    'id_user' => '4',
                    'comment' => 'Final test',
                    'created_at' => '2022-12-18 20:21:06',
                    'updated_at' => '2022-12-18 20:21:06']
            ]
        );
    }
};
