<table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
    <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
        <tr>
            <th scope="col" class="px-6 py-4">{{ __('Author') }}</th>
            <th scope="col" class="px-6 py-4">{{ __('Title') }}</th>
            <th scope="col" class="px-6 py-4">{{ __('Description') }}</th>
            @if($showActions)
            <th scope="col" class="px-6 py-4">{{ __('Actions') }}</th>  
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr class="border-b border-neutral-200 dark:border-white/10">
            <td class="whitespace-nowrap px-6 py-4">{{ $article->user->name }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $article->title }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $article->description }}</td>
            @if($showActions)
            <td class="whitespace-nowrap px-6 py-4">                    
                <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="post">
                    <x-primary-button>{{ __('Delete') }}</x-primary-button>
                    @method('delete')
                    @csrf
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
