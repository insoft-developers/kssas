<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
      "website_title",
      "admin_title",
      "logo",
      "short_name",
      "company_name",
      "footer_logo",
      "phone",
      "email",
      "lokasi",
      "jam_kerja",
      "facebook",
      "twitter",
      "instagram",
      "youtube",
      "favicon",
      "term",
      "riba",
      "product_image_header",
      "berita_image_header",
      "faq_image_header",
      "contact_image_header",
      "map_lokasi",
      "map_text",
      "website",
      "versi",
      "privacy",
      "whatsapp"
    ];
}
