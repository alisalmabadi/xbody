@if(isset($slider) )

    <div id="jssor_{{$slider->id}}" style="position:relative;top:0px;left:0px;width:{{$slider->width}}px;height:{{$slider->height}}px;overflow:hidden;">
        <div data-u="slides" style="position:absolute;top:0px;left:0px;width:{{$slider->width}}px;height:{{$slider->height}}px;overflow:hidden;">
            @foreach($slider->slides as $slide)
                <div>
                    <img  class="img-full-wrapper" src="{{route('media',$slide->image)}}" />
                    @if($slide->btn_type==1)
                        <div class="text-center" style="z-index: 9999;position: absolute;top: 55%;color:#FFF;left:0;right:0;margin:auto;"><h1 style="text-shadow: rgb(140, 25, 183) 2px 2px;">{{$slide->title}}</h1></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@section('script_whole')
    <script>
        var jssor_{{$slider->id}}_options = {
            $AutoPlay: 1,
            $SlideDuration: 800,
            $SlideEasing: $Jease$.$OutQuint,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            },

        };

        var jssor_{{$slider->id}}_slider = new $JssorSlider$("jssor_{{$slider->id}}", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = {{$slider->width}};
        var MAX_HEIGHT = {{$slider->height}};

        function ScaleSlider() {
            var containerElement = jssor_{{$slider->id}}_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);





    </script>
@stop
@endif


