<?php 
namespace App\Services\APIServices;

Class APIPaths{
    public static $baseUrl;
    public static $myShop;

    //BASIC pages
    const SELLERS = "sellers/";
    const PRODUCT_REVIEW_LIST = "products-review-list";
    const FLASH_SALE = "flash-sale";
    const FEATURED_PRODUCTS = "featured-product";
    const NEW_PRODUCTS = "new-product";
    const WEBSITE_SETUP = "website-setup";

    //basic pages end.

    //static pages
    const PRIVACY_POLICY = "privacy-policy";
    const TERMS_AND_CONDITIONS = "terms-and-conditions";
    const FAQ = "faq";
    const SELLER_TERMS_CONDITIONS = "seller-terms-conditoins";
    const SHIPPING_AND_RETURNS = "shipping-returns";
    const ABOUT_US = "about-us";
    const CONTACT_US = "contact-us";

    //static pages end.

    //blog-section start

    const BLOG="blog?page=";
    const BLOG_DETAIL = "blog/";
    const BLOG_COMMENT = "";
    const BLOGS_BY_QUERY = "blog";
    //blog-section ends.

}
?>
