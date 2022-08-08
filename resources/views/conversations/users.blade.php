<div class="row">
    <div class="col-md-6">
        <div class="list-group">
            @foreach ($users as $user)
            <a class="list-group-item" href="{{ route('conversations.show', $user->id) }}"> {{$user->name}} </a>
            @endforeach 
        </div>
    </div>
</div>