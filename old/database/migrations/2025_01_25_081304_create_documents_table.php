<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->string('document_name', 255);
            $table->string('doc_type', 100);
            $table->text('document_image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};


// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateDocumentsTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('documents', function (Blueprint $table) {
//             $table->id();
//             $table->unsignedBigInteger('user_id');
//             $table->unsignedBigInteger('created_by');
//             $table->unsignedBigInteger('uploaded_by');
//             $table->string('document_name', 255);
//             $table->string('doc_type', 100);
//             $table->text('document_image_path');
//             $table->timestamps();

//             // Foreign key constraints
//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//             $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
//             $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('documents');
//     }
// }
