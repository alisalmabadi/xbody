

<div  class="row">
        @foreach($articles as $article)
          <div class="col-sm-4">
              <article class="article-item text-right">
                  <a href="{{route('article_show',$article)}}">
                      <div class="article-thumnail">
                          <img src="{{route('media',$article->img_thumbnail)}}" alt="{{$article->title}}">
                      </div>
                      <div class="article-detail">
                          <span>{{$article->article_category->name}}</span>
                          <div class="article-title ">
                              <h3 class="">{{$article->title}}</h3>
                          </div>

                          <span class="article-writer"><i class="fa fa-user-circle-o "></i>{{$article->user->name}}</span>

                          <span class="article-date">{{$article->persian_date}}<i class="fa fa-calendar-check-o "></i></span>
                      </div>
                  </a>
              </article>
            </div>
        @endforeach

</div>
<div class="row text-center">
    {{$articles->links('partials.pagination')}}
</div>







