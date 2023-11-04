<?php

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
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('investment_range')->nullable();
            $table->tinyInteger('verify_status')->nullable();
            $table->unsignedBigInteger('brand_category')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_slug')->nullable();
            $table->string('states')->nullable();
            $table->tinyInteger('marketing_support')->nullable();
            $table->tinyInteger('sales_support')->nullable();
            $table->tinyInteger('term_renewable')->nullable();
            $table->tinyInteger('standard_distributorship_aggrement')->nullable();
            $table->string('distributorship_terms_for')->nullable();
            $table->string('margin_commission')->nullable();
            $table->string('space_required')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('brand_name')->nullable();
            $table->text('business_nature')->nullable();
            $table->string('establishment_year')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->string('annual_sales')->nullable();
            $table->text('product_keywords')->nullable();
            $table->text('distributors_benefits')->nullable();
            $table->text('distributorship_location')->nullable();
            $table->text('company_profile')->nullable();
            $table->text('usp_of_products')->nullable();
            $table->text('address')->nullable();
            $table->tinyInteger('top')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacturers');
    }
};
