@include("layouts.header")
@foreach($posts as $value)

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            <!-- Featured blog post-->

            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="{{$value['post_img']}}" alt="..."/></a>
                <div class="card-body">
                    <div class="small text-muted">{{$value['post_created_time']}}</div>
                    <div class="small text-muted"></div>
                    <h2 class="card-title">{{$value['post_title']}}</h2>
                    <p class="card-text">{{$value['post_desc']}}</p>
                    <a class="btn btn-primary" href="postdetail/{{$value['post_id']}}">Read more →</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach
@include("layouts.footer")