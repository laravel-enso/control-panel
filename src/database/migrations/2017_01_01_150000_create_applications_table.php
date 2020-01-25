<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->text('description')->nullable();

            $table->string('url');
            $table->string('forge_url'); //TODO forge_url
            $table->string('envoyer_url'); //TODO envoyer_url
            $table->string('gitlab_project_id');
            $table->string('sentry_project_slug'); //TODO sentry_uri

            $table->integer('type');
            $table->string('token');
            $table->integer('order_index');

            $table->boolean('is_active');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
