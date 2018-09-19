<div class="left-sidebar mt-2">
  <div class="list-group">

    <a href="#collapseExample" data-toggle="collapse" class="list-group-item">
      <span class="float-left item">  Category </span>
      <span class="float-right"><i class="fa fa-chevron-down"></i></span>
    </a>

    <div class="collapse" id="collapseExample">
      <div class="card card-body pointer">
        <ul class="list-group">
          @foreach(\App\Models\Category::orderBy('id', 'ASC')->get() as $category)
            <li class="list-group-item"><a href="{{ route('categoryTender', $category->slug) }}">{{ $category->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

    <a href="#collapseExample2" data-toggle="collapse" class="list-group-item">
      <span class="float-left item">  Place</span>
      <span class="float-right"><i class="fa fa-chevron-down"></i></span>
    </a>

    <div class="collapse" id="collapseExample2">
      <div class="card card-body pointer">
        <ul class="list-group">
          @foreach(\App\Models\User::districts() as $district)
            <li class="list-group-item"><a href="{{ route('placeTender', $district->city) }}">{{ $district->city }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

    <a href="#collapseExample3" data-toggle="collapse" class="list-group-item">
      <span class="float-left item">  Organization</span>
      <span class="float-right"><i class="fa fa-chevron-down"></i></span>
    </a>

    <div class="collapse" id="collapseExample3">
      <div class="card card-body pointer">
        <ul class="list-group">
          @foreach(\App\Models\User::organizations() as $organization)
            <li class="list-group-item"><a href="{{ route('organizationTender', $organization->organization) }}">{{ $organization->organization }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

  </div>
</div>
