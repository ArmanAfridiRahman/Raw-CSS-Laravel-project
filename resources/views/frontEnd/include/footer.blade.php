<div class="footer">
    <div class="footer-top">
        @foreach($campuses as $campus)
        <div class="content">
            <h1>{{$campus->campus_name}}</h1>
            <p>{{$campus->campus_address}}</p>
        </div>
        @endforeach
    </div>
    <div class="footer-bottom">
        <div class="content">
            <p>Designed and created by: Arman Afridi Rahman (Session: 2018/Computer Technology)</p>
        </div>
    </div>
</div>
