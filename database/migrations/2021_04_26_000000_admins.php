<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class admins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('用户名');
            $table->string('real_name')->comment('昵称');
            $table->string('mobile', 20)->unique();
            $table->string('password')->comment('密码');
            $table->unsignedTinyInteger('status')->default(1)->comment('状态：默认为1，**');
            $table->string('phone', 64)->nullable()->comment('手机号');
            $table->tinyInteger('is_del', 2)->default(0)->comment('软删');
            $table->integer('add_time', 11)->default(0)->comment('添加时间');
            $table->softDeletes();
            $table->timestamps();
            $table->rememberToken();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
