<div class="right-sidebar">
  <div class="widget">
    <h3>Recent Tenders</h3>
    <div>
      <marquee scrollamount="2" behavior="scroll" direction="up">
        <ul class="list-group">
          @foreach(\App\Models\Tender::recentTenders() as $recentTender)
            <li class="list-group-item">
              <a href="{{ route('singleTender', $recentTender->slug) }}">{{ $recentTender->title }}</a>
            </li>
          @endforeach
        </ul>
      </marquee>
    </div>
  </div> <!-- End recent tenders -->
  <div class="widget">
    <h3>Top Tenders</h3>
    <div>
      <ul class="list-group">
        @foreach (\App\Models\Tender::topTenders() as $topTender)
          <li class="list-group-item">
            <a href="{{ route('singleTender', $topTender->slug) }}">{{ $topTender->title }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div> <!-- End recent tenders -->

</div>
