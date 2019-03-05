<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/meta',
	    'admin/meta/*',
	    'admin/category/slug',
	    'admin/page/slug',
	    'admin/post/get_post_type',
	    'admin/post/filter',
	    'admin/product/filter',
	    'admin/product/slug',
	    'admin/productbc/specification',
	    'admin/productbc/getvalue/*',
	    'admin/productbc/getvalue/{product}',
	    'productbc/addtocart',
	    'admin/productbc/cartcount/*',
	    'admin/order/change-state/*',





    ];
}
