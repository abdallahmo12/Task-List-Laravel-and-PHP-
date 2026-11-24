{{-- Blade Templete --}}
<div>

    <h1>Tasks List</h1>
    <ul>
        {{-- Blade Directive --}}
        {{-- @if(count($tasks))
            @foreach($tasks as $task)
                <p>{{ $task->title }}</p>
            @endforeach
        @else
            <p>There is no task found</p>
        @endif --}}

        @forelse($tasks as $task)
            <li>
                <a href={{ route('tasks.show' , ['id' => $task->id]) }}>
                    <span>{{ $task->id }}</span><span>{{ $task->title }}</span>
                </a>
            </li>
        @empty
            <p>There is no task found</p>
        @endforelse
    </ul>
</div>
