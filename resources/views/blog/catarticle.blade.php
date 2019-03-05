@foreach($articles as $article)
    <a href="index-blog-item.html">
        <div class="item2">
            <div class="item-title">
                <div class="title-titre">
                    <p>{{$article->title}}</p>
                </div>
                <div class="title-pg">
                    <p>{{$article->short}}</p>
                </div>

            </div>
            <img src="{{route('media',$article->img_thumbnail)}}" alt="">
        </div>
    </a>

@endforeach