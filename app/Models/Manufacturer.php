<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "last_name",
        "mobile_number",
        "email",
        "whatsapp_number",
        "category_id",
        "investment_range",
        "company_name",
        "company_slug",
        "marketing_support",
        "sales_support",
        "term_renewable",
        "standard_distributorship_aggrement",
        "distributorship_terms_for",
        "space_required",
        "gst_number",
        "brand_name",
        "number_of_employees",
        "annual_sales",
        "product_keywords",
        "distributors_benefits",
        "distributorship_location",
        "company_profile",
        "usp_of_products",
        "address",
        "company_logo",
        "margin_commission",
        "establishment_year",
        "states",
        "status",
        "business_nature",
        "verify_status",
        "top",
        "featured",
        'top_brands',
        'home_top_brands'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function scopeActive($query) : Builder {
        return $query->where('status', 1);
    }

    public function scopeTopDealerShip($query) : Builder {
        return $query->where('top', 1);
    }

    public function scopeFeaturedBrand($query) : Builder {
        return $query->where('featured', 1);
    }

    public function scopeTopBrand($query) : Builder {
        return $query->where('top_brands', 1);
    }

    public function scopeHomeTopBrand($query) : Builder {
        return $query->where('home_top_brands', 1);
    }
}
