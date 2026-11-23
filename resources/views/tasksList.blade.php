{{-- Blade Templete --}}
<div>

    <h1>Tasks List</h1>
    <div>
        {{-- Blade Directive --}}
        @if(count($tasks))
            @foreach($tasks as $task)
                <p>{{ $task->title }}</p>
            @endforeach
        @else
            <p>There is no task found</p>
        @endif
    </div>
</div>
