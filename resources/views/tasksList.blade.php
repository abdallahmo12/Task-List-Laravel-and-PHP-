{{-- Blade Templete --}}
<div>

    <h1>Tasks List</h1>
    <div>
        {{-- Blade Directive --}}
        @if(count($tasks))
            <p>There are Tasks</p>
        @else
            <p>There is no task found</p>
        @endif
    </div>
</div>
