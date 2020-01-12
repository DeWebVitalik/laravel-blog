<br>
<ul class="list-unstyled">
    @forelse($staticInfo as $info)
                <li>{{$info->browser}}: {{$info->total}} </li>
    @empty
        <p>Statistic not found</p>
    @endforelse
</ul>
