<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_organization', function (Blueprint $table) {
            $table->bigInteger('document_id')->unsigned();
            $table->foreign('document_id')->references('id')
                ->on('documents');

            $table->bigInteger('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')
                ->on('organizations');
            $table->string('url');
            $table->char('file_type', 10);
            $table->char('status', 25)->default('pending')->index();
            $table->text('comment')->nullable();
            $table->date('expires_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_organization');
    }
}
