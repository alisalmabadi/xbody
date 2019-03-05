<div class="c-breadcrumb" role="breadcrumb">
    <ol vocab="http://schema.org/" typeof="BreadcrumbList">

        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" href="{{route('home')}}">
                <span property="name">فروشگاه</span>
            </a>
            <meta property="position" content="1">
        </li>



        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" href="{{route('category.show',$product->category)}}">
                <span property="name">{{$product->category->name}}</span>
            </a>
            <meta property="position" content="2">
        </li>

        <li property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" href="{{route('product.show',$product)}}">
                <span property="name">{{$product->name}} </span>
            </a>
            <meta property="position" content="4">
        </li>

    </ol>

</div>