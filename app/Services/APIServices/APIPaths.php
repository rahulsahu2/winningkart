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

    //auth api start

    const REGISTER_USER = "store-register";
    const SEND_OTP = "resend-register-code";
    const VERIFY_OTP = "user-verification/_OTP";
    const LOGIN = "store-login";
    const SEND_LOGIN_OTP = 'store-login-with-otp';
    const LOGOUT = "user/logout?token=_TOKEN";
    const FORGET_PASSWORD = "send-forget-password";
    const UPDATE_PASSWORD = "user/update-password?token=_TOKEN";
    const RESET_PASSWORD = "store-reset-password/_OTP";
    const USER_DASBOARD = "user/dashboard?token=_TOKEN";
    const USER_PROFILE = "user/my-profile?token=_TOKEN";

    //auth api end

    //cart start
    const CART = "cart";
    const ADD_TO_CART = "add-to-cart";
    const CLEAR_CART = "cart-clear";
    const CART_ITEM_REMOVE = "cart-item-remove/{id}";
    const INCREMENT_CART = "cart-item-increment/{id}";
    const DECREMENT_CART = "cart-item-decrement/{id}";


    //cart end

    //static pages
    const PRIVACY_POLICY = "privacy-policy";
    const TERMS_AND_CONDITIONS = "terms-and-conditions";
    const FAQ = "faq";
    const FAQ_DETAILS = "faq-details";
    const SELLER_TERMS_CONDITIONS = "seller-terms-conditoins";
    const SHIPPING_AND_RETURNS = "page/shipping-returns";
    const ABOUT_US = "about-us";
    const CANCELLATION_RETURN = "page/cancelletion-return";
    const CONTACT_US = "contact-us";

    //static pages end.

    //products

    const GET_ALL_CATEGORIES = 'categories';
    const PRODUCTS = 'product/';
    //products-end

    //brands
    const BRAND_DETAILS = 'brand-details/';

    //brands end

    //blog-section start

    const BLOG="blog?page=";
    const BLOG_DETAIL = "blog/";
    const BLOG_COMMENT = "";
    const BLOGS_BY_QUERY = "blog";
    //blog-section ends.

}
?>
